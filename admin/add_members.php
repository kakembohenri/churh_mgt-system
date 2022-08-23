<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
	
<?php include('plans/expiry.php'); ?>

	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>
			<div class="span3" id="addmembers">
				<?php include('addmembers.php'); ?>
				<?php include('notification.php')
				?>
			</div>
			<div class="span6" id="">
				<div class="row-fluid">
					<!-- block -->


				</div>

				<?php
				if(isset($_SESSION['church_admin'])){
					$church_id = $_SESSION['church_admin'];

				}elseif(isset($_SESSION['data_entrant'])){
					$data = $_SESSION['data_entrant'];

					$query = mysqli_query($conn, "select church_id from church_staff where user_id='$data'") or die(mysqli_error($conn));
					$entrant = mysqli_fetch_array($query);

					$church_id = $entrant['church_id'];
				}
				
				$count_members = mysqli_query($conn, "select * from members where church_id='$church_id'");
				$count = mysqli_num_rows($count_members);
				?>
				<div id="block_bg" class="block">
					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left"></i><i class="icon-members"></i> Church Members' List</div>
						<div class="muted pull-right">
							Number of Members: <span class="badge badge-info"><?php echo $count; ?></span>
						</div>
					</div>
					<div class="block-content collapse in" style="overflow: auto;">
						<div class="span12">
							<form action=" " method="post">
								<table cellpadding="0" cellspacing="0" class="table table-striped" id="example">

									<thead>
										<tr>
											<!-- <th></th> -->
											<th>Disciple_ID</th>
											<th>Disciple Name</th>
											<th>mobile</th>
											<th>Residence</th>
											<!-- <th> </th> -->
										</tr>
									</thead>
									<tbody>
										<?php
										// echo $church_id;
										$members_query = mysqli_query($conn, "select * from members where church_id='$church_id' order by(timestamp) desc") or die(mysqli_error($conn));
										while ($row = mysqli_fetch_array($members_query)) {
											$id = $row['member_id'];
										?>

											<tr>
												<?php 
												if(isset($_SESSION['church_admin'])): ?>
												<td width="30">
													<input id="optionsCheckbox" class="uniform_on member-check" name="selector[]" type="checkbox" value="<?php echo $id; ?>" member-id='<?php echo $row['member_id']; ?>'>
												</td>
												<?php endif ?>
												<td><?php echo $row['member_id']; ?></td>
												<td><?php echo $row['fname'] . " " . $row['sname']; ?> </td>

												<td><?php echo $row['mobile']; ?></td>
												<td><?php echo $row['residence']; ?></td>

												<?php 
												if(isset($_SESSION['church_admin'])): 
												include('toolttip_edit_delete.php'); ?>
												
												<td width="120">
													<a rel="tooltip" title="Edit Disciple" id="<?php echo $id; ?>" href="edit_members.php<?php echo '?id=' . $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit</i></a>
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






	<script type="text/javascript">
		let selectedMembers = [];
		const memberChecks = document.querySelectorAll(".member-check");

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

					selectedMembers = finalMembers;

				}

				selectedMembers

				$.ajax({
					url: '../data/add_service_attendants.php',
					type: 'get'
				})

			})
		})
	</script>
</body>

</html>