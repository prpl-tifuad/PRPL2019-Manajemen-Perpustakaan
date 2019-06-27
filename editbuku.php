<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Data Buku</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap">
  <div class="header">
    <div></a></div>
    <div id="menu">
      <ul>
      	<li><a href="index.php">Home</a></li>
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

	$kodebuku=$_POST['kodebuku'];
	$katbuku=$_POST['katbuku'];
	$namabuku=$_POST['namabuku'];
	$jumlahbuku=$_POST['jumlahbuku'];
	
	// update user data
	$result = mysqli_query($mysqli, "UPDATE buku SET katbuku='$katbuku',namabuku='$namabuku',jumlahbuku='$jumlahbuku' WHERE kodebuku='$kodebuku'");
	
	// Redirect to homepage to display updated user in list
	header("Location: databuku.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$kodebuku = $_GET['kodebuku'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM buku WHERE kodebuku=$kodebuku");
 
while($user_data = mysqli_fetch_array($result))
{
	
	
	$katbuku = $user_data['katbuku'];
	$namabuku = $user_data['namabuku'];
	
	$jumlahbuku = $user_data['jumlahbuku'];
	


}
?>
<html>
<head>
      <div class="title"><span class="title_icon"><img src="images/iconbuku.jpg" alt="" /></span>Edit Data Buku</div>
      <form action="editbuku.php" method="post" name="form1" id="data">
      <div class="feat_prod_box_details">
        <p class="details"> </p>
        <div class="contact_form">
          <div class="form_subtitle">Edit Data Buku</div>
          <form name="Update" href="">
            <div class="form_row">
            	<input type="hidden" name="kodebuku" value="<?php echo $kodebuku; ?>">

              <td><label class="contact"> <strong>Kode Buku</strong></label></td>
        <td><input type="text" class="contact" name="kodebuku" value="<?php echo $kodebuku;?>"></td>

            <div class="form_row">
              <td><label class="contact"> <strong>Kategori Buku</strong></label></td>
        <td><input type="text" class="contact" name="katbuku" value="<?php echo $katbuku;?>"></td>

        <div class="form_row">
              <td><label class="contact"> <strong>Nama Buku</strong></label></td>
        <td><input type="text" class="contact" name="namabuku" value="<?php echo $namabuku;?>"></td>

        <div class="form_row">
              <td><label class="contact"> <strong>Jumlah Buku</strong></label></td>
        <td><input type="text" class="contact" name="jumlahbuku" value="<?php echo $jumlahbuku;?>"></td>

	
			<tr>	
				<td><input type="hidden" name="kodebuku" value="<?php echo $_GET['kodebuku'];?>"></td>
				
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
