<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>Tentang Kami - Animers Craft</title>
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
            .contact-info, .video-festival {
    height: 400px; /* Sesuaikan tinggi yang diinginkan */
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
    background-color: #d0f0c0; /* Warna kotak */
    border-radius: 8px; /* Sudut membulat */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    padding: 20px; /* Ruang dalam */
    height: 390px; /* Tinggi otomatis menyesuaikan */
    width: 100%; /* Lebar penuh */
    max-width: %; /* Lebar maksimum untuk memastikan responsif */
    margin: 10px 0; /* Jarak atas dan bawah */
}
.video-festival video {
    width: 100%;  /* Lebar video mengikuti lebar kontainer */
    height: 400px;  /* Tinggi video diperpanjang */
    object-fit: cover;  /* Menjaga proporsi dan memotong bagian yang tidak sesuai */
    border-radius: 8px; /* Memberikan sudut yang lebih halus, opsional */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Memberikan bayangan halus, opsional */
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

    <button class="toggle-btn" id="toggle-btn">☰</button>

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
        <h1>Animers Craft</h1>
    </div>
</header>



        <!-- About Us Section -->
        <section class="py-5">
            <div class="container">
                <h2 class="section-heading text-center">Tentang Animers Craft</h2>
                <p>
                    <strong>Animers Craft</strong> adalah sebuah usaha kerajinan tangan yang didirikan dari kecintaan mendalam terhadap seni rajut. Kami memulai perjalanan dari hobi pribadi menjadi sebuah bisnis dengan tujuan menghadirkan produk-produk rajut yang berkualitas tinggi dan penuh kreativitas.
                </p>
                <p>
                    Kami berkomitmen untuk menciptakan produk yang tidak hanya indah tetapi juga menginspirasi dan memberikan pengalaman yang memuaskan kepada pelanggan kami. Setiap produk yang kami buat dirancang dengan penuh perhatian dan detail, mencerminkan kecintaan kami terhadap seni rajut dan animasi.
                </p>
            </div>
        </section>

        <!-- Profile Section -->
        <section class="py-5 bg-light">
            <div class="container profile-section">
                <div class="profile-info">
                    <img src="ibu.jpeg" alt="Pemilik Animers Craft">
                    <div class="profile-details">
                        <h2>Anita M Simamora</h2>
                        <p><strong>Jabatan:</strong> Pemilik dan Pengrajin Utama</p>
                        <p><strong>Alamat:</strong> Jl.Karya Mesjid No.47 A,Desa/Kelurahan Sei Agul,Kec.Medan Barat,Kota Medan,Provinsi Sumatera Utara </p>
                        <p><strong>Email:</strong> animerscraft@gmail.com</p>
                        <p><strong>Telepon:</strong> +62 811-604-892</p>
                        <p><strong>Nomor Induk Berusaha:</strong> 0220108252256</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
        <div class="container">
                <h2 class="section-heading text-center">Sejarah Singkat</h2>
                <p>Berawal dari sebuah pelajaran seni di bangku SD, "Pondok Kreatif Anita" lahir sebagai wujud kecintaan terhadap dunia kreatif. Seiring waktu, kegemaran ini terus berkembang. Hingga akhirnya, bertemu dengan komunitas yang sejalan mengubah hobi menjadi peluang bisnis. Transformasi ini melahirkan "Animers Craft", sebuah brand yang tidak hanya menciptakan karya, tetapi juga membawa semangat untuk menjadikan kreativitas sebagai sumber penghasilan.
                </p>
                <p>Kini, Animers Craft tidak hanya fokus pada pembuatan produk kreatif, tapi juga berbagi ilmu dengan membuka kelas merajut. Semua kalangan, mulai dari pemula hingga yang sudah berpengalaman, dapat ikut belajar dan mengasah keterampilan merajut. Kami percaya bahwa kreativitas tidak memiliki batasan, dan siapa pun bisa berkarya!

</p>
<p>Dengan dedikasi dan semangat pantang menyerah, Animers Craft terus berinovasi, memberikan karya-karya yang unik dan penuh cinta, serta membuka pintu bagi siapa saja yang ingin 
Tentu, berikut adalah revisi copywriting yang menambahkan informasi tentang kelas merajut:
</p>
<p>
Dari "Pondok Kreatif Anita" Menjadi "Animers Craft": Perjalanan Kreativitas yang Menginspirasi
</p>
<p>
Berawal dari sebuah pelajaran seni di bangku SD, "Pondok Kreatif Anita" lahir sebagai wujud kecintaan terhadap dunia kreatif. Seiring waktu, kegemaran ini terus berkembang. Hingga akhirnya, bertemu dengan komunitas yang sejalan mengubah hobi menjadi peluang bisnis. Transformasi ini melahirkan "Animers Craft", sebuah brand yang tidak hanya menciptakan karya, tetapi juga membawa semangat untuk menjadikan kreativitas sebagai sumber penghasilan.
</p>
<p>Kini, Animers Craft tidak hanya fokus pada pembuatan produk kreatif, tapi juga berbagi ilmu dengan membuka kelas merajut. Semua kalangan, mulai dari pemula hingga yang sudah berpengalaman, dapat ikut belajar dan mengasah keterampilan merajut. Kami percaya bahwa kreativitas tidak memiliki batasan, dan siapa pun bisa berkarya!
</p>
<p>Dengan dedikasi dan semangat pantang menyerah, Animers Craft terus berinovasi, memberikan karya-karya yang unik dan penuh cinta, serta membuka pintu bagi siapa saja yang ingin belajar!</p>
</section>
       

        <section id="contact" class="py-5">
    <div class="container">
        <div class="row">
            <!-- Alamat Rumah -->
            <div class="col-md-6 d-flex align-items-start">
                <div class="contact-info w-100">
                    <h4>Alamat Rumah</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3981.8910373868503!2d98.65343877497324!3d3.6123945963617006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zM8KwMzYnNDQuNiJOIDk4wrAzOScyMS43IkU!5e0!3m2!1sid!2sid!4v1726665174040!5m2!1sid!2sid"
                            width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>

            <!-- Video Festival -->
            <div class="col-md-6 d-flex align-items-start">
                <div class="video-festival w-100">
                    <h4>Festival UMKM</h4>
                    <video controls>
                        <source src="anim.MP4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
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
            imageModal.show(); // Tampilkan modal setelah mengatur src
        });
    });

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
