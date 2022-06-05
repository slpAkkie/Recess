@extends('tpl.main')

@section('body')
    <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1 video-header-00000">
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

            <div class="ftco-cover-1 video-header-item-00000 bnr-video-wrapper">
                <video class="bnr-video" src="{{ asset('videos/contacts-1.mp4') }}" preload="auto" no-controls autoplay loop playsinline muted></video>
            </div>
        </div>
    </div>


    <section class="site-section" id="price-calc-section">
        <div class="container">
            <div class="row p-6 bg-white">
                @guest
                    <h3 class="col-12 m-0">Для подсчета суммы бронирования <a href="{{ route('showLogin') }}">войдите</a> в аккаунт (или <a href="{{ route('showRegister') }}">зарегистрируйтесь</a>)</h3>
                @else
                    <h5 class="col-12 heading-39291 mb-1">Калькулятор бронирования</h5>
                    <h6 class="col-12 mb-5 text-muted">Для бронирования, заполните все поля</h6>
                    <form class="col-12" action="{{ route('booking') }}" method="post" id="calculator-form">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <label for="service_id">Услуга</label>
                                <select name="service_id" id="service_id" class="form-control border @error('service_id') is-invalid @enderror">
                                    @foreach ($services as $s)
                                        <option value="{{ $s->id }}">{{ $s->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="date">Выберите дату</label>
                                <input type="date" name="date" id="date"
                                    class="form-control border @error('date') is-invalid @enderror" placeholder="Пароль">
                                <div class="invalid-feedback text-bold" id="date-invalid-feedback">
                                    @error('date')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row d-none" id="total-wrapper">
                            <div class="col-12 col-md-6">
                                <label for="total" id="total-label">Всего:</label>
                                <input type="text" id="total" name="total" class="form-control" hidden>
                            </div>
                            <div class="col-12 col-md-6 text-primary" id="weekend-info"></div>
                        </div>

                        <button type="submit" id="book-btn" class="btn btn-primary text-white py-3 px-5 rounded-0 d-none">Забронировать</button>
                    </form>
                @endguest
            </div>
        </div>
    </section>


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





        const services = {
            @foreach ($services as $s)
                {{ $s->id }}: { 'title': '{{ $s->title }}', 'price_per_hour': {{ $s->price_per_hour }} },
            @endforeach
        };

        const serviceInput = $('#service_id');
        const dateInput = $('#date');
        const totalInput = $('#total');
        const totalWrapper = $('#total-wrapper');
        const bookBtn = $('#book-btn');
        const weekendInfo = $('#weekend-info');
        const totalLabel = $('#total-label');
        const dateInvalidFeedback = $('#date-invalid-feedback');

        let date = null, service_id = serviceInput.val(), total = 0, isWeekend = false;

        function setDateError(message) {
            dateInvalidFeedback.text(message);
            dateInput.addClass('is-invalid')
        }

        function clearDateError() {
            dateInvalidFeedback.text('');
            dateInput.removeClass('is-invalid')
        }

        function isFormInputErrors() {
            return !date || isNaN(date) || !service_id || date <= new Date();
        }

        function updateCalc() {
            weekendInfo.text(isWeekend ? 'В пятницу и субботу, стоимость услуг на 10% дороже' : '');
            if (isFormInputErrors()) {
                if (isNaN(date)) setDateError('Введите корректную дату');
                else if (date <= new Date()) setDateError('На эту дату нельзя заказать бронирование');
                else clearDateError();

                totalWrapper.addClass('d-none');
                bookBtn.addClass('d-none');
                total = 0
            } else {
                clearDateError();
                totalWrapper.removeClass('d-none');
                bookBtn.removeClass('d-none');
                total = Math.floor(services[service_id].price_per_hour * (isWeekend ? 1.1 : 1));
                totalLabel.text(`Всего: ${total} рублей`)
            }

            totalInput.val(total);
        }

        serviceInput.on('input', function () {
            service_id = serviceInput.val();
            updateCalc();
        })

        dateInput.on('change', function () {
            date = new Date(dateInput.val());
            isWeekend = date ? [5, 6].includes(date.getDay()) : false;
            updateCalc();
        })
    </script>
@endsection
