<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;

require('../../vendor/autoload.php');

require('../../admin/dbconn.php');

$_SESSION['error'] = "";
$_SESSION['success'] = "";
$code = rand(100000, 999999);

function Validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($_POST['email'])){
        $_SESSION['error'] = 'An Email address must be provided';
    }else{
        $email = Validate($_POST['email']);

        $user_query = mysqli_query($conn, "select id from users where username='$email'") or die($_SESSION['error'] = mysqli_error($conn));
        $count = mysqli_fetch_array($user_query);

        if($count > 0){
            // Create new record in password reset table
            $reset = mysqli_query($conn, "insert into password_reset(reset_code, email) values('$code','$email')") or die($_SESSION['error'] = mysqli_error($conn));

            if(!$reset){
                $_SESSION['error'] = 'Something went wrong';
            }else{

                try {
                    $mail = new PHPMailer();
    
                    // specify SMTP credentials
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'familytree733@gmail.com';
                    $mail->Password = 'tvqfbuqptaxygmou';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
    
                    $mail->setFrom('familytree733@gmail.com', 'Church Website');
                    $mail->addAddress($email);
                    $mail->Subject = 'Reset password link';
    
                    // Enable HTML if needed
                    $mail->isHTML(true);
                    $mail->Body = '<div style="display: flex; flex-direction: column; justify-content: center"><h3 style="font-family: tahoma, sans-serif; color: #454545">Welcome to product </h3><p style="font-family: tahoma, sans-serif;">Click the button below to reset your password</p><a style="text-decoration: none; font-family: tahoma, sans-serif; width: fit-content; color: #454545; background: #ff652f; padding: 0.8rem; cursor: pointer; border-radius: 0.4rem;" target="_blank" href="http://localhost/church_mgt/auth/forgot_password/redirect.php?email='.$email.'&code='.$code.'"'.'>Reset Password</a></div>';
    
                    if ($mail->send()) {
                        $_SESSION['success'] = "A password reset code has been sent to your email address";
                    } else {
                        $_SERVER['error'] = "Something went wrong";
                    }
                } catch (Exception $e) {
                    $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }

        }else{
            $_SESSION['error'] = 'Email address not recognized';
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
            <h2>Forgot Password</h2>

            <input type="text" name='email' placeholder='Enter email address' />
            <button type='submit'>Send reset code</button>
        </form>
    </div>
</body>

</html>

</br>
<div class="error">

</div>