<?php
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
            <h3>User Accounts</h3>
            <input type="search" name="" id="" placeholder="Search user accounts">
            <p class='search-results'>Results for "<i>hey</i>"</p>
            <div class='accounts-container'>
                <div class='personal-details'>
                    <div class='avatar-account'>
                        <img src='../public/images/NO-IMAGE-AVAILABLE.jpg' />
                    </div>
                    <div class='details-sub_container'>
                        <ul>
                            <li>Church Name:
                                <span>Bwenjuba</span>
                            </li>
                            <li>Address:
                                <span>jinja</span>
                            </li>
                        </ul>
                        <ul>
                            <li>Established:
                                <span>20/20/2022</span>
                            </li>
                            <li>Joined:
                                <span>90/90/90</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class='personal-details'>
                    <div>
                        <h4>Total fees paid</h4>
                        <span>100000</span>
                    </div>
                    <div>
                        <h4>Current plan</h4>
                        <span>Basic</span>
                    </div>
                </div>
                <div class='personal-details'>
                    <div>
                        <h4>Last seen</h4>
                        <span>Yesterday 2:00pm</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>