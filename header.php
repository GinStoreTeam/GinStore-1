<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/master.css">
  </head>
  <body>

    <!-- koneksi kedatabase -->
    <?php
      // host, nama, password, database
      $link = mysqli_connect("localhost", "root", "", "gin_store");

      // Daftar fungsi

      // translate numeric ke rupiah
      function rupiah($nilai){
        // angka, anka dibelakang koma, pemisah desimal, pemisah ribuan
        $hasil_rupiah = "Rp. " . number_format($nilai, 2, ',', '.');
        return $hasil_rupiah;
      }


     ?>

     <!-- Navigasi Bar -->
     <nav class="navbar">
       <ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="index-product.php">Product</a></li>
         <li><a href="#">Cara Order</a></li>
         <li><a href="#">FAQ</a></li>
         <li><a href="#">Order List</a></li>
         <li><a href="add-product.php">Tambahkan Barang</a></li>
         <li  class="n-knn">
           <ul>
             <li>
               <a href="#">Login</a>
               |
               <a href="#">Register</a>
             </li>
           </ul>
         </li>
       </ul>



     </nav>
