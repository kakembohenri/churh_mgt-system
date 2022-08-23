<?php
include('../lib/dbcon.php'); 
dbcon(); 
if (isset($_POST['delete_mc'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROm mc where id='$id[$i]'");
}
header("location: MCDetail.php");
}
?>