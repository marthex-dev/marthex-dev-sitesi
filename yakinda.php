<?php
include 'inc/head.php'; // Head kısmı

?>

<body>
    <div class=preloader>
        <div class="spinner-border text-primary" role=status><span class=sr-only>Loading...</span></div>
    </div>

    <section class="vh-100 d-flex align-items-center bg-gradient-dark">
        <div class="container py-md-8 position-relative zindex-100">
            <div class="col px-0">
                <div class="row justify-content-center">
                    <div class="col-lg-7 text-center">
                        <h6 class="my-4 text-white font-weight-light ls-2">Yakında bu sayfa hizmetinize sunulacaktır.</h6><img
                            alt="Image placeholder" src=new/logo.webp class="w-75 mb-5">
                        <p class="px-md-5 text-white mb-5">marthex.dev web tasarımcılara ve geliştiricilere en iyi geliştirme deneyimini sunmaya çalışır.</p>
                        <div class="countdown countdown-hero countdown-hero-dark" data-countdown-date=12/12/2020></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <script src=assets/libs/jquery/dist/jquery.min.js></script>
    <script src=assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js></script>
    <script src=assets/libs/svg-injector/dist/svg-injector.min.js></script>
    <script src=assets/libs/feather-icons/dist/feather.min.js></script>
    <script src=assets/libs/in-view/dist/in-view.min.js></script>
    <script src=assets/libs/sticky-kit/dist/sticky-kit.min.js></script>
    <script src=assets/libs/imagesloaded/imagesloaded.pkgd.min.js></script>
    <script src=assets/libs/jquery-countdown/dist/jquery.countdown.min.js></script>
    <script src=assets/js/quick-website.js></script>
    <script>feather.replace({ width: "1em", height: "1em" })</script>
    </body>

</html>