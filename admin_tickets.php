<?php
session_start();
include 'user/db.php'; // Veritabanı bağlantısı
include 'inc/head.php';

// Admin oturumu kontrol et
// Admin oturumu kontrol et
if (!isset($_SESSION['user_id']) || (isset($_SESSION['user_role']) && $_SESSION['user_role'] !== 'Admin')) {
    header("Location: login.php");
    exit();
}


$sql = "SELECT requests.*, users.username FROM requests JOIN users ON requests.user_id = users.id";
$result = $conn->query($sql);
?>

<section class="slice slice-lg bg-primary"></section>
<section class="pt-5 bg-section-secondary">
        <div class=container>
            <div class="row justify-content-center">
                <div class=col-lg-9>
                    <div class="row align-items-center">
                        <div class=col><span class=surtitle>Your account</span>
                            <h1 class="h2 mb-0">User Management</h1>
                        </div>
                    </div>
                    <div class="row align-items-center mt-4">
                        <div class=col>
                            <ul class="nav nav-tabs overflow-x">
                                <li class=nav-item><a href=kullanicilar.php class=nav-link>Kullanıcılar</a></li>
                                <li class=nav-item><a href=settings.html class=nav-link>Destek Talepleri</a></li>
                                <li class=nav-item><a href=billing.html class=nav-link>Billing</a></li>
                                <li class=nav-item><a href=cards.html class=nav-link>Cards</a></li>
                                <li class=nav-item><a href=security.html class=nav-link>Security</a></li>
                                <li class=nav-item><a href=users.html class="nav-link active">Users</a></li>
                                <li class=nav-item><a href=notifications.html class=nav-link>Notifications</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2>Tüm Talepler</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Başlık</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Oluşturulma Tarihi</th>
                            <th scope="col">Kullanıcı</th>
                            <th scope="col">Aksiyonlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<th scope="row">' . htmlspecialchars($row['id']) . '</th>';
                            echo '<td>' . htmlspecialchars($row['title']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['category']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['status']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['created_at']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['username']) . '</td>';
                            echo '<td><a href="destek_talebi.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-primary btn-sm">Görüntüle</a></td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
include 'inc/foot.php';
?>
