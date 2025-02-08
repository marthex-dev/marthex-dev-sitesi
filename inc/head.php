<?php
include 'user/db.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="tr">


<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marthex - <?php echo $sayfa ?></title>
    <meta name="description" content="Marthex - bir web geliştirme, discord.js ve diğer şeylerde paylaşım yapan bir platformdur. Marthex, web tasarımcılara ve geliştiricilere en iyi geliştirme deneyimini sunmaya çalışır.">
    <meta name="author" content="Marthex">
    <meta name="robots" content="index, follow"> <!-- Sayfanın dizine eklenmesini ve takip edilmesini sağlar -->
    <meta name="keywords" content="web geliştirme, discord.js, platform, marthex"> <!-- Anahtar kelimeler -->
    <meta name="og:title" property="og:title" content="Marthex - <?php echo $sayfa ?>"> <!-- Open Graph başlık -->
    <meta name="og:description" property="og:description" content="Marthex - bir web geliştirme, discord.js ve diğer şeylerde paylaşım yapan bir platformdur."> <!-- Open Graph açıklama -->
    <meta name="og:image" property="og:image" content="https://marthex.dev/new/logo-foot.webp"> <!-- Open Graph görüntü -->
    <meta name="og:url" property="og:url" content="https://marthex.dev/"> <!-- Open Graph URL -->
    <meta name="twitter:card" content="summary_large_image"> <!-- Twitter kart türü -->
    <meta name="twitter:title" content="Marthex - <?php echo $sayfa ?>"> <!-- Twitter başlık -->
    <meta name="twitter:description" content="Marthex - bir web geliştirme, discord.js ve diğer şeylerde paylaşım yapan bir platformdur. Marthex, web tasarımcılara ve geliştiricilere en iyi geliştirme deneyimini sunmaya çalışır."> <!-- Twitter açıklama -->
    <meta name="twitter:image" content="https://marthex.dev/new/logo-foot.webp"> <!-- Twitter görüntü -->
    <meta name="publisher" content="Marthex">

    

    <title>
        Marthex - <?php echo $sayfa ?>
    </title>
    <style>
        @keyframes hidePreloader {
            0% {
                width: 100%;
                height: 100%
            }

            100% {
                width: 0;
                height: 0
            }
        }

        body>div.preloader {
            position: fixed;
            background: #fff;
            width: 100%;
            height: 100%;
            z-index: 1071;
            opacity: 0;
            transition: opacity .5s ease;
            overflow: hidden;
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center
        }

        body:not(.loaded)>div.preloader {
            opacity: 1
        }

        body:not(.loaded) {
            overflow: hidden
        }

        body.loaded>div.preloader {
            animation: hidePreloader .5s linear .5s forwards
        }
    </style>
    <script>window.addEventListener("load", function () { setTimeout(function () { document.querySelector("body").classList.add("loaded") }, 300) })</script>
    <link rel="icon" href="new/icon.webp" type="image/png">
    <link rel="stylesheet" href="assets/libs/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/css/quick-website.css">
    <link rel="stylesheet" href="assets/libs/animate.css/animate.min.css">
    <link rel=stylesheet href=assets/css/docs.css>
</head>

<body>
    <div class=preloader>
        <div class="spinner-border text-primary" role=status><span class=sr-only>Loading...</span></div>
    </div>
    <header class=header-transparent id=header-main>
        <nav class="navbar navbar-main navbar-expand-lg navbar-dark bg-dark" id=navbar-main>
            <div class=container><a class=navbar-brand href=index.php><img alt="Marthex.dev Logo" src=new/logo.webp
                        id=navbar-logo><sup class="text-muted text-xs text-uppercase">.dev</sup> </a><button
                    class=navbar-toggler type=button data-toggle=collapse data-target=#navbar-main-collapse
                    aria-controls=navbar-main-collapse aria-expanded=false aria-label="Toggle navigation"><span
                        class=navbar-toggler-icon></span></button>
                <div class="collapse navbar-collapse navbar-collapse-overlay" id=navbar-main-collapse>
                    <div class=position-relative><button class=navbar-toggler type=button data-toggle=collapse
                            data-target=#navbar-main-collapse aria-controls=navbar-main-collapse aria-expanded=false
                            aria-label="Toggle navigation"><i data-feather=x></i></button></div>
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item nav-item-spaced  d-lg-block"><a class=nav-link href=web-tasarim.php><i
                                    data-feather="layout"></i> İnternet Sitesi</a></li>
                        <li class="nav-item nav-item-spaced dropdown dropdown-animate" data-toggle="hover"><a
                                class="nav-link data-toggle=dropdown" href="#" aria-haspopup="true"
                                aria-expanded="false"><i data-feather="terminal"></i>Discord.JS</a>
                            <div class="dropdown-menu dropdown-menu-xl p-0">
                                <div class="row no-gutters">
                                    <div class="col-12 col-lg-6 order-lg-2">
                                        <div class="dropdown-body dropdown-body-right bg-dropdown-secondary h-100">
                                            <h6 class="dropdown-header">Bot Hizmeti</h6>
                                            <div class="list-group list-group-flush">
                                                <div class="list-group-item border-0">
                                                    <div class="media d-flex align-items-center">
                                                        <figure style="width:40px"><img alt="Discord Bot Kirala, Discord Bot satın al, discord bot developer" src="new/4.png"
                                                                class="img-fluid" style="width:40px"></figure>
                                                        <div class="media-body ml-3"><a href="discord-bot.php"
                                                                class="d-block h6 mb-0">Discord Botlar</a> <small
                                                                class="text-sm text-muted mb-0">Hazır discord botları
                                                                alarak direkt sunucuna davet et!</small></div>
                                                    </div>
                                                </div>
                                                <div class="list-group-item border-0">
                                                    <div class="media d-flex align-items-center">
                                                        <figure style="width:40px"><img alt="discord bot ekle, discord bot barındır, discord bot vds, discord bot yapma sitesi"
                                                                src="new/discord-plus.png" class="img-fluid"
                                                                style="width:40px"></figure>
                                                        <div class="media-body ml-3"><a href="yakinda.php"
                                                                class="d-block h6 mb-0">Bot Barındırma</a> <small
                                                                class="text-sm text-muted mb-0">Kendine ait bir bot
                                                                varsa en ucuz şekilde discord botunu barındır!</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 order-lg-1 mt-4 mt-lg-0">
                                        <div class="dropdown-body">
                                            <h6 class="dropdown-header">Discord Kodlar</h6>
                                            <div class="list-group list-group-flush">
                                                <div class="list-group-item border-0">
                                                    <div class="media d-flex">
                                                        <figure style="width:40px"><img alt="template discord bot, discord bot maker, discord bot, discord bot list, discord bot developer " src="new/6.png"
                                                                class="img-fluid" style="height:40px"></figure>
                                                        <div class="media-body ml-3"><a href="#"
                                                                class="d-block h6 mb-0">Bot Altyapı</a> <small
                                                                class="text-sm text-muted mb-0">Hazır discord bot
                                                                altyapılarını indir sana en uygununu kullan!</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-group-item border-0">
                                                    <div class="media d-flex">
                                                        <figure style="width:40px"><img alt="discord bot komutları, discord bot, dc bot kod, dc bot satın al, guard bot, kayıt botu" src="new/5.png"
                                                                class="img-fluid" style="height:40px"></figure>
                                                        <div class="media-body ml-3"><a href="#"
                                                                class="d-block h6 mb-0">Bot Kodlar</a> <small
                                                                class="text-sm text-muted mb-0">Aradığın discord.JS
                                                                kodlarını kullan, botunu daha iyi hale getir!</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </li>
                        <li class="nav-item nav-item-spaced  d-lg-block"><a class=nav-link href=kutuphane.php><i
                                    data-feather="file-text"></i> Kütüphane</a></li>
                        <li class="nav-item nav-item-spaced  d-lg-block"><a class=nav-link href=#><i
                                    data-feather="thumbs-up"></i> Partnerlerimiz</a></li>
                        <li class="nav-item nav-item-spaced  d-lg-block"><a class=nav-link href=#><i
                                    data-feather="smile"></i> İletişim</a></li>
                    </ul>
                    <?php if (isset($_SESSION['username'])) { ?>
    <ul class="navbar-nav align-items-lg-center d-none d-lg-flex ml-lg-auto">
        <li class="nav-item dropdown dropdown-animate"><a class="nav-link nav-link-icon px-2" href="#"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                    data-feather="settings"></i></a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow p-3">
                <h6 class="dropdown-header px-0 mb-2 text-primary">
                    <?php echo $_SESSION['username']; ?>
                </h6>
                <a href="profile.php" class="dropdown-item"><i data-feather="user"></i>
                    <span>Profilim</span>
                </a>
                <a href="#" class="dropdown-item"><i data-feather="coffee"></i>
                    <span>Kütüphanem</span>
                </a>
                <a href="#" class="dropdown-item"><i data-feather="grid"></i>
                    <span>Hizmetlerim</span>
                </a>
                <a href="taleplerim.php" class="dropdown-item"><i data-feather="life-buoy"></i>
                    <span>Destek Talebi</span>
                </a>
                <div class="dropdown-divider"></div>
                <?php if ($_SESSION['role'] === 'Admin') { ?>
                    <a href="yonetici.php" class="dropdown-item"><i data-feather="flag"></i>
                        <span>Yönetici</span>
                    </a>
                <?php } ?>
                <a href="user/logout.php" class="dropdown-item"><i data-feather="log-out"></i>
                    <span>Çıkış</span>
                </a>
            </div>
        </li>
    </ul>
    <div class="order-lg-4 ml-lg-3">
        <a class="" href="#modal-profile" role="button" data-toggle="modal"><span
                class="avatar rounded-circle"><img alt="Profil Fotoğrafı" src="<?php
                $username = $_SESSION['username'];
                $query = "SELECT profile_photo FROM users WHERE username = '$username'";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['profile_photo'];
                } else {
                    echo 'varsayilan_profil_fotografi.png';
                }
                ?>"></span></a>
    </div>
<?php } else { ?>
    <ul class="navbar-nav align-items-lg-center  d-lg-flex ml-lg-auto">
                        <li class=nav-item><a href="user/login.php" type="button" class="btn btn-white btn-sm btn-icon-label">
                                <span class="btn-inner--icon">
                                    <i data-feather="user-plus"></i>
                                </span>
                                <span class="btn-inner--text">Oturum Aç</span>
                            </a></li>
                    </ul>
<?php } ?>
<div class="d-lg-none px-4 text-center">
    <a href="user/login.php" class="btn btn-block btn-sm btn-warning" target="_blank">Oturum aç</a>
</div>

            </div>
            </div>
        </nav>
    </header>