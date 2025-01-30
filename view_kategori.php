<?php
include 'config/koneksi.php';

// Mengambil data kategori
$result = $conn->query("SELECT id, nama, gambar FROM kategori");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
    <!-- Favicons -->
    <link href="assets/img/logo_warung.png" rel="icon">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Daftar Kategori</h1>

        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['nama']}</td>";
                        echo "<td><img src='{$row['gambar']}' alt='Gambar Kategori' width='100'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>Tidak ada kategori ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="container text-center mt-5">
            <a href="admin.php?page=etalase" class="btn btn-warning mt-5">Kembali</a>
        </div>
    </div>
</body>

</html>