<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Church management System">
    <meta name="author" content="Samuel Muhwezi">
    <link href="../public/bootstrap/css/index_background.css" rel="stylesheet" media="screen" />

</head>
<?php include('header.php');
?>
<?php include('session.php');
?>

<?php
if(!empty($_SESSION['data_entrant'])){
    $id = $_SESSION['data_entrant'];
    $query = mysqli_query($conn, "select * from church_staff where user_id='$id'") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($query);
    $church_id = $row['church_id'];
}elseif(!empty($_SESSION['church_admin'])){
    $church_id = $_SESSION['church_admin'];
    $query = mysqli_query($conn, "select * from churches where user_id='$church_id'") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($query);
}
?>

<body>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        html {
            background: #f7f5f5;
        }
    </style>
    <?php 
    if($sub['end_date'] < date("Y-m-d")){
        $_SESSION['expiry'] = 'Your Subscription has expired';
     }
    ?>
    <?php 
    include('subscription/index.php');
    include('subscription/upgrade.php');
    ?>
    <?php ?>
    <?php include('navbar.php')
    ?>
    <?php include('notification.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php 
            include('sidebar.php');
            ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <?php $query = mysqli_query($conn, "select * from churches where user_id='$church_id'") or die(mysqli_error($conn));
                    $row = mysqli_fetch_array($query);
                    ?>
                    <!-- <img src="../public/images/NO-IMAGE-AVAILABLE.jpg" alt=""> -->
                    <div class="col-lg-12">
                        <div style='color: #fff; background: #8ef3c5; padding: 0.5rem; border-radius: 0.5rem;'>
                            <?php if (!empty($row[5])) {?>
                            <img id="avatar1" class="img-responsive" src='<?php echo $row[5];?>' />
                    <?php } else{

                      ?>
                          <img id="avatar1" class="img-responsive" src='../public/uploads/NO-IMAGE-AVAILABLE.jpg' />
                          <?php  }
                          ?>                                                       <strong> Welcome! <?php if (!empty($_SESSION['church_admin'])){
                                                                                           echo $row['name'];
                                                                                            }else{
                                                                                                echo $row['surname']." ". $row['first_name'];
                                                                                            }
                                                                                                                    ?>
                                                                                                                </strong>
                                                                                                                    
                        </div>
                    </div>

                    <!-- block -->
                    <div style='background: #f7f5f5; border: 1px solid #ccc;
    margin: 1em 0em;
    border-top: none;
    box-shadow: 2px 2px 5px rgb(0 0 6 / 75%);
'>
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left"><i class="icon-dashboard">&nbsp;</i>Dashboard </div>
                            <div class="muted pull-right"><i class="icon-time"></i>&nbsp;<?php include('time.php'); ?></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">

                                <div class="block-content collapse in">
                                    <div id="page-wrapper">
                                        <!-- All members -->
                                        <?php
                                        $members_query = mysqli_query($conn, "select * from members where church_id='$church_id'") or die(mysqli_error($conn));
                                        $members = mysqli_num_rows($members_query);
                                        ?>
                                        <div class="row-fluid">
                                            <div class="span6" style='display: flex; justify-content: space-between; width: 100%;'>

                                                <div class="panel panel-primary" style="width: 30%; border-color: #f0ad4e;">
                                                    <div class="panel-heading" style='background: #fff; border-color: #f0ad4e;'>
                                                        <div class="container-fluid">
                                                            <div class="row-fluid" style="display: flex; align-items: center; ">
                                                                <div class="span3"><br />
                                                                    <i class="fa fa-users fa-5x" style='color: #f0ad4e;'></i><br />
                                                                </div>
                                                                <div class="span8 text-right"><br />
                                                                    <div class="huge" style='font-weight: lighter; color: #454545;'><?php echo $members; ?></div>
                                                                    <div style='font-weight: bolder; color: #454545;'>All Members</div><br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="membersDetail.php">
                                                        <div class="modal-footer" style='background: #fff;'>
                                                            <span class="pull-left" style='color: #f0ad4e;'>View Members</span>
                                                            <span class="pull-right"><i class="icon-chevron-right" style='color: #f0ad4e;'></i></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <!-- New members -->
                                                <?php
                                                $new_member_query = mysqli_query($conn, "SELECT * 
                                FROm  members
                                WHERE church_id='$church_id' and DATE_ADD(STR_TO_DATE(timestamp, '%Y-%m-%d'), INTERVAL YEAR(CURDATE())-YEAR(STR_TO_DATE(timestamp, '%Y-%m-%d')) YEAR) 
                                            BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)") or die(mysqli_error($conn));
                                                $new_member_count = mysqli_num_rows($new_member_query);
                                                ?>
                                                <div class="panel panel-yellow" style="width: 30%; border-color: #f0ad4e;">
                                                    <div class="panel-heading" style='background: #fff; border-color: #f0ad4e;'>
                                                        <div class="container-fluid">
                                                            <div class="row-fluid" style="display: flex; align-items: center; ">
                                                                <div class="span3"><br />
                                                                    <i class="fa fa-plus-circle  fa-5x" aria-hidden="true" style='color: #f0ad4e;'></i>
                                                                </div>
                                                                <div class="span8 text-right"><br />
                                                                    <div class="huge" style='font-weight: lighter; color: #454545;'><?php echo $new_member_count; ?></div>
                                                                    <div style='font-weight: bolder; color: #454545;'>New Members </div><br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="add_members.php">
                                                        <div class="modal-footer" style='background: #fff;'>
                                                            <span class="pull-left">Add Members</span>
                                                            <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <!-- Children script -->
                                                <?php
                                                $children_query = mysqli_query($conn, "select * from sundays where church_id='$church_id'") or die(mysqli_error($conn));
                                                $children = mysqli_num_rows($children_query);
                                                ?>
                                                <div class="panel panel-green" style="width: 30%;">
                                                    <div class="panel-heading" style='background: #fff;'>
                                                        <div class="container-fluid">
                                                            <div class="row-fluid" style="display: flex; align-items: center; ">
                                                                <div class="span3"><br />
                                                                    <i class="fa fa-users fa-5x" aria-hidden="true" style='color: #5cb85c;'></i><br />
                                                                </div>
                                                                <div class="span8 text-right"><br />
                                                                    <div class="huge" style='color: #454545; font-weight: lighter;'><?php echo $children; ?></div>
                                                                    <div style='font-weight: bolder; color: #454545;'>All children</div><br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="sschoolDetail.php">
                                                        <div class="modal-footer" style='background: #fff;'>
                                                            <span class="pull-left">View Children</span>
                                                            <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div class="block-content collapse in">
                                    <div id="page-wrapper">

                                        <?php
                                        $event_query = mysqli_query($conn, "SELECT * 
                                            FROm  event
                                            WHERE church_id='$church_id' and DATE_ADD(STR_TO_DATE(timestamp, '%Y-%m-%d'), INTERVAL YEAR(CURDATE())-YEAR(STR_TO_DATE(timestamp, '%Y-%m-%d')) YEAR) 
                                                        BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)");
                                        $event_count = mysqli_num_rows($event_query);
                                        ?>
                                        <div class="row-fluid">
                                            <div class="span6" style='display: flex; justify-content: space-between; width: 100%;'>
                                                <div class="panel panel-primary" style="width: 30%;">
                                                    <div class="panel-heading" style='background: #fff;'>
                                                        <div class="container-fluid">
                                                            <div class="row-fluid" style="display: flex; align-items: center; ">
                                                                <div class="span3"><br />
                                                                    <i class="fa fa-calendar  fa-5x" style='color: #6495ED;'></i><br />

                                                                </div>
                                                                <div class="span8 text-right" style='margin-left: 2rem;'><br />
                                                                    <div class="huge" style='font-weight: lighter; color: #454545;'><?php echo $event_count ?></div>
                                                                    <div style='font-weight: bolder; color: #454545;'> Upcoming <br /> events</div><br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="upcoming.php">
                                                        <div class="modal-footer" style='background: #fff;'>
                                                            <span class="pull-left"> View upcoming events</span>
                                                            <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <!-- Church offerings -->
                                                <?php
                                                //         $offering_query = mysqli_query($conn, 'select sum(offering) as total from congrigants_mc  where service_id =(select service_id from service_mc order by(service_date) desc limit 1)');
                                                // $row = mysqli_fetch_assoc($result2);
                                                // $sum2 = $row['total'];
                                                // $sum2 == null ? $sum2 = 0 : $sum2;
                                                ?>
                                                <div class="panel panel-green" style="width: 30%;">
                                                    <div class="panel-heading" style='background: #fff;'>
                                                        <div class="container-fluid">
                                                            <div class="row-fluid" style="display: flex; align-items: center; ">
                                                                <div class="span3"><br />
                                                                    <i class="fa fa-money  fa-5x" style='color: #5cb85c;'></i><br />
                                                                </div>
                                                                <div class="span8 text-right" style='margin-left: 2rem;'><br />
                                                                    <div class="huge" style='font-weight: lighter; color: #454545;'>0</div>
                                                                    <div style='font-weight: bolder; color: #454545;'>Total Church Offering</div><br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="offering.php">
                                                        <div class="modal-footer" style='background: #fff;'>
                                                            <span class="pull-left">Church Offerings</span>
                                                            <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <!-- Upcoming birthdays -->
                                                <?php
                                                $birthday_query = mysqli_query($conn, "SELECT * 
                                            FROm  members
                                            WHERE church_id='$church_id' and DATE_ADD(STR_TO_DATE(birthday, '%Y-%m-%d'), INTERVAL YEAR(CURDATE())-YEAR(STR_TO_DATE(birthday, '%Y-%m-%d')) YEAR) 
                                                        BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)");
                                                $birthdays_count = mysqli_num_rows($birthday_query);
                                                ?>
                                                <div class="panel panel-red" style="width: 30%;">
                                                    <div class="panel-heading" style='background: #fff;'>
                                                        <div class="container-fluid">
                                                            <div class="row-fluid" style="display: flex; align-items: center; ">
                                                                <div class="span3"><br />
                                                                    <i class="fa fa-calendar  fa-5x" style='color: #d9534f;'></i><br />
                                                                </div>
                                                                <div class="span8 text-right" style='margin-left: 2rem;'><br />
                                                                    <div class="huge" style='font-weight: lighter; color: #454545;'><?php echo $birthdays_count; ?></div>
                                                                    <div style='font-weight: bolder; color: #454545;'>Upcoming Birthdays</div><br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="birthdays.php">
                                                        <div class="modal-footer" style='background: #fff;'>
                                                            <span class="pull-left">View Upcoming Birthdays</span>
                                                            <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php
                                            // $result = mysqli_query($conn, 'select sum((offering)+(pastor)+(tithe)+(evangelism)+(Sponsorship)) as total from offering where service_id =(select service_id from service order by(service_date) desc limit 1)');
                                            // $row = mysqli_fetch_assoc($result);
                                            // $sum = $row['total'];
                                            // $sum = $sum == null ? $sum = 0 : $sum;
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>
    <!-- /block -->
    </div>
    </div>

    </div>
    </div>

    <?php include('footer.php');
    ?>
    </div>
    <?php include('script.php');
    ?>

    <!-- Reset  -->
    <?php 
    include('subscription/reset.php');
    ?>
</body>