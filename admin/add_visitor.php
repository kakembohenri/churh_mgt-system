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
			<div class="span3" id="addmembers">
				<?php include('addvisitor.php'); ?>
				<?php include('notification.php'); ?>
			</div>
			<div class="span6" id="">
				<div class="row-fluid">
					<!-- block -->



					<?php
					
					$count_members = mysqli_query($conn, "select * from visitor where church_id='$church_id'");
					$count = mysqli_num_rows($count_members);
					?>
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left"></i><i class="icon-members"></i> Church Visitor(s) List</div>
							<div class="muted pull-right">
								Number of Visitors: <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<form action="delete_member.php" method="post">
									<table cellpadding="0" cellspacing="0" border="0" class="table  table-striped" id="example">
										

										<?php if (isset($_SESSION['church_admin'])): ?>
										<a data-placement="right" title="Click to Delete check Visitor" data-toggle="modal" href="#delete_visitor" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"> Delete</i></a>
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
											<?php if (isset($_SESSION['church_admin'])): ?>
												<th></th>
											<?php endif ?>
												<th>Visitor Name</th>
												<th>Gender </th>
												<th>Residence</th>
												<th>Birthday</th>
												<th>Event</th>
												<th>mobile No. </th>
												<?php if (isset($_SESSION['church_admin'])): ?>
												<th>Action </th>
												<?php endif ?>
											</tr>
										</thead>
										<tbody>
											<?php
											$members_query = mysqli_query($conn, "select * from visitor where church_id='$church_id'") or die(mysqli_error($conn));
											while ($row = mysqli_fetch_array($members_query)) {
												$id = $row['id'];
											?>

												<tr>
												<?php if (isset($_SESSION['church_admin'])): ?>
													<td width="30">
														<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>
													<?php endif ?>
													<td><?php echo $row['fname'] . " " . $row['sname']; ?> </td>

													<td><?php echo $row['Gender']; ?></td>
													<td><?php echo $row['residence']; ?></td>
													<td><?php echo $row['birthday']; ?></td>
													<td><?php echo $row['ministry']; ?></td>
													<td><?php echo $row['mobile']; ?></td>

													<?php include('toolttip_edit_delete.php'); ?>
													<?php if (isset($_SESSION['church_admin'])): ?>
													<td width="120">

														<a rel="tooltip" title="Edit Visitor" id="e<?php echo $id; ?>" href="edit_visitor.php<?php echo '?id=' . $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit</i></a>
													</td>
														<?php endif ?>

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