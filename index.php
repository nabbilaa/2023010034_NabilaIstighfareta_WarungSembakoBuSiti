<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

  <title>Warung Sembako Bu Siti</title>

  <!-- Favicons -->
  <link href="assets/img/logo_warung.png" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>

  <body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="#hero" class="logo d-flex align-items-center me-auto">
          <img src="assets/img/logo_warung.png" alt="">
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Home<br></a></li>
            <li><a href="#etalase">Etalase</a></li>
            <li><a href="#produk">Produk</a></li>
            <li><a href="#alur-pemesanan">Pemesanan</a></li>
            <li><a href="#testimonials">Testimoni</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="login.php">Login Admin</a>

      </div>
    </header>

    <main class="main">

      <!-- Home -->
      <section id="hero" class="hero section">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
              <h1>Bingung Belanja Dimana? di Warung Sembako Bu Siti Aja!!</h1>
              <p>Tempat belanja kebutuhan sehari-hari yang lengkap, murah, dan berkualitas. Kami siap melayani kebutuhan
                Anda dengan sepenuh hati!! Yuk, belanja di Warung Sembako Bu Siti, puas dan hemat jadinya! 😊</p>
              <div class="d-flex">
                <div class="d-flex">
                  <a href="https://wa.me/6285325116969?text=Halo,%20saya%20ingin%20melakukan%20pemesanan%20%0ANama:%20%5BMasukkan%20nama%5D%0AProduk:%20%5BMasukkan%20produk%5D%0AAlamat:%20%5BMasukkan%20alamat%5D%0APembayaran:%20%5BMasukkan%20metode%5D"
                    class="btn-get-started" target="_blank">Belanja Sekarang</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
              <img src="assets/img/home/home.png" class="img-fluid animated" alt="">
            </div>
          </div>
        </div>
      </section>
      <!-- End Home -->

      <?php
      include "config/koneksi.php";

      // Mengambil data kategori
      $result_kategori = $conn->query("SELECT * FROM kategori");

      // Mengambil data produk berdasarkan kategori yang dipilih
      $where_clause = "";
      if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
        $where_clause = "WHERE kategori_id = $category_id";
      }
      $query_produk = "SELECT * FROM produk $where_clause";
      $result_produk = $conn->query($query_produk);
      ?>
      <!-- Etalase/Kategori Section -->
      <section id="etalase" class="etalase section">
        <div class="container section-title" data-aos="fade-up">
          <h2>Etalase</h2>
          <p>Lihat berbagai kategori produk yang kami tawarkan.</p>
        </div>
        <!-- Daftar Kategori -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4">
            <?php
            while ($row = $result_kategori->fetch_assoc()) {
              echo '<div class="col-lg-3 col-md-4">';
              echo '  <div class="category-item">';
              echo '      <a href="index.php?category_id=' . $row['id'] . '#produk">';
              echo '          <img src="' . $row['gambar'] . '" alt="' . $row['nama'] . '" class="img-fluid">';
              echo '          <h3>' . $row['nama'] . '</h3>';
              echo '      </a>';
              echo '  </div>';
              echo '</div>';
            }
            ?>
          </div>
        </div>
      </section>
      <!-- End Etalase Section -->

      <!-- Produk Section -->
      <section id="produk" class="produk section">
        <div class="container section-title" data-aos="fade-up">
          <h2>Daftar Produk</h2>
          <p>Lihat berbagai produk yang kami tawarkan.</p>
        </div>

        <!-- Daftar Produk -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4">
            <?php
            if ($result_produk->num_rows > 0) {
              while ($row = $result_produk->fetch_assoc()) {
                echo '<div class="col-lg-3 col-md-4">';
                echo '  <div class="product-item">';
                echo '      <img src="' . $row['foto'] . '" alt="' . $row['nama'] . '" class="img-fluid">';
                echo '      <h3>' . $row['nama'] . '</h3>';
                echo '      <p>Harga: Rp' . number_format($row['harga'], 0, ',', '.') . '</p>';
                echo '     <p class="' . $row['ketersediaan_produk'] . '">' . ucfirst($row['ketersediaan_produk']) . '</p>';
                echo '  </div>';
                echo '</div>';
              }
            } else {
              echo '<p class="text-center">Tidak ada produk ditemukan</p>';
            }
            ?>
          </div>
        </div>
      </section>
      <!-- End Produk Section -->

      <!-- Alur Pemesanan Section -->
      <section id="alur-pemesanan" class="alur-pemesanan section">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-12 text-center">
              <h2>Alur Pemesanan</h2>
              <p>Berikut adalah langkah-langkah untuk melakukan pemesanan di Warung Sembako Bu Siti:</p>
            </div>
            <div class="col-lg-3 d-flex flex-column align-items-center">
              <div class="step">
                <i class="bi bi-search"></i>
                <h4>Cari Produk</h4>
                <p>Telusuri produk yang tersedia di toko kami.</p>
              </div>
            </div>
            <div class="col-lg-3 d-flex flex-column align-items-center">
              <div class="step">
                <i class="bi bi-cart"></i>
                <h4>Pilih & Pesan</h4>
                <p>Pilih produk yang Anda inginkan dan lakukan pemesanan</p>
              </div>
            </div>
            <div class="col-lg-3 d-flex flex-column align-items-center">
              <div class="step">
                <i class="bi bi-coin"></i>
                <h4>Pembayaran</h4>
                <p>Pilih metode pembayaran sesuai pilihan Anda: COD, bayar di toko, atau transfer.</p>
              </div>
            </div>
            <div class="col-lg-3 d-flex flex-column align-items-center">
              <div class="step">
                <i class="bi bi-check2-circle"></i>
                <h4>Konfirmasi</h4>
                <p>Konfirmasi pesanan & metode pembayaran melalui
                  <a href="https://wa.me/6285325116969?text=Halo,%20saya%20ingin%20melakukan%20pemesanan%20%0ANama:%20%5BMasukkan%20nama%5D%0AProduk:%20%5BMasukkan%20produk%5D%0AAlamat:%20%5BMasukkan%20alamat%5D%0APembayaran:%20%5BMasukkan%20metode%5D"
                    target="_blank">WhatsApp</a>.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Alur Pemesanan Section -->

      <!-- Testimonials Section -->
      <section id="testimonials" class="testimonials section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Testimoni</h2>
          <p>Testimoni dari pelanggan setia kami</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
  {
    "loop": true,
    "speed": 600,
    "autoplay": {
      "delay": 5000
    },
    "slidesPerView": "auto",
    "pagination": {
      "el": ".swiper-pagination",
      "type": "bullets",
      "clickable": true
    },
    "breakpoints": {
      "320": {
        "slidesPerView": 1,
        "spaceBetween": 40
      },
      "1200": {
        "slidesPerView": 2,
        "spaceBetween": 20
      }
    }
  }
</script>
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <img src="assets/img/testimonials/1.png" class="testimonial-img" alt="">
                    <h3>Mbah Sukanah</h3>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>Warung Sembako Bu Siti lengkap pol, barang jaminan berkualitas. Bu Siti ramah tenan, selalu
                        siap bantu. Pokoke recommended lah!</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <img src="assets/img/testimonials/2.png" class="testimonial-img" alt="">
                    <h3>Silvi</h3>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>Warung Sembako Bu Siti tuh best! Barang-barangnya lengkap banget, kualitasnya oke punya. Bu
                        Siti juga baik banget orangnya, selalu bantu kalo aku butuh apa-apa. Pokoknya favorit deh
                        belanja di sini!</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <img src="assets/img/testimonials/3.png" class="testimonial-img" alt="">
                    <h3>Mbah Wanah</h3>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>Warung Bu Siti mantap tenan, Nak! Barang-barange lengkap banget, kualitas terjamin. Rego-ne
                        podo murah. Bu Siti iki wong apik, selalu ngguyu lan seneng mbantu. Seneng rasane belonjo neng
                        kene!</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <img src="assets/img/testimonials/4.png" class="testimonial-img" alt="">
                    <h3>Mbak Eny</h3>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>Warung Bu Siti mantap bener! Barang-barangnya lengkap, kualitasnya bagus semua. Harganya
                        juga hemat di kantong. Udah langganan belanja di sini, puas banget!</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <img src="assets/img/testimonials/5.png" class="testimonial-img" alt="">
                    <h3>Mbak Fit</h3>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>Warung Bu Siti selalu jadi andalan saya! Barang-barangnya lengkap, kualitasnya terjamin.
                        Harganya terjangkau banget untuk belanja bulanan. Alhamdulillah, Bu Siti juga sangat ramah dan
                        selalu siap membantu kalau kita butuh sesuatu. Belanja di sini memang bikin puas!</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>

      </section>
      <!-- /Testimonials Section -->

      <!-- Contact Section -->
      <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Hubungi kami untuk semua kebutuhan Anda atau untuk mendapatkan informasi lebih lanjut mengenai produk dan
            layanan yang kami tawarkan</p>
        </div><!-- End Section Title -->

        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">

            <div class="col-lg-5">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>Gg. Sarwilikur, RT 04 RW 02, Kuanyar, Kec. Mayong, Kab. Jepara (59465)</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>085325116969</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>warungsembakobusiti@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

            </div>

            <div class="col-lg-7">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.1347545140734!2d110.7380487099052!3d-6.753416266007811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70ddda1abb2a0b%3A0x9dd0d7ee840f97d1!2sGas%20Habibi%20Kuanyar!5e0!3m2!1sid!2sid!4v1738054727709!5m2!1sid!2sid"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
              </iframe>

            </div>

          </div>

        </div> <!-- End Contact Section -->

        </div>

        </div>

      </section>
      <!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer">

      <div class="container">
        <div class="copyright text-center ">
          <p>© <span>Copyright</span> <strong class="px-1 sitename">Warung Sembako Bu Siti</strong>
          </p>
        </div>
        <div class="social-links d-flex justify-content-center">
          <a href=""><i class="bi bi-facebook"></i></a>
          <a href=""><i class="bi bi-instagram"></i></a>
        </div>
        <div class="credits">Designed by <a href="https://bootstrapmade.com/">Warung Sembako Bu Siti</a>
        </div>
      </div>

    </footer>
    <!-- End Footer -->

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

  </body>

</html>