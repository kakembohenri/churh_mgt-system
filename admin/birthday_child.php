<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
	<style>
		* {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
	</style>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>

			<div class="span9" id="content">
				<div class="row-fluid">
					<script type="text/javascript">
						$(document).ready(function() {
							$('#add').tooltip('show');
							$('#add').tooltip('hide');
						});
					</script>
					<div id="sc">
						<image src="images/sclogo.png" width="45%" height="45%" />
					</div>
					<?php
					$church_id = $_SESSION['church_admin'];
					$count_sundays = mysqli_query($conn, "SELECT * 
FROm  sundays
WHERE church_id='$church_id' and DATE_ADD(STR_TO_DATE(Birthday, '%Y-%m-%d'), INTERVAL YEAR(CURDATE())-YEAR(STR_TO_DATE(Birthday, '%Y-%m-%d')) YEAR) 
            BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)");
					$count = mysqli_num_rows($count_sundays);
					?>
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left"><i class="icon-reorder icon-large"></i>Upcoming Child Birthdays</div>
							<div class="muted pull-right">
								Birthdays <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>

						<h4 id="sc">\Child List
							<div align="right" id="sc">Date:
								<?php
								$date = new DateTime();
								echo $date->format('l, F jS, Y');
								?></div>
						</h4>


						<div class="container-fluid">
							<div class="row-fluid">
								<div class="empty">
									<div class="pull-right">
										<a href="print_child_bd.php" class="btn btn-info" id="print" data-placement="left" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a>
										<script type="text/javascript">
											$(document).ready(function() {
												$('#print').tooltip('show');
												$('#print').tooltip('hide');
											});
										</script>
									</div>
								</div>
							</div>
						</div>

						<div class="block-content collapse in">
							<div class="span12">
								<form action="" method="post">
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<thead>
											<tr>
												<th>Child_ID</th>
												<th>Child Name</th>
												<th>Contact </th>
												<th>parent name</th>
												<th>Birthday</th>
												<th>Age </th>


											</tr>
										</thead>
										<tbody>
											<!-----------------------------------Content------------------------------------>
											<?php
											$sundays_query = mysqli_query($conn, "SELECT * FROM  sundays
WHERE church_id='$church_id' and DATE_ADD(STR_TO_DATE(Birthday, '%Y-%m-%d'), INTERVAL YEAR(CURDATE())-YEAR(STR_TO_DATE(Birthday, '%Y-%m-%d')) YEAR) 
            BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)") or die(mysqli_error($conn));
											while ($row = mysqli_fetch_array($sundays_query)) {
												$username = $row['id'];

											?>

												<tr>
													<td><?php echo $row['child_id']; ?></td>
													<td><?php echo $row['fname'] . " " . $row['sname']; ?></td>
													<td><?php echo $row['mobile']; ?></td>
													<td><?php echo $row['parent_name']; ?></td>
													<td><?php echo $row['birthday']; ?></td>
													<td>
														<?php
														$birthDate = $row['birthday'];
														$currentDate = date("d-m-Y");
														$age = date_diff(date_create($birthDate), date_create($currentDate));

														echo $age->format("%y");
														?>
													</td>
												</tr>

											<?php } ?>

										</tbody>
									</table>
								</form>


							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>
</body>

</html>