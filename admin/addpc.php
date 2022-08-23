<?php include('excelpc.php') ?>
  <div class="row-fluid">
                        <!-- block -->
 <div class="block">
 <div class="navbar navbar-inner block-header">
<div class="muted pull-left"><i class="icon-plus-sign icon-large"> Register New Prayer card</i></div>
</div>


<div class="block-content collapse in">
                                <div class="span12">
                
                 <!--------------------form------------------->
                <form method="post">
          <div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                     <input class="input focused" name="familyname" id="focusedInput" type="text" placeholder = "Family Name" required="familyname" > 
                                   </p>
                                 </div>
                                  </div>
                  </p>
                  <div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                     <input class="input focused" name="time" id="focusedInput" type="text" placeholder = "Accumulated Time" required="time"> 
                                   </p>
                                 </div>
                                  </div>
                  <div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                     <input class="input focused" name="contact" id="focusedInput" type="text" placeholder = "Contact" required="contact"> 
                                   </p>
                                 </div>
                                  </div>
                 
                  <div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                   </p>
                                 </div>
                                  </div>
                  </p> 
                  
                               
                  </p>
                  <div class="control-group">
                                <p> <div class="controls">
                                   <p>
                                   </p>
                                 </div>
                                  </div>
                  </p>
                                    </div>
                    
                                
                                        
                    <div class="control-group">
                                          <div class="controls">
 <button name="save" class="btn btn-info" id="save" data-placement="right" title="Click to Save"><i class="icon-plus-sign icon-large"> Save</i></button>
                        <script type="text/javascript">
                                              $(document).ready(function(){
                                              $('#save').tooltip('show');
                                              $('#save').tooltip('hide');
                                              });
                                              </script>
                                          </div>
                                        </div>
                                </form>
                <form method="post" enctype="multipart/form-data">
                <label>Select CSV File:</label>
                <input type="file" name="file">
                <br>
                <input type="submit" name="submit" value="Import">
                </form>
                
                </div>
                            </div>
                        </div>
                        <!-- /block -->
                           
<?php
if (isset($_POST['save'])){
$familyname = $_POST['familyname'];
$time = $_POST['time'];
$contact = $_POST['contact'];



$query = @mysqli_query($conn,"select * from pc where contact = '$contact' ")or die('Error: ' .mysqli_error($conn));
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('This Prayer Card  Already Exists');
</script>
<?php
}else{
mysqli_query($conn,"insert into pc(familyname, church_id, time,contact) 
values('$familyname', '$church_id', '$time','$contact' )")or die('Error: '.mysqli_error($conn));

$activity = 'Added a Prayer Card';
mysqli_query($conn, "insert into activity_log(username, church_id, action) values('$name', '$id', '$activity')") or die (mysqli_error($conn));
?>
<script>
window.location = "add_PC.php";
$.jGrowl("member Successfully added", { header: 'pc add' });
</script>
<?php
}
}
?>