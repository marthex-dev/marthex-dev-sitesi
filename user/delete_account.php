<?php
session_start();
include 'db.php'; // Veritabanı bağlantısını içe aktarın

// Eğer kullanıcı giriş yapmamışsa login sayfasına yönlendir
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Kullanıcı adı oturumdan alınır
$username = $_SESSION['username'];

// Kullanıcıyı veritabanından silme
$query = "DELETE FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();

// Eğer silme işlemi başarılıysa
if ($stmt->affected_rows > 0) {
    // Oturumu sonlandır ve kullanıcıyı çıkış sayfasına yönlendir
    session_destroy();
    header("Location: login.php?message=hesap_silindi");
    exit;
} else {
    // Silme işlemi başarısız olduysa hata mesajı göster
    echo "Hesap silme işlemi başarısız oldu. Lütfen tekrar deneyin.";
}
?>
