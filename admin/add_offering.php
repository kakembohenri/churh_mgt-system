   <?php
    $services = mysqli_query($conn, "select * from service order by(service_date) desc");

    ?>

   <div class="row-fluid">
     <!-- block -->
     <div class="block">
       <div class="navbar navbar-inner block-header">
         <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Enter Offering</i></div>
       </div>
       <div class="block-content collapse in">
         <div class="span12">
           <form method="post">

             <div class="control-group">
               <div class="controls">
                 <input class="input focused" style='padding: 1rem;' id="searchQuery" type="text" placeholder="Search with Name or ID">
               </div>
             </div>
             <div class="control-group">

               <div class="controls">
                 <select class="input focused .memberSelect" name="Member_ID" id="memberSelect">
                   <?php

                    $select = "SELECT*FROM members where church_id='$church_id' ";

                    $test = mysqli_query($conn, $select);


                    $members_array = [];

                    $count = 0;

                    while ($row = mysqli_fetch_assoc($test)) {
                      $members_array[$count] = $row;
                      $count++;

                    ?>

                     <option value="<?php echo $row['member_id']; ?>"><?php echo $row['member_id'] . '(' . $row['fname'] . ' ' . $row['sname'] . ')'; ?></option>


                   <?php } ?>
                 </select>

               </div>
             </div>






             <select name="service_id">

               <option value="0">Select a Service</option>


               <?php while ($service = mysqli_fetch_array($services)) : ?>

                 <option value="<?php echo ($service["service_id"]) ?>"><?php echo ($service["service_name"]) ?></option>

               <?php endwhile ?>
             </select>



             <div class="control-group">
               <div class="controls">
                 <input class="input focused" style='padding: 1rem;' name="tithe" id="focusedInput" type="text" placeholder="Tithe">
               </div>
             </div>

             <div class="control-group">
               <div class="controls">
                 <input class="input focused" style='padding: 1rem;' name="Offering" id="focusedInput" type="text" placeholder="Offering">
               </div>
             </div>

             <div class="control-group">
               <div class="controls">
                 <input class="input focused" style='padding: 1rem;' name="Sponsorship" id="focusedInput" type="text" placeholder="Sponsorship">
               </div>
             </div>
             <div class="control-group">
               <div class="controls">
                 <input class="input focused" style='padding: 1rem;' name="Evangelism" id="focusedInput" type="text" placeholder="Evangelism">
               </div>
             </div>
             <div class="control-group">
               <div class="controls">
                 <input class="input focused" style='padding: 1rem;' name="pastor" id="focusedInput" type="text" placeholder="Offering to the pastor">
               </div>
             </div>




             <div class="control-group">
               <div class="controls">
                 <button name="save" style='text-decoration: none; border: none; padding: 0.4rem; background: 
#8ef3c5; color: #fff; border-radius: 0.4rem;' id="save" data-placement="right" title="Click to Save"><i class="icon-plus-sign icon-large"> Save</i></button>
                 <script type="text/javascript">
                   $(document).ready(function() {
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
   </div>

   <?php

    if (isset($_POST['save'])) {
      $Member_ID = $_POST['Member_ID'];
      $tithe = $_POST['tithe'];
      $Offering = $_POST['Offering'];
      $Sponsorship = $_POST['Sponsorship'];
      $Evangelism = $_POST['Evangelism'];
      $pastor = $_POST['pastor'];
      $service_id = $_POST["service_id"];

      print_r($_POST);


      mysqli_query($conn, "insert into offering (member_ID, church_id, tithe,Offering,Sponsorship,Evangelism,pastor,service_id) values('$Member_ID', '$church_id' ,'$tithe','$Offering','$Sponsorship','$Evangelism','$pastor','$service_id')") or die(mysqli_error($conn));

    ?>
     <script>
       window.location = "addoffering.php";
       $.jGrowl("The Giving Successfully added", {
         header: 'Giving added'
       });
     </script>
   <?php
    }

    ?>


   <script type="text/javascript">
     const searchQuery = document.querySelector("#searchQuery");
     const selectedMember = document.querySelector("#memberSelect");


     const search = (q) => {

       console.clear();
       //selectedMember.remove();
       let options = selectedMember.options;
       for (var i = options.length - 1; i >= 0; i--) {
         selectedMember.options.remove(i);
       }

       membersArray.forEach(it => {
         let obj = it;
         let str = q.toLowerCase();
         if (obj.fname.toLowerCase().search(str) > -1 || obj.sname.toLowerCase().search(str) > -1 || obj.Member_ID.toLowerCase().search(str) > -1) {
           selectedMember.options.add(new Option("(" + obj.Member_ID + ") " + obj.fname + " " + obj.sname, obj.Member_ID));
           console.log("added");

         }
       })
     }
     console.log("added");
     let membersArray = <?php echo json_encode($members_array) ?>;

     searchQuery.addEventListener("input", ev => {
       let q = ev.target.value;
       console.log(q)
       search(q)
     })
   </script>