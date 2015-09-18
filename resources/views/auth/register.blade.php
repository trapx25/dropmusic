@extends('layouts.base')

@section('title')
    <title>Register - Dropbox Music</title>
@endsection

@section('content')
    <div class="container">
        <div class="row top-buffer">
            <div class="col-md-10 col-md-offset-1">
                @include('errors.form')
                <h2>Sign up</h2>
                <form action="/auth/register" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required>
                                <br />
                                <input type="email" name="email" class="form-control" placeholder="example@gmail.com" value="{{ old('email') }}" required>
                                <br />
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                <br />
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection