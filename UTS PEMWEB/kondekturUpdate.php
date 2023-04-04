<?php
  include ('connection.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_kondektur'])) {
          //query SQL
          $id_kondektur = $_GET['id_kondektur'];
          $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $nama = $_POST['nama'];
    
      //query SQL
      $sql = "UPDATE id_kondektur SET id_kondektur='$id_kondektur', nama='$nama' WHERE id_kondektur='$id_kondektur'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: kondektur.php?status='.$status);
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
<h2>Update Data Kondektur</h2>
<form method="POST">
    <label>Id Kondektur</label>
    <input type="text" name="id_kondektur" value="<?php echo $id_kondektur ?>">
    <br>
    <label>Nama</label>
    <input type="text" name="nama" value="<?php echo $nama ?>">
    <br>
    <input type="submit" name="update" value="Update">
</form>
</body>
</html>
