<?php
  include ('connection.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_trans_upn'])) {
          //query SQL
          $id_trans_upn = $_GET['id_trans_upn'];
          $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_busid_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];
    
      //query SQL
      $sql = "UPDATE id_trans_upn SET id_trans_upn='$id_trans_upn', id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver', jumlah_km='$jumlah_km', tanggal='$tanggal'
      WHERE id_trans_upn='$id_trans_upn'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: trans_upn.php?status='.$status);
  }


?>

<!-- form untuk mengupdate data kondektur -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Kondektur</title>
</head>
<body>
<h2>Update Data Trans UPN</h2>
<form method="POST">
    <label>Id Trans UPN</label>
    <input type="text" name="id_driver" value="<?php echo $id_driver ?>">
    <br>
    <label>Id Kondektur</label>
    <input type="text" name="id_kondektur" value="<?php echo $id_kondektur ?>">
    <br>
    <label>Id Bus</label>
    <input type="text" name="id_kondektur" value="<?php echo $id_bus ?>">
    <br>
    <label>Id Driver</label>
    <input type="text" name="id_driver" value="<?php echo $id_driver ?>">
    <br>
    <label>Jumlah KM</label>
    <input type="text" name="jumlah_km" value="<?php echo $jumlah_km ?>">
    <br>
    <label>Tanggal</label>
    <input type="text" name="tanggal" value="<?php echo $tanggal?>">
    <br>
    <input type="submit" name="update" value="Update">
</form>

</body>
</html>
