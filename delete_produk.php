<?php
include 'config/koneksi.php';

$message = "";

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM produk WHERE id='$id'";

    if(mysqli_query($conn, $query)) {
        $message = "Produk berhasil dihapus";
    } else {
        $message = "Kesalahan: " . mysqli_error($conn);
    }
} else {
    $message = "ID produk tidak ditemukan";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Produk</title>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Hapus Produk</h1>
        <!-- Menampilkan pesan notifikasi -->
        <?php if($message): ?>
            <div class="alert alert-info">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
