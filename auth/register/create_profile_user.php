<?php

session_start();

$_SESSION['error'] = "";
$_SESSION['success'] = "";

require('../../admin/dbconn.php');

echo "church_id: ". $_SESSION['user_church']. "<br />";
echo "user_id: ". $_SESSION['user_id']. "<br />";
echo "role: ". $_SESSION['role']. "<br />";


function Validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username'] && !empty($_POST['first_name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['pass']))) {

        $username = Validate($_POST['username']);
        $first_name = Validate($_POST['first_name']);
        $surname = Validate($_POST['surname']);
        $email = Validate($_POST['email']);
        $dob = Validate($_POST['dob']);
        $occupation = Validate($_POST['occupation']);
        $residence = Validate($_POST['residence']);
        $marital_status = Validate($_POST['marital_status']);
        $phone_number = Validate($_POST['phone_number']);
        $pass = Validate($_POST['pass']);
        $passConf = Validate($_POST['Confpass']);
        $church_id = $_SESSION['user_church'];
        $user_id = $_SESSION['user_id'];
        $role = $_SESSION['role'];
        $code = $_SESSION['code'];
        $avatar = $_POST['image'];
        
        if ($pass != $passConf){
            $_SESSION['error'] = 'Passwords dont match';
        }else{

        // Check verification table
        $query = mysqli_query($conn, "select * from email_verification where email='$email' and verification_code='$code'") or die('Error: '. mysqli_error($conn));

        $count = mysqli_num_rows($query);

        if($count > 0){

            if(!empty($avatar)){

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
            // Update user into church_staff table
            mysqli_query($conn, "update church_staff set first_name='$first_name', surname='$surname', phone_number='$phone_number', email='$email', dob='$dob', residence='$residence', marital_status='$marital_status', role='$role', avatar='$target_file', occupation='$occupation' where user_id='$user_id' and church_id='$church_id'") or die(mysqli_error($conn));

            }else{
                // Update user into church_staff table
            mysqli_query($conn, "update church_staff set first_name='$first_name', surname='$surname', phone_number='$phone_number', email='$email', dob='$dob', residence='$residence', marital_status='$marital_status', role='$role', avatar='', occupation='$occupation' where user_id='$user_id' and church_id='$church_id'") or die(mysqli_error($conn));
            }
            $newPass = md5($pass);

            // Update user table
            mysqli_query($conn, "update users set username='$username', password='$newPass' where id='$user_id'") or die(mysqli_error($conn));

            // Remove email and verification code from table
mysqli_query($conn, "delete from email_verification where email='$email' and verification_code='$code'") or die('Error: '. mysqli_error($conn));

            // Set session variable
            if($role == 'data_entrant'){
                $_SESSION['data_entrant'] = $user_id;

            }

            if($role == 'admin'){
                $_SESSION['church_sub_admin'] = $user_id;
            }

            $_SESSION['success'] = 'Your profile has been successfully created';
            header('location: ../../admin/dashboard.php');

        }else{
            $_SESSION['error'] = 'Forbidden action';
        } 
        
    }

    } else {
        $_SESSION['error'] = 'Fill in your names';
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

        .pp{
            display: flex;
    justify-content: center;
    align-items: center;
        }
    </style>
    <title> Product name</title>
</head>

<body style="background: url('../../public/img/bg.jpg') no-repeat center !important">
    <?php if (!empty($_SESSION['error'])) {
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
    <?php if (!empty($_SESSION['verified'])) {
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
    <div class="pp">
        <form action="" class="form" name='signup' method="post" style="width:50vw ; height: 58rem;" enctype="multipart/form-data">
            <h2>Create your profile</h2>

            <input type="text" name='first_name' placeholder='First name' required />
            <input type="text" name='surname' placeholder='Surname' required />
            <input type="email" name='username' placeholder='Email Username' required />

            <div style='display: flex; flex-direction: column;'>

                <label for="dob">
                    Date of Birth
                </label>
                <input type="date" name='dob' required />
            </div>

            <input type="number" name='phone_number' placeholder="Phone number" />

            <input type="email" name='email' placeholder="email" />

            <input type="text" name='occupation' placeholder="Occupation" />

            <input type="text" name='residence' placeholder="Residence" />

            <select name='marital_status' style='padding: 0.5rem'>
                <option value=" ">Select Marital_status</option>
                <option value="None">None</option>
                <option value="Married">Married</option>
                <option value="Single">Single</option>
                <option value="Widow">Widow</option>
                <option value="Widower">Widower</option>
                <option value="Divored">Divored</option>
            </select>

            <input type="password" name='pass' placeholder="Password" />
            <input type="password" name='Confpass' placeholder="Confirm Password" />


            <div style='margin: 1rem;'>

                <label for="avatar">
                    Profile picture
                </label>
                <input style='border: none; padding: 0rem;' type="file" name='image'>
            </div>
            <button type='submit'>Save</button>
        </form>
    </div>
</body>

</html>

</br>
<div class="error">

</div>