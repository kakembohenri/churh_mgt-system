<?php include('header.php'); ?>
<?php include('../sms/sms/sms.php'); ?>
<?php include('../sms/test.php'); ?>
<?php include('session.php'); ?>

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
			<div class="span3" id="adduser">
				<?php include('add_sms.php'); ?>
			</div>
			<div class="span6" id="">
				<div class="row-fluid">
					<!-- block -->
					<br>
					<a data-placement="right" style='text-decoration: none; border: none; padding: 0.4rem; background: #01ff01; color: #fff; border-radius: 0.4rem; cursor: pointer;' data-placement="right" title="Change database"><i class="icon-plus-sign icon-large"> Member Details</i></a>
					<o:p>&nbsp; &nbsp; &nbsp; &nbsp;</o:p>
					<a data-placement="right" style='text-decoration: none; border: none; padding: 0.4rem; background: hotpink; color: #fff; border-radius: 0.4rem; cursor: pointer;' data-placement="right" title="Change database"><i class="icon-plus-sign icon-large"> Child Details</i></a>
					<o:p>&nbsp; &nbsp; &nbsp; &nbsp; </o:p>
					<a data-placement="right" style='text-decoration: none; border: none; padding: 0.4rem; background: #00b5ff; color: #fff; border-radius: 0.4rem; cursor: pointer;' data-placement="right" title="Change database"><i class="icon-plus-sign icon-large"> MC Details</i></a>
					<o:p>&nbsp; &nbsp; &nbsp; </o:p>
					<a data-placement="left" style='text-decoration: none; border: none; padding: 0.4rem; background: #454545; color: #fff; border-radius: 0.4rem; cursor: pointer;' data-placement="right" title="Change database"><i class="icon-plus-sign icon-large"> Visitor Details</i></a>
					<?php
					$count_user = mysqli_query($conn, "select * from members");
					$count = mysqli_num_rows($count_user);
					?>
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left"></i><i class="icon-user"></i> Members List</div>
							<div class="muted pull-right">
								Number of Members: <span class="badge badge-info"><?php echo $count; ?></span>
							</div>
						</div>

						<div class="container-fluid">
							<div class="row-fluid">
								<div class="empty">
									<div class="pull-left">

										<?php if (isset($_SESSION["success"])) : ?>
											<div class="alert alert-success alert-dismisible">
												<p><?php echo $_SESSION["success"] ?></p>
											</div>

										<?php endif ?>

										<script type="text/javascript">
											$(document).ready(function() {
												$('#delete').tooltip('show');
												$('#delete').tooltip('hide');
											});
										</script>
									</div>

								</div>
							</div>
						</div>



						<div class="block-content collapse in tab" style="display: none;">
							<div class="span12">
								<form action="add_users.php" method="POST">
									<table cellpadding="0" cellspacing="0" border="0" class="table member-table" id="example">
										<script type="text/javascript">
											$(document).ready(function() {
												$('#delete').tooltip('show');
												$('#delete').tooltip('hide');
											});
										</script>
										<?php include('modal_add.php'); ?>
										<thead>
											<tr>
												<th><input id="checkAll" class="uniform_on" type="checkbox">
												</th>
												<th>Member_ID</th>
												<th>Name</th>
												<th>Contact</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$user_query = mysqli_query($conn, "select * from members ") or die(mysqli_error($conn));
											while ($row = mysqli_fetch_array($user_query)) {
												$id = $row['id'];
											?>

												<tr>
													<td width="30">
														<input id="optionsCheckbox" class="uniform_on contact-check" name="selector[]" type="checkbox" value="<?php echo $row['mobile']; ?>">
													</td>


													<td><?php echo $row['Member_ID']; ?></td>
													<td><?php echo $row['fname'] . " " . $row['sname']; ?></td>
													<td><?php echo $row['mobile']; ?></td>


													<?php include('toolttip_edit_delete.php'); ?>



												</tr>
											<?php } ?>
										</tbody>
									</table>
								</form>
							</div>
						</div>



						<div class="block-content collapse in tab" style="display: none;">
							<div class="span12">
								<form action="add_users.php" method="POST">
									<table cellpadding="0" cellspacing="0" border="0" class="table member-table" id="example">
										<script type="text/javascript">
											$(document).ready(function() {
												$('#delete').tooltip('show');
												$('#delete').tooltip('hide');
											});
										</script>
										<?php include('modal_add.php'); ?>
										<thead>
											<tr>
												<th><input id="checkAll" class="uniform_on" type="checkbox">
												</th>
												<th>Child_ID</th>
												<th>Name</th>
												<th>Contact</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$user_query = mysqli_query($conn, "select * from sundays ") or die(mysqli_error($conn));
											while ($row = mysqli_fetch_array($user_query)) {
												$id = $row['id'];
											?>

												<tr>
													<td width="30">
														<input id="optionsCheckbox" class="uniform_on contact-check" name="selector[]" type="checkbox" value="<?php echo $row['mobile']; ?>">
													</td>


													<td><?php echo $row['Child_ID']; ?></td>
													<td><?php echo $row['fname'] . " " . $row['sname']; ?></td>
													<td><?php echo $row['mobile']; ?></td>


													<?php include('toolttip_edit_delete.php'); ?>



												</tr>
											<?php } ?>
										</tbody>
									</table>
								</form>
							</div>
						</div>




						<div class="block-content collapse in tab">
							<div class="span12">
								<form action="add_users.php" method="POST">
									<table cellpadding="0" cellspacing="0" border="0" class="table  member-table" id="example">
										<script type="text/javascript">
											$(document).ready(function() {
												$('#delete').tooltip('show');
												$('#delete').tooltip('hide');
											});
										</script>
										<?php include('modal_add.php'); ?>
										<thead>
											<tr>
												<th><input id="checkAll" class="uniform_on" type="checkbox">
												</th>
												<th>Mc_ID</th>
												<th>MC Name</th>
												<th>MC Leader</th>
												<th>Contact</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$user_query = mysqli_query($conn, "select * from mc ") or die(mysqli_error($conn));
											while ($row = mysqli_fetch_array($user_query)) {
												$id = $row['id'];
											?>

												<tr>
													<td width="30">
														<input id="optionsCheckbox" class="uniform_on contact-check" name="selector[]" type="checkbox" value="<?php echo $row['mobile']; ?>">
													</td>


													<td><?php echo $row['mc_id']; ?></td>
													<td><?php echo $row['mc_name']; ?></td>
													<td><?php echo $row['mc_leader']; ?></td>
													<td><?php echo $row['mobile']; ?></td>


													<?php include('toolttip_edit_delete.php'); ?>



												</tr>
											<?php } ?>
										</tbody>
									</table>
								</form>
							</div>
						</div>







						<div class="block-content collapse in tab" style="display: block;" id="tab2">
							<div class="span12">
								<form action="add_users.php" method="POST">
									<table cellpadding="0" cellspacing="0" border="0" class="table member-table" id="example">
										<script type="text/javascript">
											$(document).ready(function() {
												$('#delete').tooltip('show');
												$('#delete').tooltip('hide');
											});
										</script>
										<?php include('modal_add.php'); ?>
										<thead>
											<tr>
												<th><input id="checkAll" class="uniform_on" type="checkbox">
												</th>
												<th>Vistor Name</th>
												<th>Residence</th>
												<th>Contact</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$user_query = mysqli_query($conn, "select * from visitor ") or die(mysqli_error($conn));
											while ($row = mysqli_fetch_array($user_query)) {
												$id = $row['id'];
											?>

												<tr>
													<td width="30">
														<input id="optionsCheckbox" class="uniform_on contact-check" name="selector[]" type="checkbox" value="<?php echo $row['mobile']; ?>">
													</td>


													<td><?php echo $row['fname'] . " " . $row['sname']; ?></td>
													<td><?php echo $row['residence']; ?></td>
													<td><?php echo $row['mobile']; ?></td>


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
		let memberChecks = document.querySelectorAll(".contact-check");

		let selectService = document.querySelector("#selectService");

		let checkAll = document.querySelector("#checkAll");
		let jQMemberChecks = $(".contact-check");
		let selectedContactInput = document.querySelector("#selectedContacts");
		let submitBtn = document.querySelector("#submitBtn");

		checkAll.addEventListener("click", ev => {


			let length = memberChecks.length;

			if (ev.target.checked === true) {


				for (var index = 0; index < length; index++) {
					memberChecks[index].checked = false;
					memberChecks[index].click();
				}

				// memberChecks.forEach(check=>{
				// 	console.log(check);
				// 	check.checked=true;
				// });

			} else {
				for (var index = 0; index < length; index++) {
					memberChecks[index].checked = true;
					memberChecks[index].click();

				}
			}
		});

		memberChecks.forEach(check => {

			check.addEventListener('change', ev => {

				phoneNmber = ev.target.value;

				if (ev.target.checked) {
					if (!selectedMembers.includes(phoneNmber)) {
						selectedMembers.push(phoneNmber);
					}
				} else {

					let finalMembers = [];
					for (var index = 0; index < selectedMembers.length; index++) {
						if (selectedMembers[index] !== phoneNmber) {
							finalMembers[index] = selectedMembers[index];
						}
					}

					selectedMembers = finalMembers.filter(it => {
						return it != undefined && it != 'empty'
					})

				}

				let selectContactString = "";

				let arrayLength = selectedMembers.length;

				for (var index = 0; index < selectedMembers.length; index++) {

					selectContactString = selectContactString + "" + selectedMembers[index];
					if (index < arrayLength - 1) {
						selectContactString += ","
					}
				}

				selectedContactInput.value = selectContactString;



			})
		});





		$tabBtns = $(".tab-btn");
		$tab = $(".tab");
		$tables = $(".member-table");
		$tables.attr("id", "");




		$tabBtns.each(index => {
			$($tabBtns[index]).on("click", ev => {
				$(this).css({
					"backgroundColor": "red !important"
				})

				$tables.attr("id", "");

				$($tables[index]).attr("id", "example")

				$tab.css({
					"display": "none"
				});

				$($tab[index]).css({
					"display": "block"
				})



			})
		})
	</script>
</body>

</html>