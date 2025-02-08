<?php
session_start();

// Eğer kullanıcı giriş yapmamışsa login sayfasına yönlendir
if (!isset($_SESSION['username'])) {
    header("Location: user/login.php");
    exit;
}

include 'inc/head.php'; // head.php dosyası içeriği bu satıra gelir

// Kullanıcının kendi taleplerini al, en yeni talep en üstte olacak şekilde sırala
$username = $_SESSION['username'];
$sql = "SELECT requests.*, users.username 
        FROM requests 
        JOIN users ON requests.user_id = users.id 
        WHERE users.username = '$username'
        ORDER BY requests.created_at DESC"; // created_at'e göre en yeni en üstte
$result = $conn->query($sql);
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
                            <h1 class="h2 mb-0">Taleplerim</h1>
                        </div>
                        <div class="col-auto ml-auto">
                            <a href="talep_ac.php" class="btn btn-soft-dark btn-sm btn-icon-label">Yeni Talep Oluştur</a>
                        </div>
                    </div>
                    <?php include 'inc/profile_menu.php'; ?>
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
                            echo '<td><a href="destek_talebi.php?id=' . htmlspecialchars($row['id']) . '" class="action-item mr-2" data-toggle="tooltip" title="Talebi Görüntüle"><i data-feather="external-link"></i> </a></td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/foot.php'; ?>

<?php
$conn->close();
?>
