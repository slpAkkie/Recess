@extends('tpl.main')

@section('body')
    <section class="site-section">
        <div class="container">
            <div class="row">
                <h2 class="heading-39291 col-12 mb-1">{{ $work->title }} <span
                        class="text-muted">({{ $work->type->title }})</span></h2>
                <h6 class="col-12 mb-4">{{ $work->country }}, {{ $work->city }}</h6>

                <div class="col bg-white p-6">
                    <div class="row">
                        <div class="col d-flex flex-column align-items-start">
                            <div class="d-flex mt-1">
                                <a href="{{ route('admin.works.edit', $work->id) }}"
                                    class="btn btn-light py-2 px-3 mr-2 rounded-0">Редактировать</a>
                                <form action="{{ route('admin.works.delete', $work->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="btn btn-primary text-white py-2 px-3 rounded-0">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <x-Works.row :work="$work" withoutHeading />
                </div>
            </div>
        </div>
    </section>
@endsection
