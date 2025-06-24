<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserRegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:candidato,empresa',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'telefone' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'cep' => 'required|string',
            'cpf' => 'nullable|string',
            'data_nascimento' => 'nullable|date',
            'cnpj' => 'nullable|string',
            'nome_fantasia' => 'nullable|string',
            'aceita_termos' => 'accepted',
        ]);

        // Remove tudo que não for número do CEP (para busca E para salvar)
        $cep = preg_replace('/\D/', '', $request->cep);

        // Busca latitude e longitude pelo CEP limpo
        $coords = $this->getLatLongFromCep($cep);

        $user = User::create([
            'tipo' => $request->tipo,
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cep' => $cep, // <-- agora salva sem máscara
            'cpf' => $request->tipo === 'candidato' ? $request->cpf : null,
            'data_nascimento' => $request->tipo === 'candidato' ? $request->data_nascimento : null,
            'cnpj' => $request->tipo === 'empresa' ? $request->cnpj : null,
            'nome_fantasia' => $request->tipo === 'empresa' ? $request->nome_fantasia : null,
            'password' => Hash::make($request->password),
            'latitude' => $coords['latitude'] ?? null,
            'longitude' => $coords['longitude'] ?? null,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    private function getLatLongFromCep($cep)
    {
        // 1. OpenCage
        $openCageKey = env('OPENCAGE_KEY');
        $openCageUrl = "https://api.opencagedata.com/geocode/v1/json?q=$cep&countrycode=br&key=$openCageKey&language=pt-BR";
        $response = Http::get($openCageUrl);

        if ($response->ok() && isset($response['results'][0]['geometry'])) {
            return [
                'latitude' => $response['results'][0]['geometry']['lat'],
                'longitude' => $response['results'][0]['geometry']['lng'],
            ];
        }

        // 2. Google Geocoding
        $googleKey = env('GOOGLE_GEOCODING_KEY');
        if ($googleKey) {
            $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
                'address' => $cep,
                'region' => 'br',
                'key' => $googleKey,
            ]);
            $data = $response->json();
            if ($data['status'] == 'OK' && isset($data['results'][0]['geometry']['location'])) {
                return [
                    'latitude' => $data['results'][0]['geometry']['location']['lat'],
                    'longitude' => $data['results'][0]['geometry']['location']['lng'],
                ];
            }
        }

        // 3. Nominatim (OpenStreetMap) - opcional
        $nominatimUrl = "https://nominatim.openstreetmap.org/search?postalcode={$cep}&country=Brazil&format=json";
        $response = Http::get($nominatimUrl);
        $data = $response->json();

        if (isset($data[0]['lat']) && isset($data[0]['lon'])) {
            return [
                'latitude' => $data[0]['lat'],
                'longitude' => $data[0]['lon'],
            ];
        }

        // Não encontrou em nenhum serviço
        return null;
    }
}
