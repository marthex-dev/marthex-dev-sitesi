<?php
// discord-bot.php dosyanızın başı
$sayfa = "Discord Bot";
include 'inc/head.php';
include 'user/db.php'; // Veritabanı bağlantısı için dosya

// Oturumu başlatmadan önce kontrol edin
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Oturumu başlat
}

?>

<section class="slice py-4 bg-cover bg-size--cover" style=background-image:url(new/discord.png)>
</section>
<section class="slice py-5 bg-section-secondary">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h1 class="h4 mb-0">Discord Botları</h1>
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
                                        <i data-feather="shopping-cart"></i>
                                    </span>
                                    <span class="btn-inner--text">Ürün Ekle</span>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="row mx-n2">
                    <!-- Discord Botlar ÜRÜN -->
                    <!-- Burada veritabanından ürünleri çekerek listeleyeceğiz -->
                    <?php
                    $query = "SELECT * FROM discord_products ORDER BY id DESC"; // En son eklenen ürünü en üstte göstermek için ORDER BY id DESC ekledik
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-lg-4 px-2">';
                        echo '<div class="card">';
                        echo '<div class="card-body">';
                        echo '<div class="icon" style="display: flex; justify-content: center; align-items: center;">';
                        echo '<img alt="discord bot vds, discord bot sunucusu, discord bot kiralama, discord bot kurulumu, discord sunucu, discord bot sunucu kiralama, discord, discord sunucu, discord kiralama, discord sunucu al, discord bot hosting, discord hosting kirala" src="' . $row['image_url'] . '" width="160px" class="img-fluid img-center">';
                        echo '</div>';
                        echo '<a href="discord-bot-urun.php?id=' . $row['id'] . '" class="d-block h5 mt-3 text-center">' . $row['title'] . '</a>';
                        echo '<p class="text-sm text-muted">' . $row['description'] . '</p>';
                        echo '<div class="d-flex align-items-center">';
                        echo '<div class="col px-0"><a href="#" class="h6 text-sm text-primary">Not: <span class="text-sm text-muted text-center">' . $row['note'] . '</span></a></div>';
                        echo '</div>';
                        echo '<div class="row align-items-center mt-4">';
                        echo '<div class="col-6">';
                        echo '<a href="discord-bot-urun.php?id=' . $row['id'] . '" type="button" class="btn btn-primary btn-sm btn-icon-label">';
                        echo '<span class="btn-inner--icon">';
                        echo '<i data-feather="mouse-pointer"></i>';
                        echo '</span>';
                        echo '<span class="btn-inner--text">İncele</span>';
                        echo '</a>';
                        echo '</div>';
                        echo '<div class="col-6 text-right">';
                        echo '<span class="h5 font-weight-bolder text-success">' . $row['price'] . 'TL</span><span
                                            class="h6 font-weight-bolder text-success">/aylık</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="feature-section ptb-100 light-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center mb-5">
                    <h3>Discord Bot Kiralama: Kolay ve Güvenilir Çözümler</h3>
                    <p class="lead" style="font-size:110%">Tüm Discord Bot VDS Server Kiralama hizmetlerimiz de ortak
                        olarak sağladığımız hizmetleri alt kısımda listelemiş bulunmaktayız.</p>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-md-6 col-lg-6">
                <div class="cta-new-wrap">
                    <div class="feature-feature-list py-3">
                        <h5 class="mb-2">Discord Guard Bot</h5>
                        <p>Discord Guard Bot, sunucunuzun güvenliğini sağlamak için mükemmel bir araçtır. Spam ve bot
                            saldırılarını otomatik olarak tespit edip engeller, böylece topluluğunuz güvende kalır.</p>
                    </div>
                    <div class="feature-feature-list py-3">
                        <h5 class="mb-2">Discord Kayıt Botu</h5>
                        <p>Discord Kayıt Botu, yeni kullanıcıları düzenli ve organize bir şekilde kaydetmenizi sağlar.
                            Kullanıcıların belirli bilgileri sağlamasını ve sunucunuza katılmasını kolaylaştırır.</p>
                    </div>
                    <div class="feature-feature-list py-3">
                        <h5 class="mb-2">Discord Destek Botu</h5>
                        <p>Discord Destek Botu, kullanıcıların sorunlarını hızlı bir şekilde iletmelerini sağlar.
                            Talepleri kategorize eder ve ilgili personele yönlendirir.</p>
                    </div>
                    <div class="feature-feature-list py-3">
                        <h5 class="mb-2">Discord Log Botu</h5>
                        <p>Discord Log Botu, sunucunuzda gerçekleşen tüm önemli olayları kaydeder. Mesaj silme,
                            kullanıcı yasağı ve rol değişiklikleri gibi olayları kaydeder ve bu bilgileri size sunar.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="cta-new-wrap">
                    <img width="500" height="500" lazyloaded="1" loading="lazy"
                        src="new/trending-topic-min.webp" alt="Discord Bot VDS Kiralama"
                        class="img-fluid" />
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between mt-5">
            <div class="col-md-6 col-lg-6">
                <div class="cta-new-wrap">
                    <img style="width:500px;" height="500" lazyloaded="1" loading="lazy"
                        src="new/wumpus_riding_wheel-min.webp" alt="Discord Bot VDS Kirala"
                        class="img-fluid" />
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="cta-new-wrap">
                    <div class="feature-feature-list py-3">
                        <h5 class="mb-2">Twitch ve YouTube Bildirim Botları</h5>
                        <p>Twitch ve YouTube bildirim botları, yayın ve video bildirimlerini otomatik olarak gönderir.
                            İzleyicilerinizin yeni içeriklerden haberdar olmasını sağlar.</p>
                    </div>
                    <div class="feature-feature-list py-3">
                        <h5 class="mb-2">Moderasyon Discord Botu</h5>
                        <p>Moderasyon Discord Botu, kullanıcıları izler, kuralları ihlal edenleri uyarır veya yasaklar
                            ve genel düzeni sağlar.</p>
                    </div>
                    <div class="feature-feature-list py-3">
                        <h5 class="mb-2">Minecraft Discord Botu</h5>
                        <p>Minecraft Discord Botu, oyun içi olayları sunucunuza entegre eder ve oyuncuların etkileşimini
                            artırır.</p>
                    </div>
                    <div class="feature-feature-list py-3">
                        <h5 class="mb-2">CS2 ve FiveM Discord Botları</h5>
                        <p>CS2 ve FiveM Discord botları, sunucu bilgilerini, oyuncu istatistiklerini ve yönetim
                            araçlarını sunar. Bu botlar, sunucu sahiplerinin ve yöneticilerinin işlerini kolaylaştırır.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="position-relative d-block w-100">
    <div class="item">
        <div class="hero-equal-height ptb-120 hero-overlay-bad-dark" alt="Minecraft Sunucu Kiralama"
            style="background: url('new/discordbot.svg')no-repeat center center / cover">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-9 col-lg-8">
                        <div class="hero-content-wrap text-white position-relative z-index text-center">
                            <h1 class="text-white" style="font-size:60px;">Discord Bot VDS Kirala</h1>
                            <p class="lead" style="text-align:center"><strong>Discord Bot VDS</strong> hizmetimiz ile
                                botlarınızı Türkiye lokasyonda en düşük ping oranları ile 7/24 online tutabileceğiniz
                                tek adres.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section ptb-100">
    <div class><br><br>
        <div class="container" style="font-size:large;">
            <div class="content-text">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <h3>Neden Discord Bot Satın Almalıyım?</h3>
                        <p>Discord botları, sunucunuzun işlevselliğini ve kullanıcı deneyimini önemli ölçüde artırır. 
                           Otomatikleştirilmiş görevler, kullanıcı moderasyonu, oyun içi özellikler ve daha fazlasını 
                           sağlayarak sunucunuzun yönetimini kolaylaştırır. Ayrıca, Discord botları topluluk etkileşimini 
                           artırır ve sunucunuzun profesyonel görünmesini sağlar.</p><br>
                        <h3>Discord Bot VDS Web Panel (Pterodactyl)</h3>
                        <p>Discord Bot VDS Web Panel, botlarınızı yönetmenin en kolay ve kullanıcı dostu yoludur. 
                           Pterodactyl paneli sayesinde, botlarınızı doğrudan web tarayıcınız üzerinden kontrol edebilir, 
                           yapılandırabilir ve izleyebilirsiniz. Bu panel, kullanıcı dostu arayüzü ve güçlü özellikleri 
                           ile bot yönetimini zahmetsiz hale getirir.</p>
                        <p>Web panel, botunuzun performansını izlemek, logları görüntülemek ve gerektiğinde 
                           yeniden başlatmak için ideal bir çözümdür. Ayrıca, Pterodactyl paneli, botlarınızın sorunsuz 
                           çalışmasını sağlamak için gerekli tüm araçları sunar.</p>
                    </div>
                    <div class="hidden-sm hidden-xs col-md-6">
                        <div class="wow fadeIn" class="text-right"><img class="img-fluid" width="500" height="500"
                                lazyloaded="1" loading="lazy" alt="Discord Bot VDS Kiralama"
                                title="Discord Bot VDS Kiralama" src="new/wumpus-coffee.png">
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br>
        <div class="container" style="font-size:large;">
            <div class="content-text">
                <div class="row">
                    <div class="hidden-sm hidden-xs col-md-6">
                        <div class="wow fadeIn" class="text-right"><img class="img-fluid" width="445" height="448"
                                lazyloaded="1" loading="lazy" alt="Discord Bot VDS Kiralama"
                                title="Discord Bot VDS Kiralama" src="new/cooking_pot.png">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h3>Kaliteli Discord Bot VDS'in keyfine varın!</h3>
                        <p><strong>Discord BOT VDS</strong> Discord botlarınızı 7/24 açık tutabilmeniz için sağlanan bir
                            Discord Bot Sunucusu hizmetidir.</p>
                        <p><strong>Discord BOT VDS</strong> ve <strong>Discord BOT Web Panel</strong> olarak iki adet
                            hizmetimiz mevcuttur.</p>
                        <p><strong>Discord BOT Web Panel</strong> ile <strong>Discord BOT VDS</strong> arasındaki tek
                            Discord BOT Web Paneli tarayıcı üstünden yönetebilirken diğerinde uzak masaüstü bağlantısı
                            ile Discord BOT VDS'e bağlanmanız gerekmektedir.</p>
                    </div>
                </div>
            </div>
        </div><br>
</section>

<section class="slice slice-lg">
    <div class=container>
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-8 col-md-10">
                <h2 class=mt-4>Yararlı Cevaplar</h2>
                <div class=mt-2>
                    <p class="lead lh-180">Aklınıza bir şey takıldıysa bizimle iletişime geçerek sorularınızı
                        iletebilirsiniz.</p>
                </div>
            </div>
        </div>
        <div class=row>
            <div class=col-xl-6>
                <div id=accordion-1 class="accordion accordion-spaced">
                    <div class=card>
                        <div class="card-header py-4" id=heading-1-1 data-toggle=collapse role=button
                            data-target=#collapse-1-1 aria-expanded=false aria-controls=collapse-1-1>
                            <h6 class=mb-0><i data-feather=help-circle class=mr-3></i>Botumu nasıl davet edebilirim?
                            </h6>
                        </div>
                        <div id=collapse-1-1 class=collapse aria-labelledby=heading-1-1 data-parent=#accordion-1>
                            <div class=card-body>
                                <p>
                                    Botunuzun kurulumu tamamlandıktan sonra web panelinizin konsolu veya verilen davet
                                    linki ile sunucunuza davet
                                    edebilirsiniz.</p>
                            </div>
                        </div>
                    </div>
                    <div class=card>
                        <div class="card-header py-4" id=heading-1-2 data-toggle=collapse role=button
                            data-target=#collapse-1-2 aria-expanded=false aria-controls=collapse-1-2>
                            <h6 class=mb-0><i data-feather=help-circle class=mr-3></i>Botuma kendim komut ekleyebilir
                                miyim?
                            </h6>
                        </div>
                        <div id=collapse-1-2 class=collapse aria-labelledby=heading-1-2 data-parent=#accordion-1>
                            <div class=card-body>
                                <p>Şimdilik hayır, botunuza sadece yapımcının erişimi vardır. İstediğiniz komuta bağlı
                                    olarak kod satışı yapılabilir.</p>
                            </div>
                        </div>
                    </div>
                    <div class=card>
                        <div class="card-header py-4" id=heading-1-3 data-toggle=collapse role=button
                            data-target=#collapse-1-3 aria-expanded=false aria-controls=collapse-1-3>
                            <h6 class=mb-0><i data-feather=help-circle class=mr-3></i>Siparişim ne zaman teslim edilir?
                            </h6>
                        </div>
                        <div id=collapse-1-3 class=collapse aria-labelledby=heading-1-3 data-parent=#accordion-1>
                            <div class=card-body>
                                <p>Siparişiniz en geç 1 saat veya yoğunluğa bağlı olarak en geç 10 saat içinde teslim
                                    edilmektedir.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=col-xl-6>
                <div id=accordion-2 class="accordion accordion-spaced">
                    <div class=card>
                        <div class="card-header py-4" id=heading-2-1 data-toggle=collapse role=button
                            data-target=#collapse-2-1 aria-expanded=false aria-controls=collapse-2-1>
                            <h6 class=mb-0><i data-feather=help-circle class=mr-3></i>Botu nasıl yöneteceğim?</h6>
                        </div>
                        <div id=collapse-2-1 class=collapse aria-labelledby=heading-2-1 data-parent=#accordion-2>
                            <div class=card-body>
                                <p>Botu sipariş ettikten sonra size verilecek panel bilgileri sonrası panel üzerinden
                                    botunuzu yötebilirsiniz.</p>
                            </div>
                        </div>
                    </div>
                    <div class=card>
                        <div class="card-header py-4" id=heading-2-2 data-toggle=collapse role=button
                            data-target=#collapse-2-2 aria-expanded=false aria-controls=collapse-2-2>
                            <h6 class=mb-0><i data-feather=help-circle class=mr-3></i>Botun altyapısına sahip olabilir
                                miyim?
                            </h6>
                        </div>
                        <div id=collapse-2-2 class=collapse aria-labelledby=heading-2-2 data-parent=#accordion-2>
                            <div class=card-body>
                                <p>Her bot için geçerli değildir. Not kısmına botun altyapısını verebileceğimizi veya
                                    veremiyeceğimizi yazmaktayız.</p>
                            </div>
                        </div>
                    </div>
                    <div class=card>
                        <div class="card-header py-4" id=heading-2-3 data-toggle=collapse role=button
                            data-target=#collapse-2-3 aria-expanded=false aria-controls=collapse-2-3>
                            <h6 class=mb-0><i data-feather=help-circle class=mr-3></i>Barındırma hizmetini siz mi
                                sağlıyorsunuz?</h6>
                        </div>
                        <div id=collapse-2-3 class=collapse aria-labelledby=heading-2-3 data-parent=#accordion-2>
                            <div class=card-body>
                                <p>Evet, aylık ücretle discord botunuzu Türkiye Lokasyonlu sunucular ile kendimiz
                                    barındırıyoruz.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-6 justify-content-center align-items-center">
            <div class="col-lg-8 text-center">
                <h5 class=font-weight-light><strong>Marthex</strong> ile yoluma devam etmek istiyorum.</h5>
                <div class=mt-4><a href=user/login.php class="btn btn-primary btn-icon"><span
                            class=btn-inner--text>Giriş yap</span>
                        <span class=btn-inner--icon><i data-feather=arrow-right></i> </span></a><a class="btn btn-white"
                        href=kutuphane.php>Kütüphane</a></div>
            </div>
        </div>
    </div>
</section>

<!-- Ürün Ekle Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="add_product.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Yeni Ürün Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Ürün Başlık</label>
                        <input type="text" class="form-control" placeholder="Guard Bot" id="title" name="title"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="description">Açıklama</label>
                        <textarea class="form-control" id="description"
                            placeholder="Sunucuya karşı saldırıları engeller ve sunucuyu tehlikelere karşı korur."
                            name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="yazi">Ürün Yazı</label>
                        <textarea class="form-control" id="yazi" name="yazi"
                            placeholder="Uzun şekilde botun özelliklerini yaz." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="note">Not</label>
                        <textarea class="form-control" id="note"
                            placeholder="Discord botun altyapı kodları verilmez. Discord botu kendi sunucumuzda barındırılır."
                            name="note"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Fiyat</label>
                        <input type="text" class="form-control" id="price" placeholder="150" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="image_url">Başlık Resim</label>
                        <input type="file" class="form-control" id="image_url" name="image_url[]" multiple required>
                    </div>
                    <div class="form-group">
                        <label for="ikinci_resim">Bot Resimleri</label>
                        <input type="file" class="form-control" id="ikinci_resim" name="ikinci_resim[]" multiple
                            required>

                        <p>CTRL ile birden fazla resim seçebilirsin.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Ürün Ekle</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'inc/foot.php';
?>