<?php
include ('connection.php');

if(isset($_POST['submit'])){
    $bulan = $_POST['bulan'];
    $driver_id = $_POST['driver_id'];
    $kondektor_id = $_POST['kondektur_id'];
    
    // Query untuk menghitung total pendapatan driver berdasarkan bulan
    $driver_query = "SELECT SUM(jumlah_km) as total_km FROM trans_upn WHERE MONTH(tanggal) = $bulan AND id_driver = $driver_id";
    $driver_result = mysqli_query(connection(), $driver_query);
    $driver_data = mysqli_fetch_assoc($driver_result);
    $driver_km = $driver_data['total_km'];
    $driver_pendapatan = $driver_km * 3000;
    
    // Query untuk menghitung total pendapatan konduktor berdasarkan bulan
    $kondektur_query = "SELECT SUM(jumlah_km) as total_km FROM trans_upn WHERE MONTH(tanggal) = $bulan AND id_kondektur = $kondektur_id";
    $kondektur_result = mysqli_query(connection(), $kondektur_query);
    $kondektur_data = mysqli_fetch_assoc($kondektur_result);
    $kondektur_km = $kondektor_data['total_km'];
    $kondektur_pendapatan = $kondektur_km * 1500;
    
    // Query untuk mendapatkan data perjalanan driver
    $driver_perjalanan_query = "SELECT * FROM trans_upn WHERE MONTH(tanggal) = $bulan AND id_driver = $driver_id";
    $driver_perjalanan_result = mysqli_query(connection(), $driver_perjalanan_query);
    
    // Query untuk mendapatkan data perjalanan konduktor
    $kondektur_perjalanan_query = "SELECT * FROM trans_upn WHERE MONTH(tanggal) = $bulan AND id_konduktor = $kondektur_id";
    $kondektur_perjalanan_result = mysqli_query(connection(), $kondektur_perjalanan_query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trans Upn</title>
</head>
<body>

<h2 style="margin: 30px 0 30px 0;">Pendapatan Driver dan Konduktor</h2>

<!-- Form untuk memilih bulan dan driver/konduktor -->
<form method="post" style="margin-bottom: 20px;">
    <label for="bulan">Bulan:</label>
    <select name="bulan" id="bulan">
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
    </select>
    <button type="submit" name="hitung">Hitung</button>
    <!-- Menampilkan total pendapatan driver -->
    <label for="id_driver">Driver:</label>
<h3>Total Pendapatan Driver:</h3>
<p>Rp. <?php echo number_format($driver_pendapatan, 0, ',', '.'); ?></p>

<!-- Menampilkan total pendapatan konduktor -->
<label for="id_kondektur">Kondektur:</label>
<h3>Total Pendapatan Kondektur:</h3>
<p>Rp. <?php echo number_format($kondektur_pendapatan, 0, ',', '.'); ?></p>

<!-- Menampilkan data perjalanan driver -->
<h3>Data Perjalanan Driver:</h3>
<table border="1">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Jumlah KM</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($driver_perjalanan_result)): ?>
        <tr>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['jumlah_km']; ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- Menampilkan data perjalanan konduktor -->
<h3>Data Perjalanan Konduktor:</h3>
<table border="1">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Jumlah KM</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($kondektur_perjalanan_result)): ?>
        <tr>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['jumlah_km']; ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>