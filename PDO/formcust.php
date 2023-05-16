<?php 
  include ('connect.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $customerNumber = $_POST[''];
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

      //query with PDO
      $query = $conn->prepare("INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, 
      city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES(:customerNumber, :customerName, :contactLastName, :contactFirstName, :phone, :addressLine1, :addressLine2, 
      :city, :state, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit)"); 

      //binding data
      $query->bindParam(':customerNumber',$customerNumber);
      $query->bindParam(':customerName',$customerName);
      $query->bindParam(':contactLastName',$contactLastName);
      $query->bindParam(':contactFirstName',$contactFirstName);
      $query->bindParam(':phone',$phone);
      $query->bindParam(':addressLine1',$addressLine1);
      $query->bindParam(':addressLine2',$addressLine2);
      $query->bindParam(':city',$city);
      $query->bindParam(':state',$state);
      $query->bindParam(':postalCode',$postalCode);
      $query->bindParam(':country',$country);
      $query->bindParam(':salesRepEmployeeNumber',$salesRepEmployeeNumber);
      $query->bindParam(':creditLimit',$creditLimit);

      //eksekusi query
      if ($query->execute()) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Classis Models</title>
  </head>
  <body>
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Customer berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Customer gagal disimpan</div>';
              }
           ?>

    <h2 style="margin: 30px 0 30px 0;">Form Customer</h2>
    <form action="form.php" method="POST">

      <div class="from-group">
        <label for="customerNumber">Customer Number</label>
        <input type="text" name="customerNumber" id="customerNumber" placeholder="CustNumber" value="<?php echo $data['customerNumber']; ?>">
      </div>
      <div class="form-group">
        <label for="customerName">Customer Name</label>
        <input type="text" name="customerName" id="customerName" placeholder="CustName" value="<?php echo $data['customerName']; ?>">
      </div>
  <div class="form-group">
      <label for="contactLastName">Contact Last Name</label>
      <input type="text" name="contactLastName" id="contactLastName" placeholder="LastName" value="<?php echo $data['contactLastName']; ?>">
  </div>
  <div class="form-group">
      <label for="contactFirstName">Contact First Name</label>
      <input type="text" name="contactFirstName" id="contactFirstName" placeholder="FirstName" value="<?php echo $data['contactFirstName']; ?>">
  </div>
  <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" name="phone" id="phone" placeholder="Phone" value="<?php echo $data['Phone']; ?>">
  </div>
  <div class="form-group">
    <label for="addressLine1">Address Line 1</label>
    <input type="text" name="addressLine1" id="addressLine1" placeholder="AddressLine1" value="<?php echo $data['addressLine1']; ?>">
  </div>
  <div class="form-group">
      <label for="addressLine2">Address Line 2</label>
      <input type="text" name="addressLine2" id="addressLine2" placeholder="AddressLine2"value="<?php echo $data['addressLine2']; ?>">
  </div>
  <div class="form-group">
    <label for="city">City</label>
    <input type="text" name="city" id="city" placeholder="City" value="<?php echo $data['city']; ?>">
  </div>
  <div class="form-group">
    <label for="state">State</label>
    <input type="text" name="state" id="State" placeholder="State" value="<?php echo $data['state']; ?>">
  </div>
  <div class="form-group">
    <label for="postalCode">Postal Code</label>
    <input type="text" name="postalCode" id="postalCode" placeholder="PostalCode" value="<?php echo $data['postalCode']; ?>">
  </div>
  <div class="form-group">
    <label for="country">Country</label>
    <input type="text" name="country" id="country" placeholde="Country" value="<?php echo $data['country']; ?>">
  </div>
  <div class="form-group">
    <label for="salesRepEmployeeNumber">salesRepEmployeeNumber</label>
      <input type="text" name="salesRepEmployeeNumber" id="salesRepEmployeeNumber" placeholder="SalesRep" value="<?php echo $data['salesRepEmployeeNumber']; ?>">
  </div>
  <div class="form-group">
    <label for="creditLimit">Credit Limit</label>
    <input type="text" name="creditLimit" id="creditLimit" placeholder="CreditLimit" value="<?php echo $data['creditLimit']; ?>">
  </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </main>
  </div>
</div>
</body>
</html>
