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
			<div class="span3" id="adduser">
				<?php include('add_user.php'); ?>
				<?php include('notification.php')
				?>
			</div>
			<div class="span6" id="">
				<div class="row-fluid">
					<!-- block -->
					<?php
					// $count_user = mysqli_query($conn, "select * from admin");
					// $count = mysqli_num_rows($count_user);
					?>
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left"></i><i class="icon-user"></i> System User (s) List</div>
							<div class="muted pull-right">
								Number of System user: <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<form action="delete_users.php" method="post">
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<a data-placement="right" title="Click to Delete check item" data-toggle="modal" href="#user_delete" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"> Delete</i></a>
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
												<th>Name</th>
												<th>Role</th>
												<th>Edit</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$user_query = mysqli_query($conn, "SELECT * from church_staff where church_id='$church_id' ") or die(mysqli_error($conn));
											while ($row = mysqli_fetch_array($user_query)) {
												$id = $row['admin_id'];
											?>

												<tr>
													<td width="30">
														<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>

													<td><?php echo $row['surname']; ?> <?php echo $row['first_name']; ?></td>

													<td><?php echo $row['role']; ?></td>

													<?php include('toolttip_edit_delete.php'); ?>
													<td width="120">
														<a rel="tooltip" title="Edit staff" id="e<?php echo $id; ?>" href="edit_user.php<?php echo '?id=' . $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit User</i></a>
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