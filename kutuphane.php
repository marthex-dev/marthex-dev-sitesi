<?php
$sayfa = "Kütüphane";
include 'inc/head.php';
include 'user/db.php'; // Veritabanı bağlantısını dahil ediyoruz

// Veritabanından verileri çek
$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = $conn->query($sql);
?>

<section class="slice py-4 bg-cover bg-size--cover" style="background-image: url(new/wallpaper-kv__1_.webp);">
</section>
<section class="slice py-5 bg-section-secondary">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h1 class="h4 mb-0">Kütüphane</h1>
                    </div>
                    <?php
                    // Kullanıcı admin rolüne sahip mi kontrol edelim
                    if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
                        ?>
                        <div class="col-auto">
                            <div class="dropdown">
                                <a href="#" type="button" class="btn btn-soft-success btn-sm btn-icon-label"
                                    data-toggle="modal" data-target="#addProductModal">
                                    <span class="btn-inner--icon">
                                        <i data-feather="plus"></i>
                                    </span>
                                    <span class="btn-inner--text">Gönderi Ekle</span>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="row">
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-xl-4 col-md-6">
                                <div class="card hover-translate-y-n3 hover-shadow-lg overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="post_detail.php?id=<?php echo $row['id']; ?>" class="d-block">
                                            <img alt="Image placeholder" src="<?php echo $row['header_image_path']; ?>" class="card-img-top">
                                        </a>
                                    </div>
                                    <div class="card-body py-4">
                                        <a href="post_detail.php?id=<?php echo $row['id']; ?>" class="h5 stretched-link lh-150"><?php echo $row['title']; ?></a>
                                        <p class="mt-3 mb-0 lh-170"><?php echo $row['description']; ?></p>
                                    </div>
                                    <div class="card-footer border-0 delimiter-top">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="avatar avatar-sm bg-primary rounded-circle">
                                                    <img alt="Image placeholder" src="new/profile/200w.gif">
                                                </span>
                                                <span class="text-sm mb-0 avatar-content">Marthex</span>
                                            </div>
                                            <div class="col text-right text-right">
                                                <a href="discord-bot-urun.php?id=<?php echo $row['id']; ?>" type="button"
                                                    class="btn btn-danger btn-sm btn-icon-label">
                                                    <span class="btn-inner--icon">
                                                        <i data-feather="mouse-pointer"></i>
                                                    </span>
                                                    <span class="btn-inner--text">İncele</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>Henüz bir gönderi yok.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ürün Ekle Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="add_post.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Gönderi Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Gönderi Başlık</label>
                        <input type="text" class="form-control" placeholder="Guard Bot" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Alt Yazı</label>
                        <textarea class="form-control" id="description" placeholder="Sunucuya karşı saldırıları engeller ve sunucuyu tehlikelere karşı korur." name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="note">Yazı</label>
                        <textarea class="form-control" id="note" placeholder="Discord botun altyapı kodları verilmez. Discord botu kendi sunucumuzda barındırılır." name="note"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="yazi">Açıklama</label>
                        <textarea class="form-control" id="yazi" name="yazi" placeholder="Uzun şekilde botun özelliklerini yaz." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="dosya">ZİP Yükle</label>
                        <input type="file" class="form-control" id="dosya" name="dosya" required>
                    </div>
                    <div class="form-group">
                        <label for="birinci_resim">Başlık Resim</label>
                        <input type="file" class="form-control" id="birinci_resim" name="birinci_resim[]" required>
                    </div>
                    <div class="form-group">
                        <label for="ikinci_resim">Bot Resimleri</label>
                        <input type="file" class="form-control" id="ikinci_resim" name="ikinci_resim[]" multiple required>
                        <p>CTRL ile birden fazla resim seçebilirsin.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Gönderi Ekle</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'inc/foot.php';
$conn->close();
?>
