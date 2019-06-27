<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
<title>Perpustakaan UAD - Data Buku</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap">
  <div class="header">
   
    <div id="menu">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="transaksi.php">Transaksi</a></li>
        <li><a href="datapeminjam.php">Data Peminjam</a></li>
        <li class="selected"><a href="databuku.php">Data Buku</a></li>
        <li><a href="staff.php">Data Pustakawan</a></li>
        
      </ul>
    </div>
  </div>
  <div class="center_content">
    <div class="left_content">
     <div class="title"><span class="title_icon"><img src="images/iconbuku.jpg" alt="" /></span>Pencarian</div>
      <br><br>
      <li id="cari">
  
   <form method="post" action="caribuku.php">
        
          <input type="text" name="cari" required="" />
          <input type="submit" name="kirim" value="cari" />
        
        </form>
      </li>
     
      <div class="title"><span class="title_icon"><img src="images/iconbuku.jpg" alt="" /></span>Data Buku</div>
      <table id="table_id" border="5" align="center" width="850px">
      <thead align="center">

<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM buku ORDER BY kodebuku DESC");
?>

<tr>
       <th>Kode Buku</th><th>Kategori Buku</th><th>Nama Buku</th><th>Jumlah Buku</th><th>Opsi</th>
    </tr>
        </thead>
        <tbody>
        <?php  
     while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        
         echo "<td>".$user_data['kodebuku']."</td>";
       
         echo "<td>".$user_data['katbuku']."</td>";
           echo "<td>".$user_data['namabuku']."</td>";
           echo "<td>".$user_data['jumlahbuku']."</td>";
        
        echo "<td><a href='editbuku.php?kodebuku=$user_data[kodebuku]'>Edit</a> | <a href='deletebuku.php?kodebuku=$user_data[kodebuku]' onclick='if(!confirm(`Apakah anda yakin?`)){return false}'>Delete</a></td></tr>";
    }
    ?>

    </tbody>
    </table>
      
      <br>
      <form action="databuku.php" method="post" name="form1" id="data">
      <div class="feat_prod_box_details">
        <p class="details"> </p>
        <div class="contact_form">
          <div class="form_subtitle">Membuat Data Buku</div>
          <form name="Add" href="">
            <div class="form_row">
              <td><label class="contact"> <strong>Kode Buku</strong></label></td>
        <td><input type="int" class="contact_input" name="kodebuku" required></td>
            </div>
            <div class="form_row">
              <td><label class="contact"> <strong>Kategori Buku</strong></label></td>
        <td>
          <input type="radio" name="katbuku" value="akademik" checked>Akademik
          <input type="radio" name="katbuku" value="novel">Novel

        </td>
            </div>
            <div class="form_row">
              <td><label class="contact"> <strong>Nama Buku</strong></label></td>
        <td><input type="text" class="contact_input" name="namabuku" required></td>
            </div>
            <div class="form_row">
              <td><label class="contact"> <strong>Jumlah Buku</strong></label></td>
        <td><input type="number" class="contact_input" name="jumlahbuku" required>
        </td>
            </div>
           
           <tr> 
            <div class="form_row">
             <center><td><input type="submit" name="Submit" value="Add"></td></center>
            </div>
          </tr>
        </table>
          </form>
          <center>
  <?php
 

  if(isset($_POST['Submit'])) {
    
    $kodebuku = $_POST['kodebuku'];
   
    $katbuku = $_POST['katbuku'];
     $namabuku = $_POST['namabuku'];
     $jumlahbuku = $_POST['jumlahbuku'];

    include_once("config.php");

    $result = mysqli_query($mysqli, "INSERT INTO buku(kodebuku,katbuku,namabuku,jumlahbuku) VALUES('$kodebuku','$katbuku','$namabuku','$jumlahbuku')");
    
    echo "User added successfully.<br> 
    <a href='databuku.php'>View Users</a>";
  }
  ?>
</center>       
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!--end of center content-->
  </div>
</div>
</body>
</html>
