<?php

namespace App\Http\Controllers;

use App\Contract\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function startVK() {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callbackVK(Social $service) {
        try {
            return redirect($service->socialLogin(Socialite::driver('vkontakte')->user()));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
    }

    public function startFB() {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFB(Social $service) {
        try {
            return redirect($service->socialLogin(Socialite::driver('facebook')->user()));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
    }
}
