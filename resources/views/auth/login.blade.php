@extends('layouts.app')

@section('content')
    <div class="auth-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-12">
                    <div class="card-auth">
                        <div class="card-auth__body">
                            <h3>Войти</h3>
                            <form method="POST" class="form floating-label" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <div class="form-control-container">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" placeholder=" "
                                                   value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            <label for="email">E-mail</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <div class="form-control-container">
                                            <input id="password" type="password" placeholder=" "
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password"
                                                   required autocomplete="current-password">
                                            <label for="password">Пароль</label>
                                            <span class="show-password">
                                                <img src="/svg/auth/show-password.svg" alt="show-password">
                                            </span>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <input class="form-check-input hidden d-none" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            Войти
                                        </button>
                                        <div class="remember-block text-center">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">
                                                    Не помню пароль
                                                </a>
                                                <a href="{{ route('register') }}">
                                                    Регистрация
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
