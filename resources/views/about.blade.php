@extends('tpl.main')

@section('body')
    <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1 video-header-00000">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="box-92819">
                            <h1 class="text-uppercase text-black mb-3">О нас</h1>
                            <p class="mb-0 text-black">Наша история развития в сфере съемки </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ftco-cover-1 video-header-item-00000 bnr-video-wrapper">
                <video class="bnr-video" src="{{ asset('videos/about-1.mp4') }}" preload="auto" no-controls autoplay loop playsinline muted></video>
            </div>
        </div>
    </div>


    <x-sections.greeting />


    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="heading-39291">История нашей команды</h2>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, consequuntur,
                        harum? Culpa, iure vel fugiat veritatis obcaecati architecto.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aut at quisquam, perferendis dolores
                        fuga nulla ratione eveniet ipsam, blanditiis repellendus porro. Voluptatem tempore ratione ut ipsa
                        et deleniti!</p>
                    <p>Veniam officiis ad doloribus nostrum, id, excepturi. Quam aliquam, explicabo non dolorem eveniet
                        similique! Veritatis necessitatibus ipsa eligendi distinctio suscipit magnam quos itaque, numquam
                        sequi. Ipsa eveniet consectetur deleniti.</p>
                    <p>Enim laudantium, perferendis distinctio! Natus ex, ad quisquam nemo inventore, saepe eveniet
                        temporibus debitis magni ea. Corporis illo necessitatibus, error laboriosam voluptatum nostrum id at
                        adipisci repellendus, quod explicabo?</p>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis provident eius ratione velit,
                        voluptas laborum nemo quas ad necessitatibus placeat?</p>
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
