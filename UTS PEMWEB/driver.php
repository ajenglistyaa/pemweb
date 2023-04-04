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
        <table border=2 width="400px">
      <tr>
        <th>Id Driver</th>
        <th>Nama</th>
        <th>No Sim</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>

      <?php 
        //proses menampilkan data dari database:
        //siapkan query SQL
        $query = "SELECT * FROM driver";
        $result = mysqli_query(connection(),$query);
      ?>

      <?php while($data = mysqli_fetch_array($result)): ?>
      <tr>
        <td align='center'><?php echo $data['id_driver'];  ?></td>
        <td align='center'><?php echo $data['nama'];  ?></td>
        <td align='center'><?php echo $data['no_sim'];  ?></td>
        <td align='center'><?php echo $data['alamat'];  ?></td>
      </tr>
      <?php endwhile ?>
    </tbody>
  </table>
</div>
</body>
</html>
