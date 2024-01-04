@extends('layouts.app')

@section('content')
    <div class="auth-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-auth">

                        <div class="card-auth__body">
                            <h3>Создание нового пароля</h3>
                            <form id="reset-password" class="reset-password form floating-label" method="POST"
                                  action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <div class="form-control-container">
                                            <input id="email" type="email"
                                                   placeholder=" "
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ $email ?? old('email') }}" required autocomplete="email"
                                                   autofocus>
                                            <label for="email">e-mail</label>
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
                                            <label for="password">Новый пароль</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               placeholder=" "
                                               name="password_confirmation" required autocomplete="new-password">
                                        <label for="password-confirm">Повторите пароль</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary mb-0">
                                            Создать новый пароль
                                        </button>
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
