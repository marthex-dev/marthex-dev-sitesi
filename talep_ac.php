<?php
session_start();
$sayfa = "Talep Oluştur";
include 'inc/head.php';
// Kullanıcı oturumu kontrol et
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

?>

<section class="slice slice-lg bg-dark"></section>
<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2>Talep Oluştur</h2>
                <form action="talep_ac_db.php" method="POST">
                    <div class="form-group">
                        <label for="title">Talep Başlığı</label>
                        <input placeholder="Guard Bot" type="text" name="title" class="form-control" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Talep Konusu</label>
                        <select name="category" class="form-control" id="category" required>
                            <option value="Genel Destek">Genel Destek</option>
                            <option value="Web Hosting">Web Hosting</option>
                            <option value="Discord Bot">Discord Bot</option>
                            <option value="Sorun/Bildirim">Sorun/Bildirim</option>
                            <option value="Diğer">Diğer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="yazi">Yazı</label>
                        <textarea name="yazi" id="yazi" placeholder="İçeriğinizi buraya yazınız." class="form-control" rows="5" required></textarea>
                        <script>
                            CKEDITOR.replace('yazi');
                        </script>
                    </div>

                    <button type="submit" class="btn btn-primary">Talep Oluştur</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include 'inc/foot.php';
?>
