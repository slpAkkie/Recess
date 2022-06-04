@extends('tpl.main')

@section('body')
    <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1" style="background-image: url('images/hero_1.jpg');">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="box-92819">
                            <h1 class="text-uppercase text-black text-extra-thin mb-3">Связаться с нами</h1>
                            <p class="mb-0">Хотите поблагодарить автора или предложить фото- или видео- съемку? Мы
                                всегда рады обратной связи от вас</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 mb-5">
                    <form id="feedback-form" action="{{ route('feedback') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <input name="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" placeholder="Имя"
                                    value="{{ old('first_name') }}">
                                <div class="invalid-feedback text-bold">
                                    @error('first_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input name="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" placeholder="Фамилия"
                                    value="{{ old('last_name') }}">
                                <div class="invalid-feedback text-bold">
                                    @error('last_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
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
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Напишите сообщение..."
                                    cols="30" rows="10">{{ old('message') }}</textarea>
                                <div class="invalid-feedback text-bold">
                                    @error('message')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col mr-auto">
                                <input type="submit" id="feedback-form__submit"
                                    class="btn btn-block btn-primary text-white py-3 px-5 rounded-0"
                                    value="Отправить сообщение">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 ml-auto">
                    <div class="bg-white p-3 p-md-5">
                        <h3 class="heading-39291">Контактная информация</h3>
                        <ul class="list-unstyled footer-link">
                            <li class="d-block mb-3">
                                <span class="d-block text-black small text-uppercase text-semi-bold">Адрес:</span>
                                <span>Россия, Нижний Новгород</span>
                            </li>
                            <li class="d-block mb-3"><span
                                    class="d-block text-black small text-uppercase text-semi-bold">Телефон:</span><span>+7
                                    831 000 00 00</span></li>
                            <li class="d-block mb-3"><span
                                    class="d-block text-black small text-uppercase font-weight-bold">Email:</span><span>recess@akkie.cyou</span>
                            </li>
                        </ul>
                        <h3 class="heading-39291">Социальные сети:</h3>
                        <ul class="list-unstyled footer-link">
                            <li class="d-block mb-3">
                                <a href="https://vk.com/recesss" target="_blank" class="pr-3"><span class="icon-vk"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $('#feedback-form__submit').on('click', function() {
            this.value = 'Отправка';
            $(this).attr('disabled', true);

            $('#feedback-form').submit();
        });
    </script>
@endsection
