<?php
include 'user/db.php'; // Veritabanı bağlantısı için dosya

// Formdan gelen verileri alalım
$title = $_POST['title'];
$description = $_POST['description'];
$yazi = $_POST['yazi'];
$note = $_POST['note'];
$price = $_POST['price'];

// Birinci resmi yükleme işlemi
$target_dir = "new/"; // Yükleme dizini
$target_files = [];
foreach ($_FILES["image_url"]["tmp_name"] as $key => $tmp_name) {
    $target_file = $target_dir . basename($_FILES["image_url"]["name"][$key]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["image_url"]["tmp_name"][$key], $target_file)) {
        $target_files[] = $target_file;
    }
}

// İkinci resmi yükleme işlemi
$target_dir2 = "new/"; // Yükleme dizini
$target_files2 = [];
foreach ($_FILES["ikinci_resim"]["tmp_name"] as $key => $tmp_name) {
    $target_file2 = $target_dir2 . basename($_FILES["ikinci_resim"]["name"][$key]);
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["ikinci_resim"]["tmp_name"][$key], $target_file2)) {
        $target_files2[] = $target_file2;
    }
}

// Dosya yükleme kontrolü
if (!empty($target_files) && !empty($target_files2)) {
    // Dosyalar başarıyla yüklendi, veritabanına kaydetme işlemi yapabiliriz

    // İlk resim için yüklenen dosyalar
    $image_urls = implode(",", $target_files);

    // İkinci resim için yüklenen dosyalar
    $ikinci_resimler = implode(",", $target_files2);

    // Veritabanına yeni ürünü ekleyelim
    $query = "INSERT INTO discord_products (title, description, yazi, note, price, image_url, ikinci_resim) VALUES ('$title', '$description', '$yazi', '$note', '$price', '$image_urls', '$ikinci_resimler')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Başarılı ise kullanıcıyı yönlendirelim veya mesaj gösterelim
        header('Location: discord-bot.php'); // Ürün listeleme sayfasına yönlendir
        exit();
    } else {
        // Hata durumunda kullanıcıya bir hata mesajı gösterilebilir
        echo "Ürün eklenirken bir hata oluştu: " . mysqli_error($conn);
    }
} else {
    // Dosya yükleme başarısız oldu
    echo "Dosya yükleme sırasında bir hata oluştu.";
}
?>