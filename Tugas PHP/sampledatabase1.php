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
  <link rel="stylesheet" type="text/css" href="sampledatabase1.css">
</head>
<body>
  <h2 style="margin: 30px 0 30px 0;" align="center">Employees</h2>
  <div class="table-responsive">
    <table border='1' align="center">
      <thead>
        <tr bgcolor="pink" align="center">
          <th>Employee Number</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Extension</th>
          <th>Email</th>
          <th>Office Code</th>
          <th>Reports To</th>
          <th>Job Title</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          //proses menampilkan data dari database:
          //siapkan query SQL
          $query = "SELECT * FROM employees";
          $result = mysqli_query(connection(),$query);
        ?>

        <?php while($data = mysqli_fetch_array($result)): ?>
          <tr>
            <td><?php echo $data['employeeNumber']; ?></td>
            <td><?php echo $data['lastName']; ?></td>
            <td><?php echo $data['firstName']; ?></td>
            <td><?php echo $data['extension']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['officeCode']; ?></td>
            <td><?php echo $data['reportsTo']; ?></td>
            <td><?php echo $data['jobTitle']; ?></td>
          </tr>
        <?php endwhile ?>
      </tbody>
    </table>
  </div>
</body>

</html>
