<?php
include 'user/db.php';

// Form verilerini al
$title = $_POST['title'];
$description = $_POST['description'];
$note = $_POST['note'];
$yazi = $_POST['yazi'];

// Dosya yükleme yollarını hazırlama
$zip_file_path = 'new/uploads/' . basename($_FILES['dosya']['name']);
$header_image_path = 'new/uploads/' . basename($_FILES['birinci_resim']['name'][0]);
$bot_images_paths = '';

// Dosya yükleme işlemleri
$uploadOk = true;

// ZIP dosyasını yükle
if (move_uploaded_file($_FILES['dosya']['tmp_name'], $zip_file_path)) {
    echo "ZIP dosyası başarıyla yüklendi.";
} else {
    echo "ZIP dosyasını yüklerken bir hata oluştu.";
    $uploadOk = false;
}

// Başlık resmini yükle
if (move_uploaded_file($_FILES['birinci_resim']['tmp_name'][0], $header_image_path)) {
    echo "Başlık resmi başarıyla yüklendi.";
} else {
    echo "Başlık resmini yüklerken bir hata oluştu.";
    $uploadOk = false;
}

// Bot resimlerini yükle
foreach ($_FILES['ikinci_resim']['tmp_name'] as $key => $tmp_name) {
    $bot_image_path = 'new/uploads/' . basename($_FILES['ikinci_resim']['name'][$key]);
    if (move_uploaded_file($tmp_name, $bot_image_path)) {
        $bot_images_paths .= $bot_image_path . ',';
    } else {
        echo "Bot resimlerini yüklerken bir hata oluştu.";
        $uploadOk = false;
    }
}

// Veritabanı işlemleri
if ($uploadOk) {
    // Veritabanına ekle
    $sql = "INSERT INTO posts (title, description, note, yazi, zip_file_path, header_image_path, bot_images_paths) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $title, $description, $note, $yazi, $zip_file_path, $header_image_path, $bot_images_paths);

    if ($stmt->execute()) {
        echo "Yeni kayıt başarıyla oluşturuldu";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
} else {
    echo "Dosya yükleme sırasında bir hata oluştu.";
}

$conn->close();

header("Location: kutuphane.php");
?>
