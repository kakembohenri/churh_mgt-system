<?php include('importcsv.php') ?>

<div class="row-fluid" style='display: flex; flex-direction: column; align-items: center;'>
    <!-- block -->
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
     <!--------------------form------------------->
     <?php 
                $query = mysqli_query($conn, "select * from church_staff where user_id='$sys_user'") or die(mysqli_error($conn));
                $row = mysqli_fetch_array($query);

               
                ?>
    <?php if(!empty($row['avatar'])){ ?>
    <img id="admin_avatar" class="img-circle" src="<?php echo $row['avatar'];?>">
    <?php }else{ ?>
    <img id="admin_avatar" class="img-circle" src="../public/images/NO-IMAGE-AVAILABLE.jpg">

    <?php } ?>
    <div class="block">

        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"><i class="icon-plus-sign icon-large">Edit your profile</i></div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">

               
                <form method="post" enctype="multipart/form-data">

                    <div class="control-group">
                        <p>
                        <div class="controls">
                            <p>
                                <input class="input focused" name="fname" id="focusedInput" value='<?php echo $row['first_name']; ?>' type="text" placeholder="First Name" style='padding: 1rem;' required>
                            </p>
                        </div>
                    </div>
                    </p>
                    <div class="control-group">
                        <p>
                        <div class="controls">
                            <p>
                                <input class="input focused" name="sname" id="focusedInput" 
                                value='<?php echo $row['surname']; ?>' type="text" placeholder="Surname" style='padding: 1rem;' required>
                            </p>
                        </div>
                    </div>

                    <div class="control-group">
                        <p>
                        <div class="controls">
                            <p>
                                <input class="input focused" name="mobile" id="focusedInput"
                                value='<?php echo $row['phone_number']; ?>'  type="text" style='padding: 1rem;' placeholder="Contact">
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
                                <input class="input focused" name="bob" id="focusedInput" 
                                value='<?php echo $row['dob']; ?>' type="date" style='padding: 1rem;' placeholder="Birthday" required>
                            </p>
                        </div>
                    </div>
                    </p>
                    <div class="control-group">
                        <p>
                        <div class="controls">
                            <p>
                                <input class="input focused" name="residence" id="focusedInput"
                                value='<?php echo $row['residence']; ?>'  type="text" style='padding: 1rem;' placeholder="Place of Residence">
                            </p>
                        </div>
                    </div>
                    </p>

                    </p>

                    </p>

                    <div class="control-group">
                        <p>
                        <div class="controls">
                            <p>
                                <select class="input focused" name="Marital_status" id="focusedInput" required="required" type="text">
                                    <option value=" ">Select Marital_status</option>
                                    <option value="None" <?php if($row['marital_status'] === 'None'):?> selected <?php endif?>>None</option>
                                    <option value="Married" <?php if($row['marital_status'] === 'Married'):?> selected <?php endif?>>Married</option>
                                    <option value="Single" <?php if($row['marital_status'] === 'Single'):?> selected <?php endif?>>Single</option>
                                    <option value="Widow" <?php if($row['marital_status'] === 'Widow'):?> selected <?php endif?>>Widow</option>
                                    <option value="Widower" <?php if($row['marital_status'] === 'Widower'):?> selected <?php endif?>>Widower</option>
                                    <option value="Divored" <?php if($row['marital_status'] === 'Divored'):?> selected <?php endif?>>Divored</option>
                                </select>
                            </p>
                        </div>
                    </div>

                    <div class="control-group">
                        <p>
                        <div class="controls">
                            <p>
                                <input class="input focused" name="occupation" value='<?php echo $row['occupation'];?>' id="focusedInput" type="text" style='padding: 1rem;' placeholder="occupation">
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
                        <input class="input focused" name="image" id="focusedInput" type="file">
                    </p>
                </div>
            </div>
            </p>



            <div class="control-group">
                <div class="controls">
                    <button name="save" style="padding: 0.4rem; background: orangered; color: #fff; border: none; border-radius: 0.4rem;" id="save" data-placement="right" title="Click to Edit"><i class="icon-plus-sign icon-large"> Edit</i></button>
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
if (isset($_POST['save'])) {
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $mobile = $_POST['mobile'];
    $Birthday = $_POST['birthday'];
    $Residence = $_POST['residence'];
    $Marital_status = $_POST['Marital_status'];
    $occupation = $_POST['occupation'];

    $church_id = $_SESSION['church_admin'];


        $_SESSION['success'] = '';

            $target_file = "";
            $target_dir = '../public/uploads/';
            $target_file = $target_dir . basename($_FILES["image"]["name"]); 
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            
             // Check file size
             if ($_FILES["image"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }

                mysqli_query($conn, "update church_staff set first_name='$fname', surname='$sname', phone_number='$mobile', dob='$Birthday', marital_status='$Martial_status', avatar='$target_file', occupation='$occupation' where user_id='$sys_user'") or die('Error: ' . mysqli_error($conn));
            }
        // }else{

        //     mysqli_query($conn, "update church_staff set first_name='$fname', surname='$sname', phone_number='$mobile', dob='$Birthday', marital_status='$Martial_status', avatar='', occupation='$occupation' where user_id='$sys_user' and church_id='$church_id'") or die('Error: ' . mysqli_error($conn));
        // }

        $_SESSION['success'] = 'Successfully edited your profile';

        // mysqli_query($conn, "insert into activity_log (date,username,action) values('NOW()','$admin_username','Added member $Member_ID')") or die(mysqli_error($conn));
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

?>