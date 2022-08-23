<?php include('header.php'); ?>
<?php include('session.php'); ?>


<?php


$sql_query = "SELECT *FROM giving JOIN members ON members.Member_ID = giving.Member_ID where giving.church_id='$church_id' and members.church_id='$church_id'";


$total_Amount = 0;
?>

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
				<?php if (isset($_SESSION["success"])) : ?>
					<div class="alert alert-success alert-dismisible">
						<p><?php echo $_SESSION["success"] ?></p>
					</div>
				<?php endif ?>
				<div class="row-fluid">

					<a href="addgiving.php" style='text-decoration: none; border: none; padding: 0.4rem; background: #8ef3c5; color: #fff; border-radius: 0.4rem;' id="add" data-placement="right" title="Click to Add giving"><i class="icon-plus-sign icon-large"></i> Add giving</a>

					<script type="text/javascript">
						$(document).ready(function() {
							$('#add').tooltip('show');
							$('#add').tooltip('hide');
						});
					</script>
					<div id="sc" align="center">
						<image src="../public/images/sclogo.png" width="45%" height="45%" />
					</div>
					<?php
					$count_student = mysqli_query($conn, $sql_query);
					$count = mysqli_num_rows($count_student);
					?>
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left"><i class="icon-reorder icon-large"></i> giving list</div>


							<div class="muted pull-right">
								Number of payments: <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>

						<h4 id="sc">
							<div align="right" id="sc">Date:
								<?php
								$date = new DateTime();
								echo $date->format('l, F jS, Y');
								?></div>
						</h4>

						<div class="container-fluid">


							<div class="row-fluid inline">
								<div class="empty">
									<div class="block-content collapse in">
										<div class="pull-right">
											<div action="delete_services.php" method="post">
											<?php if (isset($_SESSION['church_admin'])): ?>
												<a data-placement="left" title="Click to Delete check item" style="margin-top:6% ;" data-toggle="modal" href="#delete_giving" id="delete" class="btn btn-danger"><i class="icon-trash icon-large"> Delete</i></a>
												<?php endif ?>
												<script type="text/javascript">
													$(document).ready(function() {
														$('#delete').tooltip('show');
														$('#delete').tooltip('hide');
													});
												</script>

												<?php include('modal_delete.php'); ?>
												<a href="<?php echo $print_url ?>" class="btn btn-info" id="print" data-placement="left" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a>
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
							</div>
						</div>


						<div class="block-content collapse in">
							<div class="span12">
								<form action="delete_services.php" method="post" id="deletionTable">
									<input name='delete_giving' hidden />
									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
										<thead>
											<tr>
												<th></th>

												<th>Member Name </th>
												<th>Mobile No. </th>
												<th>Amount </th>
												<th>Giving Towards </th>
												<th>Date & Time </th>
											</tr>
										</thead>
										<tbody>
											<!-----------------------------------Content------------------------------------>
											<?php
											$student_query = mysqli_query($conn, "$sql_query") or die(mysqli_error($conn));
											while ($row = mysqli_fetch_array($student_query)) {

												$id = $row['givingid'];


											?>

												<tr>

													<td><input type="checkbox" name="selector[]" value="<?php echo ($id)  ?>"></td>
													<!-- <td><?php //echo $row['Member_ID']; 
																?></td> -->
													<td><?php echo $row['fname'] . " " . $row['sname']; ?></td>
													<td><?php echo $row['mobile']; ?></td>
													<td><?php echo $row['Amount']; ?></td>
													<td><?php echo $row['reason']; ?></td>
													<td><?php echo $row['paytime']; ?></td>
												</tr>


												<?php
												$total_Amount += $row['Amount'];
												?>

											<?php } ?>


											<tr>
												<th>Total</th>
												<th> </th>
												<th> </th>
												<th><?php echo $total_Amount; ?></th>
												<th></th>
												<th></th>
											</tr>
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





	<script>
		const confirmDelete = $("#confirmGivingDelete");
		const deletionForm = $("#deletionTable");
		confirmDelete.on("click", (ev) => {
			deletionForm.trigger("submit");
		});
	</script>
</body>

</html>