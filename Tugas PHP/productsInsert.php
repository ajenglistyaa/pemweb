<?php
  include ('koneksi.php'); 
 
  $status = '';

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
    
    $query = "INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) 
    VALUES('$productCode','$productName','$productLine', '$productScale', '$productVendor', '$productDescription', '$quantityInStock, '$buyPrice', '$MSRP')"; 

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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>classicmodels</title>
</head>
<body>
<h2>Products</h2>
<form action="productInsert.php" method="POST">
  <div class="from-group">
      <label for="productCode">Product Code</label>
      <input type="text" name="productCode" id="productCode">
  </div>

  <div class="form-group">
      <label for="productName">Product Name</label>
      <input type="text" name="productName" id="productName">
  </div>

  <div class="form-group">
      <label for="productLine">Product Line</label>
      <input type="text" name="productLine" id="productLine">
  </div>

  <div class="form-group">
      <label for="productScale">Product Scale</label>
      <input type="text" name="productScale" id="productScale">
  </div>

  <div class="form-group">
      <label for="productVendor">Product Vendor</label>
      <input type="text" name="productVendor" id="productVendor">
  </div>

  <div class="form-group">
    <label for="productDescription">Product Description</label>
    <input type="text" name="productDescription" id="productDescription">
  </div>

  <div class="form-group">
      <label for="quantityInStock">Quantity In Stock</label>
      <input type="text" name="quantityInStock" id="quantityInStock">
  </div>

  <div class="form-group">
    <label for="buyPrice">Buy Price</label>
    <input type="text" name="buyPrice" id="buyPrice">
  </div>

  <div class="form-group">
    <label for="MSRP">MSRP</label>
    <input type="text" name="MSRP" id="MSRP">
  </div>
 <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</body>
</html>
