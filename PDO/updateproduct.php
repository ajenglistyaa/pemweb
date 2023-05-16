<?php 
  include ('connect.php'); 

  $status = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['productCode'])) {
          //query SQL
          $productCode_upd = $_GET['productCode'];
          $query = $conn->prepare("SELECT * FROM products WHERE productCode = :productCode");
          //binding data
          $query->bindParam(':productCode',$productCode_upd);
          //eksekusi query
          $query->execute(); 
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
      $query = $conn->prepare("UPDATE mhs SET productCode=:productCode, productLine=:productLine, productScale=:productScale, productVendor=:productVendor, productDescription=:productDescription, quantityInStock=:quantityInStock, buyPrice=:buyPrice, MSRP=:MSRP WHERE productCode=:productCode"); 

      //binding data
      $query->bindParam(':productCode',$productCode);
      $query->bindParam(':produtName',$productName);
      $query->bindParam(':productLine',$productLine);
      $query->bindParam(':productScale',$productScale);
      $query->bindParam(':productVendor',$productVendor);
      $query->bindParam(':productDescription',$productDescription);
      $query->bindParam(':quantityInStock',$quantityInStock);
      $query->bindParam(':buyPrice',$buyPrice);
      $query->bindParam(':MSRP',$MSRP);
      
      //eksekusi query
      if ($query->execute()) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: indexproduct.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>Classic Model</title>
    </head>
  <body>
    
          <h2 style="margin: 30px 0 30px 0;">Update Data Produk</h2>
          <form action="update.php" method="POST">
            <?php while($data = $query->fetch(PDO::FETCH_ASSOC)): ?>
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
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>