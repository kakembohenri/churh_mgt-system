<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_PCId= $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('edit_pc_form.php'); ?>		   			
				</div>
				<?php	
	             $count_members=mysqli_query($conn,"select * from pc");
	             $count = mysqli_num_rows($count_members);
                 ?>	
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
					
					 
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-user"></i>  Prayer card(s) List</div>
								<div class="muted pull-right">
								Number of prayer cards <span class="badge badge-info"><?php  echo $count; ?></span>
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
												<th></th>
												<th>Family Name</th>
												<th>Accumulated Time </th>
							                    <th>Mobile No. </th>
							                    <th>Action </th>
										</thead>
										<tbody>
													<?php
													$members_query = mysqli_query($conn,"select * from pc")or die(mysqli_error());
													while($row = mysqli_fetch_array($members_query)){
													$id = $row['PCId'];
													?>
									
												<tr>
												<td width="30">
												<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['familyname']; ?></td>
												<td><?php echo $row['time']; ?></td>
													
									            <td><?php echo $row['contact']; ?></
											
												<?php include('toolttip_edit_delete.php'); ?>															
												<td width="120">
												<a rel="tooltip"  title="Edit pc" id="e<?php echo $id; ?>" href="edit_pc.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit Info</i></a>
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