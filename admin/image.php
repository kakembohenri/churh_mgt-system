
<?php 

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
         $image_name = addslashes($_FILES['image']['name']);
         $image_size = getimagesize($_FILES['image']['tmp_name']);
         move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
         $thumbnail = "uploads/" . $_FILES["image"]["name"];

 ?>

