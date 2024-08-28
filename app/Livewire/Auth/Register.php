<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;
use Google\Client;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    use Interactions;

    #[Validate(['string', 'required', 'min:5'])]
    public ?string $name;

    #[Validate(['email', 'required', 'min:5', 'unique:'.User::class])]
    public ?string $email;

    #[Validate(['string', 'required', 'min:8', 'confirmed'])]
    public ?string $password;

    #[Validate(['string', 'required', 'min:8'])]
    public ?string $password_confirmation;

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function cadastrar()
    {
        $this->validate();

        $user = User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        $this->toast()->success('Cadastrado!', 'Cadastro realizado com sucesso.')->send();

        event(new Registered($user));

        Auth::login($user, true);               

        request()->session()->regenerate();

        $this->redirectRoute('verification.notice', navigate:true);

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
