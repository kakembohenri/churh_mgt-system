
<?php  

if(isset($_POST["submit"]))
{
	
 if($_FILES['file']['name'])
 {
$filename = explode(".", $_FILES['file']['name']);
if($filename[1] == 'csv')
{
$handle = fopen($_FILES['file']['tmp_name'], "r");
while($data = fgetcsv($handle))//handling csv file 
{
  
$familyname = mysqli_real_escape_string($conn, $data[0]);
$time = mysqli_real_escape_string($conn, $data[1]);
$contact = mysqli_real_escape_string($conn, $data[2]);


$query = @mysqli_query($conn,"select * from pc where contact = '$contact'")or die('Error: ' .mysqli_error($conn));
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('This prayer card Already Exists');
</script>
<?php
}else{





mysqli_query($conn,"insert into pc (familyname,time,contact) values('$familyname','$time','$contact')")or die('Error: ' .mysqli_error($conn));

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$admin_username','Added pc $contact')")or die(mysqli_error());
}


   }
   fclose($handle);
   echo "File sucessfully imported";
  }
 }
}

?>

