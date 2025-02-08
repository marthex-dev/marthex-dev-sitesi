<?php $sayfa = "Kayıt Ol";
include 'inc/head.php'; ?>

<body>
    <section class="section-half-rounded bg-cover bg-size--cover py-4 py-sm-0"
        style=background-image:url(../assets/img/backgrounds/img-3.jpg)>
        <div class="container-fluid d-flex flex-column">
            <div class="row align-items-center min-vh-100">
                <div class="col-md-6 col-lg-5 col-xl-4 mx-auto">
                    <div class="card shadow-lg border-0 mb-0">
                        <div class="card-body py-5 px-sm-5">
                            <div>
                                <div class="mb-5 text-center">
                                    <h6 class="h3 mb-1">Şifreyi Yenile</h6>
                                    <p class="text-muted mb-0">Size şifrenizi sıfırlamanızı sağlayacak bir e-posta
                                        göndereceğiz.</p>
                                </div><span class=clearfix></span>
                                <form>
                                    <div class=form-group><label class=form-control-label>E-posta:</label>
                                        <div class="input-group input-group-merge"><input type=email
                                                class="form-control form-control-prepend" id=input-email
                                                placeholder=name@mail.com>
                                            <div class=input-group-prepend><span class=input-group-text><i
                                                        data-feather=at-sign></i></span></div>
                                        </div>
                                    </div>
                                    <div class=mt-4><button type="button"
                                            class="btn btn-block btn-youtube btn-icon-label">
                                            <span class="btn-inner--icon">
                                                <i data-feather=mail></i>
                                            </span>
                                            <span class="btn-inner--text">Sıfırla</span>
                                        </button></div>
                                </form>
                                <div class="mt-4 text-center"><small>E-posta hesabınıza gelmedi ise lütfen Discord veya
                                        E-posta üzerinden yetkili biriyle iletişime geçiniz.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include 'inc/foot.php'; ?>