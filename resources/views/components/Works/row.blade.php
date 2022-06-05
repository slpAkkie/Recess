<div class="col-12 work-00000">
    <h3 class="heading-center">{{ $work->type->title }} <span class="text-semi-bold">{{ $work->title }}</span></h3>
    <h6 class="heading-center">{{ $work->country }}, {{ $work->city }}</h6>

    <div class="row bg-white mt-5 px-lg-6 px-0 pt-lg-5 pt-0 pb-1">
        <video src="{{ asset("{$work->getVideo()->path}") }}" controls prelodad autoplay muted loop class="work-video-00000"></video>
    </div>
    <div class="row bg-white p-6 justify-content-center gap-1">
        @foreach ($work->getPhotos() as $p)
            <img src="{{ asset($p->path) }}" class="img-fluid work-img-00000" width="200px" height="300px" alt="Photo">
        @endforeach
    </div>
</div>
