@extends('auth.auth-master')

@section('auth-master')
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">
                        
                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="#" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="" alt="" height="95">
                                    </span>
                                </a>
            
                                <a href="#" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="{{ asset('backend/assets/images/logo.png')}}" alt="" height="95">
                                    </span>
                                </a>
                            </div>
                            <p class="text-muted mb-3 mt-1">{{__("Enter your email address and password to access admin panel.")}}</p>
                        </div>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="email">{{__("Email address")}}</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">{{__("Password")}}</label>
                                <div class="input-group input-group-merge">
                                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Enter your password">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"> {{ __('Login') }} </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p>Don't have an account yet? <a href="{{ route('register') }}" class="text-white-50 ml-1">{{ __('Register now') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection