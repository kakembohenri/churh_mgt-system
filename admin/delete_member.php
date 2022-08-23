<?php
session_start();

include('../lib/dbcon.php');
dbcon();

$church_id = $_SESSION['church_admin'];

if (isset($_POST['delete_member'])) {
	$id = $_POST['selector'];
	$N = count($id);
	for ($i = 0; $i < $N; $i++) {
		$result = mysqli_query($conn, "DELETE FROm members where church_id='$church_id' and id='$id[$i]'");
	}
	header("location: membersDetail.php");
}

if (isset($_POST['delete_visitor'])) {
	$id = $_POST['selector'];
	$N = count($id);
	for ($i = 0; $i < $N; $i++) {
		$result = mysqli_query($conn, "DELETE FROm visitor where id='$id[$i]'");
	}
	header("location: visitor.php");
}

if (isset($_POST['delete_mc'])) {
	$id = $_POST['selector'];
	$N = count($id);
	for ($i = 0; $i < $N; $i++) {
		$result = mysqli_query($conn, "DELETE FROm mc where id='$id[$i]'");
	}
	header("location: MCDetail.php");
}

if (isset($_POST['delete_child'])) {
	$id = $_POST['selector'];
	$N = count($id);
	for ($i = 0; $i < $N; $i++) {
		$result = mysqli_query($conn, "DELETE FROm sundays where child_id='$id[$i]' and church_id='$church_id'");
	}
	header("location: sschoolDetail.php");
}

if (isset($_POST['delete_pc'])) {
	$id = $_POST['selector'];
	$N = count($id);
	for ($i = 0; $i < $N; $i++) {
		$result = mysqli_query($conn, "DELETE FROm pc where id='$id[$i]'");
	}
	header("location: PC.php");
}

if (isset($_POST['delete_service_mc'])) {
	$id = $_POST['selector'];
	$N = count($id);
	for ($i = 0; $i < $N; $i++) {
		$result = mysqli_query($conn, "DELETE FROm service_mc where id='$id[$i]'");
	}
	header("location: add_congrigants_mc.php");
}
