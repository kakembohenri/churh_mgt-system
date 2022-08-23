<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php
$church_id = $_SESSION['church_admin'];
?>

<body>
	<style>
		* {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
	</style>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>
			<div class="span3" id="addmembers">
				<?php include('add_services_child.php'); ?>
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
						<div class="muted pull-left"></i><i class="icon-members"></i> Church Child (s) List</div>
						<div class="muted pull-right">
							Number of Children: <span class="badge badge-info"><?php echo $count; ?></span>
						</div>
					</div>
					<div class="block-content collapse in">
						<div class="span12">

							<?php if (isset($_SESSION["success"])) : ?>
								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<img id="avatar1" class="img-responsive" src="images/NO-ImAGE-AVAILABLE.jpg">
								<?php endif ?>
								<form action="services.php" method="post">
									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
										<select data-placement="right" title="Click to  to select a service" id="selectService" class="btn form-control" name="service_id">

											<?php
											$services = mysqli_query($conn, "select * from service_child where church_id='$church_id' order by(service_date) desc");

											?>

											<option value="0">Select a Service</option>


											<?php while ($service = mysqli_fetch_array($services)) : ?>

												<option value="<?php echo ($service["service_id"]) ?>"><?php echo ($service["service_name"]) ?></option>

											<?php endwhile ?>
										</select>

										<button data-placement="right" type="submit" title="Click to Add congrigants" id="submitBtn" style='text-decoration: none; border: none; padding: 0.4rem; background: #ff652f; color: #fff; border-radius: 0.4rem;' name="add_child_congrigant"><i class="icon-plus icon-large"> Add congrigants</i></button>

										<br>
										<br>
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
												<th>mobile</th>
												<th>Residence</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$members_query = mysqli_query($conn, "select * from sundays") or die(mysqli_error());
											while ($row = mysqli_fetch_array($members_query)) {
												$id = $row['id'];
											?>

												<tr>
													<td width="30">
														<input class="uniform_on member-check" name="Member_ids[]" type="checkbox" value="<?php echo $id; ?>" member-id='<?php echo $row['Child_ID']; ?>'>
													</td>
													<td><?php echo $row['Child_ID']; ?></td>
													<td><?php echo $row['fname'] . " " . $row['sname']; ?> </td>

													<td><?php echo $row['mobile']; ?></td>
													<td><?php echo $row['Residence']; ?></td>



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


	<script type="text/javascript">
		let selectedMembers = [];
		const memberChecks = document.querySelectorAll(".member-check");
		const selectService = document.querySelector("#selectService");
		const submitBtn = document.querySelector("#submitBtn");

		memberChecks.forEach(check => {

			check.addEventListener('change', ev => {

				memberId = ev.target.value;

				if (ev.target.checked) {
					if (!selectedMembers.includes(memberId)) {
						selectedMembers.push(memberId);

					}
				} else {

					let finalMembers = [];
					for (var index = 0; index < selectedMembers.length; index++) {
						if (selectedMembers[index] !== memberId) {
							finalMembers[index] = selectedMembers[index];
						}
					}

					selectedMembers = finalMembers.filter(it => {
						return it != undefined && it != 'empty'
					})

				}

				console.log(selectedMembers);



			})
		});

		submitBtn.addEventListener("click", ev => {
			if (!selectedMembers.length > 0) {
				ev.preventDefault();
				alert("No Child is  selected.");
			} else if (selectService.value == "0") {
				ev.preventDefault();
				alert("No Service is  selected.");
			}

		});
	</script>
</body>

</html>