<?php 
$sayfa = "Kayıt Ol";
include 'inc/head.php'; 
include 'db.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // E-posta adresinin zaten kullanılıp kullanılmadığını kontrol et
    $email_check = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($email_check);

    if ($result->num_rows > 0) {
        // E-posta zaten kullanılmış
        $message = '<div class="alert alert-danger">Bu e-posta adresi zaten kullanılmış.</div>';
    } else {
        // Veritabanına ekle
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            $message = '<div class="alert alert-success">Kayıt başarılı!</div>';
        } else {
            $message = '<div class="alert alert-danger">Hata: ' . $conn->error . '</div>';
        }
    }
}
?>

<body>
    <section class="section-half-rounded bg-cover bg-size--cover py-4 py-sm-0"
        style="background-image:url(../assets/img/backgrounds/img-3.jpg)">
        <div class="container-fluid d-flex flex-column">
            <div class="row align-items-center min-vh-100">
                <div class="col-md-6 col-lg-5 col-xl-4 mx-auto">
                    <div class="card shadow-lg border-0 mb-0">
                        <div class="card-body py-5 px-sm-5">
                            <div>
                                <div class="mb-5 text-center">
                                    <h6 class="h3 mb-1">Hesabını Oluştur</h6>
                                    <p class="text-muted mb-0">Sitemiz tasarımcılara ve geliştiricilere olan sevgiyle yapıldı.</p>
                                </div><span class="clearfix"></span>

                                <?php if($message != '') echo $message; ?>

                                <form method="POST">
                                    <div class="form-group">
                                        <label class="form-control-label">Kullanıcı Adı:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control form-control-prepend" id="input-name" name="username" placeholder="Marthex">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="user"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">E-posta adresi:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="email" class="form-control form-control-prepend" id="input-email" name="email" placeholder="name@example.com">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="at-sign"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <label class="form-control-label">Şifre:</label>
                                            </div>
                                            <div class="mb-2">
                                                <a href="#" class="small text-muted text-underline--dashed border-primary" data-toggle="password-text" data-target="#input-password">Şifreyi göster</a>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-merge">
                                            <input type="password" class="form-control form-control-prepend" id="input-password" name="password" placeholder="********">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="key"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="check-terms">
                                            <label class="custom-control-label" for="check-terms"><a href="../pages/utility/terms.html" target="_blank">Kullanım koşullarını</a> kabul ediyorum</label>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-block btn-slack btn-icon-label">
                                            <span class="btn-inner--icon">
                                                <i data-feather="user-plus"></i>
                                            </span>
                                            <span class="btn-inner--text">Kayıt ol</span>
                                        </button>
                                    </div>
                                </form>
                                <div class="mt-4 text-center"><small>Zaten bir hesabın var mı?</small> <a href="login.php" class="small font-weight-bold">Giriş yap</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include 'inc/foot.php'; 
    ?>
</body>
