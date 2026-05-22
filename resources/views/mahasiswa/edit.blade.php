<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Mahasiswa</title>
</head>
<body>
<h1>Edit Mahasiswa</h1>
<form action="/mahasiswa/update/{{ $m->id }}" method="POST">
@csrf
Nama: <input type="text" name="nama" value="{{ $m->nama }}"><br>
NIM: <input type="text" name="nim" value="{{ $m->nim }}"><br>
Jurusan: <input type="text" name="jurusan" value="{{ $m->jurusan }}"><br>
<button type="submit">Update</button>
</form>
</body>
</html>