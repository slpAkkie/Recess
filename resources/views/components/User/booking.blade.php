<div class="row py-4">
    <div class="col-12 col-md-8">
        <h4 class="m-0">{{ $booking->service->title }} <span class="h6 text-bold text-muted m-0">({{ $booking->service->type->title }})</span></h4>
        <div>
            <div><span class="text-semi-bold">Цена:</span> {{ $booking->total }}</div>
            <div><span class="text-semi-bold">Дата:</span> {{ Illuminate\Support\Carbon::parse($booking->date)->format('d.m.Y') }}</div>
            <div><span class="text-semi-bold">Статус:</span> {{ $booking->status->title }}</div>
            <div><span class="text-semi-bold">Длительность:</span> {{ $booking->duration }} часов</div>

            @isset($admin)
                <div><span class="text-semi-bold">Пользователь:</span> {{ $booking->user->full_name }}</div>
                <div><span class="text-semi-bold">Электронная почта:</span> {{ $booking->user->email }}</div>
                <div><span class="text-semi-bold">Номер телефона:</span> {{ $booking->user->phone }}</div>
            @endisset
        </div>
    </div>
    <div class="col-12 col-lg-2 offset-lg-2 mt-3 mt-lg-0 d-flex flex-column justify-content-start align-items-md-end align-items-stretch gap-2">
        @isset($admin)
            @if($booking->status_id === 1)
                <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-info w-100 text-white rounded-0">Изменить</a>
                <form action="{{ route('admin.bookings.resolve', $booking) }}" method="post" class="w-100">
                    @csrf
                    <button type="submit" class="btn btn-success w-100 text-white rounded-0">Подтвердить</button>
                </form>
                <form action="{{ route('admin.bookings.reject', $booking) }}" method="post" class="w-100">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100 text-white rounded-0">Отказать</button>
                </form>
            @endif
            @if($booking->status_id === 2)
                <form action="{{ route('admin.bookings.close', $booking) }}" method="post" class="w-100">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100 text-white rounded-0">Выполнено</button>
                </form>
            @endif
        @elseif($booking->status_id < 3)
            <form action="{{ route('profile.cancelBooking', $booking) }}" method="post" class="w-100">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-primary w-100 text-white py-2 px-3 rounded-0">Отменить</button>
            </form>
        @endisset
    </div>
</div>
