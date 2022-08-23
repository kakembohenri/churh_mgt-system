<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
	<style>
		* {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
	</style>
<?php 
    if($sub['end_date'] < date("Y-m-d")){
		header('location: dashboard.php');
    }
    
    ?>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>

			<div class="span9" id="content">
				<div class="row-fluid">
					<a href="add_visitor.php" style='text-decoration: none; border: none; padding: 0.4rem; background: #8ef3c5; color: #fff; border-radius: 0.4rem;' id="add" data-placement="right" title="Click to Add Visitors"><i class="icon-plus-sign icon-large"></i> Add Visitor</a>
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
					$count_members = mysqli_query($conn, "select * from visitor where church_id='$church_id'");
					$count = mysqli_num_rows($count_members);
					?>
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left"><i class="icon-reorder icon-large"></i> Registered Visitors List</div>
							<div class="muted pull-right">
								Number of Registered Visitors: <span class="badge badge-info"><?php echo $count; ?></span>
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
							<div class="block-content collapse in" style="overflow: auto;">
								<div class="span12">
									<div class="pull-right">
										<a href="print_Visitors.php" class="btn btn-info" id="print" data-placement="left" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a>
										<script type="text/javascript">
											$(document).ready(function() {
												$('#print').tooltip('show');
												$('#print').tooltip('hide');
											});
										</script>
									</div>
									<form action="delete_member.php" method="post">
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
											<?php if (isset($_SESSION['church_admin'])): ?>
											<a data-placement="right" title="Click to Delete checked item" data-toggle="modal" href="#delete_visitor" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"> Delete</i></a>
											<?php endif ?>
											<script type="text/javascript">
												$(document).ready(function() {
													$('#delete').tooltip('show');
													$('#delete').tooltip('hide');
												});
											</script>
											<?php include('modal_delete.php'); ?>

											<thead>
												<tr><?php if (isset($_SESSION['church_admin'])): ?>
													<th> </th>
												<?php endif ?>
													<th>Visitor Name</th>
													<th>Gender </th>
													<th>Residence</th>
													<th>Birthday</th>
													<th>Event</th>
													<th>mobile No. </th>



												</tr>
											</thead>
											<tbody>
												<!-----------------------------------Content------------------------------------>
												<?php
												$members_query = mysqli_query($conn, "select * from visitor where church_id='$church_id'") or die(mysqli_error($conn));
												while ($row = mysqli_fetch_array($members_query)) {
													$username = $row['id'];
													$id = $row['id'];

												?>

													<tr>
													<?php if (isset($_SESSION['church_admin'])): ?>
														<td width="30">
															<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
														</td>
														<?php endif ?>
														<td><?php echo $row['fname'] . " " . $row['sname']; ?></td>
														<td><?php echo $row['Gender']; ?></td>
														<td><?php echo $row['residence']; ?></td>
														<td><?php echo $row['birthday']; ?></td>
														<td><?php echo $row['ministry']; ?></td>
														<td><?php echo $row['mobile']; ?></td>

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