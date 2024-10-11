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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kelas = $_POST["nama_kelas"];
    $deskripsi = $_POST["deskripsi"];
    $hari = $_POST["hari"]; // Gunakan variabel $hari
    $waktu = $_POST["waktu"];
    $gambar = $_FILES["gambar"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($gambar);

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $sql = "INSERT INTO kelas (nama_kelas, deskripsi, hari, waktu, gambar) VALUES ('$nama_kelas', '$deskripsi', '$hari', '$waktu', '$gambar')";

    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Redirect ke tampilkelas.php setelah sukses menambah kelas
            header("Location: tampilkelas.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Gagal mengunggah gambar.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas - Animers Craft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e9ecef;
        }
        .container {
            max-width: 700px;
            margin-top: 60px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 80px;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="mb-4">Tambah Kelas</h2>
        <form action="tambahkelas.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <input type="text" class="form-control" id="hari" name="hari" required>
            </div>
            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="time" class="form-control" id="waktu" name="waktu" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <div class="d-flex justify-content-between">
                <a href="tampilkelas.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah Kelas</button>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Animers Craft. Semua Hak Cipta Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
