<?php
include 'config/koneksi.php';

// variabel pesan
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp_name = $_FILES['gambar']['tmp_name'];
    $gambar_folder = 'assets/img/etalase/' . $gambar;

    if (move_uploaded_file($gambar_tmp_name, $gambar_folder)) {
        $sql = "INSERT INTO kategori (nama, gambar) VALUES ('$nama', '$gambar')";

        if ($conn->query($sql) === TRUE) {
            $message = "Kategori berhasil ditambahkan!";
        } else {
            $message = "Kesalahan: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $message = "Gagal mengunggah gambar.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <!-- Favicons -->
    <link href="assets/img/logo_warung.png" rel="icon">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Tambah Kategori Baru</h1>
        <!-- Menampilkan pesan notifikasi -->
        <?php if ($message): ?>
            <div class="alert alert-info">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="add_kategori.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kategori:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Unggah Gambar Kategori:</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Kategori</button>
        </form>
    </div>

    <div class="container text-center mt-5">
        <a href="admin.php?page=etalase" class="btn btn-warning mt-5"> Kembali </a>
        <div>

</body>

</html>