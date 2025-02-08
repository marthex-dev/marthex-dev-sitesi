<?php
include 'user/db.php'; // Veritabanı bağlantısı

session_start();

// Kullanıcı oturumunu kontrol et
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ticket_id = $_POST['ticket_id'];
    $user_id = $_SESSION['user_id'];
    $content = $_POST['content'];

    $sql = "INSERT INTO ticket_comments (ticket_id, user_id, content) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $ticket_id, $user_id, $content);
    $stmt->execute();

    header("Location: ticket_detail.php?id=" . $ticket_id);
}
?>
