@extends('backend.auth.auth-master')

@section('title')
    {{ __('Registration') }}
@endsection
@section('auth-container')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.admin.registraton') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="name" name="name" type="text" placeholder="{{ __('Enter Your Name') }}" />
                                        <label for="inputFirstName">{{ __('Name') }}</label>
                                        @if ($errors->has('name'))
                                            <div class="text-danger">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="username" name="username" type="text" placeholder="{{ __('Enter Your Username') }}" />
                                        <label for="inputLastName">{{ __('Username') }}</label>
                                        @if ($errors->has('username'))
                                            <div class="text-danger">
                                                {{ $errors->first('username') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="text" placeholder="{{ __('name@example.com') }}" />
                                <label for="inputEmail">{{ __('Email address') }}</label>
                                @if ($errors->has('email'))
                                    <div class="text-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="password" name="password" type="password" placeholder="{{ __('Create a password') }}" />
                                        <label for="inputPassword">{{ __('Password') }}</label>
                                        @if ($errors->has('password'))
                                            <div class="text-danger">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="confirm_password" name="confirm_password" type="password" placeholder="{{ __('Confirm password') }}"/>
                                        <label for="inputPasswordConfirm">{{ __('Confirm Password') }}</label>
                                        @if ($errors->has('confirm_password'))
                                            <div class="text-danger">
                                                {{ $errors->first('confirm_password') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="{{ route('user.login') }}">Have an account? Go to login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
