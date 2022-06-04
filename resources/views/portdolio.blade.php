@extends('tpl.main')

@section('body')
    <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1" style="background-image: url('images/hero_1.jpg');">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="box-92819">
                            <h1 class="text-uppercase text-black mb-3">Наши услуги</h1>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus
                                harum, error minima?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-7">
                    <h2 class="heading-39291 mb-0">Что мы делаем</h2>
                </div>
            </div>
            <div class="row">
                <x-Portfolio.work />
            </div>
        </div>
    </div>

    <x-sections.tips />
@endsection
