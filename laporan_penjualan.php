<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS code here */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }
        form select, form input[type="text"] {
            padding: 8px;
            margin: 10px;
            font-size: 16px;
        }
        form button {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #2980b9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ecf0f1;
        }
        a {
            color: #3498db;
            text-decoration: none;
            font-size: 16px;
        }
        /* Style khusus untuk tombol hapus */
        .btn-delete {
            color: #e74c3c; /* Warna merah */
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-delete:hover {
            color: #c0392b;
        }
        
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Laporan Penjualan</h1>
    <form method="get" action="">
        Filter berdasarkan:
        <select name="filter">
            <option value="">-- Pilih Filter --</option>
            <option value="pelanggan">Pelanggan</option>
            <option value="barang">Barang</option>
        </select>
        <input type="text" name="keyword" placeholder="Masukkan keyword">
        <button type="submit">Tampilkan</button>
    </form>
    <hr>
    <table>
        <tr>
            <th>ID Penjualan</th>
            <th>Pelanggan</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th style="text-align: center;">Aksi</th>
        </tr>
        <?php
        $filter = $_GET['filter'] ?? '';
        $keyword = $_GET['keyword'] ?? '';
        
        $query = "SELECT p.id_penjualan, pl.nama_pelanggan, b.nama_barang, p.jumlah, p.total_harga 
                  FROM penjualan p 
                  JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan 
                  JOIN barang b ON p.id_barang = b.id_barang";
        
        if ($filter && $keyword) {
            if ($filter == 'pelanggan') {
                $query .= " WHERE pl.nama_pelanggan LIKE '%$keyword%'";
            } elseif ($filter == 'barang') {
                $query .= " WHERE b.nama_barang LIKE '%$keyword%'";
            }
        }
        
        $result = mysqli_query($conn, $query);
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['id_penjualan']}</td>
                <td>{$row['nama_pelanggan']}</td>
                <td>{$row['nama_barang']}</td>
                <td>{$row['jumlah']}</td>
                <td>Rp " . number_format($row['total_harga'], 0, ',', '.') . "</td>
                <td style='text-align: center;'>
                  <a href='proses/hapus_penjualan.php?id={$row['id_penjualan']}' 
                       class='btn-delete'
                       onclick=\"return confirm('Yakin ingin menghapus data penjualan ini?');\"
                       title='Hapus Data'>
                       <i class='fas fa-trash'></i>
                    </a>
                </td>
            </tr>";
        }
        ?>
    </table>
    <br><br>
    <a href="index.php">To Menu</a>
</body>
</html>