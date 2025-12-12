<?php
// Gunakan ../ untuk keluar dari folder 'proses' dan mencari koneksi.php di folder utama
include "../koneksi.php"; 

if (isset($_GET['id'])) {
    $id_penjualan = $_GET['id'];

    $query = "DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data berhasil dihapus!');
                // Gunakan ../ untuk kembali ke folder utama
                window.location = '../laporan_penjualan.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Gunakan ../ untuk kembali ke folder utama
    header("Location: ../laporan_penjualan.php");
}
?>
