<?php
//Start session
session_start();

require('dbconn.php');

$_SESSION['plan'] = "";
//Check whether the session variable for 
if (!empty($_SESSION['church_admin'])) {

    $church_id = $_SESSION['church_admin'];
    $sys_user = $_SESSION['church_admin'];

    $user_query = mysqli_query($conn, "select * from churches where user_id = '$church_id'") or die('Error: ' + mysqli_error($conn));
    $user_row = mysqli_fetch_array($user_query);
    $username = $user_row['name'];

    $query = mysqli_query($conn, "select * from subscription where user_id='$church_id' order by timestamp desc limit 1") or die(mysqli_error($conn));
    $sub = mysqli_fetch_array($query);
    
} elseif (!empty($_SESSION['admin'])) {
    $church_id = $_SESSION['admin'];

    $user_query = mysqli_query($conn, "select * from admin where user_id = '$church_id'") or die('Error: ' + mysqli_error($conn));
    $user_row = mysqli_fetch_array($user_query);
    $admin_name = $user_row['firstname'] . " " . $user_row['surname'];
    $username = $admin_name;

    $query = mysqli_query($conn, "select * from subscription where user_id='$church_id' order by timestamp desc limit 1") or die(mysqli_error($conn));
    $sub = mysqli_fetch_array($query);
} elseif(!empty($_SESSION['data_entrant'])) {

    $data_id = $_SESSION['data_entrant'];
    $sys_user = $_SESSION['data_entrant'];

    $user_query = mysqli_query($conn, "select * from church_staff where user_id = '$data_id'") or die('Error: ' + mysqli_error($conn));
    $user_row = mysqli_fetch_array($user_query);
    $data_entrant_name = $user_row['surname'] . " " . $user_row['first_name'];

    $username = $data_entrant_name;

    $church_id = $user_row['church_id'];
    $query = mysqli_query($conn, "select * from subscription where user_id='$church_id' order by timestamp desc limit 1") or die(mysqli_error($conn));
    $sub = mysqli_fetch_array($query);

} elseif(!empty($_SESSION['church_sub_admin'])) {
    $admin_id = $_SESSION['church_sub_admin'];
    $sys_user = $_SESSION['church_sub_admin'];
    
    // echo "Church admin is: ". $sys_user; 

    $user_query = mysqli_query($conn, "select * from church_staff where user_id = '$admin_id'") or die('Error: ' + mysqli_error($conn));
    $user_row = mysqli_fetch_array($user_query);
    $admin_name = $user_row['surname'] . " " . $user_row['first_name'];

    $username = $admin_name;

    $church_id = $user_row['church_id'];
    $query = mysqli_query($conn, "select * from subscription where user_id='$church_id' order by timestamp desc limit 1") or die(mysqli_error($conn));
    $sub = mysqli_fetch_array($query);

}else{
    header("location: ../auth/login/login.php");
    exit();

}
// if (!isset($_SESSION['church_admin']) || (trim($_SESSION['church_admin']) == '')) {
// }
