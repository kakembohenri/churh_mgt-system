<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
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
				<?php include('addpc.php'); ?>		   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
						
				
			   								
				<?php	
	             $count_members=mysqli_query($conn,"select * from pc where church_id='$church_id'");
	             $count = mysqli_num_rows($count_members);
                 ?>	 
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"></i><i class="icon-members"></i> Church Prayer card(s) List</div>
								<div class="muted pull-right">
								Number of PCs: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_pc.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table  table-striped" id="example">
									<?php if(isset($_SESSION['church_admin'])): ?>
									<a data-placement="right" title="Click to Delete check item"  data-toggle="modal" href="#members_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"> Delete</i></a>
									<?php endif ?>
									<script type="text/javascript">
									 $(document).ready(function(){
									 $('#delete').tooltip('show');
									 $('#delete').tooltip('hide');
									 });
									</script>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
												<th>Family Name</th>
												<th>Accumulated Time</th>
                                                <th>Contact</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$members_query = mysqli_query($conn,"select * from pc")or die(mysqli_error());
													while($row = mysqli_fetch_array($members_query)){
													$id = $row['contact'];
													?>
									
												<tr>
												<td width="30">
												<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['familyname']; ?> </td>
	
												<td><?php echo $row['time']; ?></td>
                                                <td><?php echo $row['contact']; ?></td>
											
												<?php include('toolttip_edit_delete.php'); ?>															
												<td width="120">
												<a rel="tooltip"  title="Edit member" id="e<?php echo $id; ?>" href="edit_pc.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit</i></a>
												</td>
		
									
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