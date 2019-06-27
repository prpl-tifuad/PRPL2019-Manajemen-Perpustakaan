<html>
<head>
	<title>Add Users</title>
</head>
 
<body>
	<a href="transaksi.php"
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="800" border="10">
			
			<tr> 
				<td>Kode Transaksi</td>
				<td><input type="text" name="kodetransaksi"></td>
			</tr>

			
			<tr> 
				<td>ID Peminjam </td>
				<td><input type="text" name="idpeminjam"></td>
			</tr>
			<tr> 
				<td>Kode Buku</td>
				<td><input type="text" name="kodebuku"></td>
			</tr>
			

			<tr> 
				<td>Tanggal Peminjaman</td>
				<td><input type="date" name="tglpinjam"></td>
			</tr>
			<tr> 
				<td>Tanggal Pengembalian</td>
				<td><input type="date" name="tglkembali"></td>
			</tr>


			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
 



	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		
		$kodetransaksi = $_POST['kodetransaksi'];
		
		$idpeminjam = $_POST['idpeminjam'];
		$kodebuku = $_POST['kodebuku'];
		
		
		$tglpinjam = $_POST['tglpinjam'];
		$tglkembali = $_POST['tglkembali'];
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO transaksi(kodetransaksi,idpeminjam,kodebuku,tglpinjam,tglkembali) VALUES('$kodetransaksi','$idpeminjam','$kodebuku','$tglpinjam','$tglkembali')");
		
		// Show message when user added
		echo "User added successfully <a href='transaksi.php'>View Users</a>";
	}
	?>
</body>
</html>