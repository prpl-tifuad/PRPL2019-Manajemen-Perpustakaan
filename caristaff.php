<!DOCTYPE html>
<html lang="en">
<head>
<title>Pencarian Data Staff</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap">
  <div class="header">
    <div></a></div>
    <div id="menu">
      <ul>
        <li><a href="transaksi.php">Transaksi</a></li>
        <li><a href="datapeminjam.php">Data Peminjam</a></li>
        <li><a href="databuku.php">Data Buku</a></li>
        <li><a href="staff.php">Data Pustakawan</a></li>
      </ul>
    </div>
  </div>
  

<?php 
include "config.php";
$key = $_POST['cari'];
echo "Keyword pencarian = $key";
$QueryString = "SELECT * FROM pustakawan WHERE idstaff LIKE '%$key%' OR namastaff LIKE '%$key%' ";
	$result = mysqli_query($mysqli,$QueryString); 
?>
<div class="center_content">
    <div class="left_content">
    <div class="title"><span class="title_icon"><img src="images/iconbuku.jpg" alt="" /></span>Hasil Pencarian</div>

<table id="table_id" border="10" align="center" width="800px">
        <thead align="center">
            <tr>
      <th>ID Pustakawan</th><th>Nama Pustakawan</th>
        </thead>
        <tbody>
        <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
       
        echo "<td>".$user_data['idstaff']."</td>";
         echo "<td>".$user_data['namastaff']."</td>";
       
          
    }
    ?>
    </tbody>
    </table>
</div>
</body>
</html>

   