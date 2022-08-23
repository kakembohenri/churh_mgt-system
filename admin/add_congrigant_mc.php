   <?php
    $services = mysqli_query($conn, "select * from service_mc order by(service_date) desc");

    ?>

   <div class="row-fluid">

     <a href="add_congrigants_mc.php" style='background: #ff652f; color: #fff; border: none; border-radius: 0.4rem; padding: 0.4rem; text-decoration: none;' id="add" data-placement="right" title="Click to Add members"><i class="icon-plus-sign icon-large"></i> Add MC Service</a>

     <!-- block -->
     <div class="block">

       <div class="navbar navbar-inner block-header">
         <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Enter Your Missional Community</i></div>
       </div>

       <div class="block-content collapse in" style="overflow: auto;">
         <div class="span12">
           <form method="post">

             <div class="control-group">
               <div class="controls">
                 <input class="input focused" style='padding: 1rem;' id="searchQuery" type="text" placeholder="Search with Name or ID">
               </div>
             </div>
             <div class="control-group">




               <div class="controls">
                 <select class="input focused .memberSelect" name="mc_id" id="memberSelect">
                   <?php
                    $select = "SELECT * FROM mc";
                    $test = mysqli_query($conn, $select);


                    $members_array = [];

                    $count = 0;

                    while ($row = mysqli_fetch_assoc($test)) {
                      $members_array[$count] = $row;
                      $count++;

                    ?>

                     <option value="<?php echo $row['mc_id']; ?>"><?php echo $row['mc_id'] . '(' . $row['mc_leader'] . ')'; ?></option>


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
                 <input class="input focused" style='padding: 1rem;' name="adults" id="focusedInput" type="text" placeholder="Adults Attendance" required>
                 <input class="input focused" style='padding: 1rem;' name="young" id="focusedInput" type="text" placeholder="Young Attendance" required>
                 <input class="input focused" style='padding: 1rem;' name="salvation" id="focusedInput" type="text" placeholder="Salvations" required>
                 <input class="input focused" style='padding: 1rem;' name="offering" id="focusedInput" type="text" placeholder="Offering" required>

               </div>
             </div>

             <div class="control-group">
               <div class="controls">
                 <button name="save" style='background: #ff652f; color: #fff; border: none; border-radius: 0.4rem; padding: 0.4rem; text-decoration: none;' id="save" data-placement="right" title="Click to Save"><i class="icon-plus-sign icon-large"> Save</i></button>
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
      $mc_id = $_POST['mc_id'];
      $service_id = $_POST['service_id'];
      $adults = $_POST['adults'];
      $young = $_POST['young'];
      $salvation = $_POST['salvation'];
      $offering = $_POST['offering'];

      print_r($_POST);

      mysqli_query($conn, "insert into congrigants_mc (mc_id,adults,young,salvation,offering,service_id) values('$mc_id','$adults','$young','$salvation','$offering','$service_id')") or die(mysqli_error($conn));
    ?>
     <script>
       window.location = "addcongrigantsmc.php";
       $.jGrowl("MC Successfully added", {
         header: 'MC added'
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
         if (obj.mc_leader.toLowerCase().search(str) > -1 || obj.mc_id.toLowerCase().search(str) > -1) {
           selectedMember.options.add(new Option("(" + obj.mc_id + ") " + obj.mc_leader, obj.mc_id));
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