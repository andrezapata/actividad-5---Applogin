<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Redirige a Google
  // Cambia tu función redirectToGoogle por esta:
public function redirectToGoogle()
{
    return Socialite::driver('google')
        ->with(['prompt' => 'select_account']) // ESTA ES LA CLAVE PARA QUE TE PREGUNTE
        ->redirect();
}

    // Maneja la respuesta de Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            
            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('123456'), 
                ]
            );

            Auth::login($user);

            return redirect('/dashboard'); 
            
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'No se pudo iniciar sesión con Google.');
        }
    }
} // Esta es la llave que faltaba o sobraba al final