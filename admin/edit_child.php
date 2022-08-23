<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_mc_id= $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('edit_child_form.php'); ?>		   			
				</div>
				<?php	
	             $count_members=mysqli_query($conn,"select * from sundays");
	             $count = mysqli_num_rows($count_members);
                 ?>	
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
				
					 
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-user"></i>  Children church(s) List</div>
								<div class="muted pull-right">
								Number of children <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_mc.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-placement="right" title="Click to Delete check item"  data-toggle="modal" href="#client_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"> Delete</i></a>
									<script type="text/javascript">
									 $(document).ready(function(){
									 $('#delete').tooltip('show');
									 $('#delete').tooltip('hide');
									 });
									</script>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
										  		<th>MC_ID</th>
												<th>MC Name</th>
												<th>MC Leader </th>
										</thead>
										<tbody>
													<?php
													$members_query = mysqli_query($conn,"select * from mc")or die(mysqli_error());
													while($row = mysqli_fetch_array($members_query)){
													$id = $row['mc_id'];
													?>
									
												<tr>
												
												<td><?php echo $row['mc_id']; ?></td>
												<td><?php echo $row['mc_name']; ?></td>
												<td><?php echo $row['mc_leader']; ?></td>
											
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
    </body>

</html>