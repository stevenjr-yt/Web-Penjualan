<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Penjualan</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include "koneksi.php";
?>
<div class="container">
<h1>Kelola Penjualan</h1>
<form action="proses/tambah_penjualan.php" method="post">
<label for="id_pelanggan">Pelanggan:</label>
<select id="id_pelanggan" name="id_pelanggan" required>
<option value="">-- Pilih Pelanggan --</option>
<?php
$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
while ($row = mysqli_fetch_assoc($pelanggan)) {
echo "<option
value='{$row['id_pelanggan']}'>{$row['nama_pelanggan']}</option>";
}
?>
</select><br>
<label for="id_barang">Barang:</label>
<select id="id_barang" name="id_barang" required>
<option value="">-- Pilih Barang --</option>
<?php
$barang = mysqli_query($conn, "SELECT * FROM barang");
while ($row = mysqli_fetch_assoc($barang)) {
echo "<option
value='{$row['id_barang']}'>{$row['nama_barang']}</option>";
}
?>
</select><br>
<label for="jumlah">Jumlah:</label>
<input type="number" id="jumlah" name="jumlah" required><br>
<button type="submit">Tambah Penjualan</button>
<br><br>
<a href="index.php">To Menu</a>
</form>
</div>
</body>
</html>