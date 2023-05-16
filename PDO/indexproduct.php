<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
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
                echo '<br><br><div class="alert alert-success" role="alert">Data Produk berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Produk gagal di-update</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Tambah Data Product</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <table border=2 width=200px>
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
                  //proses menampilkan data dari database dengan PDO:
                  //siapkan query SQL
                  $query = "SELECT * FROM products";
                  //eksekusi query
                  $result = $conn->query($query);

                 ?>

                 <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
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
                      <a href="<?php echo "updateproduct.php?nrp=".$data['productCode']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deleteproduct.php?nrp=".$data['MSRP']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
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