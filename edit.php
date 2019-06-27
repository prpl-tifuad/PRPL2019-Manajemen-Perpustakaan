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
	
	
	
	$kodetransaksi=$_POST['kodetransaksi'];
	$idpeminjam=$_POST['idpeminjam'];
	$kodebuku=$_POST['kodebuku'];
	$tglpinjam=$_POST['tglpinjam'];
	$tglkembali=$_POST['tglkembali'];

	// update user data
	$result = mysqli_query($mysqli, "UPDATE transaksi SET idpeminjam='$idpeminjam',kodebuku='$kodebuku',tglpinjam='$tglpinjam',tglkembali='$tglkembali' WHERE kodetransaksi='$kodetransaksi'");
	
	// Redirect to homepage to display updated user in list
	header("Location: transaksi.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$kodetransaksi = $_GET['kodetransaksi'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE kodetransaksi=$kodetransaksi");
 
while($user_data = mysqli_fetch_array($result))
{
	
	
	$idpeminjam = $user_data['idpeminjam'];
	$kodebuku = $user_data['kodebuku'];
	
	$tglpinjam = $user_data['tglpinjam'];
	$tglkembali = $user_data['tglkembali'];

}
?>
<html>
<head>
      <div class="title"><span class="title_icon"><img src="images/iconbuku.jpg" alt="" /></span>Edit Data Transaksi</div>
      <form action="edit.php" method="post" name="form1" id="data">
      <div class="feat_prod_box_details">
        <p class="details"> </p>
        <div class="contact_form">
          <div class="form_subtitle">Edit Data Transaksi</div>
          <form name="Update" href="">
            <div class="form_row">
            	<input type="hidden" name="kodetransaksi" value="<?php echo $kodetransaksi; ?>">

              <td><label class="contact"> <strong>Kode Transaksi</strong></label></td>
        <td><input type="int" class="contact" name="kodetransaksi" value="<?php echo $kodetransaksi;?>"></td>

            <div class="form_row">
              <td><label class="contact"> <strong>ID Peminjam</strong></label></td>
        <td><input type="int" class="contact" name="idpeminjam" value="<?php echo $idpeminjam;?>"></td>

        <div class="form_row">
              <td><label class="contact"> <strong>Kode Buku</strong></label></td>
        <td><input type="int" class="contact" name="kodebuku" value="<?php echo $kodebuku;?>"></td>

        <div class="form_row">
              <td><label class="contact"> <strong>Tanggal Peminjaman</strong></label></td>
        <td><input type="date" class="contact" name="tglpinjam" value="<?php echo $tglpinjam;?>"></td>

	<div class="form_row">
              <td><label class="contact"> <strong>Tanggal Pengembalian</strong></label></td>
        <td><input type="date" class="contact" name="tglkembali" value="<?php echo $tglkembali;?>"></td>
			

			<tr>	
				<td><input type="hidden" name="kodetransaksi" value="<?php echo $_GET['kodetransaksi'];?>"></td>
				
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
