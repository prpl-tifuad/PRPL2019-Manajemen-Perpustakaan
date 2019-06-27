<!DOCTYPE html PUBLIC>
<html xmlns>
<head>
<title>Perpustakaan UAD - Data Pustakawan</title>
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
        <li><a href="databuku.php">Data Buku</a></li>
        <li class="selected"><a href="staff.php">Data Pustakawan</a></li>
       
        
      </ul>
    </div>
  </div>
      <div class="center_content">
    <div class="left_content">

       <div class="title"><span class="title_icon"><img src="images/iconbuku.jpg" alt="" /></span>Pencarian</div>
       <br><br>
  <li id="cari">

        <form method="post" action="caristaff.php">
         
          <input type="text" name="cari" required="" />
          <input type="submit" name="kirim" value="cari" />
          
        </form>
      </li>
    <br>
 
      <div class="title"><span class="title_icon"><img src="images/iconbuku.jpg" alt="" /></span>Data Pustakawan</div>
    <table id="table_id" border="5" align="center" width="850px">
        <thead align="center">

      <?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM pustakawan ORDER BY idstaff DESC");
?>

      <tr>
       <th>ID Pustakawan</th><th>Nama Pustakawan</th><th>Opsi</th>
    </tr>
        </thead>
        <tbody>
        <?php  
     while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        
         echo "<td>".$user_data['idstaff']."</td>";
       
         echo "<td>".$user_data['namastaff']."</td>";
          
        
        echo "<td><a href='editstaff.php?idstaff=$user_data[idstaff]'>Edit</a> | <a href='deletestaff.php?idstaff=$user_data[idstaff]' onclick='if(!confirm(`Apakah anda yakin?`)){return false}'>Delete</a></td></tr>";
    }
    ?>

    </tbody>
    </table>
    
      <form action="staff.php" method="post" name="form1" id="data">
      <div class="feat_prod_box_details">
        <p class="details"> </p>
        <div class="contact_form">
          <div class="form_subtitle">Membuat Data Pustakawan</div>
          <form name="Add" href="">
            <div class="form_row">
              <td><label class="contact"> <strong>ID Pustakawan</strong></label></td>
        <td><input type="int" class="contact_input" name="idstaff" required=""></td>
            </div>
            <div class="form_row">
              <td><label class="contact"> <strong>Nama Pustakawan</strong></label></td>
        <td><input type="text" class="contact_input" name="namastaff" required=""></td>
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
    
    $idstaff = $_POST['idstaff'];
   
    $namastaff = $_POST['namastaff'];

    include_once("config.php");

    $result = mysqli_query($mysqli, "INSERT INTO pustakawan(idstaff,namastaff) VALUES('$idstaff','$namastaff')");
    
    echo "User added successfully.<br> 
    <a href='staff.php'>View Users</a>";
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
