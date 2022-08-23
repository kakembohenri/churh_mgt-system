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
                                <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit MC Info.</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = mysqli_query($conn,"select * from mc where mc_id = '$get_mc_id'")or die('Error: ' .mysqli_error($conn));
								$row = mysqli_fetch_array($query);
								?>
								
								 <!-- --------------------form ---------------------->						
										<form method="post">
					<div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                     <input class="input focused" name="mc_id"  value="<?php echo $row['mc_id']; ?>" id="focusedInput" type="text" placeholder = "MC_ID" required> 
                                   </p>
                                 </div>
                                  </div>
								  </p>

                  <div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                   <input class="input focused" name="mc_name"  value="<?php echo $row['mc_name']; ?>" id="focusedInput" type="text" placeholder = "MC_NAME" required> 
                                   </p>
                                 </div>
                                  </div>
                  </p>
                  <div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                     <input class="input focused" name="mc_leader"  value="<?php echo $row['mc_leader']; ?>" id="focusedInput" type="text" placeholder = "Leader" required> 
                                   </p>
                                 </div>
                                  </div>
                  </p>
								  <div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                     <input class="input focused" name="location" value="<?php echo $row['location']; ?>" id="focusedInput" type="text" placeholder = "Location" required> 
                                   </p>
                                 </div>
                                  </div>
								  </p>
								  <div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                     <input class="input focused" name="time" id="focusedInput" value="<?php echo $row['time']; ?>" type="time" placeholder = "Time" > 
                                   </p>
                                 </div>
                                  </div>
								  </p>
								  <div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                     <input class="input focused" name="day" id="focusedInput" value="<?php echo $row['day']; ?>" type="text" placeholder = "Day" > 
                                   </p>
                                 </div>
                                  </div>
								  </p>

								  <div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                     <input class="input focused" name="mobile" value="<?php echo $row['mobile']; ?>" id="focusedInput" type="text" placeholder = "Mobile No." > 
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
$mc_id = $_POST['mc_id'];
$mc_name = $_POST['mc_name'];
$mc_leader = $_POST['mc_leader'];
$location = $_POST['location'];
$time = $_POST['time'];
$day = $_POST['day'];
$mobile= $_POST['mobile'];



mysqli_query($conn,"UPDATE mc SET mc_id = '$mc_id' ,mc_name = '$mc_name',mc_leader ='$mc_leader',location ='$location',time='$time',day='$day',mobile='$mobile' where mc_id='$get_mc_id'") or die('Error: ' .mysqli_error($conn));

mysqli_query($conn,"insert into activity_log (date,username,action)
 values(NOW(),'$admin_username','Edited mc $mc_id')")or die('Error: ' .mysqli_error($conn));
?>

<script>
  window.location = "add_teen.php";
 $.jGrowl(" member Successfully Update", { header: 'members Update' });  
</script>
<?php
}
?>
