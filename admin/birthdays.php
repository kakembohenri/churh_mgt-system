<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
	<style>
		* {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
	</style>
	<?php include('plans/expiry.php'); ?>
	<?php include('plans/premium_plan.php'); ?>
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

					$count_members = mysqli_query($conn, "select * 
from  members
where church_id='$church_id' and DATE_ADD(STR_TO_DATE(birthday, '%Y-%m-%d'), INTERVAL YEAR(CURDATE())-YEAR(STR_TO_DATE(birthday, '%Y-%m-%d')) YEAR) 
            between CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)") or die('Error 2: ' . mysqli_error($conn));
					$count = mysqli_num_rows($count_members);
					?>
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left"><i class="icon-reorder icon-large"></i>Upcoming Member Birthdays</div>
							<div class="muted pull-right">
								Birthdays <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>

						<h4 id="sc">members List
							<div id="sc">Date:
								<?php
								$date = new DateTime();
								echo $date->format('l, F jS, Y');
								?></div>
						</h4>


						<div class="container-fluid">
							<div class="row-fluid">
								<div class="empty">
									<div class="pull-right">
										<a href="print_members_bd.php" class="btn btn-info" id="print" data-placement="left" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a>
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

						<div class="block-content collapse in" style="overflow: auto;">
							<div class="span12">
								<form action="" method="post">
									<table cellpadding="0" cellspacing="0" class="table table stripeds" id="example">
										<thead>
											<tr>
												<th>Member_ID</th>
												<th>Member Name</th>
												<!-- <th>Gender </th> -->
												<th>Residence</th>
												<th>Birthday</th>
												<th>ministry</th>
												<th>contact </th>
												<th>ANNIVERSARY </th>



											</tr>
										</thead>
										<tbody>
											<!-----------------------------------Content------------------------------------>
											<?php
											$members_query = mysqli_query($conn, "select * 
from members
where church_id='$church_id' and DATE_ADD(STR_TO_DATE(birthday, '%Y-%m-%d'), INTERVAL YEAR(CURDATE())-YEAR(STR_TO_DATE(birthday, '%Y-%m-%d')) YEAR) 
            between CURDATE() and DATE_ADD(CURDATE(), INTERVAL 7 DAY)") or die('Error 1: ' . mysqli_error($conn));
											while ($row = mysqli_fetch_array($members_query)) {
												$username = $row['id'];

											?>

												<tr>
													<td><?php echo $row['member_id']; ?></td>
													<td><?php echo $row['fname'] . " " . $row['sname']; ?></td>
													<td><?php echo $row['residence']; ?></td>
													<td><?php echo $row['birthday']; ?></td>
													<td><?php echo $row['ministry']; ?></td>
													<td><?php echo $row['mobile']; ?></td>
													<td><?php echo $row['date_of_marriage']; ?></td>

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