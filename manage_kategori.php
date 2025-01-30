<?php
include 'config/koneksi.php';

$search_query = "";

// Periksa apakah form pencarian di-submit
if (isset($_POST['search'])) {
    $search_query = $_POST['search'];
}

// Query untuk mendapatkan data kategori berdasarkan pencarian
$sql = "SELECT * FROM kategori WHERE nama LIKE '%$search_query%'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kategori</title>
    
    <!-- Favicons -->
    <link href="assets/img/warungsembako.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
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
        <h3 class="mb-4">Manajemen Kategori</h3>

        <form method="POST" class="mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari kategori..." value="<?php echo $search_query; ?>"> 
            <button type="submit" class="btn btn-primary mt-2">
                    <i class="bi bi-search"></i> Cari
                </button>        
            </form>

            <a href="add_kategori.php" class="btn btn-primary mb-3">
            <i class="bi bi-folder-plus"></i> Tambah Kategori Baru
        </a>        
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th class="text-center">Operasi CRUD</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['nama']; ?></td>
                            <td><img src="<?php echo $row['gambar']; ?>" alt="Gambar Kategori" width="100"></td>
                            <td class="text-center">
                                <a href="view_kategori.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
                                    <i class="bi bi-eye"></i> Lihat
                                </a>
                                <a href="update_kategori.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="delete_kategori.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada kategori ditemukan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
</body>

</html>
