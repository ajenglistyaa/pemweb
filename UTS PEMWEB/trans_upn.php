<?php
include ('connection.php');
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

<h2 style="margin: 30px 0 30px 0;">Data Driver</h2>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
    <table border="2" width="400px">
      <tr>
        <th>Id Trans Upn</th>
        <th>Id Kondektur</th>
        <th>Id Bus</th>
        <th>Id Driver</th>
        <th>Jumlah KM</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>

      <?php 
        //proses menampilkan data dari database:
        //siapkan query SQL
        $query = "SELECT * FROM trans_upn";
        $result = mysqli_query(connection(),$query);
      ?>

      <?php while($data = mysqli_fetch_array($result)): ?>
      <tr>
        <td align='center'><?php echo $data['id_trans_upn'];  ?></td>
        <td align='center'><?php echo $data['id_kondektur'];  ?></td>
        <td align='center'><?php echo $data['id_bus'];  ?></td>
        <td align='center'><?php echo $data['id_driver'];  ?></td>
        <td align='center'><?php echo $data['jumlah_km'];  ?></td>
        <td align='center'><?php echo $data['tanggal'];  ?></td>

    </tr>
      <?php endwhile ?>
    </tbody>
  </table>
</div>
</body>
</html>
