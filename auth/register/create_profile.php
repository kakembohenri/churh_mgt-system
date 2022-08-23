<?php

session_start();

$_SESSION['error'] = "";
$_SESSION['success'] = "";

require('../../admin/dbconn.php');

$id = $_SESSION['user_id'];
echo 'id is: '. $id;
function Validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['name'] && !empty($_POST['est']) && !empty($_POST['staff']) && !empty($_POST['location']))){

        $name = Validate($_POST['name']);
        $est = Validate($_POST['est']);
        $staff_no = Validate($_POST['staff']);
        $location = Validate($_POST['location']);

        if(!empty($_POST['image'])){

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
                 if ($_FILES["fileToUpload"]["size"] > 500000) {
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
            // Update the churches table with avatar
            mysqli_query($conn, "update churches set name='$name', date_established='$est', avatar='$target_file' where user_id='$id'") or die($_SESSION['error'] = mysqli_error($conn));

            // Set session variable
            $_SESSION['church'] = $id;
            $_SESSION['profile_success'] = 'Your profile has been successfully created';
            header('location: ../../admin/dashboard.php');
        }else{
        // Update the churches table without avatar
        mysqli_query($conn, "update churches set name='$name', date_established='$est' where user_id='$id'")or die($_SESSION['error'] = mysqli_error($conn));

        $date =  date_create(date("Y-m-d"));
        date_add($date, date_interval_create_from_date_string("30 days"));
        $day30 = date_format($date, "Y-m-d");

        // Insert into subscription table
        mysqli_query($conn, "insert into subscription(user_id, plan, start_date, end_date, timestamp) values('$id', 'plan', '$date', '$day30')") or die (mysqli_error($conn));

        $_SESSION['church_admin'] = $id;
        $_SESSION['profile_success'] = 'Your profile has been successfully created';
        header('location: ../../admin/dashboard.php');
        }
    }else{
        $_SESSION['error'] = 'Only the avatar field may be left blank';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../admin/style.css">


    <style>
        .notification {
            position: absolute;
            top: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            transform: translateY(-130%);
            z-index: 100;
            animation: slidedown 5s 1s 1 cubic-bezier(0.075, 0.82, 0.165, 1);
        }

        .notification-content {
            display: flex;
            align-items: center;
            box-shadow: 0rem 0rem 1rem 0.5rem rgba(0, 0, 0, 0.2);
            padding: 1rem;
            border-radius: 0.5rem;

        }

        .failure {
            background: #ff8888;
        }

        .success {
            background: #b5fab5;

        }

        @keyframes slidedown {

            0%,
            100% {
                transform: translateY(-130%);
                opacity: 0;
            }

            10%,
            90% {
                transform: translateY(180%);
                opacity: 1;
            }
        }


        button {
            padding: 0.8rem;
            background: #ff652f;
            color: white;
            border: #ff652f;
            cursor: pointer;
            margin: 1rem 0rem;
        }

        a {
            text-decoration: none;
            color: white;
        }

        form {
            display: flex;
            flex-direction: column;
            height: 60%;
            justify-content: space-around;
            height: 32rem;
        }

        form input {
            padding: 0.8rem;
            outline: none;
            border: 0.1rem solid #454545;
            border-radius: 0.4rem;
            margin: 0.5rem 0rem;
        }

        form input:focus {
            border: 0.1rem solid darkorange;
        }

        .extras {
            display: flex;
            flex-direction: column;
            height: 8rem;
            justify-content: space-around;
        }

        .google {
            display: flex;
            align-items: center;
            width: 100%;
            justify-content: center;
        }

        .button-google {
            background: transparent;
        }
    </style>
    <title> Product name</title>
</head>

<body style="background: url('../../public/img/bg.jpg') no-repeat center !important">
    <?php if ($_SESSION['error'] !== '') {
    ?>
        <div class="notification">
            <div class='notification-content failure'>
                <img style='width: 2rem; margin-right: 0.5rem;' src='../../public/images/failure2.png' alt='failed icon' />
                <h3 style='font-weight: 100;'><?php echo $_SESSION['error']; ?></h3>
            </div>
        </div>
    <?php
        $_SESSION['error'] = "";
    }
    ?>
    <?php if ($_SESSION['verified'] !== '') {
    ?>
        <div class="notification">
            <div class='notification-content success'>
                <img style='width: 2rem; margin-right: 0.5rem;' src='../../public/images/success.png' alt='success icon' />
                <h3 style='font-weight: 100;'><?php echo $_SESSION['verified']; ?></h3>
            </div>

        </div>
    <?php
        $_SESSION['verified'] = "";
    }
    ?>
    <div class="login-wrapper">
        <form action="" class="form" name='signup' method="post" style="width:50vw ;" enctype="multipart/form-data">
            <img src="" alt="product logo">
            <h2>Create your profile</h2>

            <input type="text" name='name' placeholder='Church name' />

            <div>

                <label for="est">
                    Church foundation date
                </label>
                <input type="date" name='est' />
            </div>

            <input type="number" name='staff' placeholder="Number of staff" />

            <input type="text" name='location' placeholder="Church location" />

            <div>

                <label for="avatar">
                    Church Profile pic
                </label>
                <input style='border: none;' type="file" name='image'>
            </div>
            <button type='submit'>Save</button>
        </form>
    </div>
</body>

</html>

</br>
<div class="error">

</div>