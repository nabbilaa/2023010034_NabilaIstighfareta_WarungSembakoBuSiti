<?php
include 'config/koneksi.php';

// Mengambil data produk dengan menggabungkan kategori
$result = $conn->query("SELECT produk.id, produk.nama, produk.harga, produk.foto, produk.ketersediaan_produk, kategori.nama AS kategori_nama FROM produk JOIN kategori ON produk.kategori_id = kategori.id");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
      <!-- Favicons -->
      <link href="assets/img/logo_warung.png" rel="icon">

     <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Produk</h1>

        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Ketersediaan Produk</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["kategori_nama"] . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["harga"] . "</td>";
                        echo "<td><img src='" . $row["foto"] . "' alt='Gambar Produk' width='100'></td>";
                        echo "<td>" . $row["ketersediaan_produk"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Tidak ada produk ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="container text-center mt-5">
            <a href="admin.php?page=produk" class="btn btn-warning mt-5">Kembali</a>
        </div>
    </div>
</body>
</html>
