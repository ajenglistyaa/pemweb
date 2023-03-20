<?php
  include ('koneksi.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['customerNumber'])) {
          //query SQL
          $customerNumber_upd = $_GET['customerNumber'];
          $query = "SELECT * FROM customers WHERE customerNumber = '$customerNumber'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
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

      //query SQL
      $sql = "UPDATE customers SET customerName='$customerName', contactLastName='$contactLastName', contactFirstName='$contactFirstName', phone='$phone', addressLine1='$addressLine1', addressLine2='$addressLine2', city='$city', state='$state', postalCode='$postalCode', country='$country', salesRepEmployeeNumber='$salesRepEmployeeNumber', creditLimit='$creditLimit' WHERE customerNumber='$customerNumber'";
   
      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: customers.php?status='.$status);
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Classic Models</title>
</head>
  <body>
  <tr >
            <td colspan="3">
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <?php 
                if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Customer berhasil diupdate!</div>';
                }
                elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Customer gagal diupdate!</div>';
                }
                 ?>
            </td>
        </tr>
        <table>
          <h2 style="margin: 30px 0 30px 0;">Update Data Customers</h2>
          <?php while($data = mysqli_fetch_array($result)): ?>
          <form action="CustomersUpdate.php" method="POST">
          <div class="from-group">
      <label for="customerNumber">Customer Number</label>
      <input type="text" name="customerNumber" id="customerNumber">
  </div>

  <div class="form-group">
      <label for="customerName">Customer Name</label>
      <input type="text" name="customerName" id="customerName">
  </div>

  <div class="form-group">
      <label for="contactLastName">Contact Last Name</label>
      <input type="text" name="contactLastName" id="contactLastName">
  </div>

  <div class="form-group">
      <label for="contactFirstName">Contact First Name</label>
      <input type="text" name="contactFirstName" id="contactFirstName">
  </div>

  <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" name="phone" id="phone">
  </div>

  <div class="form-group">
    <label for="addressLine1">Address Line 1</label>
    <input type="text" name="addressLine1" id="addressLine1">
  </div>

  <div class="form-group">
      <label for="addressLine2">Address Line 2</label>
      <input type="text" name="addressLine2" id="addressLine2">
  </div>

  <div class="form-group">
    <label for="city">City</label>
    <input type="text" name="city" id="city">
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
    <input type="text" name="country" id="country">
  </div>

  <div class="form-group">
    <label for="salesRepEmployeeNumber">salesRepEmployeeNumber</label>
      <input type="text" name="salesRepEmployeeNumber" id="salesRepEmployeeNumber">
  </div>

  <div class="form-group">
    <label for="creditLimit">Credit Limit</label>
    <input type="text" name="creditLimit" id="creditLimit">
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <?php endwhile; ?>
    <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
        </main>
        </table>
      </div>
    </div>
</body>
</html>