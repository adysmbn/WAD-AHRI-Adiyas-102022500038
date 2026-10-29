<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipe_kamar = $_POST['tipe_kamar'];
    $ukuran     = $_POST['ukuran'];
    $harga      = $_POST['harga'];
    $fasilitas  = $_POST['fasilitas'];

    $query = "INSERT INTO kamar (tipe_kamar, ukuran, harga, fasilitas) VALUES ('$tipe_kamar', '$ukuran', '$harga', '$fasilitas')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kamar Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 600px;">
        <h2 class="text-dark fw-bold mb-3">Form Tambah Kamar</h2>
        <form action="tambah.php" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Tipe Kamar:</label>
                <input type="text" class="form-control" name="tipe_kamar" placeholder="Contoh: Reguler / VIP" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Ukuran Ruangan:</label>
                <input type="text" class="form-control" name="ukuran" placeholder="Contoh: 3 x 4 m" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Harga Sewa:</label>
                <input type="number" class="form-control" name="harga" placeholder="Contoh: 800000" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Fasilitas:</label>
                <textarea class="form-control" name="fasilitas" rows="3" placeholder="Contoh: Kasur, Lemari, AC" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Kamar</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>