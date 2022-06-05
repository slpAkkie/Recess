<div class="col-lg-4 col-md-6 mb-5">
    <div class="post-entry-1 h-100 bg-white text-center">
        <a href="{{ route('stuff.show', $stuff->id) }}" class="d-inline-block">
            @if ($stuff->avatar_path)
                <img src="{{ asset($stuff->avatar_path) }}" alt="Image" width="260px" height="260px" class="img-fluid stuff-image-00000">
            @else
                <div class="stuff-card-preview-bg"></div>
            @endif
        </a>
        <div class="post-entry-1-contents">
            <span class="meta">{{ $stuff->position }}</span>
            <h2>{{ $stuff->full_name }}</h2>
            <p>{{ $stuff->description }}</p>
        </div>
    </div>
</div>
