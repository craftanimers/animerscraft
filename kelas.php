<?php
// Koneksi ke database
$host = "localhost"; // Ganti dengan nama host Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "animers"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menangani pencarian dan filter
$searchQuery = "";
$hariFilter = "";
$whereClause = "";

if (isset($_GET['search'])) {
    $searchQuery = $conn->real_escape_string($_GET['search']);
    $whereClause .= " WHERE nama_kelas LIKE '%$searchQuery%'";
}

if (isset($_GET['hari'])) {
    $hariFilter = $conn->real_escape_string($_GET['hari']);
    if ($whereClause) {
        $whereClause .= " AND hari = '$hariFilter'";
    } else {
        $whereClause .= " WHERE hari = '$hariFilter'";
    }
}

// Query untuk kelas
$kelasSql = "SELECT * FROM kelas" . $whereClause;
$kelasResult = $conn->query($kelasSql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>Daftar Kelas - Animers Craft</title>
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
                border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        height: 100%;
        text-align: center; /* Menyusun teks di tengah */
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
                height: 310px;
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
</div>
<div class="content" id="content">
        <!-- Hero Section -->
        <header class="hero-section text-center d-flex align-items-center">
    <div class="overlay"></div>
    <div class="container">
        <img src="logo.png" alt="Animers Craft Logo" class="logo-header">
        <h1 class="display-4 animated-text">Kelas Rajut Kreatif</h1>
        <p class="lead animated-text">Eksplorasi dunia rajutan dengan menciptakan berbagai aksesori dan dekorasi yang unik dan kreatif.</p>
    </div>
</header>
<div class="content" id="content">
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
                    echo '<p class="card-text">Hari: ' . htmlspecialchars($row["hari"]) . '</p>';
                    echo '<p class="card-text">Waktu: ' . htmlspecialchars($row["waktu"]) . '</p>';

                    // Button WhatsApp untuk mendaftar kelas
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
    </div>
</section>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <img id="modalImage" src="" class="img-fluid" alt="Gambar Produk">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
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
        <!-- Script untuk Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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

    document.addEventListener('DOMContentLoaded', () => {
    // Inisialisasi modal
    const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));

    // Menambahkan event listener untuk gambar
    document.querySelectorAll('.card-img-top').forEach(img => {
        img.addEventListener('click', function () {
            // Mengatur src gambar di modal
            const modalImage = document.getElementById('modalImage');
            modalImage.src = this.getAttribute('data-src');
            imageModal.show(); // Tampilkan modal setelah mengatur src
        });
    });
});

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
