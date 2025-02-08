<?php
session_start();

// Eğer kullanıcı giriş yapmamışsa veya yetkisi yoksa başka sayfaya yönlendir
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Admin') {
    header("Location: index.php");
    exit;
}

include 'inc/head.php'; 

// Tüm talepleri al, en yeni talep en üstte olacak şekilde sırala
$sql = "SELECT requests.*, users.username 
        FROM requests 
        JOIN users ON requests.user_id = users.id 
        ORDER BY requests.created_at DESC"; // created_at'e göre en yeni en üstte
$result = $conn->query($sql);
?>

<section class="slice slice-lg bg-dark"></section>

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
</section><hr>

<div class="slice slice-sm bg-section-secondary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="d-flex">
                                    <div class="pr-3"><span class="h5 mb-0"><i data-feather="users"></i></span></div>
                                    <div class="">
                                        <h3 class="h5 mb-0">Kullanıcılar</h3>
                                        <p class="text-muted mb-0">Tüm kullanıcıların izinlerini ve durumunu yönetin.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-cards align-items-center">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="min-width:240px">E-Posta</th>
                                            <th scope="col">Kullanıcı</th>
                                            <th scope="col">Yetki</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Veritabanından kullanıcıları çekme
                                        $query = "SELECT * FROM users";
                                        $result = mysqli_query($conn, $query);

                                        // Verileri döngüyle tabloya ekleme
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<th scope='row'>
                                                <div class='media align-items-center'>
                                                    <div>
                                                        <div class='avatar-parent-child'>
                                                            <img alt='Image placeholder' src='" . $row['profile_photo'] . "' class='avatar rounded-circle'>
                                                            <span class='avatar-child avatar-badge bg-success'></span>
                                                        </div>
                                                    </div>
                                                    <div class='media-body ml-4'>
                                                        <a href='#' class='name h6 mb-0 text-sm'>" . $row['email'] . "</a>
                                                <small class='d-block font-weight-bold'>" . $row['username'] . "</small>
                                                    </div>
                                                </div>
                                            </th>";
                                            echo "<td>
                                                <div class='media-body ml-4'>
                                                    <a href='#' class='name h6 mb-0 text-sm'>" . $row['username'] . "</a>
                                                    <small class='d-block font-weight-bold'>ID: " . $row['id'] . "</small>
                                                </div>
                                            </td>";
                                            echo "<td>
    <form action='user/update_role.php' method='POST'>
        <input type='hidden' name='user_id' value='" . $row['id'] . "'>
        <select name='role' onchange='this.form.submit()'>
            <option value='Üye'" . ($row['role'] == 'Üye' ? ' selected' : '') . ">Üye</option>
            <option value='Admin'" . ($row['role'] == 'Admin' ? ' selected' : '') . ">Admin</option>
            <option value='Moderatör'" . ($row['role'] == 'Moderatör' ? ' selected' : '') . ">Moderatör</option>
        </select>
    </form>
</td>";

                                            echo "<td class='text-right'>
                                                <div class='actions ml-3'>
                                                    <a href='#' class='action-item mr-2' data-toggle='tooltip' title='Profil'><i data-feather='external-link'></i> </a>
                                                    <a href='#' class='action-item text-danger mr-2' data-toggle='tooltip' title='Hesabı sil'><i data-feather='trash-2'></i></a>
                                                </div>
                                            </td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'inc/foot.php';
?>