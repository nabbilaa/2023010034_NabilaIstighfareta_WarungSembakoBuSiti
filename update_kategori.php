<?php
include 'config/koneksi.php';
$message = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM kategori WHERE id='$id'";
    $result = $conn->query($sql);
    $kategori = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp_name = $_FILES['gambar']['tmp_name'];
    $gambar_folder = 'assets/img/etalase/' . $gambar;

    if (!empty($gambar)) {
        move_uploaded_file($gambar_tmp_name, $gambar_folder);
        $query = "UPDATE kategori SET nama='$nama', gambar='$gambar_folder' WHERE id='$id'";
    } else {
        $query = "UPDATE kategori SET nama='$nama' WHERE id='$id'";
    }

    if (mysqli_query($conn, $query)) {
        $message = "Kategori berhasil diupdate";
        $kategori['nama'] = $nama;
        $kategori['gambar'] = !empty($gambar) ? $gambar_folder : $kategori['gambar'];
    } else {
        $message = "Kesalahan: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <!-- Favicons -->
    <link href="assets/img/logo_warung.png" rel="icon">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Kategori</h1>
        <!-- Menampilkan pesan notifikasi -->
        <?php if ($message): ?>
            <div class="alert alert-info">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="update_kategori.php?id=<?php echo $kategori['id']; ?>" method="POST"
            enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $kategori['id']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kategori:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $kategori['nama']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Unggah Gambar:</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <button type="submit" class="btn btn-primary">Update Kategori</button>
        </form>
    </div>

    <div class="container text-center mt-5">
        <a href="admin.php?page=etalase" class="btn btn-warning mt-5"> Kembali </a>
    </div>
</body>

</html>