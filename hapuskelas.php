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

$id = $_GET["id"];

// Ubah 'file' menjadi nama kolom yang benar, misalnya 'gambar'
$sql = "SELECT gambar FROM kelas WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $gambar = $row["gambar"];
    
    // Hapus file dari direktori uploads
    $file_path = 'uploads/' . $gambar;
    if (file_exists($file_path)) {
        unlink($file_path);
    }
}

// Hapus kelas dari database
$sql = "DELETE FROM kelas WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Kelas berhasil dihapus!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Kelas - UMKM Rajutan Tangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
        footer {
            background: #343a40;
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
        <h2>Kelas Telah Dihapus</h2>
        <p>Kelas dengan ID <?php echo htmlspecialchars($id); ?> telah berhasil dihapus.</p>
        <a href="tampilkelas.php" class="btn btn-primary">Kembali ke Daftar Kelas</a>
    </div>

    <footer>
        <p>&copy; 2024 UMKM Rajutan Tangan. Semua Hak Cipta Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
