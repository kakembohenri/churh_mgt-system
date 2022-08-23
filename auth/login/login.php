<?php

session_start();

require('../../admin/dbconn.php');

$_SESSION['error'] = "";

function Validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = Validate($_POST['username']);
        $password = Validate($_POST['password']);
        $Newpassword = md5($password);

        // Check for user in the table
        $user_query = mysqli_query($conn, "select id from users where username='$username' and password='$Newpassword'") or die($_SESSION['error'] = mysqli_error($conn));
        $user = mysqli_fetch_array($user_query);
        $count = mysqli_num_rows($user_query);

        if ($count > 0) {
            // Check the churches table for this user
            $id = $user['id'];
            $church_query = mysqli_query($conn, "select * from churches where user_id='$id'") or die($_SESSION['error'] = mysqli_error($conn));
            $church = mysqli_fetch_array($church_query);
            $church_count = mysqli_num_rows($church_query);

            if ($church_count > 0) {
                $name = $church['name'];
                $activity = 'User login';
                mysqli_query($conn, "insert into activity_log(username, church_id, action) values('$name', '$id', '$activity')") or die (mysqli_error($conn));
                $_SESSION['church_admin'] = $id;
                header('location: ../../admin/dashboard.php');
            } else {
                $admin_query = mysqli_query($conn, "select * from admin where user_id='$id'") or die($_SESSION['error'] = mysqli_error($conn));
                $admin = mysqli_fetch_array($admin_query);
                $admin_count = mysqli_num_rows($admin_query);

                if ($admin_count > 0) {
                    $name = $admin['surname']." ".$admin['firstname'];
                    $activity = 'Admin Log in';
                    mysqli_query($conn, "insert into activity_log(username, church_id, action) values('$name', '$id', '$activity')") or die (mysqli_error($conn));
                    $_SESSION['admin'] = $id;
                    header('location: ../../administrator/dashboard.php');
                } else {
                    $query = mysqli_query($conn, "select * from church_staff where user_id='$id' and role='data_entrant'") or die(mysqli_error($conn));
                    $entrant = mysqli_fetch_array($query);
                    $data_entrant_count = mysqli_num_rows($query);

                    if($data_entrant_count > 0){
                        $name = $entrant['surname']." ".$entrant['first_name'];
                        $activity = 'Data entrant has Logged in';
                        mysqli_query($conn, "insert into activity_log(username, church_id, action) values('$name', '$id', '$activity')") or die (mysqli_error($conn));
                        $_SESSION['data_entrant'] = $id;
                    header('location: ../../admin/dashboard.php');

                    }else{
                        $query = mysqli_query($conn, "select * from church_staff where user_id='$id' and role='admin'") or die(mysqli_error($conn));
                        $admin = mysqli_fetch_array($query);
                        $admin_count = mysqli_num_rows($query);

                    if($admin_count > 0){
                        $name = $admin['surname']." ".$admin['first_name'];
                        $activity = 'Church admin has Logged in';
                        mysqli_query($conn, "insert into activity_log(username, church_id, action) values('$name', '$id', '$activity')") or die (mysqli_error($conn));
                        $_SESSION['church_sub_admin'] = $id;
                        header('location: ../../admin/dashboard.php');
                    }else{
                        
                        $_SESSION['error'] = 'Other users are still being created';
                    }
                    }
                }
            }
        } else {
            $_SESSION['error'] = 'Invalid credentials';
        }
    } else {
        $_SESSION['error'] = 'Fill in both fields';
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

        .extras {
            display: flex;
            flex-direction: column;
            height: 8rem;
            justify-content: space-around;
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
    <?php
    if (isset($_SESSION['change_successfull'])) {
        if ($_SESSION['change_successfull'] !== '') {
    ?>
            <div class="notification">
                <div class='notification-content success'>
                    <img style='width: 2rem; margin-right: 0.5rem;' src='../../public/images/success.png' alt='success icon' />
                    <h3 style='font-weight: 100;'><?php echo $_SESSION['change_successfull']; ?></h3>
                </div>

            </div>
    <?php
            $_SESSION['change_successfull'] = "";
        }
    }
    ?>

    <div class="login-wrapper">
        <form action="" class="form" name='signup' method="post" style="width:50vw ;">
            <img src="" alt="product logo">
            <h2>Login</h2>

            <input type="text" name='username' placeholder='Username/Email' />
            <input type="password" name='password' placeholder="Password" />
            <button type='submit'>Signin</button>

            <div class='extras'>
                <div>
                    <a href='../register/register.php'>Dont have an account yet?</a>
                </div>
                <div>
                    <a href='../forgot_password/forgot_password.php'>Forgot Password</a>
                </div>

            </div>
        </form>
    </div>
</body>

</html>

</br>
<div class="error">

</div>