<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Limpa o CPF (só números) e converte data de nascimento para yyyy-mm-dd se vier como dd/mm/aaaa
        $cpf = $request->cpf ? preg_replace('/\D/', '', $request->cpf) : null;

        $data_nascimento = $request->data_nascimento;
        if ($data_nascimento && preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $data_nascimento, $matches)) {
            $data_nascimento = "{$matches[3]}-{$matches[2]}-{$matches[1]}";
        }

        // Altera o request para já validar o valor limpo
        $request->merge([
            'cpf' => $cpf,
            'data_nascimento' => $data_nascimento,
        ]);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'telefone' => ['required'],
            'cep' => ['required'],
            'rua' => ['required'],
            'numero' => ['required'],
            'bairro' => ['required'],
            'complemento' => ['nullable'],
            'cidade' => ['required'],
            'cpf' => ['nullable', 'regex:/^\d{11}$/'],
            'data_nascimento' => ['nullable', 'date'],
            'nome_fantasia' => ['nullable'],
            'cnpj' => ['nullable', 'regex:/^\d{14}$/'],
            'tipo' => ['required', 'in:empresa,candidato'],
            'uf' => ['required', 'string', 'size:2'],
        ]);

        // Remove tudo que não for número do CEP (para garantir)
        $cep = preg_replace('/\D/', '', $request->cep);

        // Busca latitude e longitude pelo endereço completo (passa todos os dados possíveis!)
        $coords = $this->getLatLongFromCep(
            $cep,
            $request->rua,
            $request->bairro,
            $request->cidade,
            $request->uf,
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefone' => $request->telefone,
            'cep' => $cep,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'complemento' => $request->complemento,
            'cidade' => $request->cidade,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'nome_fantasia' => $request->nome_fantasia,
            'cnpj' => $request->cnpj,
            'tipo' => $request->tipo,
            'latitude' => $coords['latitude'] ?? null,
            'longitude' => $coords['longitude'] ?? null,
            'uf' => $request->uf,

        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('dashboard');
    }

    /**
     * Busca latitude e longitude usando OpenCage, Google e Nominatim,
     * primeiro pelo endereço completo, depois por CEP e por último por bairro/cidade/UF.
     */
    private function getLatLongFromCep($cep, $rua = null, $bairro = null, $cidade = null, $uf = null)
    {
        $openCageKey = env('OPENCAGE_KEY');
        $googleKey = env('GOOGLE_GEOCODING_KEY');

        // 1. Buscar pelo ENDEREÇO COMPLETO (mais preciso!)
        $enderecoParts = [];
        if ($rua)    $enderecoParts[] = $rua;
        if ($bairro) $enderecoParts[] = $bairro;
        if ($cidade) $enderecoParts[] = $cidade;
        if ($uf)     $enderecoParts[] = $uf;
        $enderecoParts[] = $cep;
        $enderecoCompleto = implode(', ', array_filter($enderecoParts));

        // Tenta Google com endereço completo
        if ($enderecoCompleto && $googleKey) {
            $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
                'address' => $enderecoCompleto,
                'region' => 'br',
                'key' => $googleKey,
            ]);
            $data = $response->json();
            if (
                $data['status'] == 'OK'
                && isset($data['results'][0]['geometry']['location'])
            ) {
                return [
                    'latitude' => $data['results'][0]['geometry']['location']['lat'],
                    'longitude' => $data['results'][0]['geometry']['location']['lng'],
                ];
            }
        }
        

        // Tenta OpenCage com endereço completo
        if ($enderecoCompleto && $openCageKey) {
            $openCageUrl = "https://api.opencagedata.com/geocode/v1/json?q=" . urlencode($enderecoCompleto) . "&countrycode=br&key=$openCageKey&language=pt-BR";
            $response = Http::get($openCageUrl);
            $data = $response->json();
            if (isset($data['results'][0]['geometry'])) {
                return [
                    'latitude' => $data['results'][0]['geometry']['lat'],
                    'longitude' => $data['results'][0]['geometry']['lng'],
                ];
            }
        }

        // 2. Buscar só pelo CEP
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

        if ($openCageKey) {
            $openCageUrl = "https://api.opencagedata.com/geocode/v1/json?q=$cep&countrycode=br&key=$openCageKey&language=pt-BR";
            $response = Http::get($openCageUrl);
            $data = $response->json();
            if (isset($data['results'][0]['geometry'])) {
                return [
                    'latitude' => $data['results'][0]['geometry']['lat'],
                    'longitude' => $data['results'][0]['geometry']['lng'],
                ];
            }
        }

        // 3. Buscar pelo bairro + cidade + UF (caso não ache pelo CEP)
        if ($bairro && $cidade && $uf && $googleKey) {
            $bairroCidade = $bairro . ', ' . $cidade . ', ' . $uf . ', Brasil';
            $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
                'address' => $bairroCidade,
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

        // Nominatim (OpenStreetMap) com CEP
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
