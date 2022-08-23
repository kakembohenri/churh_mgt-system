<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
	<style>
		* {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
					<a href="add_sundaysch.php" style='text-decoration: none; padding: 0.4rem; background: #8ef3c5; color: white; border: none; border-radius: 0.5rem;' id="add" data-placement="right" title="Click to Add a child"><i class="icon-plus-sign icon-large"></i> Add A Child</a>


					<?php

					$count_log = mysqli_query($conn, "select * from sundays where church_id='$church_id'");
					$count = mysqli_num_rows($count_log);

					?>
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left"><i class="icon-user"></i> Church Sunday School Kids</div>
							<div class="muted pull-right">
								Number of Kids: <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>
						<div class="container-fluid">



							<div class="block-content collapse in" style="overflow: auto;">
								<div class="span12">
									<div class="pull-right">
										<a href="print_kids.php" class="btn btn-info" id="print" data-placement="left" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a>
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

											<a data-placement="right" title="Click to Delete checked child" data-toggle="modal" href="#delete_child" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"> Delete</i></a>
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
													<th></th>
													<th>Child_ID</th>
													<th>Child Name</th>
													<th>Contact </th>
													<th>parent name</th>
													<th>Birthday</th>
													<th>Residence</th>
													<th>Age </th>
													<th>image</th>



												</tr>
											</thead>
											<tbody>
												<!----------------------------------- Content------------------------------------>
												<?php
												$sundays_query = mysqli_query($conn, "select * from sundays where church_id='$church_id' order by(timestamp) desc") or die(mysqli_error($conn));
												while ($row = mysqli_fetch_array($sundays_query)) {
													$id = $row['id'];

												?>

													<tr>
														<td width="30">
															<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
														</td>
														<td><?php echo $row['child_id']; ?></td>
														<td><?php echo $row['fname'] . " " . $row['sname']; ?></td>
														<td><?php echo $row['mobile']; ?></td>
														<td><?php echo $row['parent_name']; ?></td>
														<td><?php echo $row['birthday']; ?></td>
														<td><?php echo $row['residence']; ?></td>
														<td><?php
															$birthDate = $row['birthday'];
															$currentDate = date("d-m-Y");
															$age = date_diff(date_create($birthDate), date_create($currentDate));

															echo $age->format("%y");
															?></td>
														<td><img class="img-responsive" src="<?php echo $row['thumbnail']; ?>"></td>

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