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
            <h3>Testimonies</h3>
            <form action="">
                <div class='form-header'>
                    <p>Select testimonies to appear on the home page</p>
                    <button>Save</button>
                </div>
                <div class='testimony-container'>
                    <input type="checkbox">
                    <span>Church name</span>
                    <div class='testimony-text'>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Est illum veritatis pariatur velit consectetur quasi in perferendis veniam dicta.
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>

</html>