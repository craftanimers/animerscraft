<?php
// koneksi.php
$servername = "localhost";
$username = "root";
$password = "";
$database = "animers";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>Produk UMKM Rajutan Tangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .sidebar {
            width: 250px;
            background: #D2B48C;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: -250px;
            transition: left 0.3s ease;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .sidebar.active {
            left: 0;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: 600;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px;
            display: flex;
            align-items: center;
            transition: background 0.3s, padding-left 0.3s;
            font-size: 1.1rem;
            position: relative;
        }
        .sidebar a:hover {
            background: #495057;
            padding-left: 25px;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .logo-sidebar {
            display: block;
            margin: 0 auto 20px auto;
            width: 150px;
            height: auto;
        }
        .logo-header {
            display: block;
            margin: 0 auto 20px auto;
            width: 100px;
            height: auto;
        }
        .toggle-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            cursor: pointer;
            background: #343a40;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 1.2rem;
        }
        .content {
            margin-left: 0;
            transition: margin-left 0.3s ease;
            padding: 20px;
        }
        .content.active {
            margin-left: 250px;
        }
        .hero-section {
            background: linear-gradient(to bottom, #4CAF50, #FF9800);
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .hero-section .btn-primary {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card {
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    border-radius: 15px; /* More rounded corners */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    margin-bottom: 1rem;
    padding: 15px;
    transition: transform 0.3s, box-shadow 0.3s; /* Smooth transition effect */
}
.card:hover {
    transform: scale(1.02); /* Slightly enlarge on hover */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Darker shadow on hover */
}
        .card img {
            width: 100%;
            height: 200px; /* Fixed height */
            object-fit: cover; /* Ensure image covers the area */
            border-radius: 10px 10px 0 0;
            cursor: pointer; /* Indicate image is clickable */
        }
        .card-title {
    font-size: 1.2rem;
    font-weight: 600;
}

.card-text {
    font-size: 1rem;
    margin: 5px 0;
}

.card-body .btn-primary {
    align-self: center;
    margin-top: auto;
}
        }
        .contact-info {
            padding: 20px;
            background-color: #d0f0c0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        }
        .video-section {
            padding: 20px;
            background-color: #d0f0c0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .video-section iframe {
            width: 100%;
            height: 335px;
        }
        .card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
}

.card-body h5 {
    margin-bottom: 15px;
}

.card-body p {
    flex-grow: 1;
}

.card-body .btn {
    margin-top: 10px;
    align-self: center;
    width: 80%;
}

.card-body .btn-primary {
    background-color: #28a745; /* Hijau untuk tombol 'Daftar' */
    border-color: #28a745;
}

.card-body .btn-success {
    /* Gunakan warna default Bootstrap untuk tombol 'Beli' */
}

.card {
    margin-bottom: 20px;
    height: 100%;
}

.card img {
    max-height: 200px;
    object-fit: cover;
    margin-bottom: 15px;
}

        footer {
    background: linear-gradient(90deg, #495057, #343a40);
    color: white;
    text-align: center;
    padding: 20px;
    position: relative;
    bottom: 0;
    width: 100%;
    border-top: 2px solid #FFC107; /* Divider */
}

footer p {
    margin-bottom: 10px;
    font-size: 0.9rem;
}

.social-media-links {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    margin-top: 15px;
}

.social-media-links a {
    color: #ffffff;
    font-size: 1.5rem;
    transition: color 0.3s ease-in-out;
}

.social-media-links a:hover {
    color: #FFC107; /* Warna saat di-hover */
}

.social-media-links a:before {
    content: "";
    display: block;
    width: 50%;
    height: 2px;
    background: #FFC107;
    transition: width 0.3s;
}

.social-media-links a:hover:before {
    width: 100%;
}

.btn-custom {
    display: inline-block;
    padding: 10px 20px;
    border: 2px solid #388E3C; /* Warna border */
    border-radius: 5px;
    background-color: #388E3C; /* Warna latar belakang button */
    color: white;
    font-size: 1rem;
    font-weight: 600;
    text-align: center;
    text-decoration: none;
    transition: background-color 0.3s, border-color 0.3s, box-shadow 0.3s;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%; /* Memastikan button memiliki lebar penuh pada card */
}

.btn-custom:hover {
    background-color: #218838; /* Warna latar belakang saat hover */
    border-color: #1e7e34; /* Warna border saat hover */
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
}

.btn-custom:active {
    background-color: #1e7e34; /* Warna latar belakang saat di-click */
    border-color: #1c7430; /* Warna border saat di-click */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}        
        .row-equal {
    display: flex;
    flex-wrap: wrap;
}

.row-equal .col-md-4 {
    flex: 1;
    margin: 10px;
}

@media (max-width: 768px) {
    .row-equal .col-md-4 {
        flex: 1 1 100%;
    }
}
.hero-section {
    background: linear-gradient(to bottom, #4CAF50, #FF9800);
    color: white;
    padding: 100px 0;
    text-align: center;
    position: relative;
}

/* Mengupdate warna latar belakang dan font di header */
.hero-section {
    background: linear-gradient(to bottom, #4CAF50, #FF9800); /* Warna latar belakang gradien */
    color: white; /* Warna teks */
    padding: 100px 0;
    text-align: center;
    position: relative;
}

.hero-section h1 {
    font-size: 3rem; /* Ukuran font untuk judul */
    font-weight: 700; /* Berat font untuk judul */
    margin-bottom: 20px;
}

.hero-section p {
    font-size: 1.5rem; /* Ukuran font untuk deskripsi */
    font-weight: 400; /* Berat font untuk deskripsi */
}

.logo-header {
    width: 150px;
    height: auto;
    margin-bottom: 20px;
    border-radius: 50%; /* Membuat logo berbentuk lingkaran */
    position: relative;
    box-shadow: 0 0 10px 5px rgba(255, 255, 255, 0.3); /* Cahaya awal */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    animation: glowing 3s infinite alternate; /* Animasi glowing */
}

@keyframes glowing {
    0% {
        box-shadow: 0 0 10px 5px rgba(255, 255, 255, 0.3);
    }
    50% {
        box-shadow: 0 0 20px 10px rgba(255, 255, 255, 0.5);
    }
    100% {
        box-shadow: 0 0 30px 15px rgba(255, 255, 255, 0.7);
    }
}

.hero-section:hover .logo-header {
    transform: scale(1.1);
    box-shadow: 0 0 40px 20px rgba(255, 255, 255, 0.8); /* Shadow tambahan saat hover */
}
.modal-body img {
    width: 100%;
    height: auto; /* Maintains aspect ratio */
    max-height: 80vh; /* Optional: limit height to fit within the viewport */
    object-fit: contain; /* Ensure the image is fully visible */
}

.modal-body video {
    width: 100%;
    height: auto; /* Atur tinggi otomatis berdasarkan aspek rasio */
}
.special-request-card {
    /* Menyesuaikan padding atau border jika perlu */
}

.special-request-title {
    margin-top: 10px; /* Menurunkan posisi judul */
    margin-bottom: 15px; /* Menambah jarak antara judul dan deskripsi */
}

.special-request-description {
    margin-bottom: 20px; /* Menambah jarak antara deskripsi dan tombol */
}

.carousel-item img, .carousel-item video {
    width: 100%; /* Pastikan gambar/video memenuhi lebar modal */
    height: auto; /* Jaga rasio aspek gambar/video */
}
.card img,
.card video {
    max-height: 200px; /* Jika diperlukan, sesuaikan tinggi maksimum */
    object-fit: cover;
}
        /* Carousel container */
.carousel {
  position: relative;
}

/* Carousel indicators styling */
.carousel-indicators {
  bottom: 10px; /* Position indicators slightly above the bottom */
}

.carousel-indicators li {
  background-color: #ffffff; /* White color for indicators */
  border-radius: 50%; /* Circular indicators */
  width: 10px; /* Size of indicators */
  height: 10px;
  opacity: 0.8; /* Slightly transparent */
}

.carousel-indicators .active {
  background-color: #000000; /* Active indicator color */
}

/* Carousel controls styling */
.carousel-control-prev,
.carousel-control-next {
  position: absolute; /* Positioning the controls absolutely */
  top: 50%; /* Center vertically */
  transform: translateY(-50%); /* Adjust vertical alignment */
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
  border-radius: 50%; /* Circular background for the controls */
  width: 40px; /* Size of the control buttons */
  height: 40px;
  display: flex; /* Centering the icon */
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Subtle shadow */
  z-index: 1; /* Ensure controls are above carousel content */
}

.carousel-control-prev {
  left: 10px; /* Positioning from the left */
}

.carousel-control-next {
  right: 10px; /* Positioning from the right */
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  background-color: rgba(255, 255, 255, 0.8); /* Slightly transparent white for icons */
  border-radius: 50%; /* Rounded icon background */
}

/* Adjusting the size of the control icons */
.carousel-control-prev-icon::before,
.carousel-control-next-icon::before {
  font-size: 20px; /* Icon size */
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .carousel-control-prev,
  .carousel-control-next {
    width: 35px;
    height: 35px;
  }
  
  .carousel-control-prev-icon::before,
  .carousel-control-next-icon::before {
    font-size: 18px;
  }
}

@media (max-width: 576px) {
  .carousel-control-prev,
  .carousel-control-next {
    width: 30px;
    height: 30px;
  }
  
  .carousel-control-prev-icon::before,
  .carousel-control-next-icon::before {
    font-size: 16px;
  }
}
/* Filter Section */
.filter-section {
    padding: 15px;
    background-color: #f8f9fa; /* Latar belakang putih lembut */
    border-radius: 10px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); /* Bayangan halus */
    max-width: 450px; /* Lebar maksimum */
    margin: 20px auto; /* Jarak dengan elemen lain di sekitarnya */
    display: flex;
    flex-direction: column; /* Mengarahkan elemen ke bawah */
    align-items: center;
    border: 1px solid #dcdcdc; /* Border lembut */
    position: relative;
}

/* Label untuk Filter */
.filter-section .form-label {
    font-size: 16px; /* Ukuran font nyaman */
    font-weight: 600; /* Berat font sedang */
    color: #333; /* Warna teks gelap untuk kontras yang baik */
    margin-bottom: 10px; /* Jarak bawah untuk label */
    text-align: center; /* Menyelaraskan teks ke tengah */
}

/* Select Filter */
.filter-section .form-select {
    width: 100%;
    max-width: 300px; /* Lebar maksimum yang lebih besar */
    padding: 10px 16px; /* Padding yang nyaman */
    font-size: 15px; /* Ukuran font yang nyaman */
    border-radius: 8px;
    border: 1px solid #ced4da; /* Border halus */
    background-color: #ffffff; /* Latar belakang putih untuk select */
    color: #333; /* Warna teks gelap */
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

/* Efek Fokus pada Select */
.filter-section .form-select:focus {
    border-color: #007bff; /* Warna border fokus yang lembut */
    background-color: #f1f1f1; /* Latar belakang lembut saat fokus */
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.3); /* Bayangan halus saat fokus */
    outline: none; /* Menghapus outline default */
}

/* Option Styling */
.form-select option {
    padding: 10px; /* Padding nyaman */
    background-color: #ffffff; /* Latar belakang putih untuk opsi */
    color: #333; /* Warna teks gelap untuk opsi */
    font-size: 15px; /* Ukuran font yang sesuai */
}

/* Tag Penanda Penting */
.filter-section::before {
    content: "Filter Produk";
    position: absolute;
    top: -15px;
    left: 50%;
    transform: translateX(-50%); /* Menyelaraskan teks ke tengah */
    background-color: #007bff; /* Warna latar belakang tag */
    color: #ffffff; /* Warna teks tag */
    padding: 6px 12px;
    border-radius: 5px;
    font-weight: 600;
    font-size: 14px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan untuk efek kedalaman */
}

    </style>
</head>
<body>

<!-- Toggle Button -->
<button class="toggle-btn" id="toggle-btn">☰</button>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <img src="logo.png" alt="Animers Craft Logo" class="logo-sidebar">
    <h2>Animers Craft</h2>
    <a href="index.php"><i class="bi bi-house"></i> Beranda</a>
    <a href="kelas.php"><i class="bi bi-calendar"></i> Kelas</a>
    <a href="produk.php"><i class="bi bi-box"></i> Produk</a>
    <a href="tentang.php"><i class="bi bi-info-circle"></i> Tentang Kami</a>
    <a href="video.php"><i class="bi bi-play-circle"></i> Video Tutorial</a>
</div>

<!-- Content -->
<div class="content" id="content">
    <!-- Hero Section -->
    <header class="hero-section text-center d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
            <img src="logo.png" alt="Animers Craft Logo" class="logo-header">
            <h1 class="display-4 animated-text">Produk Rajutan Tangan</h1>
            <p class="lead animated-text">Temukan Produk Terbaik Yang Sudah Kami Buat di Sini</p>
        </div>
    </header>
    
    <!-- Filter Section -->
    <div class="filter-section d-flex align-items-center mb-4">
        <select id="categoryFilter" class="form-select">
            <option value="">Semua Kategori</option>
            <option value="pakaian">Pakaian</option>
            <option value="aksesoris">Aksesoris</option>
            <option value="dekorasi rumah">Dekorasi Rumah</option>
            <option value="mainan">Mainan</option>
            <option value="lainnya">Lainnya</option>
        </select>
    </div>

    <!-- Products Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Daftar Produk</h2>
            <div class="row">
                <!-- Kotak khusus untuk produk yang bisa di-request -->
                <div class="col-md-4 mb-4">
                    <div class="card special-request-card">
                        <img src="khs.jpg" class="card-img-top" alt="Produk Khusus" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="khs.jpg">
                        <div class="card-body">
                            <h5 class="card-title special-request-title">Produk Khusus</h5>
                            <p class="card-text special-request-description">Produk ini tidak tersedia di katalog kami dan bisa di-request langsung. Hubungi kami untuk menyesuaikan spesifikasi sesuai kebutuhan Anda. Kami akan membuat produk sesuai dengan keinginan Anda!</p>
                            <a href="https://wa.me/62811604892?text=Halo,%20saya%20ingin%20untuk%20request%20produk%20dengan%20design%20khusus%20.Bisa%20tolong%20dibuatkan%20dalam%20bentuk%20[deskripsi bentuk yang diinginkan]?." target="_blank" class="btn btn-custom">Request Produk</a>
                        </div>
                    </div>
                </div>  
                <?php
                // Ambil kategori dari parameter GET jika ada
                $selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';

                // Buat query untuk produk
                $sql = "SELECT * FROM produk";
                if (!empty($selectedCategory)) {
                    $sql .= " WHERE kategori = '" . $conn->real_escape_string($selectedCategory) . "'";
                }
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-4 mb-4">';
                        echo '<div class="card">';

                        // Carousel untuk gambar/video produk
                        $gambarNames = explode(",", $row["gambar"]);
                        echo '<div id="carousel' . $row["id"] . '" class="carousel slide">';
                        echo '<div class="carousel-inner">';
                        $isActive = true;
                        foreach ($gambarNames as $gambar) {
                            $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));
                            echo '<div class="carousel-item ' . ($isActive ? 'active' : '') . '">';
                            if (in_array($ext, ['mp4'])) {
                                echo '<video controls src="uploads/' . $gambar . '"></video>';
                            } else {
                                echo '<img src="uploads/' . $gambar . '" data-src="uploads/' . $gambar . '" alt="' . htmlspecialchars($row["nama"]) . '" class="card-img-top">';
                            }
                            echo '</div>';
                            $isActive = false;
                        }
                        echo '</div>';
                        echo '<button class="carousel-control-prev" type="button" data-bs-target="#carousel' . $row["id"] . '" data-bs-slide="prev">';
                        echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                        echo '<span class="visually-hidden">Previous</span>';
                        echo '</button>';
                        echo '<button class="carousel-control-next" type="button" data-bs-target="#carousel' . $row["id"] . '" data-bs-slide="next">';
                        echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                        echo '<span class="visually-hidden">Next</span>';
                        echo '</button>';
                        echo '</div>';

                        // Detail produk
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . htmlspecialchars($row["nama"]) . '</h5>';
                        echo '<p class="card-text">' . htmlspecialchars($row["deskripsi"]) . '</p>';
                        echo '<p class="card-text">Rp ' . number_format($row["harga"], 3, ',', '.') . '</p>';

                        // Link untuk request produk
                        $waNumber = "62811604892";
                        $message = "Halo, saya tertarik untuk membeli produk " . urlencode($row["nama"]) . ". Apakah produk ini masih tersedia?";
                        $waLink = "https://wa.me/$waNumber?text=$message";
                        echo '<a href="' . $waLink . '" target="_blank" class="btn btn-custom">Beli</a>';

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-center">Tidak ada produk tersedia.</p>';
                }
                $conn->close();
                ?>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-3">
        <div class="container-fluid">
            <p class="mb-0">© 2024 Animers Craft. All rights reserved.</p>
            <div class="social-media-links">
                <a href="https://instagram.com/animers.craft?igsh=MXJpNTN3cTM4NWx0MA==" target="_blank"><i class="bi bi-instagram"></i></a>
                <a href="https://facebook.com/anita.akselrajut?mibextid=ZbWKwL" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="https://youtube.com/@animerscraft?si=9Nt85oblTVokBUkJ" target="_blank"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="productModalLabel">Detail Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="modalCarousel" class="carousel slide">
              <div class="carousel-inner">
                <!-- Gambar/video akan diisi di sini dengan JavaScript -->
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#modalCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#modalCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Script untuk Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script untuk menampilkan gambar atau video di modal -->
    <script>
    const toggleBtn = document.getElementById('toggle-btn');
    const sidebar = document.getElementById('sidebar');
    const content = document.querySelector('.content');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        content.classList.toggle('active');
    });

    document.addEventListener('click', (event) => {
        if (sidebar.classList.contains('active') && !sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
            sidebar.classList.remove('active');
            content.classList.remove('active');
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.card-img-top').forEach((img) => {
            img.addEventListener('click', function () {
                const modal = new bootstrap.Modal(document.getElementById('productModal'));
                const modalCarousel = document.getElementById('modalCarousel');
                const carouselInner = modalCarousel.querySelector('.carousel-inner');

                // Clear existing content
                carouselInner.innerHTML = '';

                // Get the carousel ID of the clicked image
                const imgSrc = img.dataset.src;
                const carouselId = img.closest('.carousel') ? img.closest('.carousel').id : '';

                // Add carousel items
                if (carouselId) {
                    document.querySelectorAll(`#${carouselId} .carousel-item`).forEach((item) => {
                        const clone = item.cloneNode(true);
                        carouselInner.appendChild(clone);
                    });
                } else {
                    // For images not in a carousel
                    const imgElement = document.createElement('div');
                    imgElement.classList.add('carousel-item', 'active');
                    imgElement.innerHTML = `<img src="${imgSrc}" class="d-block w-100" alt="Product Image">`;
                    carouselInner.appendChild(imgElement);
                }

                modal.show();
            });
        });

        // Set category filter value on page load
        const urlParams = new URLSearchParams(window.location.search);
        const selectedCategory = urlParams.get('category');
        if (selectedCategory) {
            document.getElementById('categoryFilter').value = selectedCategory;
        } else {
            document.getElementById('categoryFilter').value = '';
        }
    });

    document.getElementById('categoryFilter').addEventListener('change', function() {
        var selectedCategory = this.value;
        var url = new URL(window.location.href);
        if (selectedCategory) {
            url.searchParams.set('category', selectedCategory);
        } else {
            url.searchParams.delete('category');
        }
        window.location.href = url.toString();
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>

