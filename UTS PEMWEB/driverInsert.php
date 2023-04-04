<?php
  include ('connection.php'); 
 
  $status = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_driver = $_POST['id_driver'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];
    
    $query = "INSERT INTO driver (id_driver, nama, no_sim, alamat) 
    VALUES('$id_driver','$nama','$no_sim', '$alamat')"; 

    $result = mysqli_query(connection(),$query);
        if ($result) {
           $status = 'ok';
        }
        else{
           $status = 'err';
          }
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>UTS Program CRUD PHP</title>
</head>
<body>
    <h1>Tambah Data Driver</h1>

    <form method="POST">
        Id Driver: <input type="text" name="id_driver"><br>
        Nama: <input type="text" name="nama"><br>
        No. SIM: <input type="text" name="no_sim"><br>
        Alamat: <textarea name="alamat"></textarea><br>
        <input type="submit" name="submit" value="Tambahkan">
    </form>
</body>
</html>
