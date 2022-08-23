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
				<?php include('add_services.php'); ?>
			</div>
			<div class="span6" id="">
				<div class="row-fluid">
					<!-- block -->


				</div>

				<?php

				$count_members = mysqli_query($conn, "select * from members where church_id='$church_id'");
				$count = mysqli_num_rows($count_members);
				?>
				<div id="block_bg" class="block">


					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left"></i><i class="icon-members"></i> Church Member (s) List</div>
						<div class="muted pull-right">
							Number of Members: <span class="badge badge-info"><?php echo $count; ?></span>
						</div>
					</div>
					<div class="block-content collapse in">
						<div class="span12">

							<?php if (isset($_SESSION["success"])) : ?>
								<div class="alert alert-success alert-dismisible">
									<p><?php echo $_SESSION["success"] ?></p>
								</div>

							<?php endif ?>
							<form action="services.php" method="post">
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
									<select data-placement="right" title="Click to  to select a service" id="selectService" class="btn form-control" name="service_id">

										<?php
										$services = mysqli_query($conn, "select * from service order by(service_date) asc");

										?>

										<option value="0">Select a Service</option>


										<?php while ($service = mysqli_fetch_array($services)) : ?>

											<option value="<?php echo ($service["service_id"]) ?>"><?php echo ($service["service_name"]) ?></option>

										<?php endwhile ?>
									</select>

									<button data-placement="right" type="submit" title="Click to Add congrigants" id="submitBtn" style='text-decoration: none; border: none; padding: 0.4rem; background: #8ef3c5; color: #fff; border-radius: 0.4rem;' name="add_congrigant"><i class="icon-plus icon-large"> Add congrigants</i></button>

									<br>
									<br>


									<thead>
										<tr>
										<?php if (isset($_SESSION['church_admin'])): ?>
											<th></th>
											<?php endif ?>
											<th>Member_ID</th>
											<th>Member Name</th>
											<th>mobile</th>
											<th>Residence</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$members_query = mysqli_query($conn, "select * from members where church_id='$church_id'") or die(mysqli_error($conn));
										while ($row = mysqli_fetch_array($members_query)) {
											$id = $row['id'];
										?>

											<tr>
											<?php if (isset($_SESSION['church_admin'])): ?>
												<td width="30">
													<input class="uniform_on member-check" name="member_ids[]" type="checkbox" value="<?php echo $id; ?>" member-id='<?php echo $row['Member_ID']; ?>'>
												</td>
											<?php endif ?>
												<td><?php echo $row['member_id']; ?></td>
												<td><?php echo $row['fname'] . " " . $row['sname']; ?> </td>

												<td><?php echo $row['mobile']; ?></td>
												<td><?php echo $row['residence']; ?></td>

												<?php include('toolttip_edit_delete.php'); ?>



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
				alert("No member is  selected.");
			} else if (selectService.value == "0") {
				ev.preventDefault();
				alert("No Service is  selected.");
			}

		});
	</script>
</body>

</html>