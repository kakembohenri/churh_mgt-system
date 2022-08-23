<?php
include('../lib/dbcon.php'); 
dbcon(); 
include('session.php');

$action = "User has logged out";
mysqli_query($conn, "insert into activity_log(username, church_id, action) values('$username', '$church_id', '$action')") or die(mysqli_error($conn));

session_destroy();
header('location:../auth/login/login.php');
