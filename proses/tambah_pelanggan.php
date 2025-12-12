<?php
include "../koneksi.php";
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$sql = "INSERT INTO pelanggan (nama_pelanggan, alamat) VALUES
('$nama_pelanggan', '$alamat')";
if (mysqli_query($conn, $sql)) {
echo "Pelanggan berhasil ditambahkan! <a
href='../pelanggan.php'>Kembali</a>";
} else {
echo "Error: " . mysqli_error($conn);
}
?>