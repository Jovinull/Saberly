<?php

namespace App\Http\Controllers;

use App\Models\User as AppUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class SocialController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentication()
    {
        try {
            /** @var SocialiteUser $googleUser */
            $googleUser = Socialite::driver('google')->user();

            $email = $googleUser->getEmail();
            $name = $googleUser->getName();
            $avatar = $googleUser->getAvatar();

            if (!$email) {
                return redirect()->back()->with('error', 'Google não retornou um e-mail para esta conta.');
            }

            $user = AppUser::where('email', $email)->first();

            if (!$user) {
                $user = AppUser::create([
                    'email' => $email,
                    'name' => $name ?? 'Usuário',
                    'photo' => $avatar,
                    'password' => Hash::make('password@123'),
                    'role' => 'user',
                ]);
            }

            Auth::login($user);

            return redirect('/user/dashboard');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
