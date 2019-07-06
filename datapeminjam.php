<!DOCTYPE html PUBLIC>
<html xmlns>
<head>
<title>Perpustakaan UAD - Data Peminjam</title>
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
        <li class="selected"><a href="datapeminjam.php">Data Peminjam</a></li>
        <li><a href="databuku.php">Data Buku</a></li>
        <li><a href="staff.php">Data Pustakawan</a></li>
      
        
      </ul>
    </div>
  </div>
      <div class="center_content">
    <div class="left_content">
       <div class="title"><span class="title_icon"><img src="images/iconbuku.jpg" alt="" /></span>Pencarian</div><br><br>
  <li id="cari">
 <form method="post" action="caripinjam.php">
         
          <input type="text" name="cari" required="" />
          <input type="submit" name="kirim" value="cari" />
          
        </form>
      </li>
      <br><br>

      <div class="title"><span class="title_icon"><img src="images/iconbuku.jpg" alt="" /></span>Data Peminjam</div>
    <table id="table_id" border="5" align="center" width="850px">
        <thead align="center">

      <?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM peminjam ORDER BY idpeminjam DESC");
?>


        
            <tr>
       <th>ID Peminjam</th><th>Nama Peminjam</th><th>nohp</th><th>Opsi</th>
    </tr>
        </thead>
        <tbody>
        <?php  
     while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        
         echo "<td>".$user_data['idpeminjam']."</td>";
       
         echo "<td>".$user_data['namapeminjam']."</td>";
           echo "<td>".$user_data['nohp']."</td>";
        
        echo "<td><a href='editpeminjam.php?idpeminjam=$user_data[idpeminjam]'>Edit</a> | <a href='deletepinjam.php?idpeminjam=$user_data[idpeminjam]' onclick='if(!confirm(`Apakah anda yakin?`)){return false}'>Delete</a></td></tr>";
    }
    ?>

    </tbody>
    </table>
    
      <form action="datapeminjam.php" method="post" name="form1" id="data">
      <div class="feat_prod_box_details">
        <p class="details"> </p>
        <div class="contact_form">
          <div class="form_subtitle">Membuat Data Peminjam</div>
          <form name="Add" href="">
            <div class="form_row">
              <td><label class="contact"> <strong>ID Peminjam</strong></label></td>
        <td><input type="int" class="contact_input" name="idpeminjam" required=""></td>
            </div>
            <div class="form_row">
              <td><label class="contact"> <strong>Nama Peminjam</strong></label></td>
        <td><input type="text" class="contact_input" name="namapeminjam" required=""></td>
            </div>
            <div class="form_row">
              <td><label class="contact"> <strong>No HP</strong></label></td>
        <td><input type="int" class="contact_input" name="nohp" required=""></td>
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
    
    $idpeminjam = $_POST['idpeminjam'];
   
    $namapeminjam = $_POST['namapeminjam'];
     $nohp = $_POST['nohp'];
    

    include_once("config.php");

    $result = mysqli_query($mysqli, "INSERT INTO peminjam(idpeminjam,namapeminjam,nohp) VALUES('$idpeminjam','$namapeminjam','$nohp')");
    
    echo "User added successfully.<br> 
    <a href='datapeminjam.php'>View Users</a>";
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
