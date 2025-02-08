<?php
session_start();
include 'user/db.php'; // Veritabanı bağlantısı
include 'inc/head.php'; // Head kısmı

// Kullanıcı oturumu kontrol et
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$request_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Talebin detaylarını getir
$sql = "SELECT * FROM requests WHERE id = ? AND (user_id = ? OR ? IN (SELECT id FROM users WHERE role = 'admin'))";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $request_id, $user_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Bu talebi görüntüleme yetkiniz yok.";
    exit();
}

$request = $result->fetch_assoc();

// Mesajları getir
$sql_messages = "SELECT m.*, u.username, u.role, u.profile_photo FROM messages m JOIN users u ON m.user_id = u.id WHERE m.request_id = ? ORDER BY m.created_at ASC";
$stmt_messages = $conn->prepare($sql_messages);
$stmt_messages->bind_param("i", $request_id);
$stmt_messages->execute();
$result_messages = $stmt_messages->get_result();

?>

<section class="slice slice-lg bg-dark"></section>
<section class="slice slice-lg pt-10 pb-5">
    <div class="container pb-6">
        <div class="row row-grid align-items-center">
            <div class="col-xl-8 col-lg-10 offset-xl-2 offset-lg-1">
                <h4 class="mt-4">Konu: <?php echo htmlspecialchars($request['title']); ?></h4>
                <div class="row align-items-center mt-7 py-4 border-top border-bottom">
                    <div class="col mb-3 mb-lg-0">
                        <div class="media align-items-center">
                            <div><a href="#" class="avatar rounded mr-3"><img alt="Talebi Açan Kişi" src="new/help-desk.png"></a>
                            </div>
                            <div class="media-body"><span
                                    class="d-block h6 mb-0"><?php echo htmlspecialchars($_SESSION['username']); ?> - <?php echo htmlspecialchars($_SESSION['role']); ?></span>
                                <span
                                    class="text-sm text-muted"><?php echo htmlspecialchars($request['created_at']); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group-append"><span class="input-group-text border-0 py-0 pl-2 pr-2"><button
                                type="button" class="btn btn-soft-danger btn-sm btn-icon-label"
                                onclick="closeRequest(<?php echo $request['id']; ?>)">
                                <span class="btn-inner--icon">
                                    <i data-feather="x-circle"></i>
                                </span>
                                <span class="btn-inner--text">Talebi Kapat</span>
                            </button></span></div>
                </div>
                <div class="mt-5">
                    <h6 class="mb-4">Destek Talebi</h6>
                    <?php while ($message = $result_messages->fetch_assoc()) { ?>
                        <div class="media media-comment">
                            <img alt="Image placeholder" class="rounded-circle shadow mr-4"
                                src="<?php echo htmlspecialchars($message['profile_photo']); ?>" style="width:58px;">
                            <div class="media-body">
                                <div class="media-comment-bubble left-top">
                                    <h6 class="mt-0"><?php echo htmlspecialchars($message['username']); ?> - <?php echo htmlspecialchars($_SESSION['role']); ?></h6>
                                    <p class="text-sm lh-160"><?php echo nl2br(htmlspecialchars($message['message'])); ?>
                                    </p>
                                    <div class="icon-actions"><a href="#"><i data-feather="clock"></i> <span
                                                class="text-muted"><?php echo htmlspecialchars($message['created_at']); ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="media media-comment align-items-center">

                    <div class="media-body">
    <form class="rounded-lg border" action="post_message.php" method="POST">
        <input type="hidden" name="request_id" value="<?php echo $request['id']; ?>">
        <div class="input-group input-group-lg input-group-merge">
            <div class="input-group-prepend">
                <span class="input-group-text border-0 pr-2">
                    <i data-feather="edit-2"></i>
                </span>
            </div>
            <textarea name="message" rows="1" class="form-control border-0 px-1" aria-label="Bir yazı yaz..." placeholder="Bir yazı yaz..." required></textarea>
            <div class="input-group-append">
                <span class="input-group-text border-0 py-0 pl-2 pr-2">
                    <button type="submit" class="btn btn-slack btn-sm btn-icon-label">
                        <span class="btn-inner--icon">
                            <i data-feather="arrow-right"></i>
                        </span>
                        <span class="btn-inner--text">Gönder</span>
                    </button>
                </span>
            </div>
        </div>
    </form>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function closeRequest(requestId) {
        if (confirm("Bu talebi kapatmak istediğinize emin misiniz?")) {
            window.location.href = "close_request.php?id=" + requestId;
        }
    }</script>
    <?php
    include 'inc/foot.php'; ?>