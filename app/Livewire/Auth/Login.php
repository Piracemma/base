<?php

namespace App\Livewire\Auth;

use Exception;
use Livewire\Component;
use Google\Client;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use TallStackUi\Traits\Interactions;

class Login extends Component
{
    use Interactions;

    #[Validate(['email', 'required', 'min:5'])]
    public ?string $email;

    #[Validate(['string', 'required', 'min:8'])]
    public ?string $password;

    public bool $remember = false;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function logar()
    {

        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {

            request()->session()->regenerate();
 
            return redirect()->intended();

        } else {

            $this->toast()->error('Usuario não encontrado!', 'Verifique os dados passados.')->flash()->send();

            return $this->redirectRoute('login');

        }

    }

    public function loginGoogle()
    {

        try {
            
            $client = new Client();
    
            $guzzleClient = null;

            if(env('APP_ENV') == 'local') {

                $guzzleClient = new GuzzleHttpClient(['curl' => [CURLOPT_SSL_VERIFYPEER => false]]);
                // Para desenvolvimento local que não tem SSL

            } else {

                $guzzleClient = new GuzzleHttpClient();

            }
    
            $client->setHttpClient($guzzleClient);
            $client->setAuthConfig(storage_path('info/googlelogin.json'));
            $client->setRedirectUri(route('autenticar-google'));
            $client->addScope('email');
            $client->addScope('profile');
    
            return redirect()->away($client->createAuthUrl());

        } catch(Exception $e) {

            $this->toast()->error('Erro!', 'Tente novamente em alguns instantes!')->send();

        }

    }
}
