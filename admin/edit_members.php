<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_member_id = $_GET['id']; ?>

<body>
<?php include('plans/expiry.php'); ?>

	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>
			<div class="span3" id="adduser">
				<?php include('edit_members_form.php'); ?>
				<?php include('notification.php') ?>
			</div>
			<?php
			$count_members = mysqli_query($conn, "select * from members where church_id='$church_id' and member_id='$get_member_id'");
			$count = mysqli_num_rows($count_members);
			?>
			<div class="span6" id="">
				<div class="row-fluid">
					<!-- block -->
					<div class="empty">
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<i class="icon-info-sign"></i> <strong>Notice!:</strong> Check on the Edit Info to change Disciple.
						</div>
					</div>

					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left"><i class="icon-user"></i> Members(s) List</div>
							<div class="muted pull-right">
								Number of Members <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>
						<div class="block-content collapse in" style="overflow: auto;">
							<div class="span12">
								<form action="delete_members.php" method="post">
									<table cellpadding="0" cellspacing="0" class="table table striped" id="example">

										<thead>
											<tr>
												<th></th>
												<th>Member_ID</th>
												<th>Name</th>
												<th>mobile</th>
												<th>Residence</th>

												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$members_query = mysqli_query($conn, "select * from members where church_id='$church_id' and member_id='$get_member_id' order by(timestamp) desc") or die(mysqli_error($conn));
											while ($row = mysqli_fetch_array($members_query)) {
												$id = $row['id'];
											?>

												<tr>
													<td width="30">
														<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>
													<td><?php echo $row['member_id']; ?></td>
													<td><?php echo $row['fname'] . " " . $row['sname']; ?></td>

													<td><?php echo $row['mobile']; ?></td>
													<td><?php echo $row['residence']; ?></td>

													<?php include('toolttip_edit_delete.php'); ?>
													<td width="120">
														<a rel="tooltip" title="Edit members" id="<?php echo $id; ?>" href="edit_members.php<?php echo '?id=' . $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit Info</i></a>
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