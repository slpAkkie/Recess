@extends('tpl.main')

@section('body')
    <section class="site-section">
        <div class="container">
            <div class="row">
                <h2 class="heading-39291 col-12">{{ $work->title }} <span class="text-muted">({{ $work->type->title }})</span></h2>
            </div>
        </div>
    </section>
@endsection
