<div class="row-fluid">
  <!-- block -->
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <div class="muted pull-left"><i class="icon-plus-sign icon-large"> Enter Your Giving</i></div>
    </div>
    <div class="block-content collapse in">
      <div class="span12">
        <form method="post">

          <div class="control-group">
            <div class="controls">
              <input class="input focused" id="searchQuery" type="text" style='padding: 1rem;' placeholder="Search with Name or ID">
            </div>
          </div>
          <div class="control-group">




            <div class="controls">
              <select class="input focused .memberSelect" name="Member_ID" id="memberSelect">
                <?php
                $select = "SELECT*FROM members where church_id='$church_id'";
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


          <div class="control-group">
            <div class="controls">
              <input class="input focused" name="amount" style='padding: 1rem;' id="focusedInput" type="text" placeholder="Amount">
            </div>
          </div>


          <div class="control-group">
            <div class="controls">
              <input class="input focused" name="reason" style='padding: 1rem;' id="focusedInput" type="text" placeholder="Giving Towards">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <input class="input focused" name="na" style='padding: 1rem;' id="focusedInput" type="text" placeholder="mobile Number">
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
  $amount = $_POST['amount'];
  $reason = $_POST['reason'];
  $na = $_POST['na'];
  $service_id = $_POST["service_id"];




  mysqli_query($conn, "insert into giving (Member_ID,amount,reason,na) values('$Member_ID','$amount','$reason','$na')") or die('Error: ' . mysqli_error($conn));

?>
  <script>
    window.location = "addgiving.php";
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