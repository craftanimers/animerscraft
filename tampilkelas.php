<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Jika belum login, arahkan ke halaman login
    header("Location: login.php");
    exit;
}

// Koneksi ke database
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
    <title>Admin Dashboard - Animers Craft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f5f7;
        }
        .sidebar {
            width: 260px;
            background-color: #343a40;
            position: fixed;
            height: 100%;
            color: white;
            padding: 20px 15px;
            transition: width 0.3s;
        }
        .sidebar .logo {
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar .nav-link {
            color: white;
            margin: 10px 0;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            border-radius: 8px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .sidebar .nav-link i {
            margin-right: 12px;
            font-size: 18px;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
            transform: scale(1.02);
        }
        .content {
            margin-left: 260px;
            padding: 30px;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            overflow: hidden;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: opacity 0.3s;
        }
        .card-body {
            padding: 20px;
        }
        .btn-edit, .btn-delete {
            margin: 5px;
        }
        .btn-edit {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }
        .btn-edit:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }
        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
        }
        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: calc(100% - 260px);
            margin-left: 260px;
        }
        .modal-content {
            border-radius: 12px;
        }
        .modal-body img {
            border-radius: 12px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            Animers Craft
        </div>
        <a href="tampilproduk.php" class="nav-link"><i class="fas fa-boxes"></i> Produk</a>
        <a href="tambahproduk.php" class="nav-link"><i class="fas fa-plus"></i> Tambah Produk</a>
        <a href="tampilkelas.php" class="nav-link"><i class="fas fa-chalkboard-teacher"></i> Kelas</a>
        <a href="tambahkelas.php" class="nav-link"><i class="fas fa-plus"></i> Tambah Kelas</a>
        <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Content -->
    <div class="content">
        <h2 class="mb-4">Daftar Kelas</h2>
        
        <div class="row">
            <?php
            $sql = "SELECT * FROM kelas";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="uploads/' . htmlspecialchars($row["gambar"]) . '" class="card-img-top" alt="' . htmlspecialchars($row["gambar"]) . '" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="uploads/' . htmlspecialchars($row["gambar"]) . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row["nama_kelas"]) . '</h5>';
                    echo '<p class="card-text">' . htmlspecialchars($row["deskripsi"]) . '</p>';
                    echo '<p class="card-text">Hari: ' . htmlspecialchars($row["hari"]) . '</p>';
                    echo '<p class="card-text">Waktu: ' . htmlspecialchars($row["waktu"]) . '</p>';
                    echo '<a href="editkelas.php?id=' . $row["id"] . '" class="btn btn-warning btn-edit"><i class="fas fa-edit"></i> Edit</a>';
                    echo '<a href="hapuskelas.php?id=' . $row["id"] . '" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i> Hapus</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center">Tidak ada kelas tersedia.</p>';
            }
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Animers Craft. Semua Hak Cipta Dilindungi.</p>
    </footer>

    <!-- Modal Gambar -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Gambar Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid" alt="Gambar Kelas">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.card-img-top').forEach(img => {
            img.addEventListener('click', () => {
                const src = img.getAttribute('data-src');
                document.getElementById('modalImage').setAttribute('src', src);
            });
        });
    </script>
</body>
</html>
