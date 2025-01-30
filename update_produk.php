<?php
include 'config/koneksi.php';

// Pesan notifikasi
$pesan = "";

// Ambil data produk berdasarkan ID
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM produk WHERE id='$id'";
    $result = $conn->query($sql);
    $produk = $result->fetch_assoc();
}

// Ambil data kategori
$result_kategori = $conn->query("SELECT * FROM kategori");

// Periksa apakah form telah disubmit
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $kategori_id = $_POST['kategori_id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $ketersediaan_produk = $_POST['ketersediaan_produk'];
    $foto = $_FILES['foto']['name'];
    $foto_tmp_name = $_FILES['foto']['tmp_name'];
    $foto_folder = 'assets/img/produk/'.$foto;

    // Memeriksa apakah gambar diunggah atau tidak
    if(!empty($foto)) {
        move_uploaded_file($foto_tmp_name, $foto_folder);
        $query = "UPDATE produk SET kategori_id='$kategori_id', nama='$nama', harga='$harga', foto='$foto_folder', ketersediaan_produk='$ketersediaan_produk' WHERE id='$id'";
    } else {
        $query = "UPDATE produk SET kategori_id='$kategori_id', nama='$nama', harga='$harga', ketersediaan_produk='$ketersediaan_produk' WHERE id='$id'";
    }

    if(mysqli_query($conn, $query)) {
        $pesan = "Produk berhasil diupdate";
    } else {
        $pesan = "Kesalahan: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
      <!-- Favicons -->
      <link href="assets/img/logo_warung.png" rel="icon">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Produk</h1>
        <!-- Menampilkan pesan notifikasi -->
        <?php if (!empty($pesan)): ?>
            <div class="alert alert-info">
                <?php echo $pesan; ?>
            </div>
        <?php endif; ?>

        <form action="update_produk.php?id=<?php echo $produk['id']; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $produk['id']; ?>">
            
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori Produk:</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                    <option value="">Pilih Kategori</option>
                    <?php while($kategori = $result_kategori->fetch_assoc()): ?>
                        <option value="<?php echo $kategori['id']; ?>" <?php echo ($kategori['id'] == $produk['kategori_id']) ? 'selected' : ''; ?>>
                            <?php echo $kategori['nama']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $produk['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Produk:</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $produk['harga']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ketersediaan Produk:</label><br>
                <input type="radio" id="habis" name="ketersediaan_produk" value="habis" <?php echo ($produk['ketersediaan_produk'] == "habis") ? 'checked' : ''; ?> required>
                <label for="habis">Habis</label><br>
                <input type="radio" id="tersedia" name="ketersediaan_produk" value="tersedia" <?php echo ($produk['ketersediaan_produk'] == "tersedia") ? 'checked' : ''; ?> required>
                <label for="tersedia">Tersedia</label><br>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Unggah Foto (Abaikan jika tidak ingin mengganti gambar):</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <button type="submit" class="btn btn-primary">Update Produk</button>
        </form>
    </div>

    <div class="container text-center mt-5">
        <a href="admin.php?page=produk" class="btn btn-warning mt-5"> Kembali </a>
        <div></div>
</body>
</html>
