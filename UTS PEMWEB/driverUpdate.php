<?php
  include ('connection.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_driver'])) {
          //query SQL
          $id_driver = $_GET['id_driver'];
          $query = "SELECT * FROM driver WHERE id_driver = '$id_driver'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_driver = $_POST['id_driver'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];
   
      //query SQL
      $sql = "UPDATE id_driver SET id_driver='$id_driver', nama='$nama', no_sim='$no_sim', alamat='$alamat' 
      WHERE id_driver='$id_driver'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: driver.php?status='.$status);
  }


?>

<!-- form untuk mengupdate data driver -->
<h2>Update Data Driver</h2>
<form method="POST">
    <label>Id Driver</label>
    <input type="text" name="id_driver" value="<?php echo $id_driver ?>">
    <br>
    <label>Nama</label>
    <input type="text" name="nama" value="<?php echo $nama ?>">
    <br>
    <label>No SIM</label>
    <input type="text" name="no_sim" value="<?php echo $no_sim ?>">
    <br>
    <label>Alamat</label>
    <textarea name="alamat"><?php echo $alamat ?></textarea>
    <br>
    <input type="submit" name="update" value="Update">
</form>
