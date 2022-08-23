<?php include('importcsv.php') ?>

<div class="row-fluid" style='display: flex; flex-direction: column; align-items: center;'>
    <!-- block -->
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
    <?php if(empty($row['avatar'])){ ?>
    <img id="admin_avatar" class="img-circle" src="../public/images/NO-IMAGE-AVAILABLE.jpg">
    <?php } else{ ?>
        <img id="admin_avatar" class="img-circle" src="<?php echo '../public/'. $row['avatar']; ?>" >
    <?php } ?>
    <div class="block">

        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"><i class="icon-plus-sign icon-large">Edit your profile</i></div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">

                <!--------------------form------------------->
                <?php 
                $id = $_SESSION['church_admin'];
                $query = mysqli_query($conn, "select * from churches where user_id='$id'") or die(mysqli_error($conn));
                $row = mysqli_fetch_array($query);

               
                ?>
                <form method="post" enctype="multipart/form-data">

                    <div class="control-group">
                        <p>
                        <div class="controls">
                            <p>
                                <input class="input focused" name="fname" id="focusedInput" value='<?php echo $row['name']; ?>' type="text" placeholder="Church Name" style='padding: 1rem;' required>
                            </p>
                        </div>
                    </div>
                    </p>
            
                    <div class="control-group">
                        <p>
                        <div class="controls">
                            <label for="Birthday">
                                Date of Establishment:
                            </label>
                            <p>
                                <input class="input focused" name="Birthday" id="focusedInput" type="date" style='padding: 1rem;'
                                value='<?php echo $row['date_established']; ?>' placeholder="Birthday" required>
                            </p>
                        </div>
                    </div>
                    </p>
                   
                    </p>

                    </p>

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
    $name = $_POST['fname'];
    $birthday = $_POST['Birthday'];
    $avatar = $_POST['image'];


    /* Uploading images script */
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
}

        $_SESSION['success'] = '';

        mysqli_query($conn, "update churches set name='$name', date_established='$birthday', avatar='$target_file' where user_id='$id'") or die('Error: ' . mysqli_error($conn));

        $_SESSION['success'] = 'Successfully added a edited Church';

        
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