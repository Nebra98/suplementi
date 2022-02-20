<footer style="background-color: #BA0C2F; position: fixed;
left: 0;bottom: 0;
width: 100%;

text-align: center;" class="footer text-white text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 align="left"> <a style="color: #fff;" class="text-decoration-none"
                        href="{{ route(__('messages.routeForLiabilityDisclaimer')) }}">{{ __('messages.liabilityDisclaimer') }}</a> </h5>

                <p align="justify">
                    {{ __('messages.contactMessage') }}
                </p>
            </div>

            <!--Grid column-->
            <div class="col-lg-5 col-md-6 mb-4 mb-md-0">

                <a href="http://poliklinika-analiza.hr" target="_blank">
                    <img src="{{ URL('/img/cropped-analiza-logo_1.png') }}" alt="Poliklinika Analiza logo"
                        width="30%" />
                </a>
                <p class="mt-2">
                    Poliklinika Analiza. {{ __('messages.copyright') }}
                </p>

            </div>
            <!--Grid column-->
        </div>

        <!--Grid row-->
    </div>
    <!-- Grid container -->

</footer>