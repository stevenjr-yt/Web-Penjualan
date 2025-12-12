<?php
include "../koneksi.php";
// Validasi input
if (empty($_POST['id_pelanggan']) || empty($_POST['id_barang']) ||
empty($_POST['jumlah'])) {
echo "Semua kolom harus diisi! <a href='../penjualan.php'>Kembali</a>";
exit;
}
$id_pelanggan = $_POST['id_pelanggan'];
$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];
$barang_query = mysqli_query($conn, "SELECT harga FROM barang WHERE
id_barang = $id_barang");
$barang = mysqli_fetch_assoc($barang_query);
$total_harga = $barang['harga'] * $jumlah;
$sql = "INSERT INTO penjualan (id_pelanggan, id_barang, jumlah, total_harga)
VALUES ($id_pelanggan, $id_barang, $jumlah, $total_harga)";
if (mysqli_query($conn, $sql)) {
echo "Penjualan berhasil ditambahkan! <a href='../penjualan.php'>Kembali</a>";
} else {
echo "Error: " . mysqli_error($conn);
}
?>