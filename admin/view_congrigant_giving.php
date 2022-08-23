<?php include('header.php'); ?>
<?php include('session.php'); ?>


<?php

$where = "";
$index = 0;
if (isset($_REQUEST['service_id'])) {
	$service_id = $_REQUEST['service_id'];
	$index = $_REQUEST['index'];
	$where = " join service on offering.service_id = service.service_id WHERE offering.service_id='$service_id' ";
}


$sql_query = "SELECT *FROM offering JOIN members ON members.Member_ID = offering.Member_ID JOIN  tithe ON tithe.Member_ID= offering.Member_ID $where ";

?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
				
                <div class="span9" id="content">
                     <div class="row-fluid">

					 <script type="text/javascript">
		              $(document).ready(function(){
		              $('#add').tooltip('show');
		              $('#add').tooltip('hide');
		              });
		             </script> 
                        <!-- block -->
						

               </div>
			   								
				<?php	

	             $count_members=mysqli_query($conn,$sql_query);
	             $count = mysqli_num_rows($count_members);
                 ?>	 
                        <div id="block_bg" class="block">

							
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"></i><i class="icon-members"></i> Church members (s) List</div>
								<div class="muted pull-right">
								Number of Church members: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>


<div class="container-fluid">
  <div class="row-fluid"> 
  <div class="empty">
  <div class="pull-left">

	<?php if(isset($_SESSION["success"])):?>
	<div class="alert alert-success alert-dismisible">
		<p><?php echo $_SESSION["success"] ?></p>
	</div>

	<?php endif ?>
	<form action="services.php" method="post">
		<!-- <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example"> -->
			<select data-placement="right" title="Click to  to select a service" id="selectService"     class="btn form-control input " name="service_id">
				
			<?php	
			$services=mysqli_query($conn,"select * from service order by(service_date) asc");
			
			?>

		<option value="0">Select a Service</option>


			<?php while($service = mysqli_fetch_array($services)): ?>
								
			<option value="<?php echo($service["service_id"]) ?>"><?php echo($service["service_name"]) ?></option>

			<?php endwhile ?>
			</select>
		
		<br>
		<br>
		<script type="text/javascript">
			$(document).ready(function(){
			$('#delete').tooltip('show');
			$('#delete').tooltip('hide');
			});
		</script>
		</div>

     
	     <div class="pull-right">
		   <a href="print_offering.php" class="btn btn-info" id="print" data-placement="left" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a> 		      
		   <script type="text/javascript">
		     $(document).ready(function(){
		     $('#print').tooltip('show');
		     $('#print').tooltip('hide');
		     });
		   </script>        	   
         </div>
      </div>
    </div> 
</div>


                            <div class="block-content collapse in">
                                <div class="span12">

								<form action="" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table  table-striped" id="example">
		
									
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
													$member_query = mysqli_query($conn,$sql_query)or die(mysqli_error());
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

			const selectService = document.querySelector("#selectService");
			const selectedIndex = '<?php echo $index ?>';
			selectService.selectedIndex = selectedIndex;
			selectService.addEventListener("change",ev=>{
				let id = ev.target.value;
				let index = ev.target.selectedIndex;
				let url = "view_congrigant_giving.php?service_id="+id+"&index="+index;
				window.location.href=url;
				//console.log(ev.target.value);
			})

		
			
		</script>
    </body>

</html>