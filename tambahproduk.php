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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $harga = $_POST["harga"];
    $kategori = $_POST["kategori"]; // Ambil input kategori
    $target_dir = "uploads/";

    // Validasi kategori
    if (empty($kategori)) {
        echo "<div class='alert alert-danger'>Kategori harus dipilih.</div>";
        exit;
    }

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $fileNames = [];
    $uploadOk = true;

    if (!empty($_FILES["files"]["name"][0])) {
        foreach ($_FILES["files"]["name"] as $key => $file) {
            $target_file = $target_dir . basename($file);
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["files"]["tmp_name"][$key]) ?: ['mime' => mime_content_type($_FILES["files"]["tmp_name"][$key])];
            $fileSize = $_FILES["files"]["size"][$key];

            if (!$check || ($check['mime'] !== 'image/jpeg' && $check['mime'] !== 'image/png' && $check['mime'] !== 'video/mp4')) {
                echo "<div class='alert alert-danger'>File bukan gambar atau video.</div>";
                $uploadOk = false;
                break;
            }

            if ($fileSize > 10485760) {
                echo "<div class='alert alert-danger'>Ukuran file tidak boleh lebih dari 10MB.</div>";
                $uploadOk = false;
                break;
            }

            if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $target_file)) {
                $fileNames[] = $file;
            } else {
                echo "<div class='alert alert-danger'>Gagal mengunggah file.</div>";
                $uploadOk = false;
                break;
            }
        }
    }

    if ($uploadOk) {
    $fileNamesString = implode(",", $fileNames);
    $sql = "INSERT INTO produk (nama, deskripsi, harga, kategori, gambar) VALUES ('$nama', '$deskripsi', '$harga', '$kategori', '$fileNamesString')";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke tampilproduk.php setelah sukses
        header("Location: tampilproduk.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}


    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Animers Craft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 60px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: 600;
            color: #343a40;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #003d7a);
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            border-radius: 8px;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        @media (max-width: 767.98px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="mb-4">Tambah Produk</h2>
        <form action="tambahproduk.php" method="post" enctype="multipart/form-data">
        <form action="tambahproduk.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" step="0.01" required>
    </div>
    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select class="form-control" id="kategori" name="kategori" required>
            <option value="">Pilih Kategori</option>
            <option value="Pakaian">Pakaian</option>
            <option value="Aksesoris">Aksesoris</option>
            <option value="Perlengkapan Rumah">Dekorasi Rumah</option>
            <option value="Mainan">Mainan</option>
            <option value="Lainny">Lainnya</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar dan Video (maksimal 10 file, ukuran maksimum 10 MB per file)</label>
        <input type="file" class="form-control" id="gambar" name="files[]" multiple accept="image/*,video/*" required>
        <small class="form-text text-muted">Anda dapat mengunggah gambar dan video.</small>
    </div>
    <div class="d-flex justify-content-between">
        <a href="tampilproduk.php" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Tambah Produk</button>
    </div>
</form>

            </div>
        </form>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Animers Craft. Semua Hak Cipta Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
