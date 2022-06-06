<div class="col-md-6 mb-4 col-lg-3" data-aos="fade-up" data-aos-delay="">
    <div class="service-29193 text-center">
        <span class="img-wrap mb-5">
            <img src="{{ asset($service->image_path) }}" alt="{{ $service->title }}" class="img-fluid">
        </span>
        <h3 class="mb-2"><a href="{{ route('services.show', $service) }}">{{ $service->title }}</a></h3>
        <h6 class="mb-4 text-muted">{{ $service->type->title }}</h6>
        <h6 class="mb-4 text-muted text-thin">{{ $service->price_per_hour }}₽ / Час</h6>
        <p>{{ $service->description }}</p>
    </div>
</div>
