<?php
include('../admin/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="styles.css" />
    <title>Document</title>
</head>

<body>
    <div class="main-container">
        <?php require('navbar.php'); ?>
        <div class='dashboard'>
            <?php 
            $query = mysqli_query($conn, "select * from activity_log") or die(mysqli_error($conn));
            $row = mysqli_fetch_all($query);
            $count = mysqli_num_rows($query);
            ?>
            <h3>System log</h3>
            
            <table border='1' width='80%'>
                <tr>
                    <th>Username</th>
                    <th>Activity</th>
                    <th>Time</th>
                </tr>
                <?php for($i=0; $i<$count; $i++){   ?>
                <tr>
                    <td><?php echo $row[$i][1]; ?></td>
                    <td><?php echo $row[$i][3]; ?></td>
                    <td><?php echo $row[$i][4]; ?></td>
                </tr>
            <?php }?>

            </table>
            
        </div>
    </div>
</body>

</html>