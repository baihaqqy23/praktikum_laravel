<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Anggota</title>
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<div class="card p-4 shadow-sm" style="max-width: 600px; margin: auto;">
<h3 class="mb-4">Edit Registrasi Anggota</h3>
@if($errors->any())
<div class="alert alert-danger">
<ul>@foreach($errors->all() as $error) <li>{{ $error }}</li>
@endforeach</ul>
</div>
@endif
<form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
@csrf @method('PUT')
<h5 class="text-secondary border-bottom pb-2">Informasi Diri</h5>
<div class="mb-3">
<label class="form-label">Nama Lengkap</label>
<input type="text" name="nama" class="form-control" value="{{ old('nama',
$anggota->nama) }}" required>
</div>
<div class="mb-3">
<label class="form-label">Alamat Email</label>
<input type="email" name="email" class="form-control" value="{{
old('email', $anggota->email) }}"
required>
</div>
<h5 class="text-secondary border-bottom pb-2 mt-4">Informasi Kartu
Anggota</h5>
<div class="mb-3">
<label class="form-label">Nomor Kartu</label>
<input type="text" name="nomor_kartu" class="form-control"
value="{{ old('nomor_kartu', $anggota->kartuAnggota->nomor_kartu ??
'') }}" required>
</div>
<div class="mb-3">
<label class="form-label">Tanggal Aktivasi</label>
<input type="date" name="tanggal_aktivasi" class="form-control"
value="{{ old('tanggal_aktivasi', $anggota->kartuAnggota-
>tanggal_aktivasi ?? '') }}" required>
</div>
<div class="mt-4">
<button type="submit" class="btn btn-warning">Perbarui</button>
<a href="{{ route('anggota.index') }}" class="btn btnsecondary">Kembali</a>
</div>
</form>
</div>
</body>
</html>