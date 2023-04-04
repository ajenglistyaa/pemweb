<?php
  include ('connection.php'); 
 
  $status = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];
    
    $query = "INSERT INTO trans_upn (id_trans_upn, id_bus, id_driver, jumlah_km, tanggal) 
    VALUES('$id_trans_upn','$id_bus','$id_driver', '$jumlah_km', '$tanggal')"; 

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
    <h1>Tambah Data Trans Upn</h1>

    <form method="POST">
        <label>Id Trans UPN</label>
        <input type="text" name="id_trans_upn"><br>
        <label>Id Kondektur</label>
        <input type="text" name="id_kondektur"><br>
        <label>Id Bus</label>
        <input type="text" name="id_bus"><br>
        <label>Id Driver</label>
        <input type="text" name="id_driver"><br>
        <label>Jumlah KM</label>
        <input type="text" name="jumlah_km"><br>
        <label>Tanggal</label>
        <input type="text" name="tanggal"><br>
        <input type="submit" name="submit" value="Tambahkan">
    </form>
</body>
</html>
