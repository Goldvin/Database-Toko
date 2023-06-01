<?php
session_start();
if (isset($_POST['logout'])) {
    logout();
  }

  // Fungsi logout
  function logout() {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
  }
?>
<?php
    $status=$_SESSION['status'];
?>
<?php

    if($status=='Admin'){
        include 'pages/dashboard/navSeller.php';
        include 'pages/dashboard/barang.php';
        include 'pages/landing/footer.php';
        }
    else if ($status=='Customer'){
            include 'pages/dashboard/navCust.php';
            include 'pages/dashboard/cust.php';
            include 'pages/landing/footer.php';
            }
    else {
        // Jika pengguna tidak memiliki hak akses, arahkan ke halaman error atau login
        include 'pages/landing/navbar.php';
        require_once ('pages/landing/section.php');
        include 'pages/landing/footer.php';
        exit;
    }
    
    
            ?>
</div>
<div>
  
</div>