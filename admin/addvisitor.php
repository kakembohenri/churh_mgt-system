<div class="row-fluid">
  <!-- block -->
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Register New Visitor</i></div>
    </div>
    <div class="block-content collapse in">
      <div class="span12">

        <!--------------------form------------------->
        <form method="post">
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" style='padding: 1rem;' name="fname" id="focusedInput" type="text" placeholder="First Name">
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" style='padding: 1rem;' name="sname" id="focusedInput" type="text" placeholder="Surname">
              </p>
            </div>
          </div>

          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <select class="input focused" name="gender" id="focusedInput" type="text">
                  <option value="Select Gender">Select Gender</option>
                  <option value="male">male</option>
                  <option value="Female">Female</option>

                </select>
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <label for="birthday">
                Date of Birth:
              </label>
              <p>
                <input class="input focused" style='padding: 1rem;' name="birthday" id="focusedInput" type="date" placeholder="Birthday">
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" style='padding: 1rem;' name="residence" id="focusedInput" type="text" placeholder="Residence">
              </p>
            </div>
          </div>

          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <select class="input focused" name="event" id="focusedInput" type="text">
                  <option value="">Select Event Attended</option>
                  <option value="Sunday Service">Sunday Service</option>
                  <option value="Extreme Worship">Extreme Worship</option>
                  <option value="Prayer Kesha">Prayer Kesha</option>
                  <option value="Others">Others</option>

                </select>
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" style='padding: 1rem;' name="mobile" id="focusedInput" type="text" placeholder="mobile number">
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
              </p>
            </div>
          </div>
          </p>

          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
              </p>
            </div>
          </div>
          </p>
      </div>



      <div class="control-group">
        <div class="controls">
          <button name="save" style='text-decoration: none; border: none; padding: 0.4rem; background: #8ef3c5; color: #fff; border-radius: 0.4rem;' id="save" data-placement="right" title="Click to Save"><i class="icon-plus-sign icon-large"> Save</i></button>
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

<?php

$church_id = $_SESSION['church_admin'];
if (isset($_POST['save'])) {
  $fname = $_POST['fname'];
  $sname = $_POST['sname'];
  $gender = $_POST['gender'];
  $birthday = $_POST['birthday'];
  $residence = $_POST['residence'];
  $event = $_POST['event'];
  $mobile = $_POST['mobile'];



  $query = mysqli_query($conn, "select * from visitor where church_id='$church_id' and mobile = '$mobile'  ") or die(mysqli_error($conn));
  $count = mysqli_num_rows($query);

  if ($count > 0) { ?>
    <script>
      alert('This Visitor  Already Exists');
    </script>
  <?php
  } else {
    mysqli_query($conn, "insert into Visitor(church_id,fname,sname,gender,birthday,residence,event,mobile) 
values('$church_id','$fname','$sname','$gender','$birthday','$residence','$event','$mobile')") or die('Error: ' . mysqli_error($conn));

    $_SESSION['success'] = 'You have successfully added a new visitor';
    // mysqli_query($conn, "insert into activity_log (date,username,action) values(NOW(),'$admin_username','Added member $mobile')") or die(mysqli_error($conn));
  ?>
    <!-- <script>
      window.location = "add_visitor.php";
      $.jGrowl("member Successfully added", {
        header: 'member add'
      });
    </script> -->
<?php
  }
}
?>