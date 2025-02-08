<?php
$servername = "localhost";
$username = "marthexd_sonayak";
$password = "uqx#hIXQAUKE";
$dbname = "marthexd_sonayak";

// Veritabanı bağlantısı oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Karakter setini ayarla
$conn->set_charset("utf8mb4");

?>
