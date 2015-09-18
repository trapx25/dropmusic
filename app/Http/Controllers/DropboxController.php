<?php

namespace DropMusic\Http\Controllers;

use Socialite;
use DropMusic\User;
use Illuminate\Auth\AuthManager as Auth;
use GuzzleHttp\Exception\ClientException;

class DropboxController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('dropbox')->redirect();
    }

    public function handleProviderCallback(Auth $auth)
    {
        try {
            $token = Socialite::driver('dropbox')->user()->token;
            $user = $auth->user();
            $user->dropbox_token = $token;
            $user->save();
        } catch(ClientException $e) {
            return redirect()->route('settings');
        }
        return redirect()->route('home');
    }
}
