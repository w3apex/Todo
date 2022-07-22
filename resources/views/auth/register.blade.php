@extends('auth.auth-master')

@section('auth-master')
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body">
                        
                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="#" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="{{ asset('backend/assets/images/logo.png')}}" alt="" height="95">
                                    </span>
                                </a>
            
                                <a href="#" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="{{ asset('backend/assets/images/logo.png')}}" alt="" height="95">
                                    </span>
                                </a>
                            </div>
                        </div>

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">{{__("First Name")}}</label>
                                    <input type="text" id="first_name" name="first_name" placeholder="Enter first name" class="form-control" value="{{ old('first_name') }}">
                                    
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">{{__("Last Name")}}</label>
                                    <input type="text" id="last_name" name="last_name" placeholder="Enter last name" class="form-control" value="{{ old('last_name') }}">
                                    
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">{{__("E-Mail Address")}}</label>
                                <input type="email" id="email" name="email" placeholder="Enter email" class="form-control" value="{{ old('email')}}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone">{{__("Phone")}}</label>
                                <input type="phone" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter phone" class="form-control">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">{{__("Password")}}</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter password">
                                    {{-- <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div> --}}
                                    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password-confirm">{{__("Confirm Password")}}</label>
                                    <input type="password" id="password-confirm"  class="form-control" name="password_confirmation" placeholder="Enter confirm password">
                                    
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="division_id">Division</label>
                                    <select id="division_id" name="division_id" class="form-control">
                                        <option value="">Select Division</option>
                                        @foreach ($divisions as $key => $division)
                                            <option value="{{$key}}" {{ isset($user) ? (($key == $user->division_id) ? 'selected' : '') : '' }}>{{$division}}</option>
                                        @endforeach
                                    </select>

                                    <p class="text-danger">
                                        {{ $errors->first('division_id')}}
                                    </p> 
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="district_id">District</label>
                                    <select id="district_id" name="district_id" class="form-control">
                                        <option value="">Select Division</option>
                                        @foreach ($districts as $key => $district)
                                            <option value="{{$key}}" {{ isset($user) ? (($key == $user->district_id) ? 'selected' : '') : '' }}>{{$district}}</option>
                                        @endforeach
                                    </select>

                                    <p class="text-danger">
                                        {{ $errors->first('district_id')}}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p> <a href="{{ route('password.request') }}" class="text-white-50 ml-1">{{ __('Forgot Your Password?') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form> --}}
