<?php
session_start();
include('../lib/dbcon.php'); 
dbcon(); 

if (isset($_POST['add_congrigant'])){

$service_id = $_POST['service_id'];
$id=$_POST['member_ids'];
$N = count($id);

for($i=0; $i < $N; $i++)
{
	$member_id = $id[$i];
	$check = mysqli_query($conn,"SELECT * FROM congrigants where service_id='$service_id' and member_id='$member_id' ");
	if(!mysqli_num_rows($check)>0){
	  $result = mysqli_query($conn,"INSERT into congrigants(service_id,member_id) values('$service_id','".$id[$i]."')");
	}
}
$_SESSION["success"] = "Congrigant are recorded successfully";
header("location:add_congrigants.php");
}


if (isset($_POST['add_child_congrigant'])){
	$service_id = $_POST['service_id'];
	$id=$_POST['Member_ids'];
	$N = count($id);
	
	for($i=0; $i < $N; $i++)
	{
		$member_id = $id[$i];
		$check = mysqli_query($conn,"SELECT * FROM congrigants_child where service_id='$service_id' and Child_ID='$member_id' ");
		if(!mysqli_num_rows($check)>0){
		  $result = mysqli_query($conn,"INSERT into congrigants_child(service_id,Child_ID) values('$service_id','".$id[$i]."')");
		}
	}

	$_SESSION["success"] = "Congrigant are recorded successfully";
	header("location:add_child_congrigants.php");
	}

if (isset($_POST['add_congrigant_mc'])){

	$service_id = $_POST['service_id'];
	$id=$_POST['member_ids'];
	$N = count($id);
	
	for($i=0; $i < $N; $i++)
	{
		$mc_id = $id[$i];
		$check = mysqli_query($conn,"SELECT * FROM congrigants_mc where service_id='$service_id' and mc_id='$mc_id' ");
		if(!mysqli_num_rows($check)>0){
			$result = mysqli_query($conn,"INSERT into congrigants_mc(service_id,member_id) values('$service_id','".$id[$i]."')");
		}
	}
	$_SESSION["success"] = "Congrigant are recorded successfully";
	header("location:add_congrigant_mc.php");
	}
	?>
?>