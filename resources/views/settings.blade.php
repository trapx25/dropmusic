@extends('layouts.base')

@section('title')
    <title>Settings - Dropbox Music</title>
@endsection

@section('content')
    <div class="container">
        <div class="row top-buffer">
            <div class="col-md-10 col-md-offset-1">
                <h2>Add an account</h2>
                <p>
                    <a href="/auth/dropbox" class="btn btn-default btn-lg">
                        Connect to Dropbox <i class="fa fa-dropbox fa-lg"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection