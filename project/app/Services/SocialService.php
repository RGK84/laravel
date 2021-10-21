<?php declare(strict_types=1);

namespace App\Services;

use App\Contract\Social;
use App\Models\User as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User;

class SocialService implements Social
{
    public function socialLogin(User $user) {
        $email = $user->getEmail();
        $name = $user->getName();
        $avatar = $user->getAvatar();

        $checkUser = Model::where('email', $email)->first();
        if ($checkUser) {
            $checkUser->name = $name;
            $checkUser->avatar = $avatar;

            if($checkUser->save()) {
                Auth::loginUsingId($checkUser->id);
                return route('account');
            }
        } else {
            $newUser = Model::create([
                'name' => $name,
                'email' => $email,
                'password' => 'password'
            ]);
            Auth::loginUsingId($newUser->id);
            return route('password.request');
        }

        throw new \Exception('Error social login');
    }
}
