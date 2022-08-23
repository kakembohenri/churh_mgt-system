 <?php
 include('./lib/dbcon.php'); 
dbcon(); 
 include('session.php');
                            if (isset($_POST['save'])) {
                               
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
$ministry = mysqli_real_escape_string($conn, $data[6]);
$mobile = mysqli_real_escape_string($conn, $data[7]);
$email = mysqli_real_escape_string($conn, $data[8]);
?>
							<script>
								window.location = "dashboard.php";  
								</script>

                       <?php     }  ?>