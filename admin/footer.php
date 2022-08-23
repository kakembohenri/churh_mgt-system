<!DOCTYPE html>
<html>

<head>
	<style>
		.footer {
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			background-color: #454545;
			color: #fff;
			text-align: center;

		}

		.p {
			margin: 1px 0 1px 0;

		}
	</style>
	<title></title>
</head>

<body>

</body>

</html>
<div class="footer">

	<strong>
		<p class="p"> &copy; Product name <?php
											$date = new DateTime();
											echo $date->format(' Y');
											?>
	</strong>
	Designed by: <u><a href="https://jccmissions.com" target="_blank" style="color: white;">i-max technology hub</a></u></p>

</div>

</div>

<?php
unset($_SESSION["success"]);
?>