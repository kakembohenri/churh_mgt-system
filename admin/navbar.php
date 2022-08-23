<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid" style='background: #454545; border-bottom: 0rem;'>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <span class="brand" href="#">Product name</span>
            </div>
            <!--.nav-collapse -->
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <?php $query= mysqli_query($conn,"select * from churches where user_id = '$church_id'")or die(mysqli_error($conn));
                    $row = mysqli_fetch_array($query);
                    ?>
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if (!empty($row[5])) {?>
                            <img id="avatar1" class="img-responsive" src='<?php echo $row['avatar'];?>' />
                        <?php }else{ ?>                                                   <img id="avatar1" class="img-responsive" src='../public/uploads/NO-IMAGE-AVAILABLE.jpg' />
                            <?php  }
                            ?>                                           
                                                                                                         <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="change_password_admin.php"><i class="icon-cog"></i>&nbsp;Change Password</a>
                                <a tabindex="-1" href="#mymodal3" data-toggle="modal"><i class="icon-picture"></i>&nbsp;Change Picture</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="logout.php"><i class="icon-signout"></i>&nbsp;Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<?php include('admin_change_picture.php'); ?>