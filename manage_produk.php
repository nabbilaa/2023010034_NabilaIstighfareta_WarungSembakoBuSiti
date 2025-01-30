<?php
include 'config/koneksi.php';

$search_query = "";

// Periksa apakah form pencarian di-submit
if (isset($_POST['search'])) {
    $search_query = $_POST['search'];
}

// Query untuk mendapatkan data produk berdasarkan pencarian
$sql = "SELECT produk.id, produk.nama, kategori.nama as kategori_nama, produk.harga, produk.foto FROM produk JOIN kategori ON produk.kategori_id=kategori.id WHERE produk.nama LIKE '%$search_query%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Produk</title>

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container my-4">
        <h3 class="mb-4">Manajemen Produk</h3>

        <form method="POST" class="mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari produk..."
                value="<?php echo $search_query; ?>">
            <button type="submit" class="btn btn-primary mt-2">
                <i class="bi bi-search"></i> Cari
            </button>
        </form>

        <a href="add_produk.php" class="btn btn-primary mb-3">
        <i class="bi bi-folder-plus"></i> Tambah Produk Baru</a>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th class="text-center">Operasi CRUD</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['nama']}</td>";
                        echo "<td>{$row['kategori_nama']}</td>";
                        echo "<td>{$row['harga']}</td>";
                        echo "<td><img src='{$row['foto']}' alt='Gambar Produk' width='100'></td>";

                        echo "<td class='text-center'>
                                <a href='view_produk.php?id={$row['id']}' class='btn btn-primary'>
                                    <i class='bi bi-eye'></i> Lihat
                                </a>
                                <a href='update_produk.php?id={$row['id']}' class='btn btn-secondary'>
                                    <i class='bi bi-pencil'></i> Edit
                                </a>
                                <a href='delete_produk.php?id={$row['id']}' class='btn btn-danger'>
                                    <i class='bi bi-trash'></i> Hapus
                                </a>
                              </td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Tidak ada produk ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
</body>

</html>