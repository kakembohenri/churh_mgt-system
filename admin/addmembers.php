<?php include('importcsv.php') ?>

<div class="row-fluid">
  <!-- block -->
  <style>
    * {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  </style>
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Register New Member</i></div>
    </div>
    <div class="block-content collapse in">
      <div class="span12">

        <!--------------------form------------------->
        <form method="post" enctype="multipart/form-data">
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="Member_ID" id="focusedInput" type="text" placeholder="Discipleship ID" style='padding: 1rem;' required>
              </p>
            </div>
          </div>
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="fname" id="focusedInput" type="text" placeholder="First Name" style='padding: 1rem;' required>
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="sname" id="focusedInput" type="text" placeholder="Surname" style='padding: 1rem;' required>
              </p>
            </div>
          </div>

          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="mobile" id="focusedInput" type="text" style='padding: 1rem;' placeholder="Contact">
              </p>
            </div>
          </div>
          </p>


          <div class="control-group">
            <p>
            <div class="controls">
              <label for="Birthday">
                Date of Birth:
              </label>
              <p>
                <input class="input focused" name="Birthday" id="focusedInput" type="date" style='padding: 1rem;' placeholder="Birthday" required>
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="Residence" id="focusedInput" type="text" style='padding: 1rem;' placeholder="Place of Residence">
              </p>
            </div>
          </div>
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="Workplace" id="focusedInput" type="text" style='padding: 1rem;' placeholder="Work Place">
              </p>
            </div>
          </div>
          </p>

          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <select class="input focused" name="ministry" id="focusedInput" required="required" type="text">
                  <option value="">Select ministry</option>
                  <option value="None">None</option>
                  <option value="Pastor">Pastor</option>
                  <option value="Praise and Worship">Praise and Worship</option>
                  <option value="Ushering">Ushering</option>
                  <option value="Hostessing">Hostessing</option>
                  <option value="media and IT">media and IT</option>
                  <option value="Machine">Machine department</option>
                  <option value="Sunday School">Children's Church teacher</option>
                </select>
              </p>
            </div>
          </div>
          </p>

          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <select class="input focused" name="Marital_status" id="focusedInput" required="required" type="text">
                  <option value=" ">Select Marital_status</option>
                  <option value="None">None</option>
                  <option value="Married">Married</option>
                  <option value="Single">Single</option>
                  <option value="Widow">Widow</option>
                  <option value="Widower">Widower</option>
                  <option value="Divored">Divored</option>
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
                Date of Marriage:
              </label>
              <p>
                <input class="input focused" name="marriage" id="focusedInput" type="date" style='padding: 1rem;'>
              </p>
            </div>
          </div>
          </p>


          </p>

          <!-- Children -->
          <!-- <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="children" id="focusedInput" type="text" placeholder="Children">
              </p>
            </div>
          </div> -->
          </p>
          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="occupation" id="focusedInput" type="text" style='padding: 1rem;' placeholder="occupation">
              </p>
            </div>
          </div>
          </p>

          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="mc" id="focusedInput" type="text" style='padding: 1rem;' placeholder="Missional Community">
              </p>
            </div>
          </div>
          </p>

          <div class="control-group">
            <p>
            <div class="controls">
              <p>
                <input class="input focused" name="Zone" id="focusedInput" type="text" style='padding: 1rem;' placeholder="Zone">
              </p>
            </div>
          </div>
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
          <button name="save" style="padding: 0.4rem; background: orangered; color: #fff; border: none; border-radius: 0.4rem;" id="save" data-placement="right" title="Click to Save"><i class="icon-plus-sign icon-large"> Save</i></button>
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
        <input type="submit" name="submit" style='background: #454545; color: #fff; padding: 0.4rem; border: none; border-radius: 0.4rem;' value="Import">
      </form>


    </div>
  </div>
</div>
<!-- /block -->

<?php
if (isset($_POST['save'])) {
  $Member_ID = $_POST['Member_ID'];
  $fname = $_POST['fname'];
  $sname = $_POST['sname'];
  $mobile = $_POST['mobile'];
  $Birthday = $_POST['Birthday'];
  $Residence = $_POST['Residence'];
  $Workplace = $_POST['Workplace'];
  $ministry = $_POST['ministry'];
  $Marital_status = $_POST['Marital_status'];
  $marriage = $_POST['marriage'];
  $occupation = $_POST['occupation'];
  // $children = $_POST['children'];
  $mc = $_POST['mc'];
  $Zone = $_POST['Zone'];

  $church_id = $_SESSION['church_admin'];



  /* Uploading images script */
  $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $image_name = addslashes($_FILES['image']['name']);
  $image_size = getimagesize($_FILES['image']['tmp_name']);
  move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
  $thumbnail = "uploads/" . $_FILES["image"]["name"];




  $query = mysqli_query($conn, "select * from members where church_id='$church_id' and member_id='$Member_ID'") or die('Error: ' . mysqli_error($conn));
  $count = mysqli_num_rows($query);

  if ($count > 0) { ?>
    <script>
      alert('This member Already Exists');
    </script>
  <?php
  } else {

    $_SESSION['success'] = '';

    mysqli_query($conn, "insert into members(member_id, church_id, fname, sname, mobile, birthday, residence, workplace, ministry,marital_status, date_of_marriage, occupation, mc, zone,thumbnail) values('$Member_ID', '$church_id', '$fname','$sname','$mobile','$Birthday','$Residence','$Workplace','$ministry','$Marital_status','$marriage','$occupation','$mc','$Zone' ,'$thumbnail')") or die('Error: ' . mysqli_error($conn));

    $_SESSION['success'] = 'Successfully added a new member';

    mysqli_query($conn, "insert into activity_log (date,username,action) values('NOW()','$username','Added member $Member_ID')") or die(mysqli_error($conn));
  ?>
    <script>
      // window.location = "add_members.php";
      // $.jGrowl("member Successfully added", {
      //   header: 'member add'
      // });
      // alert('Successfully added a disciple')
    </script>
<?php
  }
}
?>