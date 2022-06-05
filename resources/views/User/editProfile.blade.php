@extends('tpl.main')

@section('body')
    <section class="site-section">
        <div class="container">
            <div class="row">
                <h2 class="heading-39291 col-12">Изменить профиль</h2>

                <div class="col-12 bg-white p-6">
                    <form class="edit-profile-form col-12 mx-auto" action="{{ route('profile.updateProfile') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" name="full_name"
                                    class="form-control border @error('full_name') is-invalid @enderror"
                                    placeholder="Ваше имя"
                                    value="{{ old('full_name') ?? $user->full_name }}">
                                <div class="invalid-feedback text-bold">
                                    @error('full_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" name="login"
                                    class="form-control border @error('login') is-invalid @enderror" placeholder="Логин"
                                    value="{{ old('login') ?? $user->login }}">
                                <div class="invalid-feedback text-bold">
                                    @error('login')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="email" name="email"
                                    class="form-control border @error('email') is-invalid @enderror"
                                    placeholder="Адрес электронной почты"
                                    value="{{ old('email') ?? $user->email }}">
                                <div class="invalid-feedback text-bold">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" name="phone"
                                    class="form-control border @error('phone') is-invalid @enderror"
                                    placeholder="Номер телефона"
                                    value="{{ old('phone') ?? $user->phone }}">
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
                                    class="form-control border @error('password') is-invalid @enderror"
                                    placeholder="Пароль">
                                <div class="invalid-feedback text-bold">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="password" name="password_confirmation" class="form-control border"
                                    placeholder="Повторите пароль">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5 rounded-0"
                                    value="Сохранить">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
