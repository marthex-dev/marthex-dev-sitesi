<?php
session_start();
include 'user/db.php'; // Veritabanı bağlantısı

// Kullanıcı oturumu kontrol et
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$request_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Talebi kapat (durumunu güncelle)
$sql = "UPDATE requests SET status = 'Kapalı' WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $request_id, $user_id);

if ($stmt->execute()) {
    header("Location: destek_talebi.php?id=$request_id");
    exit();
} else {
    echo "Hata: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
