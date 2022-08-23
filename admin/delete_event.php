<?php
session_start();
include('../lib/dbcon.php'); 
dbcon(); 

if (isset($_POST['delete_event'])){
	print_r($_POST);
    $id=$_POST['selector'];
	$N = count($id);
for($i=0; $i < $N; $i++){
	$result = mysqli_query($conn,"DELETE FROM event where id='$id[$i]'");	
}

$_SESSION["success"] = "Event  deleted successfully";
header("location:events.php");
}
?>