@extends('tpl.main')

@section('body')
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-7">
                    <h2 class="heading-39291 mb-0">Все услуги</h2>
                </div>
                <div class="col-md-5 d-md-flex mt-3 mt-md-0 justify-content-end">
                    <a href="{{ route('admin.services.create') }}" class="btn btn-primary text-white py-2 px-3 rounded-0">Добавить</a>
                </div>
            </div>
            <div class="row">
                @foreach($services as $s)
                    <x-Welcome.service :service="$s" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
