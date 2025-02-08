<?php
session_start(); // Oturumu başlat
$sayfa = "Paylaşımlar";
include 'inc/head.php';
include 'user/db.php';

$post_id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();
// Oturum açık ve kullanıcı giriş yapmış mı kontrol et
$isLoggedIn = isset($_SESSION['username']) && $_SESSION['username'] === true;

// Admin rolüne sahip mi kontrol et
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'User';

?>

<section class="slice py-4 bg-cover bg-size--cover" style="background-image:url(new/wallpaper-kv__1_.webp)">
</section>
<section class="terms-condition ptb-100" class="padding-60-0-100 position-relative">
    <div class="container">
        <h2 class="mt-4 text-center"><?php echo $post['title']; ?></h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="card side-bar">
                    <div class="card-body p-4">
                        <div class="candidate-profile text-center">
                            <h5 class="mt-4"><?php echo $post['title']; ?></h5>
                        </div>
                    </div>
                    <div class="candidate-profile-overview card-body border-top p-4">
                        <h6 class="mt-4">Bilgi:</h6>
                        <div class="mb-4">
                            <div>
                                <p class="text-sm text-muted"><?php echo $post['note']; ?></p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <?php if ($isAdmin): ?>
                                <a href="<?php echo $post['zip_file_path']; ?>" type="button" class="btn btn-danger btn-icon-label btn-hover w-100">
                                    <span class="btn-inner--icon">
                                        <i data-feather="download-cloud"></i>
                                    </span>
                                    <span class="btn-inner--text">İndir</span>
                                </a>
                            <?php else: ?>
                                <a href="user/login.php" type="button" class="btn btn-danger btn-icon-label btn-hover w-100">
                                    <span class="btn-inner--icon">
                                        <i data-feather="download-cloud"></i>
                                    </span>
                                    <span class="btn-inner--text">İndir</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href=#section_1 data-scroll-to data-scroll-to-offset=50 class="list-group-item list-group-item-action d-flex justify-content-between px-4">
                            <div>
                                <i data-feather=edit-3 class=mr-2></i>
                                <span><strong>Yazar:</strong> Marthex</span>
                            </div>
                        </a>
                        <a href=#section_2 data-scroll-to data-scroll-to-offset=50 class="list-group-item list-group-item-action d-flex justify-content-between px-4">
                            <div>
                                <i data-feather=layout class=mr-2></i>
                                <span><strong>Yayınlanma Tarihi:</strong> <?php echo $post['created_at']; ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="card-body p-4 border-top">
                        <h5 class="fs-17 fw-semibold mb-3">Anahtar Kelimeler</h5>
                        <div>
                            <span style="color:#000;" class="badge bg-soft-dark fs-13 mt-1"><?php echo $post['title']; ?></span>
                            <span style="color:#000;" class="badge bg-soft-dark fs-13 mt-1">Web Tema</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card ms-lg-4 mt-4 mt-lg-0">
                    <div class="card-body p-4">
                        <div class="mb-5">
                            <h5 class="fs-17 fw-medium mb-4">İçerik</h5>
                            <p class="text-muted"><?php echo $post['yazi']; ?></p>
                        </div>
                        <div class="candidate-portfolio mb-5">
                            <h6 class="fs-17 fw-medium mb-4">Görseller:</h6>
                            <div class="row g-3">
                                <?php
                                $images = explode(',', $post['bot_images_paths']);
                                foreach ($images as $image) {
                                    if (!empty($image)) {
                                        ?>
                                        <div class="col-lg-12">
                                            <div class="candidate-portfolio-box card border-0">
                                                <img class="img-fluid rounded" src="<?php echo $image; ?>" alt="<?php echo $post['title']; ?>, Web Tema İndir, WHMCS Tema, Web Hosting Tema,  ">
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
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
$conn->close();
?>
