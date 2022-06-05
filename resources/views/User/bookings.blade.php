@extends('tpl.main')

@section('body')
    <section class="site-section">
        <div class="container">
            <div class="row">
                <h2 class="heading-39291 col-12">Ваши бронирования</h2>

                <div class="col-12 bg-white p-6">
                    @if($bookings->count())
                        @foreach ($bookings as $b)
                            <x-User.booking :booking="$b" />
                        @endforeach
                    @else
                        <h6 class="m-0">У вас еще нет бронирований</h6>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
