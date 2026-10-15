<?php
include 'koneksi.php';

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM kamar WHERE id='$id'");
    header("Location: index.php");
    exit();
}

$result = mysqli_query($koneksi, "SELECT * FROM kamar ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kamar Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container bg-white p-4 rounded shadow-sm">
        <h2 class="text-dark fw-bold mb-3">Daftar Kamar Kos</h2>
        <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Kamar</a>

        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Tipe Kamar</th>
                    <th>Ukuran</th>
                    <th>Harga Sewa</th>
                    <th>Fasilitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) : 
                ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="fw-bold"><?= htmlspecialchars($row['tipe_kamar']); ?></td>
                    <td><?= htmlspecialchars($row['ukuran']); ?></td>
                    <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                    <td><?= htmlspecialchars($row['fasilitas']); ?></td>
                    <td class="text-center">
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?hapus=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data kamar ini?')" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>