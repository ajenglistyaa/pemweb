<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['MSRP'])) {
          //query SQL
          $productCode_upd = $_GET['productsCode'];
          $query = "SELECT * FROM products WHERE productsCode = '$productCode_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $productLine = $_POST['productLine'];
    $productScale = $_POST['productScale'];
    $productVendor = $_POST['productVendor'];
    $productDescription = $_POST['productDescription'];
    $quantityInStock = $_POST['quantityInStock'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];
    
      //query SQL
      $sql = "UPDATE Products SET productName='$productName', productLine='$productLine', productScale='$productScale', productVendor='$productVendor', productDescription='$productDescription', quantityInStock='$quantityInStock', buyPrice='$buyPrice', MSRP='$MSRP' WHERE productCode='$productCode'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: products.php?status='.$status);
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Example</title>
    <body>
    <tr >
    <td colspan="3">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php 
        if ($status=='ok') {
        echo '<br><br><div class="alert alert-success" role="alert">Data Product berhasil disimpan!</div>';
        }
        elseif($status=='err'){
        echo '<br><br><div class="alert alert-danger" role="alert">Data Product gagal disimpan!</div>';
        }
        ?>
    </td>
    </tr>
        <table>
          <h2 style="margin: 30px 0 30px 0;">Update Data Products</h2>
          <form action="productsUpdate.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>Product Code</label>
              <input type="text" class="form-control" name="productCode" value="<?php echo $data['productCode'];  ?>" required="required" readonly>
            </div>
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" class="form-control" name="productName" value="<?php echo $data['productName'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Product Line</label>
              <input type="text" class="form-control" name="productName" value="<?php echo $data['productLine'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Product Scale</label>
              <input type="text" class="form-control" name="productScale" value="<?php echo $data['productScale'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Product Vendor</label>
              <input type="text" class="form-control" name="productVendor" value="<?php echo $data['productVendor'];  ?>" required="required">
            </div>
            <div class="form-group">
                <label>Product Description</label>
              <input type="text" class="form-control" name="productDescription" value="<?php echo $data['productDescription'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Quantity In Stock</label>
              <input type="text" class="form-control" name="quantityInStock" value="<?php echo $data['quantityInStock'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Buy Price</label>
              <input type="text" class="form-control" name="buyPrice" value="<?php echo $data['buyPrice'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>MSRP</label>
              <input type="text" class="form-control" name="MSRO" value="<?php echo $data['MSRP'];  ?>" required="required">
            </div>
            <?php endwhile; ?>
            </table>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>