<?php 

  include ('connect.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['MSRP'])) {
          //query SQL
          $addressline1 = $_GET['MSRP'];
          $query = $conn->prepare("DELETE FROM products WHERE MSRP = :MSRP ");
          //binding data
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
  }
?>