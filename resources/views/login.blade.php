@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4>Login</h4>

            @if (Session::has('warning'))
            <div class="alert alert-warning alert-block my-4">
                <strong>{{ Session::get('warning') }}</strong>
            </div>
            @endif

            <form method="post" action="{{ route('post-login') }}" accept-charset="UTF-8">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" name="username" />
                </div>

                <div class="form-group mt-2">
                    <label class="form-label" for="Password">Password</label>
                    <input class="form-control" type="password" name="password" />
                </div>

                <button type="submit" class="btn btn-primary mt-4 btn-block enter-btn">Login</button>

            </form>
        </div>
    </div>
</div>

@endsection