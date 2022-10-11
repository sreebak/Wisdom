@extends('admin.auth')
@section('page-title')
    Login | Website Admin Dashboard
@endsection

@section('page-head')
    <h5 class="text-primary">Welcome Back !</h5>
    <p>Sign in to continue to Web Admin</p>
@endsection

@section('content')
<form method="POST" action="{{ route('login') }}">

        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter username">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group">
            <label for="userpassword">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

       
        <div class="mt-3">
            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                                    {{ __('Login') }}
                                </button>
        </div>

        <div class="mt-4 text-center">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}"><i class="mdi mdi-lock mr-1"></i> 
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>

</form>
@endsection
