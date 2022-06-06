@extends('tpl.main')

@section('body')
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="heading-39291 col-12 text-center">Создайте аккаунт</h2>

                <form class="register-form col-12" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror"
                                placeholder="Ваше имя" value="{{ old('full_name') }}">
                            <div class="invalid-feedback text-bold">
                                @error('full_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror"
                                placeholder="Логин" value="{{ old('login') }}">
                            <div class="invalid-feedback text-bold">
                                @error('login')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Адрес электронной почты" value="{{ old('email') }}">
                            <div class="invalid-feedback text-bold">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Номер телефона" value="{{ old('phone') }}">
                            <div class="invalid-feedback text-bold">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Пароль">
                            <div class="invalid-feedback text-bold">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Повторите пароль">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col mr-auto">
                            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5 rounded-0"
                                value="Зарегистрироваться">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 mr-auto">
                            <p class="text-center">Если у вас уже есть аккаунт, <a href="{{ route('showLogin') }}">войдите</a> в него.</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
