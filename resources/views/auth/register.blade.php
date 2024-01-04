@extends('layouts.app')

@section('content')
    <div class="auth-page registration-page">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-12 p-0">
                    <div class="card-auth">
                        <div class="card-auth__body">
                            <h2>Регистрация</h2>
                            <p class="auth-page__after-title">Полные фамилия, имя и отчество потребуются при получении
                                заказа</p>
                            <form id="registration" class="registration form floating-label" method="POST"
                                  action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-control-container">
                                            <input id="name" type="text"
                                                   placeholder=" "
                                                   class="form-control @error('fullName') is-invalid @enderror" name="fullName"
                                                   value="{{ old('fullName') }}" required autocomplete="name" autofocus>
                                            <label for="name">ФИО</label>
                                            @error('fullName')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-control-container">
                                            <input id="phone" type="phone"
                                                   placeholder=" "
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   name="phone"
                                                   value="{{ old('phone') }}" required autocomplete="phone">
                                            <label for="phone">Телефон</label>

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-control-container">

                                            <input id="email" type="email"
                                                   placeholder=" "
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ old('email') }}" required autocomplete="email">
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

                                    <div class="col-md-6">
                                        <div class="form-control-container">

                                            <input id="password" type="password"
                                                   placeholder=" "
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password"
                                                   required autocomplete="new-password">
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
                                    <div class="col-md-6">
                                        <div class="form-control-container">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   placeholder=" "
                                                   name="password_confirmation" required autocomplete="new-password">
                                            <label for="password-confirm">Повторите пароль</label>
                                            <span class="show-password">
                                                <img src="/svg/auth/show-password.svg" alt="show-password">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <input id="personal-data-agreement" type="checkbox" checked
                                       class="form-control hidden d-none"
                                       name="personal-data-agree" required>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button disabled type="submit" class="btn btn-primary">
                                            Зарегистрироваться
                                        </button>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="auth-page__agreement">Нажимая на кнопку «Зарегистрироваться» вы
                                            соглашаетесь с <a href="#">условиями
                                                использования</a></p>
                                        <p class="auth-page__registered">Уже есть аккаунт? <a
                                                href="{{ route('login') }}">Войти</a></p>
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
