@extends('tpl.main')

@section('body')
    <section class="site-section">
        <div class="container">
            @auth()
                @if (Auth::user()->is_admin)
                    <div class="row mb-3">
                        <div class="col">
                            <a href="{{ route('admin.stuff.index') }}"
                                class="btn btn-primary py-2 px-3 mr-2 rounded-0">Все сотрудники</a>
                        </div>
                    </div>
                @endif
            @endauth

            <div class="row">
                <h2 class="heading-39291 col-12">{{ $stuff->full_name }} <span class="text-muted">({{ $stuff->position }})</span></h2>

                <div class="col bg-white p-6">
                    <div class="row">
                        <div class="col mb-4 mb-md-0">
                            @if($stuff->avatar_path)
                                <img class="img-fluid" src="{{ asset($stuff->avatar_path) }}" alt="{{ $stuff->full_name }}">
                                @auth()
                                    @if (Auth::user()->is_admin)
                                        <form action="{{ route('admin.stuff.delete-avatar', $stuff->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-primary d-block py-2 px-3 mt-1 rounded-0 w-100">Удалить фото</button>
                                        </form>
                                    @endif
                                @endauth
                            @else
                                <div class="stuff-preview-bg"></div>
                            @endif
                        </div>
                        <div class="col-12 col-md-8 d-flex flex-column align-items-start">
                            <div class="flex-grow-1">
                                <p>{{ $stuff->description }}</p>
                            </div>

                            @auth
                                @if (Auth::user()->is_admin)
                                    <div class="d-flex mt-1">
                                        <a href="{{ route('admin.stuff.edit', $stuff->id) }}" class="btn btn-light py-2 px-3 mr-2 rounded-0">Редактировать</a>
                                        <form action="{{ route('admin.stuff.delete', $stuff->id) }}" method="post">
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
