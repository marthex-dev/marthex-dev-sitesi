<?php
$sayfa = "Discord Botları";
include 'inc/head.php';
include 'user/db.php'; // Veritabanı bağlantısı için dosya

$product_id = $_GET['id'];

// Ürün bilgisini al
$query = "SELECT * FROM discord_products WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

// Ürünün ikinci resmini al
$ikinci_resim = $product['ikinci_resim'];
?>
<section class="slice py-4 bg-cover bg-size--cover"
        style=background-image:url(new/discord.png)>
    </section>
<section class="terms-condition ptb-100" class="padding-60-0-100 position-relative">
    <div class="container">
        <h2 class="mt-4 text-center"><?php echo $product['title']; ?></h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="card side-bar">
                    <div class="card-body p-4">
                        <div class="candidate-profile text-center">
                            <h5 class="mt-4"><?php echo $product['title']; ?></h5>
                        </div>
                    </div>
                    <div class="candidate-profile-overview card-body border-top p-4">
                        <h6 class="mt-4">Bilgi:</h6>
                        <div class="mb-4">
                            <div>
                                <p class="text-sm text-muted"><?php echo nl2br($product['description']); ?></p>
                            </div>
                        </div>
                        <p class="display-7">
                            <img src="new/4.png" width="50" height="50" alt="Discord vds Kiralama, vds sunucu satın al, vds 7/24 açık server kurma, 7/24 vds yapma, bot açık tutma, Moderasyon botu, Discod Bot, Twitch Bildirim, Discod Bot, Source Bilişim,Emoji Bot Paketi, Discod Bot, Oyun botu, discord csgo botu, Discod Bot, discord mta botu, discord destek botu, discord public botu, discord bot davet komutu, Discod Bot, Discord bot Developer, Discord Kayıt Botu, Discord Log Botu, Discord Youtube Botu">
                            <span class="h5 font-weight-bolder text-dark"><?php echo $product['price']; ?>TL</span>
                            <span class="h6 font-weight-bolder text-dark">/aylık</span>
                        </p>
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary btn-icon-label btn-hover w-100">
                                <span class="btn-inner--icon">
                                    <i data-feather="shopping-cart"></i>
                                </span>
                                <span class="btn-inner--text">Sipariş ver</span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-4 border-top">
                        <h5 class="fs-17 fw-semibold mb-3">Anahtar Kelimeler</h5>
                        <div>
                            <span style="color:#000;"
                                class="badge bg-soft-dark fs-13 mt-1"><?php echo $product['title']; ?></span>
                            <span style="color:#000;" class="badge bg-soft-dark fs-13 mt-1">Discord Botları</span>
                            <span style="color:#000;"
                                class="badge bg-soft-dark fs-13 mt-1"><?php echo $product['title']; ?> Al</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card ms-lg-4 mt-4 mt-lg-0">
                    <div class="card-body p-4">
                        <div class="mb-5">
                            <h5 class="fs-17 fw-medium mb-4">İçerik</h5>
                            <p class="text-muted"><?php echo nl2br($product['yazi']); ?></p>
                        </div> <div class="candidate-portfolio mb-5">
                            <h6 class="fs-17 fw-medium mb-4">Görseller:</h6>
                            <div class="row g-3">
                                <?php
                                // İkinci resimlerin yollarını virgülle ayırarak bir diziye dönüştürelim
                                $ikinci_resimler = explode(",", $product['ikinci_resim']);

                                // Her bir resim için bir HTML bloğu oluşturalım
                                foreach ($ikinci_resimler as $resim) {
                                    ?>
                                    <div class="col-lg-12">
                                        <!-- Her resmin 1/4'ü kadarını kaplayacak şekilde ayarlayabilirsiniz -->
                                        <div class="candidate-portfolio-box card border-0">
                                            <img class="img-fluid rounded" src="<?php echo $resim; ?>"
                                                alt="<?php echo $product['title']; ?> Satın al, <?php echo $product['title']; ?> Satın al sipariş ver, ,Emoji Bot Paketi, Discod Bot, Oyun botu, discord csgo botu, Discod Bot, discord mta botu, discord destek botu, discord public botu, discord bot davet komutu, Discod Bot, Discord bot Developer, Discord Kayıt Botu, Discord Log Botu, Discord Youtube Botu">
                                        </div>
                                    </div>
                                    <?php
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
?>