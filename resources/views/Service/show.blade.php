@extends('tpl.main')

@section('body')
    <section class="site-section">
        <div class="container">
            <div class="row">
                <h2 class="heading-39291 col-12">{{ $service->title }} <span class="text-muted">({{ $service->type->title }})</span></h2>

                <div class="col bg-white p-6">
                    <div class="row">
                        <div class="col mb-4 mb-md-0">
                            <img class="img-fluid" src="{{ asset($service->image_path) }}" alt="{{ $service->title }}">
                            <a href="{{ route('book', $service) }}" class="btn btn-primary d-block py-2 px-3 mt-1 rounded-0">Забронировать</a>
                        </div>
                        <div class="col-12 col-md-8 d-flex flex-column align-items-start">
                            <div class="flex-grow-1">
                                <p>{{ $service->description }}</p>
                                <p>
                                    <span class="text-bold">Цена: </span> {{ $service->price_per_hour }} в час
                                </p>
                            </div>

                            @auth
                                @if (Auth::user()->is_admin)
                                    <div class="d-flex mt-1">
                                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-light py-2 px-3 mr-2 rounded-0">Редактировать</a>
                                        <form action="{{ route('admin.services.delete', $service) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-primary text-white py-2 px-3 rounded-0">Удалить</button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
