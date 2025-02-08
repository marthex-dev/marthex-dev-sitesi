<?php
session_start();

// Tüm oturum değişkenlerini sıfırla
$_SESSION = array();

// Oturum sonlandır
session_destroy();

// Kullanıcıyı giriş sayfasına yönlendir
header("Location: ../index.php");
exit();
?>
