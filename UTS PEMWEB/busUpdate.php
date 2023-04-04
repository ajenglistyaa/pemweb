<?php
  include ('connection.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_bus'])) {
          //query SQL
          $id_bus = $_GET['id_bus'];
          $query = "SELECT * FROM bus WHERE id_bus = '$id_bus'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_bus = $_POST['id_bus'];
    $plat = $_POST['plat'];
    $status = $_POST['status'];
   
      //query SQL
      $sql = "UPDATE id_bus SET id_bus='$id_bus', plat='$plat', status='$status' WHERE id_bus='$id_bus'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: bus.php?status='.$status);
  }


?>

<!-- form untuk mengupdate data bus -->
<h2>Update Data Bus</h2>
<form method="POST">
    <label>Id Bus</label>
    <input type="text" name="id_driver" value="<?php echo $id_driver ?>">
    <br>
    <label>Plat</label>
    <input type="text" name="nama" value="<?php echo $plat ?>">
    <br>
    <label>Status</label>
    <input type="text" name="no_sim" value="<?php echo $status ?>">
    <br>
    <input type="submit" name="update" value="Update">
</form>
