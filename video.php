<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>Video Tutorial - Animers Craft</title>
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
            text-align: center;
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
            cursor: pointer;
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
            background-color: #28a745;
            border-color: #28a745;
        }
        .card-body .btn-success {
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
        .contact-info, .video-festival {
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
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
            margin-bottom: 20px;
        }
        .video-section iframe {
            width: 100%;
            height: 310px;
        }
        .section-heading {
            margin-bottom: 30px;
        }
        .profile-section {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 30px;
            padding: 30px;
            background: #d0f0c0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background 0.3s, box-shadow 0.3s;
        }
        .profile-section:hover {
            background: #e0f7fa;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }
        .profile-info {
            display: flex;
            align-items: center;
        }
        .profile-info img {
            border-radius: 10px;
            width: 200px;
            height: 200px;
            object-fit: cover;
            margin-right: 20px;
        }
        .row-equal {
            display: flex;
            flex-wrap: wrap;
        }
        .video-festival {
            background-color: #d0f0c0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            height: 390px;
            width: 100%;
            max-width: 100%;
            margin: 10px 0;
        }
        .video-festival video {
            width: 505px;
            height: 300px;
            object-fit: cover;
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
        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            animation: slideIn 2s ease-out, colorChange 3s infinite;
        }
        .logo-header {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
            border-radius: 50%;
            position: relative;
            box-shadow: 0 0 10px 5px rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: glowing 3s infinite alternate;
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
            box-shadow: 0 0 40px 20px rgba(255, 255, 255, 0.8);
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
    <header class="hero-section">
        <div class="header-content">
            <img src="logo.png" alt="Animers Craft" class="logo-header">
            <h1>Video Tutorial</h1>
            <p class="lead animated-text">Jelajahi koleksi video tutorial kami dan pelajari keterampilan baru dengan cara yang menyenangkan dan interaktif. Temukan lebih banyak di channel YouTube kami!</p>
        </div>
    </header>
    
    <!-- Video Tutorial Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-heading text-center">Video Tutorial</h2>
            <div class="row row-equal">
                <div class="col-md-6">
                    <div class="video-section">
                        <iframe src="https://www.youtube.com/embed/Z_PKFdypC6M?si=NvuDKxEDdFCd9DmJ" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="video-section">
                        <iframe src="https://www.youtube.com/embed/3xfpETX_v-c?si=BoaM35jqceuv1bvO" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="video-section">
                        <iframe src="https://www.youtube.com/embed/YDA2H19HgNM?si=Ab00-8MD20Sqvqzn" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="video-section">
                        <iframe src="https://www.youtube.com/embed/WYJkb-6deWQ?si=Fp5dszbvW1xN1iMX" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>Untuk menonton lebih banyak video tutorial, kunjungi <a href="https://youtube.com/@animerscraft?si=9Nt85oblTVokBUkJ" target="_blank" class="btn btn-custom">Channel YouTube kami</a></p>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
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

    <!-- Modal -->
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

        const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
        document.querySelectorAll('.card-img-top').forEach(img => {
            img.addEventListener('click', function () {
                const modalImage = document.getElementById('modalImage');
                modalImage.src = this.getAttribute('data-src');
                imageModal.show();
            });
        });
    </script>
</body>
</html>
