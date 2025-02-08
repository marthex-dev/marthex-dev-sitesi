<!DOCTYPE html>
<html lang=en>

<head>
    <meta name=viewport content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name=description
        content="Quick Website UI Kit is an innovative HTML template solution which combines beautiful design and flawless functionality.">
    <meta name=author content=Webpixels>
    <title>Marthex - Giriş</title>
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
    <link rel=icon href=../assets/img/brand/favicon.png type=image/png>
    <link rel=stylesheet href=../assets/libs/@fortawesome/fontawesome-free/css/all.min.css>
    <link rel=stylesheet href=../assets/css/quick-website.css id=stylesheet>
</head>