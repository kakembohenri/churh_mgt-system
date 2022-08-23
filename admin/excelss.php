
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
$Child_ID = mysqli_real_escape_string($conn, $data[0]);  
$fname = mysqli_real_escape_string($conn, $data[1]);
$sname = mysqli_real_escape_string($conn, $data[2]);
$Gender = mysqli_real_escape_string($conn, $data[3]);
$Birthday = mysqli_real_escape_string($conn, $data[4]);
$Residence = mysqli_real_escape_string($conn, $data[5]);
$Parent = mysqli_real_escape_string($conn, $data[6]);
$mobile = mysqli_real_escape_string($conn, $data[7]);


$query = @mysqli_query($conn,"select * from sundays where  Child_ID = '$Child_ID'  ")or die('Error: ' .mysqli_error($conn));
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('This child Already Exists');
</script>
<?php
}else{





mysqli_query($conn,"insert into sundays (Child_ID,fname,sname,Gender,Birthday,Residence,Parent,mobile,id) values('$Child_ID','$fname','$sname','$Gender','$Birthday','$Residence','$Parent','$mobile','$Child_ID')")or die('Error: ' .mysqli_error($conn));

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$admin_username','Added child $Child_ID')")or die(mysqli_error());
}


   }
   fclose($handle);
   echo "File sucessfully imported";
  }
 }
}

?>

