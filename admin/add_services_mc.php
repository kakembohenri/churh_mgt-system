<?php include('importcsv.php') ?>
<div class="row-fluid">
  <!-- block -->
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Register A New Service</i></div>
    </div>
    <div class="block-content collapse in">
      <div class="span12">

        <!--------------------form------------------->
        <form method="post" enctype="multipart/form-data">
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" style='padding: 1rem;' name="service_name" id="focusedInput" type="text" placeholder="Service Name" required>
              </p>
            </div>
          </div>
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" style='padding: 1rem;' name="service_date" id="focusedInput" type="date" placeholder="Service Date" required autocomplete="">
              </p>
            </div>
          </div>
          </p>



          </p>

          </p>

          </p>

          </p>


          </p>

          </p>

          </p>


          </p>


          </p>

          </p>

          </p>

      </div>

      </p>



      <div class="control-group">
        <div class="controls">
          <button name="save" style='text-decoration: none; border: none; padding: 0.4rem; background: #ff652f; color: #fff; border-radius: 0.4rem;' id="save" data-placement="right" title="Click to add service"><i class="icon-plus-sign icon-large"> Save</i></button>
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




    </div>
  </div>
</div>
<!-- /block -->

<?php
if (isset($_POST['save'])) {

  $service_name = $_POST['service_name'];
  $service_date = $_POST['service_date'];

  mysqli_query($conn, "insert into service_mc (service_name,service_date) values('$service_name','$service_date')") or die('Error: ' . mysqli_error($conn));

  mysqli_query($conn, "insert into activity_log (date,username,action) values(NOW(),'$admin_username','Added Service')") or die(mysqli_error($conn));
?>
  <script>
    window.location = "addcongrigantsmc.php";
    $.jGrowl("Service Successfully Added", {
      header: 'service add'
    });
  </script>
<?php


}
?>