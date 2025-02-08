<?php
session_start();
include 'user/db.php'; // Veritabanı bağlantısı

// Kullanıcı oturumu kontrol et
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Form verilerini al
$user_id = $_SESSION['user_id'];
$request_id = $_POST['request_id'];
$message = $_POST['message'];

// Mesaj ekle
$sql = "INSERT INTO messages (request_id, user_id, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $request_id, $user_id, $message);

if ($stmt->execute()) {
    header("Location: destek_talebi.php?id=$request_id");
} else {
    echo "Hata: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
