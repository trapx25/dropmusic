@extends('layouts.base')

@section('title')
    <title>Home - Dropbox Music</title>
@endsection

@section('styles')
    <link href="http://jplayer.org/latest/dist/skin/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row top-buffer">
            <div class="col-md-10 col-md-offset-1">
                @if (Auth::check())
                    @if (is_null(Auth::user()['dropbox_token']))
                        <h2>No Dropbox Account</h2>
                        <p>Please visit the settings page and authenticate with your Dropbox account!</p>
                    @elseif (is_null($songs))
                        <h2>No MP3s :(</h2>
                        <p>Add some songs to your Dropbox account!</p>
                    @else
                        <h2>Playlist</h2>
                        @include('partials.playlist')
                    @endunless
                @else
                    <div class="jumbotron">
                        <h1>Welcome</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="http://jplayer.org/latest/lib/jquery.min.js"></script>
    <script src="http://jplayer.org/latest/dist/jplayer/jquery.jplayer.min.js"></script>
    <script src="http://jplayer.org/latest/dist/add-on/jplayer.playlist.min.js"></script>
    <script>
        $(document).ready(function() {
            new jPlayerPlaylist({
                jPlayer: "#jquery_jplayer_1",
                cssSelectorAncestor: "#jp_container_1"
            },  [
                    @if (Auth::check())
                        @unless (is_null(Auth::user()['dropbox_token']) || is_null($songs))
                            @foreach ($songs as $song)
                                {
                                    title: "{{ trim(end((explode('/', $song[1]['path'])))) }}",
                                    mp3: "{{ $song[1]['temp_url'] }}",
                                    oga: "http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg"
                                },
                            @endforeach
                        @endunless
                    @endif
                ], 
            {
                swfPath: "http://jplayer.org/latest/dist/jplayer",
                supplied: "mp3, oga",
                wmode: "window",
                useStateClassSkin: true,
                autoBlur: false,
                smoothPlayBar: true,
                keyEnabled: true
            });
      });
    </script>
@endsection