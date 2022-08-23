<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
<?php include('plans/expiry.php'); ?>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>
			<div class="span3" id="addmembers">
				<?php include('addss.php'); ?>
				<?php include('notification.php') ?>
			</div>

			<div class="span6" id="">
				<div class="row-fluid">
					<!-- block -->


				</div>

				<?php
				$count_members = mysqli_query($conn, "select * from sundays where church_id='$church_id'");
				$count = mysqli_num_rows($count_members);
				?>
				<div id="block_bg" class="block">
					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left"></i><i class="icon-members"></i> Children's church List</div>
						<div class="muted pull-right">
							Number of Children's Church Kids: <span class="badge badge-info"><?php echo $count; ?></span>
						</div>
					</div>
					<div class="block-content collapse in" style="overflow: auto;">
						<div class="span12">
							<form action="delete_memberss.php" method="post">
								<table cellpadding="0" cellspacing="0" class="table table-striped" id="example">
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
											<th>Name</th>
											<th>Parent</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
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
												<td><?php echo $row['fname'] . " " . $row['sname']; ?> </td>
												<td><?php echo $row['parent_name']; ?></td>

												<?php include('toolttip_edit_delete.php');
												
												?>
												<td width="120">
													<a rel="tooltip" title="Edit Child" id="<?php echo $row['child_id']; ?>" href="edit_child.php<?php echo '?id=' . $row['child_id']; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit</i></a>
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

</html>