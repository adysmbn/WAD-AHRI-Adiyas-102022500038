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
        <a href="{{ route('kamar.create') }}" class="btn btn-success mb-3">+ Tambah Kamar</a>

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
                @foreach ($kamars as $index => $row)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="fw-bold">{{ $row->tipe_kamar }}</td>
                    <td>{{ $row->ukuran }}</td>
                    <td>Rp {{ number_format($row->harga, 0, ',', '.') }}</td>
                    <td>{{ $row->fasilitas }}</td>
                    <td class="text-center">
                        <form action="{{ route('kamar.destroy', $row->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data kamar ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>