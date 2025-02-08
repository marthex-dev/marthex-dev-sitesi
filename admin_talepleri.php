<?php
session_start();

// Eğer kullanıcı giriş yapmamışsa login sayfasına yönlendir
if (!isset($_SESSION['username'])) {
    header("Location: user/login.php");
    exit;
}

include 'inc/head.php'; // head.php dosyası içeriği bu satıra gelir
?>

<body>
    <div class="preloader">
        <div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>
    </div>
    <section class="slice slice-lg bg-dark">
      
    </section>

    <section class="pt-5 bg-section-secondary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="row align-items-center">
                        <div class="col"><span class="surtitle">Hesabım</span>
                            <h1 class="h2 mb-0">Profil Ayarları</h1>
                        </div>
                    </div>
                    <div class="row align-items-center mt-4">
                        <div class="col">
                            <ul class="nav nav-tabs overflow-x">
                                <li class="nav-item"><a href="profile.php" class="nav-link">Profilim</a></li>
                                <li class="nav-item"><a href="profile.php" class="nav-link">Kütüphanem</a></li>
                                <li class="nav-item"><a href="profile.php" class="nav-link">Ürünlerim</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php

    // Kullanıcı bilgilerini veritabanından çekme
    $query = "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Form gönderildiğinde
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Formdan gelen verileri alma
        $email = $_POST['email'];
        $password = $_POST["password"];

        // Eğer şifre alanı boş değilse şifreyi hashleyip güncelle
        if (!empty($password)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $update_query = "UPDATE users SET email = '$email', password = '$hashed_password' WHERE username = '" . $_SESSION['username'] . "'";
        } else {
            // Şifre alanı boş ise sadece email güncelle
            $update_query = "UPDATE users SET email = '$email' WHERE username = '" . $_SESSION['username'] . "'";
        }
        
        mysqli_query($conn, $update_query);

        // Başarılı güncelleme mesajı
        $update_success_message = '<div class="alert alert-success">Değişiklik başarıyla gerçekleşti. Sayfayı yenilemeden sayfa değişikliği yapınız. </div>';
    } else {
        // Form gönderilmediyse, başarılı güncelleme mesajı boş olmalı
        $update_success_message = '';
    }
    ?>

    <div class="slice slice-sm bg-section-secondary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row row-grid align-items-center">
                                        <div class="col-lg-8">
                                            <div class="media align-items-center"><span class="avatar rounded-circle"><img alt="Image placeholder"
                src="<?php 
                $username = $_SESSION['username'];
                $query = "SELECT profile_photo FROM users WHERE username = '$username'";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['profile_photo'];
                }
                ?>"/></span>
                                                <div class="media-body">
                                                    <h5 class="mb-0">&nbsp;&nbsp; Merhaba, <?php echo $_SESSION['username']; ?></h5>
                                                    <p class="text-muted lh-150 text-sm mb-0">&nbsp;&nbsp;&nbsp; Ekibimize katılmak ister
                                                        misin?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto flex-fill mt-4 mt-sm-0 text-sm-right d-none d-lg-block"><a
                                                href="#" class="btn btn-sm btn-neutral rounded-pill">Profil
                                                Fotoğrafı</a></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-3">Genel Bilgilerin</h5>
                                <?php echo $update_success_message; ?> <!-- Başarılı güncelleme mesajı -->
                                <form method="post">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"><label class="form-control-label">Kullanıcı:</label>
                                                <input class="form-control" type="text"
                                                    placeholder="<?php echo $user['username']; ?>#<?php echo $user['id']; ?>" disabled>
                                                    <small class="form-text text-muted mt-2">İsminizin yanında bulunan sayı ID numarasıdır.
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"><label class="form-control-label">E-Posta</label>
                                                <input class="form-control" type="email" name="email"
                                                    value="<?php echo $user['email']; ?>">
                                                <small class="form-text text-muted mt-2">Bu, bildirimleri göndereceğimiz
                                                    ana e-posta adresidir.
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label class="form-control-label">Şifre:</label>
                                                <input class="form-control" type="password" name="password"
                                                    placeholder="********"></div>
                                        </div>
                                    </div>
                                    <div class="mt-3"><button type="submit"
                                            class="btn btn-sm btn-primary">Güncelle</button>
                                    </div>

                                </form>
                            </div>
                            <hr>
                            <div>
                                <div class="page-inner-header mb-4">
                                    <h5 class="mb-1">Hesabı sil</h5>
                                    <p class="text-muted mb-0">Hesabınızı sildikten sonra geri dönüş yoktur. Lütfen emin
                                        olun.
                                </div>
                                <div class="row">
                                    <div class="col-md-8"><button type="button" class="btn btn-danger"
                                            data-toggle="modal" data-target="#modal_account_deactivate">Hesabı
                                            sil</button></div></p> <br><br><br>
                                </div>
                                <div class="modal fade" id="modal_account_deactivate" tabindex="-1" role="dialog"
                                    aria-labelledby="modal_account_deactivate" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="pt-5 text-center">
                                                    <div class="icon text-danger"><i data-feather="user-x" class=""></i>
                                                    </div>
                                                    <h4 class="h5 mt-5 mb-3">Son Derece Önemli!</h4>
                                                    <p>Tüm kişisel verilerinizi derhal veritabanımızdan sileceğiz. Bu
                                                        işlem geri alınamaz. Bunu yapmak istediğinden emin misin?</p>
                                                   <!-- Hesabı silme işlemi için form -->
<form method="post" action="user/delete_account.php">
    <button type="submit" class="btn btn-sm btn-link text-danger btn-zoom--hover font-weight-600">Hesabı Sil</button>
    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">İptal</button>
</form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include 'inc/foot.php'; ?>

<?php
$conn->close();
?>
