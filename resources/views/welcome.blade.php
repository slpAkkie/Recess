@extends('tpl.main')

@section('body')
    <div class="owl-carousel-wrapper">

        <div class="box-92819">
            <div class="owl-carousel slide-one-item-alt-text">

                <div>
                    <h1 class="text-uppercase mb-3 text-break">Хотите сохранить в памяти определенный отрезок жизни?</h1>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus harum,
                        error minima?</p>
                    <p class="mb-0"><a href="{{ route('bookingCalculator') }}" class="btn btn-primary rounded-0">Перейти к бронированию</a></p>
                </div>

                <div>
                    <h1 class="text-uppercase mb-3 text-break">Снимите с нами самый важный момент!</h1>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto deleniti
                        similique, nesciunt.</p>
                    <p class="mb-0"><a href="{{ route('bookingCalculator') }}" class="btn btn-primary rounded-0">Перейти к бронированию</a></p>
                </div>

                <div>
                    <h1 class="text-uppercase mb-3 text-break">Дайте волю эмоциям!</h1>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, autem odit
                        quae!</p>
                    <p class="mb-0"><a href="{{ route('bookingCalculator') }}" class="btn btn-primary rounded-0">Перейти к бронированию</a></p>
                </div>

            </div>
        </div>



        <div class="owl-carousel owl-1">
            <div class="ftco-cover-1 bnr-video-wrapper">
                <video class="bnr-video" src="{{ asset('videos/carousel-1.mp4') }}" preload="auto" no-controls autoplay loop playsinline muted></video>
            </div>
            <div class="ftco-cover-1 bnr-video-wrapper">
                <video class="bnr-video" src="{{ asset('videos/carousel-2.mp4') }}" preload="auto" no-controls autoplay loop playsinline muted></video>
            </div>
            <div class="ftco-cover-1 bnr-video-wrapper">
                <video class="bnr-video" src="{{ asset('videos/carousel-3.mp4') }}" preload="auto" no-controls autoplay loop playsinline muted></video>
            </div>
        </div>
    </div>


    <x-sections.greeting />


    <div class="site-section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-7">
                    <h2 class="heading-39291 mb-0">Наши услуги</h2>
                </div>
            </div>
            <div class="row">
                @foreach($services as $s)
                    <x-Welcome.service :service="$s" />
                @endforeach
            </div>
        </div>
    </div>

    <x-sections.tips heading />
@endsection
