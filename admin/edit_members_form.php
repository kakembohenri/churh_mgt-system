<div class="row-fluid">
  <style>
    * {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  </style>
  <a href="add_members.php" style='color: #fff; background: #8ef3c5; padding: 0.4rem; border: none; border-radius: 0.5rem;' id="add" data-placement="right" title="Click to Add New"><i class="icon-plus-sign icon-large"></i> Add New member</a>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#add').tooltip('show');
      $('#add').tooltip('hide');
    });
  </script>
  <!-- block -->
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit member Info.</div>
    </div>
    <div class="block-content collapse in">
      <div class="span12">
        <?php
        $query = mysqli_query($conn, "select * from members where member_id = '$get_member_id'") or die(mysqli_error($conn));
        $row = mysqli_fetch_array($query);
        ?>

        <!-- --------------------form ---------------------->
        <form method="post">
          <div class="control-group">
            <p>
            <div class="controls">
              <label for="Member_ID">
                Member id:
              </label>
              <p>
                <input class="input focused" name="Member_ID" value="<?php echo $row['member_id']; ?>" id="focusedInput" type="text" style='padding: 1rem;' required>
              </p>
            </div>
          </div>
          </p>

          <div class="control-group">
            <p>
            <div class="controls">
              <label>
                First name:
              </label>
              <p>
                <input class="input focused" name="fname" value="<?php echo $row['fname']; ?>" id="focusedInput" type="text" style='padding: 1rem;'>
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <label>
                Surname
              </label>
              <p>
                <input class="input focused" name="sname" value="<?php echo $row['sname']; ?>" id="focusedInput" type="text" style='padding: 1rem;' required>
              </p>
            </div>
          </div>


          <div class="control-group">
            <p>
            <div class="controls">
              <label for="Birthday">
                Date of Birth:
              </label>
              <p>
                <input class="input focused" name="Birthday" id="focusedInput" value="<?php echo $row['birthday']; ?>" type="date" style='padding: 1rem;'>
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <label>
                Residence:
              </label>
              <p>
                <input class="input focused" name="Residence" value="<?php echo $row['residence']; ?>" id="focusedInput" style='padding: 1rem;' type="text">
              </p>
            </div>
          </div>
          </p>

          <div class="control-group">
            <label>
              Select Ministry:
            </label>
            <p>
            <div class="controls">
              <p>
                <select class="input focused" name="ministry" id="focusedInput" required="required" type="text">
                  <option value="None" <?php if ($row['ministry'] == 'None') { ?> selected <?php } ?>>None</option>
                  <option value="Praise and Worship" <?php if ($row['ministry'] == 'Praise and Worship') { ?> selected <?php } ?>>Praise and Worship</option>
                  <option value="Ushering" <?php if ($row['ministry'] == 'Ushering') { ?> selected <?php } ?>>Ushering</option>
                  <option value="Hostessing" <?php if ($row['ministry'] == 'Hostessing') { ?> selected <?php } ?>>Hostessing</option>
                  <option value="media and IT" <?php if ($row['ministry'] == 'media and IT') { ?> selected <?php } ?>>media and IT</option>
                  <option value="Sunday School" <?php if ($row['ministry'] == 'Sunday School') { ?> selected <?php } ?>>Sunday School</option>
                </select>
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <label for="mobile">
                Mobile contact:
              </label>
              <p>
                <input class="input focused" name="mobile" id="focusedInput" value="<?php echo $row['mobile']; ?>" style='padding: 1rem;' type="text" placeholder="mobile number">
              </p>
            </div>
          </div>
          </p>

          <div class="control-group">
            <p>
            <div class="controls">
              <label for="Workplace">
                Workplace:
              </label>
              <p>
                <input class="input focused" name="Workplace" value="<?php echo $row['workplace']; ?>" style='padding: 1rem;' id="focusedInput" type="text" placeholder="Workplace">
              </p>
            </div>
          </div>
          </p>

          <div class="control-group">
            <p>
            <div class="controls">
              <label for="Marital_status">
                Marital status:
              </label>
              <p>
                <select name="Marital_status" required="required">
                  <option value="None" <?php if ($row['marital_status'] == 'None') { ?> selected <?php } ?>>None</option>
                  <option value="Married" <?php if ($row['marital_status'] == 'Married') { ?> selected <?php } ?>>Married</option>
                  <option value="Single" <?php if ($row['marital_status'] == 'Single') { ?> selected <?php } ?>>Single</option>
                  <option value="Divored" <?php if ($row['marital_status'] == 'Divorced') { ?> selected <?php } ?>>Divored</option>
                  <option value="Widow" <?php if ($row['marital_status'] == 'Widow') { ?> selected <?php } ?>>Widow</option>
                  <option value="Widower" <?php if ($row['marital_status'] == 'Widower') { ?> selected <?php } ?>>Widower</option>

                </select>
              </p>
            </div>
          </div>
          </p>


          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <label for="marriage">
                Date of marriage:
              </label>
              <p>
                <input class="input focused" name="marriage" value="<?php echo $row['date_of_marriage']; ?>" style='padding: 1rem;' id="focusedInput" type="date" placeholder="marriage">
              </p>
            </div>
          </div>
          </p>
          <!-- Children -->
          <!-- <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="children" value="<?php echo $row['children']; ?>" id="focusedInput" type="text" placeholder="children">
              </p>
            </div>
          </div> -->
          </p>


          <div class="control-group">
            <p>
            <div class="controls">
              <label for="occupation">
                Occupation:
              </label>
              <p>
                <input class="input focused" name="occupation" value="<?php echo $row['occupation']; ?>" style='padding: 1rem;' id="focusedInput" type="text" placeholder="occupation">
              </p>
            </div>
          </div>
          </p>

          <div class="control-group">
            <p>
            <div class="controls">
              <label for="mc">
                Missional Community:
              </label>
              <p>
                <input class="input focused" name="mc" value="<?php echo $row['mc']; ?>" style='padding: 1rem;' id="focusedInput" type="text">
              </p>
            </div>
          </div>
          </p>

          <div class="control-group">
            <p>
            <div class="controls">
              <label for="Zone">
                Zone:
              </label>
              <p>
                <input class="input focused" name="Zone" value="<?php echo $row['zone']; ?>" style='padding: 1rem;' id="focusedInput" type="text">
              </p>
            </div>
          </div>
          </p>

          </p>

          </p>
      </div>



      <div class="control-group">
        <div class="controls">
          <button name="update" style='color: #fff; background: #8ef3c5; padding: 0.4rem; border: none; border-radius: 0.5rem;' id="update" data-placement="right" title="Click to Update"><i class="icon-plus-sign icon-large"> Update</i></button>
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
if (isset($_POST['update'])) {
  $Member_ID = $_POST['Member_ID'];
  $fname = $_POST['fname'];
  $sname = $_POST['sname'];
  $mobile = $_POST['mobile'];
  $Workplace = $_POST['Workplace'];
  $Birthday = $_POST['Birthday'];
  $Residence = $_POST['Residence'];
  $ministry = $_POST['ministry'];
  $Marital_status = $_POST['Marital_status'];
  $marriage = $_POST['marriage'];
  $occupation = $_POST['occupation'];
  // $children = $_POST['children'];
  $mc = $_POST['mc'];
  $Zone = $_POST['Zone'];


  $_SESSION['success'] = '';
  $church_id = $_SESSION['church_admin'];

  mysqli_query($conn, "UPDATE members SET member_id = '$Member_ID', church_id = '$church_id', fname ='$fname',sname='$sname',mobile='$mobile',workplace='$Workplace', birthday='$Birthday', residence='$Residence', ministry='$ministry', marital_status='$Marital_status',occupation='$occupation' , date_of_marriage='$marriage', mc='$mc', zone='$Zone' where member_id='$get_member_id'") or die(mysqli_error($conn));

  $_SESSION['success'] = 'Member successfully edited';

  $activity = "Edited ". $Member_ID ." profile";
  mysqli_query($conn, "insert into activity_log(username, church_id, action) values('$name', '$id', '$activity')") or die (mysqli_error($conn));
?>
  <!-- <script>
    window.location = "add_members.php";
    $.jGrowl(" member Successfully Update", {
      header: 'member Update'
    });
  </script> -->
<?php
}
?>