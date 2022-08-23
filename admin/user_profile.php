<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
    <style>
        html {
            background: #f7f5f5;
        }
    </style>
    <?php include('navbar.php') ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">

                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left"><i class="icon-user"></i>&nbsp;Welcome John Doe to your profile</div>
                        </div>
                        <?php 
                            
                            $query = mysqli_query($conn, "select * from church_staff where user_id='$sys_user'") or die(mysqli_error($conn));
                            $row = mysqli_fetch_array($query);
                            $church_id = $row['church_id'];
                            $query_church = mysqli_query($conn, "select * from churches where id='$church_id'") or die(mysqli_error($conn));
                            $church = mysqli_fetch_array($query_church)

                        ?>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div style='display: flex; justify-content: space-evenly; padding: 2rem;'>
                                    <?php if(empty($row['avatar'])): ?>
                                    <img id="admin_avatar" class="img-circle" src="../public/images/NO-IMAGE-AVAILABLE.jpg">
                                    <?php else: ?>
                                        <img id="admin_avatar" class="img-circle" src=<?php echo "../public/".$row['avatar']; ?>>
                                    
                                        <?php endif ?>
                                    <div>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>First name</p>
                                            <span><?php echo $row['first_name'];?></span>
                                        </div>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>Surname:</p>
                                            <span><?php echo $row['surname'];?></span>
                                        </div>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>Phone number:</p>
                                            <span><?php echo $row['phone_number'];?></span>
                                        </div>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>Date of Birth:</p>
                                            <span><?php echo $row['dob'];?></span>
                                        </div>
                                    </div>
                                    <div>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>Church:</p>
                                            <span><?php echo $church['name']; ?></span>
                                        </div>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>Role:</p>
                                            <span><?php echo $row['role'];?></span>
                                        </div>
                                    </div>
                                    <div>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>Place of residence:</p>
                                            <span><?php echo $row['residence'];?></span>
                                        </div>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>Marital status:</p>
                                            <span><?php echo $row['marital_status'];?></span>
                                        </div>
                                        <div style='margin: 0.4rem 0rem;'>
                                            <p style='margin: 0.1rem 0rem; font-weight: bolder;'>Occupation:</p>
                                            <span><?php echo $row['occupation'];?></span>
                                        </div>

                                    </div>
                                    <div style='display: flex; align-items: flex-end;'>

                                        <a href='edit_profile.php' style='text-decoration: none; color: white; background: #00b462; padding: 0.4rem; border-radius: 0.4rem;'>Edit Profile</a>
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
</body>

</html>