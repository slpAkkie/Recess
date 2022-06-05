@extends('tpl.main')

@section('body')
    <section class="site-section">
        <div class="container">
            <div class="row">
                <h2 class="heading-39291 col-12">Все бронирования (не выполненные)</h2>

                <div class="col-12 bg-white p-6">
                    @if($bookings->count())
                        @foreach ($bookings as $b)
                            <x-User.booking :booking="$b" admin />
                        @endforeach
                    @else
                        <h6 class="m-0">Нет бронирований</h6>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
