<?php include('header.php'); ?>
<?php include('session.php'); ?>

<?php

$where = "";
$index = 0;

$print_url = "print_congrigant_member.php";
if (isset($_REQUEST['service_id'])) {
	$service_id = $_REQUEST['service_id'];
	$index = $_REQUEST['index'];
	$print_url .= "?service_id=$service_id&index=$index";
	$where = " join service on congrigants.service_id = service.service_id WHERE church_id='$church_id' and congrigants.service_id='$service_id' ";
}
$sql_query = "SELECT * FROM congrigants JOIN members ON members.member_id = congrigants.member_id $where ";



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
				<div class="row-fluid">

					<a href="add_congrigants.php" style='text-decoration: none; border: none; padding: 0.4rem; background: #8ef3c5; color: #fff; border-radius: 0.4rem;' id="add" data-placement="right" title="Register member congrigant"><i class="icon-plus-sign icon-large"></i> Register Member Congrigant</a>
					<script type="text/javascript">
						$(document).ready(function() {
							$('#add').tooltip('show');
							$('#add').tooltip('hide');
						});
					</script>
					<div id="sc" align="center">
						<image src="images/sclogo.png" width="45%" height="45%" />
					</div>
					<?php
					$count_student = mysqli_query($conn, $sql_query);
					$count = mysqli_num_rows($count_student);
					?>
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left"><i class="icon-reorder icon-large"></i> congrigants list</div>
							<div class="muted pull-right">
								Number of congrigants: <span class="badge badge-info"><?php echo $count; ?></span>
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
							<div class="row-fluid">
								<div class="empty">
									<div class="pull-left">

										<?php if (isset($_SESSION["success"])) : ?>
											<div class="alert alert-success alert-dismisible">
												<p><?php
													echo $_SESSION["success"];

													$_SESSION['success'] = '';
													?></p>
											</div>

										<?php endif ?>
										<div>

											<select data-placement="right" title="Click to  to select a service" id="selectService" class="btn form-control input " name="service_id">

												<?php
												$services = mysqli_query($conn, "select * from service where church_id='$church_id' order by(service_date) desc");

												?>

												<option>Select a Service</option>


												<?php while ($service = mysqli_fetch_array($services)) : ?>

													<option value="<?php echo ($service["service_id"]) ?>"><?php echo ($service["service_name"]) ?></option>

												<?php endwhile ?>
											</select>
										</div>


									</div>

									<div class="block-content collapse in">
										<div class="pull-right">
											<div>
											<?php if (isset($_SESSION['church_admin'])): ?>
												<button data-placement="left" title="Click to Delete check item" style="margin-top:6% ;" data-toggle="modal" href="#delete_congrigant" id="delete" name="delete_congrigant" class="btn btn-danger"><i class="icon-trash icon-large"> Delete</i></button>
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
									<input name="delete_congrigant" value="true" style="display:none;">
									<table cellpadding="0" cellspacing="0" border="0" class="table  table-striped" id="example">
										<thead>
											<tr>
											<?php if (isset($_SESSION['church_admin'])): ?>
												<th></th>
												<?php endif ?>
												<th>Disciple_ID</th>
												<th>Disciple Name </th>
												<th>Mobile No. </th>
												<th>Date & Time </th>
											</tr>
										</thead>
										<tbody>
											<!-----------------------------------Content------------------------------------>
											<?php
											$student_query = mysqli_query($conn, "$sql_query") or die(mysqli_error($conn));
											while ($row = mysqli_fetch_array($student_query)) {
												$congrigation_id = $row['congrigation_id'];

											?>

												<tr>
												<?php if (isset($_SESSION['church_admin'])): ?>
													<td width="30">
														<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $congrigation_id; ?>">
													</td>
													<?php endif ?>
													<td><?php echo $row['member_id']; ?></td>
													<td><?php echo $row['fname'] . " " . $row['sname']; ?></td>
													<td><?php echo $row['mobile']; ?></td>
													<td><?php echo $row['created_at']; ?></td>
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


	<script type="text/javascript">
		const selectService = document.querySelector("#selectService");
		const selectedIndex = '<?php echo $index ?>';
		selectService.selectedIndex = selectedIndex;
		selectService.addEventListener("change", ev => {
			let id = ev.target.value;
			let index = ev.target.selectedIndex;
			let url = "congrigants.php?service_id=" + id + "&index=" + index;
			window.location.href = url;
			//console.log(ev.target.value);
		})






		const confirmDelete = $("#confirmDelete");
		const deletionForm = $("#deletionTable");
		confirmDelete.on("click", (ev) => {
			deletionForm.trigger("submit");
		});
	</script>









</body>

</html>