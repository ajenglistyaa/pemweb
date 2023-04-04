<?php
  include ('connection.php'); 
 
  $status = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_bus = $_POST['id_bus'];
    $plat = $_POST['plat'];
    $status = $_POST['status'];
    
    $query = "INSERT INTO bus (id_bus, plat, status) 
    VALUES('$id_bus','$plat','$status')"; 

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
    <h1>Tambah Data Bus</h1>

    <form method="POST">
        <label>Id Bus</label>
        <input type="text" name="id_bus"><br>
        <label>Plat</label>
        <input type="text" name="plat"><br>
        <label>Status</label>
        <input type="text" name="status"><br>
        <input type="submit" name="submit" value="Tambahkan">
    </form>
</body>
</html>
