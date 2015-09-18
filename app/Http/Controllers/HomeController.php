<?php

namespace DropMusic\Http\Controllers;

use DropMusic\Dropbox\DropboxFactory;
use DropMusic\Dropbox\DropboxService;
use Illuminate\Contracts\Auth\Guard as Auth;

class HomeController extends Controller
{
    private $auth;
    private $dropboxService;

    public function __construct(Auth $auth, DropboxService $dropboxService)
    {
        $this->auth = $auth;
        $this->dropboxService = $dropboxService;
    }

    public function index()
    {
        $accessToken = $this->auth->user()['dropbox_token'];

        if (is_null($accessToken)) {
            return view('home');
        }

        $this->dropboxService->setClient(DropboxFactory::make($accessToken));
        $songs = $this->dropboxService->retrieveAllAudioFiles();

        return view('home')->with('songs', $songs);
    }
}