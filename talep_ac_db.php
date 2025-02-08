<?php
session_start();
include 'user/db.php'; // Veritabanı bağlantısı

// Kullanıcı oturumu kontrol et
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Form verilerini kontrol et ve al
if (isset($_POST['title']) && isset($_POST['category']) && isset($_POST['yazi'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $message = $_POST['yazi'];
    $user_id = $_SESSION['user_id'];

    // Veritabanına talep ekle
    $sql = "INSERT INTO requests (title, category, user_id, status, created_at) VALUES (?, ?, ?, 'Açık', NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $title, $category, $user_id);

    if ($stmt->execute()) {
        $request_id = $stmt->insert_id;

        // İlk mesajı messages tablosuna ekle
        $sql_message = "INSERT INTO messages (request_id, user_id, message, created_at) VALUES (?, ?, ?, NOW())";
        $stmt_message = $conn->prepare($sql_message);
        $stmt_message->bind_param("iis", $request_id, $user_id, $message);
        $stmt_message->execute();
        $stmt_message->close();

        header("Location: destek_talebi.php?id=$request_id");
        exit();
    } else {
        echo "Hata: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Lütfen tüm form alanlarını doldurun.";
}

$conn->close();
?>
