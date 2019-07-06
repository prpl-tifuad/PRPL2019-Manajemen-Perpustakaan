<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Data</title>
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
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	
	
	
	
	$idpeminjam=$_POST['idpeminjam'];
	$namapeminjam=$_POST['namapeminjam'];
	$nohp=$_POST['nohp'];
	
 // .fdyt6t5
	// update user data
	$result = mysqli_query($mysqli, "UPDATE peminjam SET namapeminjam='$namapeminjam',nohp='$nohp' WHERE idpeminjam='$idpeminjam'");
	
	// Redirect to homepage to display updated user in list
	header("Location: datapeminjam.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$idpeminjam = $_GET['idpeminjam'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM peminjam WHERE idpeminjam=$idpeminjam");
 
while($user_data = mysqli_fetch_array($result))
{
	
	
	
	$namapeminjam = $user_data['namapeminjam'];
	
	$nohp = $user_data['nohp'];
	


}
?>
<html>
<head>
      <div class="title"><span class="title_icon"><img src="images/iconbuku.jpg" alt="" /></span>Edit Data Peminjam</div>
      <form action="editpeminjam.php" method="post" name="form1" id="data">
      <div class="feat_prod_box_details">
        <p class="details"> </p>
        <div class="contact_form">
          <div class="form_subtitle">Edit Data Peminjam</div>
          <form name="Update" href="">
            <div class="form_row">
            	<input type="hidden" name="idpeminjam" value="<?php echo $idpeminjam; ?>">

              <td><label class="contact"> <strong>ID Peminjam</strong></label></td>
        <td><input type="text" class="contact" name="idpeminjam" value="<?php echo $idpeminjam;?>"></td>

            <div class="form_row">
              <td><label class="contact"> <strong>Nama Peminjam</strong></label></td>
        <td><input type="text" class="contact" name="namapeminjam" value="<?php echo $namapeminjam;?>"></td>

        <div class="form_row">
              <td><label class="contact"> <strong>No HP</strong></label></td>
        <td><input type="text" class="contact" name="nohp" value="<?php echo $nohp;?>"></td>

        

			<tr>	
				<td><input type="hidden" name="idpeminjam" value="<?php echo $_GET['idpeminjam'];?>"></td>
				
			</tr>
			<td>&nbsp;</td>
			<td></td>
			<div class="form_row"><br>
			<td><center><input type="submit" name="update" value="Update"></td></center>
		</div>
	</div>
</form>
	</form>
</div></div></div></section>


</body>
</html>
