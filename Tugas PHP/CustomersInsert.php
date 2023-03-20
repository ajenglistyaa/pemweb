<?php
  include ('koneksi.php'); 
 
  $status = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerNumber = $_POST['customerNumber'];
    $customerName = $_POST['customerName'];
    $contactLastName = $_POST['contactLastName'];
    $contactFirstName = $_POST['contactFirstName'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];

    $query = "INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1,
    addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) 
    VALUES('$customerNumber','$customerName','$contactLastName','$contactFirstName', '$phone', '$addressLine1', '$addressLine2', 
    '$city', '$state', '$postalCode', '$country', '$salesRepEmployeeNumber', '$creditLimit')"; 

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
  <title>Sample Database</title>
</head>
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

<h2>Data Customers</h2>
<form action="customersInsert.php" method="POST">
  <div class="from-group">
      <label for="customerNumber">Customer Number</label>
      <input type="text" name="customerNumber" id="customerNumber" placeholder="Cth: 123" >
  </div>

  <div class="form-group">
      <label for="customerName">Customer Name</label>
      <input type="text" name="customerName" id="customerName" placeholder="Masukkan Nama Anda">
  </div>

  <div class="form-group">
      <label for="contactLastName">Contact Last Name</label>
      <input type="text" name="contactLastName" id="contactLastName" placeholder="Masukkan Last Name">
  </div>

  <div class="form-group">
      <label for="contactFirstName">Contact First Name</label>
      <input type="text" name="contactFirstName" id="contactFirstName" placeholder="Masukkan First Name">
  </div>

  <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" name="phone" id="phone" placeholder="Cth: 081234500088">
  </div>

  <div class="form-group">
    <label for="addressLine1">Address Line 1</label>
    <input type="text" name="addressLine1" id="addressLine1" placeholder="Alamat Rumah">
  </div>

  <div class="form-group">
      <label for="addressLine2">Address Line 2</label>
      <input type="text" name="addressLine2" id="Alamat Lain">
  </div>

  <div class="form-group">
    <label for="city">City</label>
    <input type="text" name="city" id="city" placeholder="City">
  </div>

  <div class="form-group">
    <label for="state">State</label>
    <input type="text" name="state" id="State">
  </div>

  <div class="form-group">
    <label for="postalCode">Postal Code</label>
    <input type="text" name="postalCode" id="postalCode">
  </div>

  <div class="form-group">
    <label for="country">Country</label>
    <input type="text" name="country" id="country" placeholder="Country">
  </div>

  <div class="form-group">
    <label for="salesRepEmployeeNumber">salesRepEmployeeNumber</label>
      <input type="text" name="salesRepEmployeeNumber" id="salesRepEmployeeNumber" placeholder="Id Number Employee">
  </div>

  <div class="form-group">
    <label for="creditLimit">Credit Limit</label>
    <input type="text" name="creditLimit" id="creditLimit" placeholder="cth: 2345.00">
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</body>
</html>
