<?php error_reporting(0); ?>
<div class="row-fluid">

  <a href="add_visitor.php" style='text-decoration: none; border: none; padding: 0.4rem; background: orange; color: #fff; border-radius: 0.4rem;' id="add" data-placement="right" title="Click to Add New Visitor"><i class="icon-plus-sign icon-large"></i> Add New Visitor</a>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#add').tooltip('show');
      $('#add').tooltip('hide');
    });
  </script>
  <!-- block -->
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit visitor Info.</div>
    </div>
    <div class="block-content collapse in">
      <div class="span12">
        <?php
        $church_id = $_SESSION['church_admin'];

        $query = mysqli_query($conn, "select * from visitor where church_id='$church_id' and id = '$get_visitor_id'") or die('Error: ' . mysqli_error($conn));
        $row = mysqli_fetch_array($query);
        ?>

        <!-- --------------------form ---------------------->
        <form method="post">
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="fname" style='padding: 1rem;' value="<?php echo $row['fname']; ?>" id="focusedInput" type="text" placeholder=" First Name" required>
              </p>
            </div>
          </div>
          </p>


          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="sname" style='padding: 1rem;' value="<?php echo $row['sname']; ?>" id="focusedInput" type="text" placeholder=" Surname" required>
              </p>
            </div>
          </div>
          </p>

          <div class="control-group">
            <p>
            <div class="controls">
              <label for="Gender">
                Gender:
              </label>
              <p>
                <select class="input focused" name="Gender" id="focusedInput" required="required">
                  <option value="male" <?php if ($row['gender'] == 'male') { ?> selected <?php } ?>>male</option>
                  <option value="Female" <?php if ($row['gender'] == 'Female') { ?> selected <?php } ?>>Female</option>

                </select>
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="residence" style='padding: 1rem;' id="focusedInput" value="<?php echo $row['residence']; ?>" type="text" placeholder="Residence" required>
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <label for="dob">
                Date of Birth:
              </label>
              <p>
                <input class="input focused" name="dob" style='padding: 1rem;' id="focusedInput" value="<?php echo $row['birthday']; ?>" type="date" placeholder="Birthday" required>
              </p>
            </div>
          </div>
          </p>

          <div class="control-group">
            <p>
            <div class="controls">
              <label for="event">
                Event attended:
              </label>
              <p>
                <select class="input focused" name="event" id="focusedInput" required="required" type="text">
                  <option value="Sunday Service" <?php if ($row['event'] == 'Sunday Service') { ?> selected <?php } ?>>Sunday Service</option>
                  <option value="Extreme Worship" <?php if ($row['event'] == 'Extreme Worship') { ?> selected <?php } ?>>Extreme Worship</option>
                  <option value="Prayer Kesha" <?php if ($row['event'] == 'Prayer Kesha') { ?> selected <?php } ?>>Prayer Kesha</option>
                  <option value="Others" <?php if ($row['event'] == 'Others') { ?> selected <?php } ?>>Others</option>

                </select>
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="mobile" style='padding: 1rem;' id="focusedInput" value="<?php echo $row['mobile']; ?>" type="text" placeholder="Mobile No." required>
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
          <button name="update" style='text-decoration: none; border: none; padding: 0.4rem; background: orange; color: #fff; border-radius: 0.4rem;' id="update" data-placement="right" title="Click to Update"><i class="icon-plus-sign icon-large"> Update</i></button>
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

if (isset($_POST['update'])) {
  $fname = $_POST['fname'];
  $sname = $_POST['sname'];
  $Gender = $_POST['Gender'];
  $residence = $_POST['residence'];
  $dob = $_POST['dob'];
  $event = $_POST['event'];
  $mobile = $_POST['mobile'];




  mysqli_query($conn, "UPDATE visitor SET church_id = '$church_id', fname = '$fname',sname ='$sname',gender='$Gender', residence='$residence',birthday='$dob', event='$event',mobile='$mobile' where church_id='$church_id' and id='$get_visitor_id'")
    or die('Error: ' . mysqli_error($conn));

  $_SESSION['success'] = 'Visitor successfully edited';
  //   mysqli_query($conn, "insert into activity_log (date,username,action)
  //  values(NOW(),'$admin_username','Edited Visitor $id')") or die('Error: ' . mysqli_error($conn));
?>
  <!-- <script>
    window.location = "visitor.php";
    $.jGrowl(" Visitor Successfully Update", {
      header: 'Visitor Update'
    });
  </script> -->
<?php
}
?>