<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'db.php';

$message = '';

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
            $_SESSION['user_id'] = $row["id"];
            $_SESSION['username'] = $row["username"];
            $_SESSION['role'] = $row["role"];
            header("Location: ../index.php");
            exit();
        } else {
            $message = '<div class="alert alert-danger">Hatalı şifre ile giriş yaptınız.</div>';
        }
    } else {
        $message = '<div class="alert alert-warning">Kullanıcı bulunamadı, e-posta adresinizi lütfen kontrol ediniz.</div>';
    }
}
?>

<?php
include 'inc/head.php';

?>


<section class="section-half-rounded bg-cover bg-size--cover py-4 py-sm-0"
    style="background-image:url(../assets/img/backgrounds/img-3.jpg)">
    <div class="container-fluid d-flex flex-column">
        <div class="row align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5 col-xl-4 mx-auto">
                <div class="card shadow-lg border-0 mb-0">
                    <div class="card-body py-5 px-sm-5">
                        <div>
                            <div class="mb-5 text-center">
                                <h6 class="h3 mb-1">Giriş</h6>
                                <p class="text-muted mb-0">Devam etmek için hesabınızda oturum açın.</p>
                            </div><span class="clearfix"></span>

                            <?php echo $message; ?>

                            <form method="POST">
                                <div class="form-group">
                                    <label class="form-control-label">E-posta:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    data-feather="user"></i></span></div><input type="email"
                                            class="form-control" name="email" id="input-email"
                                            placeholder="isim@mail.com" required>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div><label class="form-control-label">Şifre:</label></div>
                                        <div class="mb-2"><a href="#"
                                                class="small text-muted text-underline--dashed border-primary"
                                                data-toggle="password-text" data-target="#input-password">Şifreyi
                                                göster</a></div>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    data-feather="key"></i></span></div><input type="password"
                                            class="form-control" name="password" id="input-password"
                                            placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="mt-4"><button type="submit"
                                        class="btn btn-block btn-facebook btn-icon-label">
                                        <span class="btn-inner--icon"><i data-feather="log-in"></i></span><span
                                            class="btn-inner--text">Giriş yap</span>
                                    </button></div>
                            </form>
                            <div class="mt-4 text-center"> <a href="reset-password.php" type="button"
                                    class="btn btn-block"> Şifremi
                                    unuttum?</a>

                                <div class="mt-4 text-center"><small>Kayıt olmadın mı?</small> <a href="register.php"
                                        class="small font-weight-bold">Kayıt olmak
                                        istiyorum.</a>
                                </div>
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
