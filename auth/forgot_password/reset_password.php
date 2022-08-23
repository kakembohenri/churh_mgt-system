<?php

session_start();

require('../../vendor/autoload.php');

require('../../admin/dbconn.php');

$_SESSION['error'] = "";
$_SESSION['success'] = "";
$_SESSION['change_successfull'] = "";

$email = $_SESSION['email'];
$code = $_SESSION['code'];


function Validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($_POST['password']) && empty($_POST['Confirmpassword'])){
        $_SESSION['error'] = 'Both fields must be filled';
    }else{

        if($_POST['password'] != $_POST['Confirmpassword']){
            $_SESSION['error'] = 'Passwords dont match';
        }else{

            $password = Validate($_POST['password']);
            $Newpassword = md5($password);
    
            // Update password
            $update_query = mysqli_query($conn, "update users set password='$Newpassword' where username='$email'") or die($_SESSION['error'] = mysqli_error($conn));

            if($update_query){
                // remove password 
                mysqli_query($conn, "delete from password_reset where email='$email' and reset_code='$code'") or die($_SESSION['error'] = mysqli_error($conn));
    
                $_SESSION['change_successfull'] = 'Password has been changed';
                header('location: ../login/login.php');
            }else{
                $_SESSION['error'] = 'Email address not recognized';
            }
        }

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
            height: 30rem;
        }

        form input {
            padding: 0.8rem;
            outline: none;
            border: 0.1rem solid #454545;
            border-radius: 0.4rem;
            margin: 1rem 0rem;
        }

        form input:focus {
            border: 0.1rem solid darkorange;
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
    <?php if ($_SESSION['success'] !== '') {
    ?>
        <div class="notification">
            <div class='notification-content success'>
                <img style='width: 2rem; margin-right: 0.5rem;' src='../../public/images/success.png' alt='failed icon' />
                <h3 style='font-weight: 100;'><?php echo $_SESSION['success']; ?></h3>
            </div>
        </div>
    <?php
        $_SESSION['success'] = "";
    }
    ?>
    <div class="login-wrapper">
        <form action="" class="form" name='signup' method="post" style="width:50vw ;">
            <img src="" alt="product logo">
            <h2>Reset Password</h2>

            <input type="password" name='password' placeholder='Enter new password' />
            <input type="password" name='Confirmpassword' placeholder='Confirm password' />
            <button type='submit'>Reset password</button>
        </form>
    </div>
</body>

</html>

</br>
<div class="error">

</div>