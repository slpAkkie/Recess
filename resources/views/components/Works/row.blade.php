<div class="col-12 work-00000">
    @if (!isset($withoutHeading))
        <h3 class="heading-center">{{ $work->type->title }} <span class="text-semi-bold">{{ $work->title }}</span></h3>
        <h6 class="heading-center">{{ $work->country }}, {{ $work->city }}</h6>

        @auth
            @if(Auth::user()->is_admin)
                <div class="col-12 d-md-flex mt-3 justify-content-center">
                    <a href="{{ route('admin.works.show', $work->id) }}" class="btn btn-primary text-white py-2 px-3 rounded-0">Открыть</a>
                </div>
            @endif
        @endauth
    @endif

    <div class="row bg-white mt-5 px-lg-6 px-0 pt-lg-5 pt-0 @if($work->getPhotos()->count()) pb-1 @else pb-5 @endif">
        @if ($work->getVideo())
            <video src="{{ asset("{$work->getVideo()->path}") }}" controls prelodad autoplay muted loop class="col-12 work-video-00000"></video>
        @else
            <p class="col-12 text-center m-0">Видео отсутствует</p>
        @endif
    </div>
    @if ($work->getPhotos()->count())
        <div class="row bg-white p-6 justify-content-center gap-1">
            @foreach ($work->getPhotos() as $p)
                <img src="{{ asset($p->path) }}" class="img-fluid work-img-00000" width="200px" height="300px" alt="Photo">
            @endforeach
        </div>
    @endif
</div>
