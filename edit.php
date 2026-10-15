<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit();
}

$query_data = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id='$id'");
$data = mysqli_fetch_assoc($query_data);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipe_kamar = $_POST['tipe_kamar'];
    $ukuran     = $_POST['ukuran'];
    $harga      = $_POST['harga'];
    $fasilitas  = $_POST['fasilitas'];

    $update = "UPDATE kamar SET tipe_kamar='$tipe_kamar', ukuran='$ukuran', harga='$harga', fasilitas='$fasilitas' WHERE id='$id'";
    if (mysqli_query($koneksi, $update)) {
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kamar Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 600px;">
        <h2 class="text-dark fw-bold mb-3">Edit Data Kamar</h2>
        <form action="edit.php?id=<?= $id; ?>" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Tipe Kamar:</label>
                <input type="text" class="form-control" name="tipe_kamar" value="<?= htmlspecialchars($data['tipe_kamar']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Ukuran Ruangan:</label>
                <input type="text" class="form-control" name="ukuran" value="<?= htmlspecialchars($data['ukuran']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Harga Sewa:</label>
                <input type="number" class="form-control" name="harga" value="<?= htmlspecialchars($data['harga']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Fasilitas:</label>
                <textarea class="form-control" name="fasilitas" rows="3" required><?= htmlspecialchars($data['fasilitas']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Perbarui Kamar</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>