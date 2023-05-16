<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('connect.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Classic Model</title>
  </head>

  <body>
    
          <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Customer berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Customer gagal di-update</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Customer</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <table border=2 width=200px>
              <thead>
                <tr>
                <th>Customer Number</th>
                <th>Customer Name</th>
                <th>Contact Last Name</th>
                <th>Contact First Name</th>
                <th>Phone</th>
                <th>Address Line 1</th>
                <th>Address Line 2</th>
                <th>City</th>
                <th>State</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Sales Rep Employee Number</th>
                <th>Credit Limit</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database dengan PDO:
                  //siapkan query SQL
                  $query = "SELECT * FROM customers";
                  //eksekusi query
                  $result = $conn->query($query);

                 ?>

                 <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                  <tr>
                  <td><?php echo $data['customerNumber'];  ?></td>
                  <td><?php echo $data['customerName'];  ?></td>
                  <td><?php echo $data['contactLastName'];  ?></td>
                  <td><?php echo $data['contactFirstName'];  ?></td>
                  <td><?php echo $data['phone'];  ?></td>
                  <td><?php echo $data['addressLine1'];  ?></td>
                  <td><?php echo $data['addressLine2'];  ?></td>
                  <td><?php echo $data['city'];  ?></td>
                  <td><?php echo $data['state'];  ?></td>
                  <td><?php echo $data['postalCode'];  ?></td>
                  <td><?php echo $data['country'];  ?></td>
                  <td><?php echo $data['salesRepEmployeeNumber'];  ?></td>
                  <td><?php echo $data['creditLimit'];  ?></td>
                    <td>
                      <a href="<?php echo "updatecust.php?nrp=".$data['customerNumber']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deletecust.php?nrp=".$data['addressLine1']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>