@extends('layouts.lk')

@section('content')
    <h2>Смена e-mail</h2>
    <div class="card-lk">
        <div class="card-lk__body">
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="phoneOld">Текущий e-mail</label>
                    <input id="phoneOld" type="phoneOld"
                           placeholder="+7 (000) 000-00-00"
                           class="form-control" name="phoneOld"
                           value="{{ $user->email }}" disabled readonly>
                </div>
            </div>
            <form id="change-email" class="change-email" action="{{ route('lk_profile_change_email') }}" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="email">Новый e-mail</label>
                        <input id="email" type="email"
                               placeholder="Введите e-mail"
                               value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror" name="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="password">Подтвердите пароль</label>
                        <input id="password" type="password"
                               placeholder="Подтвердите свой пароль"
                               class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary m-auto d-table">
                    Сохранить изменения
                </button>
            </form>
        </div>
    </div>
@endsection
