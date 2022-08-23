<?php
    if($sub['plan'] == 'basic'){
        $_SESSION['upgrade'] = 'Upgrade your subscription plan!';
        header('location: dashboard.php');
    }
?>