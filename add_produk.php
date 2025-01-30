<?php
include 'config/koneksi.php';

$message = "";

// Mengambil data kategori
$result_kategori = $conn->query("SELECT * FROM kategori");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kategori_id = $_POST['kategori_id'];
    $harga = $_POST['harga'];
    $ketersediaan_produk = $_POST['ketersediaan_produk'];
    
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp_name = $_FILES['gambar']['tmp_name'];
    $gambar_folder = 'assets/img/produk/' . $gambar;

    if (move_uploaded_file($gambar_tmp_name, $gambar_folder)) {
        $sql = "INSERT INTO produk (nama, kategori_id, harga, foto, ketersediaan_produk) VALUES ('$nama', '$kategori_id', '$harga', '$gambar_folder', '$ketersediaan_produk')";
        if ($conn->query($sql) === TRUE) {
            $message = "Produk berhasil ditambahkan!";
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
    <title>Tambah Produk</title>
      <!-- Favicons -->
      <link href="assets/img/logo_warung.png" rel="icon">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Produk Baru</h1>
        <!-- Menampilkan pesan notifikasi -->
        <?php if (!empty($message)): ?>
            <div class="alert alert-info">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="add_produk.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori Produk:</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                    <option value="">Pilih Kategori</option>
                    <?php while($kategori = $result_kategori->fetch_assoc()): ?>
                        <option value="<?php echo $kategori['id']; ?>"><?php echo $kategori['nama']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Produk:</label>
                <input type="text" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ketersediaan Produk:</label><br>
                <input type="radio" id="habis" name="ketersediaan_produk" value="habis" required>
                <label for="habis">Habis</label><br>
                <input type="radio" id="tersedia" name="ketersediaan_produk" value="tersedia" required>
                <label for="tersedia">Tersedia</label><br>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Unggah Gambar Produk:</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
    </div>

    <div class="container text-center mt-5">
        <a href="admin.php?page=produk" class="btn btn-warning mt-5"> Kembali </a>
    </div>
</body>
</html>
