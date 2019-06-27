<?php
// include database connection file
include_once("config.php");
 
// Get id from URL to delete that user
$idstaff = $_GET['idstaff'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM pustakawan WHERE idstaff=$idstaff");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:staff.php");
?>
