<?php
error_reporting(0);
?>


<?php

$user_label = "Administrator";

$is_data_entrant = false;

$is_treasurer = false;


$referer = "";

if (isset($_SERVER['HTTP_REFERER'])) {
	$referer =  $_SERVER['HTTP_REFERER'];
}

$contains_data = strpos($referer, "/data/");

$contains_treasurer = strpos($referer, "/giving/");
if ($contains_data >= 0 && $contains_data != null) {
	$is_data_entrant = true;

	$user_label = "Data Entrant";
} elseif ($contains_treasurer >= 0 && $contains_treasurer != null) {
	$is_treasurer = true;

	$user_label = "Treasurer";
}

?>
<!DOCTYPE html>
<html class="no-js">

<head>

	<title>Product name</title>
	<meta name="description" content="Church management system">
	<meta name="keywords" content="church managemet system">
	<meta name="author" content="Samuel Muhwezi">
	<meta charset="UTF-8">
	<!-- Bootstrap -->
	<!-- <link href="../public/images/logo7.png" rel="icon" type="image"> -->
	<link href="../public/bootstrap/css/index_background.css" rel="stylesheet" media="screen" />
	<link href="../public/bootstrap/css/background.css" rel="stylesheet" media="screen">
	<link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="../public/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link href="../public/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	<link href="../public/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
	<link href="../public/bootstrap/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../public/bootstrap/css/my_style.css" rel="stylesheet" media="screen">
	<link href="../public/bootstrap/css/print.css" rel="stylesheet" media="print">
	<link href="../public/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
	<link href="../public/assets/styles.css" rel="stylesheet" media="screen">
	<link href="../public/bootstrap/css/bootstrap.min1.css" rel="stylesheet" media="screen">
	<link href="../public/bootstrap/css/sb_admin.css" rel="stylesheet" media="screen">
	<link href=".//style.css" rel="stylesheet" media="screen">
	<link href='./notification.css' rel='stylesheet' />
	<link href='../public/assets/subcription.css' rel='stylesheet' />

	<!-- HTmL5 shim, for IE6-8 support of HTmL5 elements -->
	<!--[if lt IE 9]>
          
        <![endif]-->
	<!-- calendar css -->
	<script src="../public/bootstrap/js/html5.js"></script>
	<link href="../public/vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
	<script src="../public/vendors/jquery-1.9.1.min.js"></script>
	<script src="../public/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<!-- data table -->
	<link href="../public/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
	<!-- notification  -->
	<link href="../public/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
	<!-- wysiwug  -->
	<link rel="stylesheet" type="text/css" href="../public/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css">
	</link>

	<script src="../public/vendors/jGrowl/jquery.jgrowl.js"></script>
</head>
<?php include('../lib/dbcon.php');
dbcon();

?>