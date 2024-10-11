<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "animers";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM produk WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $harga = $_POST["harga"];
    $kategori = $_POST["kategori"];

    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Tangani penghapusan gambar
    if (isset($_POST["hapus_gambar"])) {
        $hapusGambar = $_POST["hapus_gambar"];
        $existingImages = explode(",", $product['gambar']);
        foreach ($hapusGambar as $fileToDelete) {
            if (in_array($fileToDelete, $existingImages)) {
                unlink($target_dir . $fileToDelete); // Hapus file dari server
                $existingImages = array_diff($existingImages, [$fileToDelete]); // Hapus dari array
            }
        }
        $mediaNames = $existingImages;
    } else {
        $mediaNames = isset($_POST["existing_images"]) ? explode(",", $_POST["existing_images"]) : [];
    }

    // Proses file gambar dan video baru
    if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"][0] != 4) {
        foreach ($_FILES["gambar"]["name"] as $key => $file) {
            $target_file = $target_dir . basename($file);
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["gambar"]["tmp_name"][$key]);
            $fileSize = $_FILES["gambar"]["size"][$key];

            // Cek apakah file adalah gambar atau video
            if ($check === false && !in_array($fileType, ['mp4', 'avi', 'mov'])) {
                echo "<div class='alert alert-danger'>File bukan gambar atau video.</div>";
                continue;
            }

            // Cek ukuran file (max 10MB)
            if ($fileSize > 10485760) {
                echo "<div class='alert alert-danger'>Ukuran file tidak boleh lebih dari 10MB.</div>";
                continue;
            }

            // Jika tidak ada masalah, lanjutkan unggah file
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"][$key], $target_file)) {
                $mediaNames[] = $file;
            } else {
                echo "<div class='alert alert-danger'>Gagal mengunggah file.</div>";
            }
        }
    }

    // Gabungkan nama file yang diunggah
    $mediaNamesString = implode(",", $mediaNames);

    // Update data produk
    $sql = "UPDATE produk SET nama='$nama', deskripsi='$deskripsi', harga='$harga', kategori='$kategori', gambar='$mediaNamesString' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: tampilproduk.php");
        exit();
        echo "<div class='alert alert-success'>Produk berhasil diperbarui!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Daftar kategori tetap
$categories = ['Pakaian', 'Aksesoris', 'Dekorasi Rumah', 'Mainan', 'Lainnya'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Animers Craft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
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
        .media-list {
            margin-top: 20px;
        }
        .media-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            padding: 10px;
            background-color: #f8f9fa;
        }
        .media-item img, .media-item video {
            max-width: 150px;
            max-height: 100px;
            margin-right: 15px;
        }
        .media-item .media-info {
            flex: 1;
        }
        .media-item input[type="checkbox"] {
            margin-right: 10px;
        }
        .media-item label {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Edit Produk</h2>
        <form action="editproduk.php?id=<?php echo $product['id']; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($product['nama']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo htmlspecialchars($product['deskripsi']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" step="0.01" value="<?php echo htmlspecialchars($product['harga']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select id="kategori" name="kategori" class="form-select" required>
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo htmlspecialchars($category); ?>" <?php echo ($category === $product['kategori']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Unggah Gambar dan Video Baru (opsional)</label>
                <input type="file" class="form-control" id="gambar" name="gambar[]" multiple accept="image/*,video/*">
                <input type="hidden" name="existing_images" value="<?php echo htmlspecialchars($product['gambar']); ?>">
            </div>
            <h3>Gambar dan Video Saat Ini</h3>
            <div class="media-list">
                <?php
                $media = explode(",", $product['gambar']);
                foreach ($media as $m) {
                    if (!empty($m)) {
                        $ext = strtolower(pathinfo($m, PATHINFO_EXTENSION));
                        echo '<div class="media-item">';
                        if (in_array($ext, ['mp4', 'avi', 'mov'])) {
                            echo '<video controls><source src="uploads/' . htmlspecialchars($m) . '" type="video/' . $ext . '"></video>';
                        } else {
                            echo '<img src="uploads/' . htmlspecialchars($m) . '" alt="Gambar Produk">';
                        }
                        echo '<div class="media-info">';
                        echo '<input type="checkbox" name="hapus_gambar[]" value="' . htmlspecialchars($m) . '">';
                        echo '<label>Hapus</label>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <a href="tampilproduk.php" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <footer class="text-center py-3">
        <p>&copy; 2024 Animers Craft. Semua Hak Cipta Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
