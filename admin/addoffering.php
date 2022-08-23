<?php

$sql_query = "select * from offering INNER JOIN members ON members.Member_ID=offering.Member_ID ";
?>
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
				<?php include('add_offering.php'); ?>
			</div>
			<div class="span6" id="">
				<div class="row-fluid">
					<!-- block -->

					<?php
					$count_user = mysqli_query($conn, $sql_query);
					$count = mysqli_num_rows($count_user);
					?>
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left"></i><i class="icon-user"></i> Offering List</div>
							<div class="muted pull-right">
								Number of offerings: <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<form action="delete_users.php" method="post">
									<table cellpadding="0" cellspacing="0" class="table table-striped" id="example">
										
<?php if (isset($_SESSION['church_admin'])): ?>
										<a data-placement="right" title="Click to Delete check item" data-toggle="modal" href="#user_delete" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"> Delete</i></a>
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
												<th>Member_ID</th>
												<th>Name </th>
												<th>Tithe</th>
												<th>Offering</th>
												<th>Evangelism</th>
												<th>Sponsorship</th>
												<th>To pastor</th>


											</tr>
										</thead>
										<tbody>
											<?php
											$user_query = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
											while ($row = mysqli_fetch_array($user_query)) {
												$id = $row['id'];
											?>

												<tr>
													<td width="30">
														<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>
													<td><?php echo $row['member_id']; ?></td>
													<td><?php echo $row['fname'] . " " . $row['sname']; ?></td>
													<td><?php echo $row['tithe']; ?></td>
													<td><?php echo $row['Offering']; ?></td>
													<td><?php echo $row['Evangelism']; ?></td>
													<td><?php echo $row['Sponsorship']; ?></td>
													<td><?php echo $row['pastor']; ?></td>




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