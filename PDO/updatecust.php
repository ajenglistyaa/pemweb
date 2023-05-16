<?php 
    include ('connect.php'); 

  $status = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['customerNumber'])) {
        // Query SQL
        $customerNumber_upd = $_GET['customerNumber'];
        $query = $conn->prepare("SELECT * FROM customers WHERE customerNumber = :customerNumber");
        // Binding data
        $query->bindParam(':customerNumber', $customerNumber_upd);
        // Eksekusi query
        $query->execute();
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
      $query = $conn->prepare("UPDATE customers SET customerName=:customerName, contactLastName=:contactLastName, contactFirstName=:contactFirstName, addressLine1=:addressLine1, addressLine2=:addressLine2, phone =:phone, city=:city, state=:state, postalCode=:postalCode, country=:country,
      salesRepEmployeeNumber=:salesRepEmployeeNumber, creditLimit=:creditLimit WHERE customerNumber=:customerNumber"); 

      //binding data
      $query->bindParam(':customerNumber', $customerNumber);
      $query->bindParam(':customerName', $customerName);
      $query->bindParam(':contactLastName', $contactLastName);
      $query->bindParam(':contactFirstName', $contactFirstName);
      $query->bindParam(':phone', $phone);
      $query->bindParam(':addressLine1', $addressLine1);
      $query->bindParam(':addressLine2', $addressLine2);
      $query->bindParam(':city', $city);
      $query->bindParam(':state', $state);
      $query->bindParam(':postalCode', $postalCode);
      $query->bindParam(':country', $country);
      $query->bindParam(':salesRepEmployeeNumber', $salesRepEmployeeNumber);
      $query->bindParam(':creditLimit', $creditLimit);

      //eksekusi query
      if ($query->execute()) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: indexcust.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>Classic Model</title>
  </head>
  <body>
    
      <h2 style="margin: 30px 0 30px 0;">Update Data Customer</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <?php while($data = $query->fetch(PDO::FETCH_ASSOC)): ?>
          <div class="from-group">
      <label for="customerNumber">Customer Number</label>
      <input type="text" name="customerNumber" id="customerNumber" value="<?php echo $data['customerNumber']; ?>">
  </div>

  <div class="form-group">
      <label for="customerName">Customer Name</label>
      <input type="text" name="customerName" id="customerName" value="<?php echo $data['customerName']; ?>">
  </div>

  <div class="form-group">
      <label for="contactLastName">Contact Last Name</label>
      <input type="text" name="contactLastName" id="contactLastName" value="<?php echo $data['contactLastName']; ?>">
  </div>

  <div class="form-group">
      <label for="contactFirstName">Contact First Name</label>
      <input type="text" name="contactFirstName" id="contactFirstName" value="<?php echo $data['contactFirstName']; ?>">
  </div>

  <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" name="phone" id="phone" value="<?php echo $data['phone']; ?>">
  </div>

  <div class="form-group">
    <label for="addressLine1">Address Line 1</label>
    <input type="text" name="addressLine1" id="addressLine1" value="<?php echo $data['addressLine1']; ?>">
  </div>

  <div class="form-group">
      <label for="addressLine2">Address Line 2</label>
      <input type="text" name="addressLine2" id="addressLine2" value="<?php echo $data['addressLine2']; ?>">
  </div>

  <div class="form-group">
    <label for="city">City</label>
    <input type="text" name="city" id="city" value="<?php echo $data['city']; ?>">
  </div>

  <div class="form-group">
    <label for="state">State</label>
    <input type="text" name="state" id="State" value="<?php echo $data['state']; ?>">
  </div>

  <div class="form-group">
    <label for="postalCode">Postal Code</label>
    <input type="text" name="postalCode" id="postalCode" value="<?php echo $data['postalCode']; ?>">
  </div>

  <div class="form-group">
    <label for="country">Country</label>
    <input type="text" name="country" id="country" value="<?php echo $data['country']; ?>">
  </div>

  <div class="form-group">
    <label for="salesRepEmployeeNumber">salesRepEmployeeNumber</label>
      <input type="text" name="salesRepEmployeeNumber" id="salesRepEmployeeNumber" value="<?php echo $data['salesRepEmployeeNumber']; ?>">
  </div>

  <div class="form-group">
    <label for="creditLimit">Credit Limit</label>
    <input type="text" name="creditLimit" id="creditLimit" value="<?php echo $data['creditLimit']; ?>">
  </div>
  <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>