<?php include('header.php'); ?>
<?php include('session.php'); ?>

<?php

$where = "";
$index = 0;

$print_url = "print_offering.php";
if (isset($_REQUEST['service_id'])) {
	$service_id = $_REQUEST['service_id'];
	$index = $_REQUEST['index'];
	$print_url .= "?service_id=$service_id&index=$index";
	$where = " join service on offering.service_id = service.service_id WHERE offering.service_id='$service_id' and church_id='$church_id' ";
}
$sql_query = "SELECT *FROM offering JOIN members ON members.member_ID = offering.member_ID $where ";


$total_tithe = 0;
$total_pastor = 0;
$total_evangelism = 0;
$total_offering = 0;
$total_sponsorship = 0;

?>

<body>
	<style>
		* {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
	</style>
	<?php include('plans/premium_plan.php'); ?>
	<?php include('plans/expiry.php'); ?>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>

			<div class="span9" id="content">
				<div class="row-fluid">

					<a href="addoffering.php" style='text-decoration: none; background: 
#8ef3c5; color: white; border: none; border-radius: 0.4rem; padding: 0.4rem;' id="add" data-placement="right" title="Click to Add Offering"><i class="icon-plus-sign icon-large"></i> Add Offering</a>

					<script type="text/javascript">
						$(document).ready(function() {
							$('#add').tooltip('show');
							$('#add').tooltip('hide');
						});
					</script>
					<div id="sc">
						<image src="../public/images/sclogo.png" width="45%" height="45%" />
					</div>
					<?php
					$count_student = mysqli_query($conn, $sql_query);
					$count = mysqli_num_rows($count_student);
					?>
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left"><i class="icon-reorder icon-large"></i> Offering payment list</div>
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
							<div class="row-fluid">
								<div class="empty">
									<div class="pull-left">

										<?php if (isset($_SESSION["success"])) : ?>
											<div class="alert alert-success alert-dismisible">
												<p><?php echo $_SESSION["success"] ?></p>
											</div>

										<?php endif ?>
										<form action="services.php" method="post">

											<select data-placement="right" title="Click to  to select a service" id="selectService" class="btn form-control input " name="service_id">

												<?php
												$services = mysqli_query($conn, "select * from service order by(service_date) desc");

												?>

												<option value="0">Select a Service</option>


												<?php while ($service = mysqli_fetch_array($services)) : ?>

													<option value="<?php echo ($service["service_id"]) ?>"><?php echo ($service["service_name"]) ?></option>

												<?php endwhile ?>
											</select>
										</form>

										<script type="text/javascript">
											$(document).ready(function() {
												$('#delete').tooltip('show');
												$('#delete').tooltip('hide');
											});
										</script>
									</div>



									<div class="block-content collapse in">
										<div class="pull-right">
											<div action="delete_services.php" method="post">
												
<?php if (isset($_SESSION['church_admin'])): ?>
												<a data-placement="left" title="Click to Delete check item" style="margin-top:6% ;" data-toggle="modal" href="#delete_offering" id="delete" class="btn btn-danger"><i class="icon-trash icon-large"> Delete</i></a>
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
							<div class="span13">
								<form action="delete_services.php" method="post" id="deletionTable">

									<input name="delete_offering" style="display:none;" />
									<table cellpadding="0" cellspacing="0" class="table  table-striped" id="example">
										<thead>
											<tr>
												<td></td>
												<th>Member_ID</th>
												<th>Member Name </th>
												<th>Mobile No. </th>
												<th>Tithe</th>
												<th>Offering</th>
												<th>Evangelism</th>
												<th>Sponsorship</th>
												<th>To pastor</th>




											</tr>
										</thead>
										<tbody>
											<!-----------------------------------Content------------------------------------>
											<?php
											$student_query = mysqli_query($conn, "$sql_query") or die(mysqli_error($conn));
											while ($row = mysqli_fetch_array($student_query)) {
												$id = $row["offeringid"];
											?>

												<tr>

													<td><input type="checkbox" name="selector[]" value="<?php echo ($id) ?>"></td>
													<td><?php echo $row['member_ID']; ?></td>
													<td><?php echo $row['fname'] . " " . $row['sname']; ?></td>
													<td><?php echo $row['mobile']; ?></td>
													<td><?php echo $row['tithe']; ?></td>
													<td><?php echo $row['Offering']; ?></td>
													<td><?php echo $row['Evangelism']; ?></td>
													<td><?php echo $row['Sponsorship']; ?></td>
													<td><?php echo $row['pastor']; ?></td>

												</tr>


												<?php
												$total_tithe += $row['tithe'];
												$total_evangelism += $row['Evangelism'];
												$total_offering += $row['Offering'];
												$total_sponsorship += $row['Sponsorship'];
												$total_pastor += $row['pastor'];
												?>

											<?php } ?>


											<tr>
												<th>Total</th>
												<th> </th>
												<th> </th>
												<th> </th>
												<th><?php echo $total_tithe; ?></th>
												<th><?php echo $total_offering; ?></th>
												<th><?php echo $total_evangelism; ?></th>
												<th><?php echo $total_sponsorship; ?></th>
												<th><?php echo $total_pastor; ?></th>


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


	<script type="text/javascript">
		const selectService = document.querySelector("#selectService");
		const selectedIndex = '<?php echo $index ?>';
		selectService.selectedIndex = selectedIndex;
		selectService.addEventListener("change", ev => {
			let id = ev.target.value;
			let index = ev.target.selectedIndex;
			let url = "offering.php?service_id=" + id + "&index=" + index;
			window.location.href = url;
			//console.log(ev.target.value);
		});








		const confirmDelete = $("#confirmOfferingDelete");
		const deletionForm = $("#deletionTable");
		confirmDelete.on("click", (ev) => {
			deletionForm.trigger("submit");
		});
	</script>
</body>

</html>