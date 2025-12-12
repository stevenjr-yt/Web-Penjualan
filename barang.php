<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Barang</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<header>
<h1>Kelola Barang</h1>
</header>
<section>
<form action="proses/tambah_barang.php" method="post"
class="form-tambah">
<label for="nama_barang">Nama Barang:</label>
<input type="text" id="nama_barang" name="nama_barang"
required>
<label for="harga">Harga:</label>
<input type="number" id="harga" name="harga" required>
<button type="submit">Tambah Barang</button>
</form>
<br>
<a href="index.php" class="menu-link">To Menu</a>
</section>
<section>
<h2>Daftar Barang</h2>
<table>
<thead>
<tr>
<th>ID</th>
<th>Nama Barang</th>
<th>Harga</th>
</tr>
</thead>
<tbody>
<?php
$result = mysqli_query($conn, "SELECT * FROM barang");
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>
<td>{$row['id_barang']}</td>
<td>{$row['nama_barang']}</td>
<td>{$row['harga']}</td>
</tr>";
}
?>
</tbody>
</table>
</section>
</div>
</body>
</html>