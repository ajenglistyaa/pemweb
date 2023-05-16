<?php 

  include ('connect.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['addressline1'])) {
          //query SQL
          $addressline1 = $_GET['addressline1'];
          $query = $conn->prepare("DELETE FROM customers WHERE addressline1 = :addresline1 ");
          //binding data
          $query->bindParam(':addressline1',$addressline1);
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
  }
?>