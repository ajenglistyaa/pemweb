<?php
  include ('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sample Database</title>
  <link rel="stylesheet" type="text/css" href="sampledatabase.css">
</head>
<body>
  <h2 style="margin: 30px 0 30px 0;" align="center">Product Lines</h2>
    <table border="2">
      <thead>
        <tr>
          <th>ProductLines</th>
          <th>Text Description</th>
          <th>HTML Description</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          //proses menampilkan data dari database:
          //siapkan query SQL
          $query = "SELECT * FROM productlines";
          $result = mysqli_query(connection(),$query);
         ?>

         <?php while($data = mysqli_fetch_array($result)): ?>
          <tr>
            <td><?php echo $data['productLine'];  ?></td>
            <td><?php echo $data['textDescription'];  ?></td>
            <td><?php echo $data['htmlDescription'];  ?></td>
            <td><img src="<?php echo $data['image']; ?>"class="product-image" alt=""></td>
          </tr>
         <?php endwhile ?>
      </tbody>
    </table>
  </div>
</body>
</html>
