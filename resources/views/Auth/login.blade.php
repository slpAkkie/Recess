@extends('tpl.main')

@section('body')
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="heading-39291 col-12 text-center">Войдите в ваш профиль</h2>

                <form class="login-form col-12" action="{{ route('login') }}" method="post">
                    @csrf
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
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Пароль">
                            <div class="invalid-feedback text-bold">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 mr-auto">
                            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5 rounded-0"
                                value="Войти">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 mr-auto">
                            <p>Если у вас еще нет аккаунта, можете зарегистрироваться <a
                                    href="{{ route('showRegister') }}">здесь</a>.</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
