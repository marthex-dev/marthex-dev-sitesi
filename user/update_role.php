<?php
session_start();

require_once 'db.php';

// Sadece yöneticilerin erişimine izin ver
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Admin') {
    header("Location: index.php");
    exit;
}

// Formdan gelen verileri al
$user_id = $_POST['user_id'];
$role = $_POST['role'];

// Kullanıcının rolünü güncelle
$query = "UPDATE users SET role='$role' WHERE id='$user_id'";
mysqli_query($conn, $query);

// Başka bir sayfaya yönlendir
header("Location: ../yonetici.php");
exit;
?>
