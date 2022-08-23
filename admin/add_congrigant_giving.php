<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
				
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
						
				
               </div>
			   								
				<?php	
	             $count_members=mysqli_query($conn,"select * from members");
	             $count = mysqli_num_rows($count_members);
                 ?>	 
                        <div id="block_bg" class="block">

							
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"></i><i class="icon-members"></i> Church members (s) List</div>
								<div class="muted pull-right">
								Number of Church members: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">

								<?php if(isset($_SESSION["success"])):?>
								<div class="alert alert-success alert-dismisible">
								    <p><?php echo $_SESSION["success"] ?></p>
							    </div>

								<?php endif ?>
								<form action="services.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
									  <select data-placement="right" title="Click to  to select a service" id="selectService"     class="btn form-control" name="service_id">
										 
									  <?php	
										$services=mysqli_query($conn,"select * from service order by(service_date) asc");
										
									  ?>

                                   <option value="0">Select a Service</option>


									  <?php while($service = mysqli_fetch_array($services)): ?>
															
									  <option value="<?php echo($service["service_id"]) ?>"><?php echo($service["service_name"]) ?></option>

									  <?php endwhile ?>
									  </select>
									
									<button data-placement="right" type="submit" title="Click to Add congrigants"  id="submitBtn"     class="btn btn-primary form-control" name="add_congrigant"><i class="icon-plus icon-large"> Add congrigants</i></button>

									<br>
									<br>
									<script type="text/javascript">
									 $(document).ready(function(){
									 $('#delete').tooltip('show');
									 $('#delete').tooltip('hide');
									 });
									</script>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												
												<th>Member_ID</th>
												<th>Member Name</th>
												<th>mobile</th>
                                                <th>Residence</th>
                                                <th>Tithe</th>
                                                <th>Offering</th>
												<th>Evangelism</th>
												<th>Sponsorship</th>
												<th>To pastor</th>
                                                <th> </th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$member_query = mysqli_query($conn,"SELECT *FROM offering JOIN members ON members.Member_ID = offering.Member_ID JOIN tithe ON tithe.titheid= offering.titheid WHERE offering.offeringid >='0' || tithe.titheid >='0' ")or die(mysqli_error());
													while($row = mysqli_fetch_array($member_query)){
													$id = $row['id'];
													?>
									
												<tr>
												
												<td><?php echo $row['Member_ID']; ?></td>
												<td><?php echo $row['fname']." ".$row['sname']; ?> </td>
												<td><?php echo $row['mobile']; ?></td>
                                                <td><?php echo $row['Residence']; ?></td>
                                                <td><?php echo $row['Amount']; ?></td>
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


		<script type="text/javascript">

			

			let selectedMembers = [];
			const memberChecks = document.querySelectorAll(".member-check");
			const selectService = document.querySelector("#selectService");
			const submitBtn = document.querySelector("#submitBtn");

			
			memberChecks.forEach(check=>{

			
				check.addEventListener('change',ev=>{

					
					memberId = ev.target.value;

					if(ev.target.checked){
						if (!selectedMembers.includes(memberId)) {
							selectedMembers.push(memberId);

						}
					}else{
						
						let finalMembers = [];
						for(var index=0;index<selectedMembers.length;index++){
							if (selectedMembers[index]!==memberId) {
								  finalMembers[index]=selectedMembers[index];
							}
						}

						selectedMembers = finalMembers.filter(it=>{return it!=undefined&&it!='empty'})

					}

					console.log(selectedMembers);

					

				})
			});

			submitBtn.addEventListener("click",ev=>{
				if(!selectedMembers.length>0){
					ev.preventDefault();
					alert("No member is  selected.");
				}else if(selectService.value=="0"){
					ev.preventDefault();
					alert("No Service is  selected.");
				}

			});


		</script>
    </body>

</html>