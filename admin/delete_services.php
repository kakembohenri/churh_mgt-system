<?php
session_start();
include('../lib/dbcon.php'); 
dbcon(); 

if (isset($_POST['delete_congrigant'])){
	print_r($_POST);
    $id=$_POST['selector'];
	$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM congrigants where congrigation_id='$id[$i]'");
	
}

$_SESSION["success"] = "Congrigant deleted successfully";
header("location:congrigants.php");
}

if (isset($_POST['delete_congrigant_child'])){
	print_r($_POST);
    $id=$_POST['selector'];
	$N = count($id);
for($i=0; $i < $N; $i++)
{
	$query = "DELETE FROM congrigants_child where congrigation_id='$id[$i]'";
	$result = mysqli_query($conn,"DELETE FROM congrigants_child where congrigation_id='$id[$i]'");
	
}

$_SESSION["success"] = "Congrigant deleted successfully";
header("location:child_congrigants.php");
}


//deleting congrigant mc
if (isset($_POST['delete_congrigant_mc'])){
    $id=$_POST['selector'];
	$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM congrigants_mc where congrigation_id='$id[$i]'");
	
}

$_SESSION["success"] = "MC Congrigant deleted successfully";
header("location:congrigants_mc.php");
}


//for deleting oferings
if (isset($_POST['delete_offering'])){
	print_r($_POST);
    $id=$_POST['selector'];
	$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM offering where offeringid='$id[$i]'");
	
}

$_SESSION["success"] = "Offering deleted successfully";
header("location:offering.php");
}



//for deleting giving
if (isset($_POST['delete_giving'])){
	print_r($_POST);
    $id=$_POST['selector'];
	$N = count($id);
for($i=0; $i < $N; $i++){
	$result = mysqli_query($conn,"DELETE FROM giving where givingid='$id[$i]'");
	
}

$_SESSION["success"] = "Giving deleted successfully";
header("location:giving.php");
}

?>