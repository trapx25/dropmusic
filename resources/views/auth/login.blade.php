@extends('layouts.base')

@section('title')
    <title>Login - Dropbox Music</title>
@endsection

@section('content')
    <div class="container">
        <div class="row top-buffer">
            <div class="col-md-10 col-md-offset-1">
                @include('errors.form')
                <h2>Login</h2>
                <form action="/auth/login" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                                <br />
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <br />
                                <input type="checkbox" name="remember"> Remember Me
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Log in</button>
                </form>
                <br />
                <a href="/password/email">Forgot Your Password? </a>
            </div>
        </div>
    </div>
@endsection