<?php 

  include ('koneksi.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['addressLine1'])) {
          //query SQL
          $addressLine1 = $_GET['addressLine1'];
          $query = "DELETE FROM customers WHERE addressLine1 = '$addressLine1'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

          //redirect ke halaman lain
          header('Location: index.php?status='.$status);
      }  
  }
?>