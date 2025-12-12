<?php
include "../koneksi.php";
// Validasi input
if (empty($_POST['nama_barang']) || empty($_POST['harga'])) {
echo "Semua kolom harus diisi! <a href='../barang.php'>Kembali</a>";
exit;
}
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$sql = "INSERT INTO barang (nama_barang, harga) VALUES
('$nama_barang', $harga)";
if (mysqli_query($conn, $sql)) {
echo "Barang berhasil ditambahkan! <a href='../barang.php'>Kembali</a>";
} else {
echo "Error: " . mysqli_error($conn);}
?>