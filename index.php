<?php
    // Koneksi ke database
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "animers";

    // Membuat koneksi ke database
    $conn = new mysqli($host, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk kelas (menampilkan maksimal 3 kelas)
    $kelasSql = "SELECT * FROM kelas LIMIT 3";
    $kelasResult = $conn->query($kelasSql);

    // Query untuk produk (menampilkan maksimal 3 produk)
    $produkSql = "SELECT * FROM produk LIMIT 3";
    $produkResult = $conn->query($produkSql);
?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="logo.png">
            <title>Animers Craft</title>
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
        .contact-info {
            padding: 20px;
            background-color: #d0f0c0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
.contact-info {
        padding: 20px;
        background-color: #d0f0c0;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

    </style>
        </head>
        <body>
        <!-- Toggle Button -->
        <button class="toggle-btn" id="toggle-btn">☰</button>

        <!-- Sidebar -->
        <!-- Sidebar di index.php -->
        <div class="sidebar" id="sidebar">
        <img src="logo.png" alt="Animers Craft Logo" class="logo-sidebar">
        <h2>Animers Craft</h2>
        <a href="index.php"><i class="bi bi-house"></i> Beranda</a>
        <a href="kelas.php"><i class="bi bi-calendar"></i> Kelas</a>
        <a href="produk.php"><i class="bi bi-box"></i> Produk</a>
        <a href="tentang.php"><i class="bi bi-info-circle"></i> Tentang Kami</a>
        <a href="video.php"><i class="bi bi-play-circle"></i> Video Tutorial</a>
        </div>
        <div class="content" id="content">
            <!-- Hero Section -->
            <header class="hero-section">
        <div class="header-content">
            <img src="logo.png" alt="Animers Craft" class="logo-header">
            <h1>Animers Craft</h1>
            <p class="lead animated-text">Belajar Rajutan Tangan dari Ahlinya</p>
        </div>
    </header>


    <section id="classes" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Daftar Kelas</h2>
            <div class="row row-equal">
            <?php
if ($kelasResult->num_rows > 0) {
    while ($row = $kelasResult->fetch_assoc()) {
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card">';
        echo '<img src="uploads/' . htmlspecialchars($row["gambar"]) . '" class="card-img-top" alt="' . htmlspecialchars($row["gambar"]) . '" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="uploads/' . htmlspecialchars($row["gambar"]) . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($row["nama_kelas"]) . '</h5>';
        echo '<p class="card-text">' . htmlspecialchars($row["deskripsi"]) . '</p>';
        $waNumber = "62811604892"; // Ganti dengan nomor WhatsApp yang sesuai
        $message = "Halo, saya tertarik untuk mengikuti kelas " . urlencode($row["nama_kelas"]) . ". Apakah masih tersedia?";
        $waLink = "https://wa.me/$waNumber?text=$message";
        echo '<a href="' . $waLink . '" target="_blank" class="btn btn-custom">Daftar</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p class="text-center">Tidak ada kelas tersedia.</p>';
}
?>
            </div>
            <div class="text-center mt-4">
                <a href="kelas.php" class="btn btn-primary">Lihat Jadwal</a>
            </div>
        </div>
    </section>




            <section class="py-5">
                <div class="container">
                    <h2 class="text-center mb-5">Daftar Produk</h2>
                    <div class="row">
                    <?php
if ($produkResult->num_rows > 0) {
    while ($row = $produkResult->fetch_assoc()) {
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card">';
        $gambarNames = explode(",", $row["gambar"]);
        echo '<div id="carousel' . $row["id"] . '" class="carousel slide">';
        echo '<div class="carousel-inner">';

        $isActive = true;
        foreach ($gambarNames as $gambar) {
            $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));
            echo '<div class="carousel-item ' . ($isActive ? 'active' : '') . '">';
            if (in_array($ext, ['mp4'])) {
                echo '<video controls data-bs-toggle="modal" data-bs-target="#modalPreview" class="card-img-top" data-video-src="uploads/' . $gambar . '">
            <source src="uploads/' . $gambar . '" type="video/mp4">
          </video>';
            } else {
                // Tambahkan data-bs-toggle dan data-bs-target agar gambar bisa muncul di modal
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
        
        // Informasi Produk
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($row["nama"]) . '</h5>';
        echo '<p class="card-text">' . htmlspecialchars($row["deskripsi"]) . '</p>';
        echo '<p class="card-text">Rp ' . number_format($row["harga"], 3, ',', '.') . '</p>';
        
        // Button WhatsApp untuk pembelian
        $waNumber = "62811604892";
        $message = "Halo, saya tertarik untuk membeli produk " . urlencode($row["nama"]) . ". Apakah masih tersedia?";
        $waLink = "https://wa.me/$waNumber?text=$message";
        echo '<a href="' . $waLink . '" target="_blank" class="btn btn-custom">Beli</a>';
        
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p class="text-center">Tidak ada produk tersedia.</p>';
}
?>
                    </div>
                    <div class="text-center mt-4">
                <a href="produk.php" class="btn btn-primary">Lihat Selengkapnya</a>
            </div>
                </div>
            </section>

            <section id="contact" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5">Temukan Kami</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-info">
                            <h4>Alamat Toko</h4>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.9811595013202!2d98.63186069999999!3d3.5917952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312f0005035d71%3A0xe702e831df1f496d!2sSUMUT%20CREATIVE%20CENTRE!5e0!3m2!1sid!2sid!4v1726396942465!5m2!1sid!2sid"
                                    width="100%" 
                                    height="400" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="video-section">
                            <h4>Undangan Media TV untuk Animers Craft</h4>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/BTrk6wStiWg?si=NF9kKhIH-eSTfamT" allowfullscreen></iframe>
                            </div>
                            <p>Suatu kebanggaan bagi kami untuk membagikan momen ketika Animers Craft mendapatkan undangan istimewa untuk tampil di acara TV. .</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

            <footer class="py-3">
                <div class="container">
                    <p class="mb-0">© 2024 Animers Craft. All rights reserved.</p>
                    <div class="social-media-links">
                        <a href="https://instagram.com/animers.craft?igsh=MXJpNTN3cTM4NWx0MA==" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="https://facebook.com/anita.akselrajut?mibextid=ZbWKwL" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="https://youtube.com/@animerscraft?si=9Nt85oblTVokBUkJ" target="_blank"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </footer>
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body text-center">
      <video id="modalVideo" controls style="width: 100%; display: none;">
          <source id="videoSource" src="" type="video/mp4">
        </video>
        <img id="modalImage" src="" class="img-fluid" alt="Tampilan Gambar">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        <div class="modal-body">
        <div id="modalCarousel" class="carousel slide">
          <div class="carousel-inner">
            <!-- Gambar/video akan diisi di sini dengan JavaScript -->
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
        const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
    document.querySelectorAll('.card-img-top').forEach(img => {
        img.addEventListener('click', function () {
            const modalImage = document.getElementById('modalImage');
            modalImage.src = this.getAttribute('data-src');
            imageModal.show(); // Tampilkan modal setelah mengatur src
        });
        document.addEventListener('click', function (e) {
    if (e.target.matches('img[data-bs-toggle="modal"]')) {
        const src = e.target.getAttribute('src');
        document.getElementById('modalImage').src = src;
        document.getElementById('modalImage').style.display = 'block';
        document.getElementById('modalVideo').style.display = 'none';
    } else if (e.target.matches('video[data-bs-toggle="modal"]')) {
        const src = e.target.querySelector('source').getAttribute('src');
        document.getElementById('modalVideo').querySelector('source').src = src;
        document.getElementById('modalVideo').load();
        document.getElementById('modalVideo').style.display = 'block';
        document.getElementById('modalImage').style.display = 'none';
    }
});
    });

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <?php
        // Menutup koneksi
        $conn->close();
        ?>
    </body>
        </html>