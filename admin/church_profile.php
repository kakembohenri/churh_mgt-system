<?php include('header.php'); ?>
<?php include('session.php'); ?>

<?php
if (empty($_SESSION['church_admin'])) {
    header('location: dashboard.php');
} else {
    $id = $_SESSION['church_admin'];
    $query = mysqli_query($conn, "select * from churches where user_id='$id'") or die(mysqli_error($conn));
    $church = mysqli_fetch_array($query);

    $query_email = mysqli_query($conn, "select * from users where id='$id'") or die(mysqli_error($conn));
    $user = mysqli_fetch_array($query_email);
}

?>

<body>
    <style>
        html {
            background: #f7f5f5;
        }
    </style>
    <?php include('plans/expiry.php'); ?>
    <?php include('subscription/upgrade_profile.php'); ?>
    <?php include('navbar.php') ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">


                    <?php include('subscription/upgrade.php'); ?>
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left"><i class="icon-user"></i>&nbsp;Welcome <b><?php echo $church['name']; ?></b> to your profile</div>
                        </div>
                        
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div style='display: flex; justify-content: space-evenly; padding: 2rem;'>
                                    <?php if (empty($church['avatar'])) { ?>
                                        <img id="admin_avatar" class="img-circle" src="../public/images/NO-IMAGE-AVAILABLE.jpg">
                                    <?php } else { ?>
                                        <img id="admin_avatar" class="img-circle" src=<?php echo $church['avatar']; ?> />
                                    <?php } ?>
                                    <div>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>Church Name:</p>
                                            <span><?php echo $church['name']; ?></span>
                                        </div>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>Date Founded:</p>
                                            <span><?php echo $church['date_established']; ?></span>
                                        </div>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>Phone number:</p>
                                            <span>N/A</span>
                                        </div>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>Email:</p>
                                            <span><?php echo $user['username']; ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div style='display: flex; flex-direction:column; justify-content: flex-end;'>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>Current plan:</p>
                                            <span><?php echo $sub['plan']; ?></span>
                                        </div>
                                        <span>
                                            <?php
                                             $today = strtotime(date('Y-m-d'));
                                             $expiry_date = strtotime($sub['end_date']);
                                            //  $expiry_date = new DateTime($row['end_date']);
                                             $expires = ($expiry_date - $today)/60/60/24;
                                            echo 'Expires in '. round($expires) . " days";
                                            ?>
                                        </span>
                                        <button class='upgrade-btn' style='text-decoration: none; color: white; background: #00b462; padding: 0.4rem; border-radius: 0.4rem; width: fit-content;'>Upgrade plan</button>
                                    </div>
                                </div>

                            </div>
                            <!-- /block -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
    </div>
    <?php include('script.php'); ?>
    
    <script>
        let backdrop = document.querySelector('.backdrop')

        let button = document.querySelector('.upgrade-btn')

        button.addEventListener('click', toggle)

        // Get backdrop
        function toggle() {
            backdrop.style.display = 'flex'
        }

        let close = document.querySelector('.shut')

        // Close backdrop
        close.addEventListener('click', closeBackdrop)
        backdrop.addEventListener('click', closeBackdrop)

        function closeBackdrop() {
            backdrop.style.display = 'none'
        }
    </script>
</body>

</html>