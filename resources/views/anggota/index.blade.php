<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Anggota</title>
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<div class="d-flex justify-content-between align-items-center mb-4">
<h2>Daftar Anggota & Kartu Perpus (One-to-One)</h2>
<div>
<a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah
Anggota</a>
<a href="{{ route('anggota.index') }}" class="btn btn-outline-secondary">Ke
Data Penulis (One-to-Many)</a>
</div>
</div>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>No</th>
<th>Nama Anggota</th>
<th>Email</th>
<th>No. Kartu Anggota</th>
<th>Tanggal Aktivasi</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@forelse($anggotas as $index => $anggota)
<tr>
<td>{{ $index + 1 }}</td>
<td>{{ $anggota->nama }}</td>
<td>{{ $anggota->email }}</td>
<td><span class="badge bg-info text-dark">{{ $anggota->kartuAnggota-
>nomor_kartu ?? '-' }}</span></td>
<td>{{ $anggota->kartuAnggota->tanggal_aktivasi ?? '-' }}</td>
<td>
<a href="{{ route('anggota.edit', $anggota->id) }}" class="btn
btn-warning btn-sm">Edit</a>
<form action="{{ route('anggota.destroy', $anggota->id) }}"
method="POST" class="d-inline"
onsubmit="return confirm('Hapus anggota ini?')">
@csrf @method('DELETE')
<button class="btn btn-danger btn-sm">Hapus</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="6" class="text-center">Belum ada data anggota.</td>
</tr>
@endforelse
</tbody>
</table>
</body>
</html>
