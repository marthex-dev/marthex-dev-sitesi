<?php
include 'db.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Kullanıcıyı veritabanında kontrol et
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Kullanıcı bulundu, şifreyi kontrol et
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Şifre doğru, oturum aç
            $_SESSION['username'] = $row["username"];
            $_SESSION['role'] = $row["role"]; // Kullanıcı rolünü de oturuma kaydet
            header('Location: index.php');
            exit();
        } else {
            echo "Hatalı şifre";
        }
    } else {
        echo "Kullanıcı bulunamadı";
    }
}
?>
