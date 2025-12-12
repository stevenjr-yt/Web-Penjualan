<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Pelanggan</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<h1>Kelola Pelanggan</h1>
<form action="proses/tambah_pelanggan.php" method="post">
<label for="nama_pelanggan">Nama Pelanggan:</label>
<input type="text" id="nama_pelanggan" name="nama_pelanggan"
required><br>
<label for="alamat">Alamat:</label>
<input type="text" id="alamat" name="alamat" required><br>
<button type="submit">Tambah Pelanggan</button>
<br><br>
<a href="index.php">To Menu</a>
</form>
</div>
</body>
</html>