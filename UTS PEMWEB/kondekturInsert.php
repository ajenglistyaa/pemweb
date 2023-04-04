<?php
  include ('connection.php'); 
 
  $status = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $nama = $_POST['nama'];
    
    $query = "INSERT INTO driver (id_kondektur, nama) 
    VALUES('$id_kondektur','$nama')"; 

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
    <h1>Tambah Data Kondektur</h1>

    <form method="POST">
        <label>Id Kondektur</label>
        <input type="text" name="id_kondektur"><br>
        <label>Nama</label>
        <input type="text" name="nama"><br>
        <input type="submit" name="submit" value="Tambahkan">
    </form>
</body>
</html>
