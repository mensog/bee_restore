@extends('layouts.app')

@section('content')
    <div class="auth-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-md-6">
                    <div class="card-auth">

                        <div class="card-auth__body">
                            <h3>Восстановить пароль</h3>
                            <p class="cart__after-title">Введите адрес электронной почты профиля</p>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" class="form floating-label" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <div class="form-control-container">
                                            <input id="email" type="email"
                                                   placeholder=" "
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
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

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary mb-0">
                                            Восстановить
                                        </button>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="remember-block text-center">
                                            <a href="{{ route('login') }}">
                                                Вход на сайт
                                            </a>
                                            <a href="{{ route('register') }}">
                                                Регистрация
                                            </a>
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
