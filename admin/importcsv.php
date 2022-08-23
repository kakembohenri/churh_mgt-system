
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
$Member_ID = mysqli_real_escape_string($conn, $data[0]);  
$fname = mysqli_real_escape_string($conn, $data[1]);
$sname = mysqli_real_escape_string($conn, $data[2]);
$Gender = mysqli_real_escape_string($conn, $data[3]);
$Birthday = mysqli_real_escape_string($conn, $data[4]);
$Residence = mysqli_real_escape_string($conn, $data[5]);
$children = mysqli_real_escape_string($conn, $data[6]);
$ministry = mysqli_real_escape_string($conn, $data[7]);
$Marital_status = mysqli_real_escape_string($conn, $data[8]);
$mobile = mysqli_real_escape_string($conn, $data[9]);
$marriage = mysqli_real_escape_string($conn, $data[10]);
$email = mysqli_real_escape_string($conn, $data[11]);
$occupation = mysqli_real_escape_string($conn, $data[12]);


$query = @mysqli_query($conn,"select * from members where  Member_ID = '$Member_ID'  ")or die('Error: ' .mysqli_error($conn));
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('This member Already Exists');
</script>
<?php
}else{





mysqli_query($conn,"insert into members (Member_ID,fname,sname,Gender,Birthday,Residence,children,ministry,Marital_status,mobile,marriage,email,occupation,id) values('$Member_ID','$fname','$sname','$Gender','$Birthday','$Residence','$children','$ministry','$Marital_status','$mobile','$marriage','$email','$occupation','$Member_ID')")or die('Error: ' .mysqli_error($conn));

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$admin_username','Added member $Member_ID')")or die(mysqli_error());
}


   }
   fclose($handle);
   echo "File sucessfully imported";
  }
 }
}

?>

