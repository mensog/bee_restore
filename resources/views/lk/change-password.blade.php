@extends('layouts.lk')

@section('content')
    <h2>Смена пароля</h2>
    <div class="card-lk">
        <div class="card-lk__body">
            <form id="changePassword" class="change-password" action="{{ route('lk_profile_change_password') }}" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="password">Текущий пароль</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="newPassword">Новый пароль <span class="text-secondary small">(не менее 8 символов)</span></label>
                        <input id="newPassword" type="password"
                               class="form-control @error('newPassword') is-invalid @enderror" name="newPassword">
                        @error('newPassword')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="newPasswordConfirmation">Подтвердите новый пароль</label>
                        <input id="newPasswordConfirmation" type="password"
                               class="form-control @error('newPasswordConfirmation') is-invalid @enderror" name="newPasswordConfirmation">
                        @error('newPasswordConfirmation')
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
