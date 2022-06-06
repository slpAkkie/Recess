@extends('tpl.main')

@section('body')
    <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1 video-header-00000">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="box-92819">
                            <h1 class="text-uppercase text-black mb-3 heading-font">О нас</h1>
                            <p class="mb-0 text-black">Наша история развития в сфере съемки </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ftco-cover-1 video-header-item-00000 bnr-video-wrapper">
                <video class="bnr-video" src="{{ asset('videos/about-1.mp4') }}" no-controls autoplay loop playsinline
                    muted></video>
            </div>
        </div>
    </div>


    <x-sections.greeting />


    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="heading-39291">История нашей команды</h2>
                    <p class="mb-5">Развиваясь, я стал искать союзников. Со временем стало сложнее со всем
                        справляться одному, ведь объем
                        работ увеличивался.</p>
                    <p>В одном из заведений, в котором я работал, мне попался Александр. Он занимался фотографией и также
                        горел
                        делом.</p>
                    <p>Мы сработались, но дел меньше не стало. Нужно было найти монтажера.</p>
                    <p>Я обучался в Нижегородском колледже и в потоке со мной учился Иван. Он часто ходил на мероприятия и
                        был
                        помощником ведущего, а также монтировал видео для колледжа. Я предложил ему смонтировать один из
                        проектов, и увидел в нем потенциал</p>
                    <p>
                        Вот так мы и собрались, и в настоящее время помогаем каждому запечатлеть что-то важное.
                    </p>
                </div>

                <div class="col-md-6 ml-auto">
                    <img src="images/about-us.jpg" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5 section-2-title">
                <div class="col-md-6">
                    <h2 class="heading-39291">Наша команда</h2>
                    <p>Специалисты, работающие над вашими проекта</p>
                </div>
            </div>
            <div class="row align-items-stretch">

                @foreach ($stuff as $s)
                    <x-About.stuff :stuff="$s" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
