 <?php include('importcsv.php') ?>
 <div class="row-fluid">
   <style>
     * {
       font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
     }
   </style>
   <!-- block -->
   <div class="block">
     <div class="navbar navbar-inner block-header">
       <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Register New Child</i></div>
     </div>
     <div class="block-content collapse in">
       <div class="span12">

         <!--------------------form------------------->
         <form method="post" enctype="multipart/form-data">
           <div class="control-group">
             <p>
             <div class="controls">
               <p>
                 <input class="input focused" name="Child_ID" id="focusedInput" type="text" style="padding: 1rem;" placeholder="Child_ID">
               </p>
             </div>
           </div>
           <div class="control-group">
             <p>
             <div class="controls">
               <p>
                 <input class="input focused" name="fname" id="focusedInput" type="text" style="padding: 1rem;" placeholder="First Name">
               </p>
             </div>
           </div>
           </p>
           <div class="control-group">
             <p>
             <div class="controls">
               <p>
                 <input class="input focused" name="sname" id="focusedInput" type="text" style="padding: 1rem;" placeholder="Surname">
               </p>
             </div>
           </div>

           <div class="control-group">
             <p>
             <div class="controls">
               <p>
                 <input class="input focused" name="mobile" id="focusedInput" type="text" style="padding: 1rem;" placeholder="Mobile Number">
               </p>
             </div>
           </div>
           </p>


           <div class="control-group">
             <p>
             <div class="controls">
               <p>
                 <input class="input focused" name="Birthday" id="focusedInput" type="date" style="padding: 1rem;" placeholder="Birthday">
               </p>
             </div>
           </div>
           </p>
           <div class="control-group">
             <p>
             <div class="controls">
               <p>
                 <input class="input focused" name="Residence" id="focusedInput" type="text" style="padding: 1rem;" placeholder="Residence">
               </p>
             </div>
           </div>
           </p>
           <div class="control-group">
             <p>
             <div class="controls">
               <p>
                 <input class="input focused" name="Parent" id="focusedInput" type="text" style="padding: 1rem;" placeholder="Parents Name">
               </p>
             </div>
           </div>
           </p>

           </p>
           <!-- <div class="control-group">
             <p>
             <div class="controls">
               <p>
                 <input class="input focused" name="Age" id="focusedInput" type="text" style="padding: 1rem;" placeholder="Age">
               </p>
             </div>
           </div> -->
           </p>


           </p>

       </div>
       <div class="control-group">
         <p>
         <div class="controls">
           <p>
             Image
             <input class="input focused" name="image" id="focusedInput" type="file" value="upload ">
           </p>
         </div>
       </div>
       </p>



       <div class="control-group">
         <div class="controls">
           <button name="save" style='padding: 0.4rem; border: none; background: #8ef3c5; color: #fff; border-radius: 0.5rem;' id="save" data-placement="right" title="Click to Save"><i class="icon-plus-sign icon-large"> Save</i></button>
           <script type="text/javascript">
             $(document).ready(function() {
               $('#save').tooltip('show');
               $('#save').tooltip('hide');
             });
           </script>
         </div>
       </div>
       </form>



       </form>

       <form method="post" enctype="multipart/form-data">
         <label>Select CSV File:</label>
         <input type="file" name="file">
         <br>
         <input type="submit" name="submit" value="Import" style='color: #fff; padding: 0.4rem; border: none; border-radius: 0.4rem; background: #454545;'>
       </form>


     </div>
   </div>
 </div>
 <!-- /block -->

 <?php

  if (isset($_POST['save'])) {
    $Child_ID = $_POST['Child_ID'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $mobile = $_POST['mobile'];
    $Birthday = $_POST['Birthday'];
    $Residence = $_POST['Residence'];
    $Parent = $_POST['Parent'];
    $Age = $_POST['Age'];

    $church_id = $_SESSION['church_admin'];

    $image = addslashes(file_get_contents($_FILES["image"]['tmp_name']));

    $random_numer = rand(10, 1000000) . rand(345, 8990000);

    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $random_numer . $_FILES["image"]["name"]);
    $thumbnail = "uploads/" . $random_numer . $_FILES["image"]["name"];

    $query = mysqli_query($conn, "select * from sundays where church_id='$church_id' and child_id = '$Child_ID'  ") or die(mysqli_error($conn));
    $count = mysqli_num_rows($query);

    if ($count > 0) { ?>
     <script>
       alert('This Child  Already Exists');
     </script>
   <?php
    } else {

      mysqli_query($conn, "insert into sundays(child_id, church_id, fname, sname,mobile,birthday,residence,parent_name,thumbnail) 
values('$Child_ID', '$church_id', '$fname','$sname','$mobile','$Birthday','$Residence','$Parent','$thumbnail')") or die('Error: ' . mysqli_error($conn));

$activity = "Added child ". $Child_ID;
mysqli_query($conn, "insert into activity_log(username, church_id, action) values('$username', '$id', '$activity')") or die (mysqli_error($conn));

      $_SESSION['success'] = 'Successfully addded a child';
      
    ?>
     <script>
       //  window.location = "add_sundaysch.php";
       //  $.jGrowl("member Successfully added", {
       //    header: 'member add'
       //  });
     </script>
 <?php
    }
  }
  ?>