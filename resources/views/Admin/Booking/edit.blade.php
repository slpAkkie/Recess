@extends('tpl.main')

@section('body')
    <section class="site-section">
        <div class="container">
            <div class="row">
                <h2 class="heading-39291 col-12">Изменить бронирование</h2>

                <div class="col-12 bg-white p-6">
                    <div class="d-flex gap-3 align-items-center"><h4 class="m-0">{{ $booking->service->title }}</h4> <h6 class="text-muted m-0">({{ $booking->service->type->title }})</h6></div>
                    <div>
                        <div>Цена: {{ $booking->total }}</div>
                        <div>Дата: {{ Illuminate\Support\Carbon::parse($booking->date)->format('d.m.Y') }}</div>
                        <div>Статус: {{ $booking->status->title }}</div>

                        @isset($admin)
                            <div>Пользователь: {{ $booking->user->full_name }}</div>
                            <div>Электронная почта: {{ $booking->user->email }}</div>
                            <div>Номер телефона: {{ $booking->user->phone }}</div>
                        @endisset

                        <div class="d-flex gap-3 mt-3">
                            @if($booking->status_id === 1)
                                <form action="{{ route('admin.bookings.resolve', $booking) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success text-white rounded-0">Подтвердить</button>
                                </form>
                                <form action="{{ route('admin.bookings.reject', $booking) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary text-white rounded-0">Отказать</button>
                                </form>
                            @endif
                            @if($booking->status_id === 2)
                                <form action="{{ route('admin.bookings.close', $booking) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary text-white rounded-0">Выполнено</button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <form class="mt-5" action="{{ route('admin.bookings.update', $booking) }}" method="post" id="edit-booking-form">
                        @csrf
                        <h5>Изменить дату бронирования</h5>
                        <div class="form-group row">
                            <div class="col-12 col-md-6">
                                <label for="date">Выберите дату</label>
                                <input type="date" name="date" id="date"
                                    class="form-control border @error('date') is-invalid @enderror" placeholder="Пароль" value="{{ $booking->date }}">
                                <div class="invalid-feedback text-bold" id="date-invalid-feedback">
                                    @error('date')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="book-btn" class="btn btn-primary text-white py-3 px-5 rounded-0">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
