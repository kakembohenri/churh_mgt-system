<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
	<style>
		.add-btn {
			background-color: #8ef3c5;
			padding: 0.8rem;
			text-decoration: none;
			border-radius: 0.3rem;

		}
	</style>
	<?php include('plans/expiry.php'); ?>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>
			<div class="span9" id="content">
				<div class="row-fluid">
					<!-- block -->
					<a href="add_members.php" class="add-btn" style='text-decoration: none; color: #fff;' id="add" data-placement="right" title="Click to Add a Member"><i class="icon-plus-sign icon-large"></i> Add A Member</a>


					<?php
					
					$count_log = mysqli_query($conn, "select * from members where church_id='$church_id'") or die('Error: ' + mysqli_error($conn));
					$count = mysqli_num_rows($count_log);

					?>
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left"><i class="icon-user"></i> Church Disciples</div>
							<div class="muted pull-right">
								Number of Disciples: <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>

						<div class="container-fluid">
							<div class="block-content collapse in" style="overflow: auto;">
								<div class="span12">
									<div class="pull-right">
										<a href="print_members.php" class="btn btn-info" id="print" data-placement="left" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a>
										<script type="text/javascript">
											$(document).ready(function() {
												$('#print').tooltip('show');
												$('#print').tooltip('hide');
											});
										</script>
									</div>
									<form action="delete_member.php" method="post">
										<table cellpadding="0" cellspacing="0" class="table table-striped" id="example">
									<?php if(isset($_SESSION['church_admin'])): ?>

											<a data-placement="right" title="Click to Delete checked item" data-toggle="modal" href="#delete_member" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"> Delete</i></a>
									<?php endif ?>
											<script type="text/javascript">
												$(document).ready(function() {
													$('#delete').tooltip('show');
													$('#delete').tooltip('hide');
												});
											</script>
											<?php include('modal_delete.php'); ?>
											<thead>
												<tr>
													<th>Check</th>
													<th>Disciple id</th>
													<th>First name</th>
													<th>Surname</th>
													<th>Residence</th>
													<th>Contact </th>
													<th>Birthday</th>
													<th>Ministry</th>
													<th>Marital Status</th>
													<th>Marriage anniversary</th>
													<th>Workplace</th>
													<th>Zone</th>
													<th>MC</th>
													<th>Occupation</th>
													<th>image</th>
												</tr>
											</thead>
											<tbody>
												<!-----------------------------------Content------------------------------------>
												<?php
												$members_query = mysqli_query($conn, "select * from members where church_id='$church_id'");
												while ($row = mysqli_fetch_array($members_query)) {
													$username = $row['id'];
													$id = $row['id'];

												?>

													<tr>
									<?php if(isset($_SESSION['church_admin'])): ?>

														<td width="30">
															<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
														</td>
													<?php endif ?>
														<td><?php echo $row['member_id']; ?></td>
														<td><?php echo $row['fname']; ?></td>
														<td><?php echo $row['surname']; ?></td>
														<td><?php echo $row['residence']; ?></td>
														<td><?php echo $row['mobile']; ?></td>
														<td><?php echo $row['birthday']; ?></td>
														<td><?php echo $row['ministry']; ?></td>
														<td><?php echo $row['marital_status']; ?></td>
														<td><?php echo $row['date_of_marriage']; ?></td>
														<td><?php echo $row['workplace']; ?></td>
														<td><?php echo $row['zone']; ?></td>
														<td><?php echo $row['mc']; ?></td>
														<td><?php echo $row['occupation']; ?></td>
														<td><img class="img-responsive" src="<?php echo "../public/" . $row['thumbnail']; ?>">
														</td>

													</tr>

												<?php } ?>

											</tbody>
										</table>
									</form>
								</div>
							</div>
						</div>
						<!-- /block -->
					</div>


				</div>
			</div>
			<?php include('footer.php'); ?>
		</div>
		<?php include('script.php'); ?>
</body>