@extends('layouts.lk')

@section('content')
    <h2>Изменение личных данных</h2>
    <div class="card-lk">
        <div class="card-lk__body">
            <form id="edit-data" class="edit-data" action="{{ route('lk_profile_edit_data') }}" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="name">Имя</label>
                        <input id="name" type="text"
                               placeholder="Введите имя"
                               class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ $user->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="surname">Фамилия</label>
                        <input id="surname" type="text"
                               placeholder="Введите фамилию"
                               class="form-control @error('surname') is-invalid @enderror" name="surname"
                               value="{{ $user->surname }}">
                        @error('surname')
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
