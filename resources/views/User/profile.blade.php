@extends('tpl.main')

@section('body')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <h2 class="heading-39291 col-12">Ваш профиль</h2>

                <div class="col-12 p-6 bg-white">
                    <div class="mb-2"><span class="text-bold">Имя:</span> {{ $user->full_name }}</div>
                    <div class="mb-2"><span class="text-bold">Логин:</span> {{ $user->login }}</div>
                    <div class="mb-2"><span class="text-bold">Email:</span> {{ $user->email }}</div>
                    <div><span class="text-bold">Номер телефона:</span> {{ $user->phone }}</div>
                    <div>
                        <a href="{{ route('profile.editProfile') }}"
                            class="btn btn-secondary py-2 px-3 mt-3 rounded-0">Изменить данные</a>
                        <a href="{{ route('profile.bookings') }}"
                            class="btn btn-primary text-white py-2 px-3 mt-3 rounded-0">Мои бронирования</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @includeWhen(Auth::user()->is_admin, 'Admin.components.profileSection')
@endsection
