@extends('layouts.lk')

@section('content')
    <div class="cart checkout-page">
        <div class="cart__wrap">
            <h2 class="cart__heading">
                Личные данные
            </h2>
            <form id="profile" action="{{ route('lk_profile_edit_data') }}" method="post" class="form floating-label">
                @csrf
                <h3 class="cart__subheading">Город получения</h3>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-control-container">
                            <input id="city" type="text"
                                   class="form-control @error('city') is-invalid @enderror"
                                   name="city" placeholder=" "
                                   value="{{ $user->city }}" required autocomplete="city">
                            <label for="city">Введите город получения</label>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <h3 class="cart__subheading">Данные получателя</h3>
                <p class="cart__after-title">Полные фамилия, имя и отчество потребуются при получении
                    заказа</p>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-control-container">
                            <input id="name-n-surname" type="text"
                                   class="form-control @error('fullName') is-invalid @enderror"
                                   name="fullName" placeholder=" "
                                   value="{{ $user->full_name }}" required autocomplete="name">
                            <label for="name-n-surname">ФИО</label>
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
                                   class="form-control @error('phone') is-invalid @enderror"
                                   name="phone" placeholder=" "
                                   value="{{ $user->phone }}" required autocomplete="phone">
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
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" placeholder=" "
                                   value="{{ $user->email }}" required autocomplete="email">
                            <label for="email">E-mail</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <h3 class="cart__subheading">Адрес получателя</h3>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-control-container">
                            <input id="address" type="text"
                                   class="form-control @error('address') is-invalid @enderror"
                                   name="address" placeholder=" "
                                   value="{{ $user->address }}" required autocomplete="address">
                            <label for="address">Улица</label>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 col-6">
                        <div class="form-control-container">
                            <input id="house" type="text"
                                   class="form-control"
                                   name="house" placeholder=" "
                                   value="{{ old('house') }}">
                            <label for="house">Дом</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="form-control-container">
                            <input id="apartment" type="text"
                                   class="form-control"
                                   name="apartment" placeholder=" "
                                   value="{{ old('apartment') }}">
                            <label for="apartment">Квартира</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="form-control-container">
                            <input id="floor" type="text"
                                   class="form-control"
                                   name="floor" placeholder=" "
                                   value="{{ old('floor') }}">
                            <label for="floor">Этаж</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <button class="btn btn-primary" type="submit">
                            Сохранить данные
                        </button>
                    </div>
                </div>
            </form>

            <form id="change-password" class="form floating-label" action="{{ route('lk_profile_change_password') }}"
                  method="post">
                <h3 class="cart__subheading">Изменение пароля</h3>
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="form-control-container">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" placeholder=" "
                                   required autocomplete="password">
                            <label for="password">Введите старый пароль</label>
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
                            <input id="newPassword" type="password"
                                   class="form-control @error('newPassword') is-invalid @enderror"
                                   name="newPassword" placeholder=" " autocomplete="new-password"
                                   required>
                            <label for="newPassword">Введите новый пароль</label>
                            <span class="show-password">
                                <img src="/svg/auth/show-password.svg" alt="show-password">
                            </span>
                            @error('newPassword')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <button class="btn btn-primary" type="submit">
                            Изменить пароль
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
