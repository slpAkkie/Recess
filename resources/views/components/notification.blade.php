<div class="popup-alerts"></div>

<script>
    @if (Session::has('success'))

        let alert = $(`<div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>`).appendTo('.popup-alerts');

        setTimeout(() => {
            alert.fadeOut()
            setTimeout(() => {
                alert.remove()
            }, 400)
        }, 2500);

        @php

            Session::forget('success');

        @endphp
    @endif


    @if (Session::has('info'))

        let alert = $(`<div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ Session::get('info') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>`).appendTo('.popup-alerts');

        setTimeout(() => {
            alert.fadeOut()
            setTimeout(() => {
                alert.remove()
            }, 400)
        }, 1000);

        @php

            Session::forget('info');

        @endphp
    @endif


    @if (Session::has('warning'))

        let alert = $(`<div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ Session::get('warning') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>`).appendTo('.popup-alerts');

        setTimeout(() => {
            alert.fadeOut()
            setTimeout(() => {
                alert.remove()
            }, 400)
        }, 1000);

        @php

            Session::forget('warning');

        @endphp
    @endif


    @if (Session::has('error'))

        let alert = $(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>`).appendTo('.popup-alerts');

        setTimeout(() => {
            alert.fadeOut()
            setTimeout(() => {
                alert.remove()
            }, 400)
        }, 1000);

        @php

            Session::forget('error');

        @endphp
    @endif
</script>
