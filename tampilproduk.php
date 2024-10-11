<?php
session_start(); // Pastikan ini hanya dipanggil sekali

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
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
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            position: fixed;
            height: 100%;
            color: white;
            padding: 15px 0;
            transition: width 0.3s;
        }
        .sidebar .logo {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            padding: 15px 0;
            margin-bottom: 20px;
        }
        .sidebar .nav-link {
            color: white;
            margin: 10px 0;
            padding: 10px 20px;
            display: block;
            transition: background-color 0.2s;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
            border-radius: 5px;
        }
        .content {
            margin-left: 250px;
            padding: 30px;
            min-height: 100vh;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .card img, .card video {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
            cursor: pointer;
        }
        .card-body {
            padding: 15px;
        }
        .btn-edit, .btn-delete {
            margin: 5px;
        }
        .btn-edit {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-edit:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: calc(100% - 250px);
            margin-left: 250px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">Animers Craft</div>
        <a href="tampilproduk.php" class="nav-link"><i class="fas fa-boxes"></i> Produk</a>
        <a href="tambahproduk.php" class="nav-link"><i class="fas fa-plus"></i> Tambah Produk</a>
        <a href="tampilkelas.php" class="nav-link"><i class="fas fa-chalkboard-teacher"></i> Kelas</a>
        <a href="tambahkelas.php" class="nav-link"><i class="fas fa-plus"></i> Tambah Kelas</a>
        <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Content -->
    <div class="content">
        <h2 class="mb-4">Daftar Produk</h2>

        <div class="row">
            <?php
            $sql = "SELECT * FROM produk";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
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
                            echo '<video controls><source src="uploads/' . $gambar . '" type="video/mp4"></video>';
                        } else {
                            echo '<img src="uploads/' . $gambar . '" alt="' . htmlspecialchars($row["nama"]) . '">';
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
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row["nama"]) . '</h5>';
                    echo '<p class="card-text">' . htmlspecialchars($row["deskripsi"]) . '</p>';
                    echo '<p class="card-text">Rp ' . number_format($row["harga"], 3, ',', '.') . '</p>';
                    echo '<a href="editproduk.php?id=' . $row["id"] . '" class="btn btn-warning btn-edit"><i class="fas fa-edit"></i> Edit</a>';
                    echo '<a href="hapusproduk.php?id=' . $row["id"] . '" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i> Hapus</a>';
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

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 UMKM Rajutan Tangan. Semua Hak Cipta Dilindungi.</p>
    </footer>

    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
