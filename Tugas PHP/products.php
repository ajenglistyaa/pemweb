<?php
include ('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Classic Models</title>
</head>
<body>
<?php 
    //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Products berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Products gagal di-update</div>';
              }

            }
           ?>

<h2 style="margin: 30px 0 30px 0;">Data Products</h2>
  <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
                <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Product Line</th>
                <th>Product Scale</th>
                <th>Product Vendor</th>
                <th>Product Description</th>
                <th>Quantity In Stock</th>
                <th>Buy Price</th>
                <th>MSRP</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM products";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                  <td><?php echo $data['productCode'];  ?></td>
                  <td><?php echo $data['productName'];  ?></td>
                  <td><?php echo $data['productLine'];  ?></td>
                  <td><?php echo $data['productScale'];  ?></td>
                  <td><?php echo $data['productVendor'];  ?></td>
                  <td><?php echo $data['productDescription'];  ?></td>
                  <td><?php echo $data['quantityInStock'];  ?></td>
                  <td><?php echo $data['buyPrice'];  ?></td>
                  <td><?php echo $data['MSRP'];  ?></td>
                  <td>
                      <a href="<?php echo "CustomersUpdate.php?nrp=".$data['customersNumber']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "DeleteCustomers.php?nrp=".$data['addressLine1']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
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