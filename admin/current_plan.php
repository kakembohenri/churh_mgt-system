<?php include('importcsv.php') ?>

<div class="row-fluid">
    <!-- block -->
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Current Subscription plan</div>
        </div>
        <div class="block-content collapse in">
            <div class='span12'>
                <div>
                    <h3>Current plan:</h3>
                    <span><?php echo $sub['plan']; ?></span>
                </div>
                <div>
                    <h3>Start Date:</h3>
                    <span><?php echo $sub['start_date']; ?></span>
                </div>
                <div>
                    <h3>Expiry Date:</h3>
                    <span><?php echo $sub['end_date']; ?></span>
                </div>
                <div>
                    <h3>Days left:</h3>
                    <span>
                    <?php
                                             $today = strtotime(date('Y-m-d'));
                                             $expiry_date = strtotime($sub['end_date']);
                                            //  $expiry_date = new DateTime($row['end_date']);
                                             $expires = ($expiry_date - $today)/60/60/24;
                                            echo 'Expires in '. round($expires) . " days";
                                            ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /block -->