<div class="row-fluid">				  
   <script type="text/javascript">
	$(document).ready(function(){
	$('#add').tooltip('show');
	$('#add').tooltip('hide');
	});
	</script> 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit Prayer card Info.</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = mysqli_query($conn,"select * from pc where PCId = '$get_PCId'")or die('Error: ' .mysqli_error($conn));
								$row = mysqli_fetch_array($query);
								?>
								
								 <!-- --------------------form ---------------------->						
										<form method="post">
					<div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                     <input class="input focused" name="familyname"  value="<?php echo $row['familyname']; ?>" id="focusedInput" type="text" placeholder = "Family name" required> 
                                   </p>
                                 </div>
                                  </div>
								  </p>

                  <div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                     <input class="input focused" name="time"  value="<?php echo $row['time']; ?>" id="focusedInput" type="time" placeholder = "Accumulated time" required> 
                                   </p>
                                 </div>
                                  </div>
                  </p>
								  
								 
								  <div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                     <input class="input focused" name="contact" value="<?php echo $row['contact']; ?>" id="focusedInput" type="text" placeholder = "Mobile No." > 
                                   </p>
                                 </div>
                                  </div>
								  </p>
								 							 
								  </p>
								
								  </p>
                                    </div>
										
                                
                                        
										<div class="control-group">
                                          <div class="controls">
 <button name="update" class="btn btn-info" id="update" data-placement="right" title="Click to Update"><i class="icon-plus-sign icon-large"> Update</i></button>
												<script type="text/javascript">
	                                            $(document).ready(function(){
	                                            $('#save').tooltip('show');
	                                            $('#save').tooltip('hide');
	                                            });
	                                            </script>
                                          </div>
                                        </div>
                                </form>
					</div>
                </div>
            </div>
              <!-- /block -->
      
<?php		
if (isset($_POST['update'])){
$familyname = $_POST['familyname'];
$time = $_POST['time'];
$contact = $_POST['contact'];



mysqli_query($conn,"UPDATE pc SET familyname = '$familyname',time ='$time',contact='$contact' where PCId='$get_PCId'") or die('Error: ' .mysqli_error($conn));

mysqli_query($conn,"insert into activity_log (date,username,action)
 values(NOW(),'$admin_username','Edited pc $PCId')")or die('Error: ' .mysqli_error($conn));
?>

<script>
  window.location = "add_pc.php";
 $.jGrowl(" Prayer card Successfully Updated", { header: 'Prayer card Update' });  
</script>
<?php
}
?>
