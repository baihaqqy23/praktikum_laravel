<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Mahasiswa</title>
</head>
<body>
<h1>Tambah Mahasiswa</h1>
<form action="/mahasiswa/store" method="POST">
@csrf
Nama : <input type="text" name="nama"><br><br>
Nim : <input type="text" name="nim"><br><br>
Jurusan : <input type="text" name="jurusan"><br><br>
<button type="submit">Simpan</button>
</form>
</body>
</html>
