<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>
			<div class="span3" id="addmembers">
				<?php include('add_services_mc.php'); ?>
			</div>
			<div class="span6" id="">
				<div class="row-fluid">
					<!-- block -->


				</div>

				<?php
				$count_members = mysqli_query($conn, "select * from service_mc");
				$count = mysqli_num_rows($count_members);
				?>
				<div id="block_bg" class="block">


					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left"></i><i class="icon-members"></i> MC Servcie (s) List</div>
						<div class="muted pull-right">
							Number of Servcie: <span class="badge badge-info"><?php echo $count; ?></span>
						</div>
					</div>
					<div class="block-content collapse in" style="overflow: auto;">
						<div class="span12">

							<?php if (isset($_SESSION["success"])) : ?>
								<div class="alert alert-success alert-dismisible">
									<p><?php echo $_SESSION["success"] ?></p>
								</div>

							<?php endif ?>
							<form action="delete_member.php" method="post">
								<table cellpadding="0" cellspacing="0" class="table table-striped" id="example">
									<a data-placement="right" title="Click to Delete checked item" data-toggle="modal" href="#delete_service_mc" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"> Delete</i></a>

									<thead>
										<tr>
											<th></th>
											<th>Service name</th>
											<th>Service date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$members_query = mysqli_query($conn, "select * from service_mc order by (service_date) desc") or die(mysqli_error($conn));
										while ($row = mysqli_fetch_array($members_query)) {
											$id = $row['service_id'];
										?>
											<tr>
												<td width="30">
													<input id="optionsCheckbox" style='padding: 1rem;' class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['service_name']; ?></td>
												<td><?php echo $row['service_date']; ?></td>

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