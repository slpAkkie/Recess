<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-7">
                        <h2 class="footer-heading mb-4">О нас</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. </p>

                    </div>
                    <div class="col-md-4 ml-auto">
                        <h2 class="footer-heading mb-4">Дополнительно</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('about') }}">О нас</a></li>
                            <li><a href="#">Правила пользования</a></li>
                            <li><a href="#">Политика конфиденциальности</a></li>
                            <li><a href="{{ route('contacts') }}">Свяжитесь с нами</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-4 ml-auto">

                <div class="mb-5">
                    <h2 class="footer-heading mb-4">Мы Вам напишем!</h2>
                    <form action="{{ route('callback') }}" method="post" class="footer-suscribe-form">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control rounded-0 border-secondary text-white bg-transparent @error('email') is-invalid @enderror"
                                placeholder="Адрес электронной почты" aria-label="Адрес электронной почты" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary text-white" type="submit"
                                    id="button-addon2">Отправить</button>
                            </div>
                            <div class="invalid-feedback text-bold">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                </div>


                <h2 class="footer-heading mb-4">Социальные сети:</h2>
                <a href="https://vk.com/recesss" target="_blank" class="pr-3"><span class="icon-vk"></span></a>
                </form>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <div class="pt-5">
                    <p class="small">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>

</div>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.sticky.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/resumable.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>

<x-notification />

</body>

</html>
