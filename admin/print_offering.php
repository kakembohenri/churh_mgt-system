
<?php

$where = "";
$index = 0;
if (isset($_REQUEST['service_id'])) {
	$service_id = $_REQUEST['service_id'];
	$index = $_REQUEST['index'];
	$where = " join service on offering.service_id = service.service_id WHERE offering.service_id='$service_id' ";
}
$sql_query = "SELECT *FROM offering JOIN members ON members.Member_ID = offering.Member_ID $where ";

$total_tithe =0;
$total_pastor =0;
$total_evangelism = 0;
$total_offering = 0;
$total_sponsorship =0;

?>



<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="microsoft Word 14 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;}
 /* Style Definitions */
 p.msoNormal, li.msoNormal, div.msoNormal
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:0in;
	line-height:107%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.msoAcetate, li.msoAcetate, div.msoAcetate
	{mso-style-link:"Balloon Text Char";
	margin:0in;
	margin-bottom:.0001pt;
	font-size:8.0pt;
	font-family:"Tahoma","sans-serif";}
span.BalloonTextChar
	{mso-style-name:"Balloon Text Char";
	mso-style-link:"Balloon Text";
	font-family:"Tahoma","sans-serif";}
.msoChpDefault
	{font-family:"Calibri","sans-serif";}
.msoPapDefault
	{margin-bottom:8.0pt;
	line-height:107%;}
@page WordSection1
	{size:13.0in 8.5in;
	margin:48.25pt .5in .5in .75in;}
div.WordSection1
	{page:WordSection1;}
-->
</style>
<?php include('print_header.php'); ?>
<?php include('session.php'); ?>
<?php error_reporting(0)?>
</head>

<body lang=EN-US>
<div class="empty">
<?php include('#'); ?>
<div class="container">
  <div class="row-fluid">
      
    </div>
  </div>
 </div>
</div>

 <div class="container">
 <div class="row-fluid">
 <div class="block">
<div class="row-fluid">

<div class=WordSection1>

<p class=msoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><b><span style='font-size:14.0pt;
font-family:"Times New Roman","serif"'><img width=100 height=20 id="Picture 1"
src="../public/images/logo7.png"></span></b></p>

<p class=msoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><b><span style='font-size:12.0pt;
font-family:"Times New Roman","serif"'>Church Offering</span></b></p>

<p class=msoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><b><span style='font-size:7.0pt;
font-family:"Times New Roman","serif"'>Powered by JCC Administration <?php
 $date = new DateTime();
 echo $date->format('Y');
 ?></span></b></p>

<p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><b><span style='font-size:10.0pt;font-family:"Times New Roman","serif"'>&nbsp;</span></b></p>

<div class="container">
<div class="container-fluid">
<div class="row-fluid">
<div class="pull-left"> 
<p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
"Times New Roman","serif"'>All members<o:p></o:p></span></p>

<p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
"Times New Roman","serif"'>DATE: <?php
 $date = new DateTime();
 echo $date->format('l, F jS, Y');
 ?><o:p></o:p></span></p>

<div class="pull-right">
   <div class="empty">
           <p class=msoNormal style='margin-bottom:0in; margin-left:-110px; margin-top:-30px; margin-bottom:.0001pt;line-height:
           normal'><span style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
           "Times New Roman","serif"'>
		   <a href="#" onClick="window.print()" class="btn btn-info" id="print" data-placement="top" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a></p>		      
		   <script type="text/javascript">
		     $(document).ready(function(){
		     $('#print').tooltip('show');
		     $('#print').tooltip('hide');
		     });
		   </script> 
            <p class=msoNormal style='margin-bottom:0in; margin-top:-30px; margin-bottom:.0001pt;line-height:
            normal'><span style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
           "Times New Roman","serif"'>
			<a id="return" data-placement="top" class="btn btn-success" title="Click to Return" href="offering.php"><i class="icon-arrow-left"></i> Back</a></p>		
			<script type="text/javascript">
			$(document).ready(function(){
			$('#return').tooltip('show');
			$('#return').tooltip('hide');
			});
			</script>       	   
    </div>
</div>
    
<p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
"Times New Roman","serif"'><o:p>&nbsp;</o:p></span></p>
<table class=msoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:23.25pt'>
  <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;background:#BFBFBF;mso-background-themecolor:background1;
  mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'>Disciple_ID<o:p></o:p></span></b></p>
  </td>
  <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;background:#BFBFBF;mso-background-themecolor:background1;
  mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'>Disciple Name<o:p></o:p></span></b></p>
  </td>
  <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:#BFBFBF;mso-background-themecolor:background1;mso-background-themeshade:
  191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'>Mobile No.<o:p></o:p></span></b></p>
  </td>
  <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:#BFBFBF;mso-background-themecolor:background1;mso-background-themeshade:
  191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'>Tithe<o:p></o:p></span></b></p>
  </td>
  <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:#BFBFBF;mso-background-themecolor:background1;mso-background-themeshade:
  191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'>Offering<o:p></o:p></span></b></p>
  </td>
  <td width=188 style='width:140.95pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:#BFBFBF;mso-background-themecolor:background1;mso-background-themeshade:
  191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'>Evangelism<o:p></o:p></span></b></p>
  </td>
  <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;background:#BFBFBF;mso-background-themecolor:background1;
  mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'>Sponsorship<o:p></o:p></span></b></p>
  </td>
  <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;background:#BFBFBF;mso-background-themecolor:background1;
  mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'>To Pastor<o:p></o:p></span></b></p>
  </td>
  <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;background:#BFBFBF;mso-background-themecolor:background1;
  mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'>Date & Time<o:p></o:p></span></b></p>
  </td>
  
  </td>
  
   
   <!-- mysqli FETCH ARRAY-->
<?php
		$student_query = mysqli_query($conn,"$sql_query")or die(mysqli_error());
		while($row = mysqli_fetch_array($student_query)){
				$RegNo = $row['id'];
?>

<tr>

      <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['Member_ID']; ?><o:p></o:p></span></b></p>
        </td><td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['fname']." ".$row['sname']; ?><o:p></o:p></span></b></p>
        </td><td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['mobile']; ?><o:p></o:p></span></b></p>
        </td><td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['tithe']; ?><o:p></o:p></span></b></p>
        </td><td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['Offering']; ?><o:p></o:p></span></b></p>
        </td><td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['Evangelism']; ?><o:p></o:p></span></b></p>
        </td><td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['Sponsorship']; ?><o:p></o:p></span></b></p>
        </td><td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['pastor']; ?><o:p></o:p></span></b></p>
        </td><td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['paytime']; ?><o:p></o:p></span></b></p>
        </td>
			

            </tr>


			<?php
        $total_tithe += $row['tithe'];
				$total_evangelism += $row['Evangelism'];
				$total_offering += $row['Offering'];
				$total_sponsorship += $row['Sponsorship'];
				$total_pastor += $row['pastor'];
            ?>
											
	<?php } ?>   

			
			  <tr>	
        <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;background:#BFBFBF;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'>Total<o:p></o:p></span></b></p>
        </td>		        
        <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'><o:p></o:p></span></b></p>
        </td>   
        <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'><o:p></o:p></span></b></p>
        </td>    	
        <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;background:#BFBFBF;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'><?php echo $total_tithe;?><o:p></o:p></span></b></p>
        </td>
        <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;background:#BFBFBF;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'><?php echo $total_offering;?><o:p></o:p></span></b></p>
        </td>
        <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;background:#BFBFBF;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'><?php echo $total_evangelism;?><o:p></o:p></span></b></p>
        </td>
        <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;background:#BFBFBF;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'><?php echo $total_sponsorship;?><o:p></o:p></span></b></p>
        </td>
        <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;background:#BFBFBF;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'><?php echo $total_pastor;?><o:p></o:p></span></b></p>
        </td>
        <td width=188 style='width:140.9pt;border:solid windowtext 1.0pt;mso-border-alt:
        solid windowtext .5pt;mso-background-themecolor:background1;
        mso-background-themeshade:191;padding:0in 5.4pt 0in 5.4pt;height:23.25pt'>
        <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
        normal'><b style='mso-bidi-font-weight:normal'><span style='font-family:"Times New Roman","serif"'><o:p></o:p></span></b></p>
        </td>       	
				
					<td></td>
				</tr>
				





 <tr style='mso-yfti-irow:1'>
  <td width=188 valign=top style='width:140.9pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['Member_ID']; ?><o:p></o:p></span></p>
  </td>
  <td width=188 valign=top style='width:140.9pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['fname']." ".$row['sname']; ?><o:p></o:p></span></p>
  </td>
  <td width=188 valign=top style='width:140.9pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['mobile']; ?><o:p></o:p></span></p>
  </td>
  <td width=188 valign=top style='width:140.9pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['tithe']; ?><o:p></o:p></span></p>
  </td>
  <td width=188 valign=top style='width:140.9pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['Offering']; ?><o:p></o:p></span></p>
  </td>
  <td width=188 valign=top style='width:140.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['Evangelism']; ?><o:p></o:p></span></p>
  </td>
  <td width=188 valign=top style='width:140.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['Sponsorship']; ?><o:p></o:p></span></p>
  </td>
  <td width=188 valign=top style='width:140.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['pastor']; ?><o:p></o:p></span></p>
  </td>
  <td width=188 valign=top style='width:140.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-family:"Times New Roman","serif"'><?php echo $row['paytime']; ?><o:p></o:p></span></p>
  </td>
  
  </tr>
 
  <!--mysqli FETCH ARRAY-->
 </tr>
 <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes'>
  <td width=1127 colspan=9 valign=top style='width:845.5pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=msoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-family:"Times New Roman","serif"'>***NOTHING
  FOLLOWS***<o:p></o:p></span></p>
  </td>
 </tr>
</table>

<p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
"Times New Roman","serif"'><o:p>&nbsp;</o:p></span></p>

<p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
"Times New Roman","serif"'><o:p>&nbsp;</o:p></span></p>

<table class=msoTableGrid border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 5.4pt 0in 5.4pt;mso-border-insideh:none;mso-border-insidev:none'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:44.85pt'>
  <td width=376 valign=top style='width:281.8pt;padding:0in 5.4pt 0in 5.4pt;
  height:17.85pt'>
  <p class=msoNormal align=center  style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  "Times New Roman","serif"'>Prepared by:<o:p></o:p></span></p>
  </td>
  <td width=376 valign=top style='width:281.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:17.85pt'>
  <p class=msoNormal align=center  style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  "Times New Roman","serif"'>Received by:<o:p></o:p></span></p>
  </td>
  <td width=376 valign=top style='width:281.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:17.85pt'>
  <p class=msoNormal align=center  style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  "Times New Roman","serif"'>Check by:<o:p></o:p></span></p>
  </td>
 </tr>
 
 <?php $query= mysqli_query($conn,"select * from admin where admin_id = '$church_id'")or die(mysqli_error());
  $row = mysqli_fetch_array($query);
?>
 <tr style='mso-yfti-irow:1;height:17.85pt'>
  <td width=376 valign=top style='width:281.8pt;padding:0in 5.4pt 0in 5.4pt;
  height:17.85pt'>
  <p class=msoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><u><span
  style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:"Times New Roman","serif"'><?php echo $row['firstname']." ".$row['lastname'];  ?><o:p></o:p></span></u></b></p>
  </td>
  <td width=376 valign=top style='width:281.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:17.85pt'>
  <p class=msoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><u><span
  style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:"Times New Roman","serif"'>_____________________<o:p></o:p></span></u></b></p>
  </td>
  <td width=376 valign=top style='width:281.85pt;padding:0in 5.4pt 0in 5.4pt;
  height:17.85pt'>
  <p class=msoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b style='mso-bidi-font-weight:normal'><u><span
  style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:"Times New Roman","serif"'>_______________________<o:p></o:p></span></u></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes'>
  <td width=376 valign=top style='width:281.8pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=msoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Times New Roman","serif"'>System Administrator<o:p></o:p></span></p>
  </td>
  <td width=376 valign=top style='width:281.85pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=msoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Times New Roman","serif"'>Associate Pastor<o:p></o:p></span></p>
  </td>
  <td width=376 valign=top style='width:281.85pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=msoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:12.0pt;
  mso-bidi-font-size:11.0pt;font-family:"Times New Roman","serif"'>Senior Pastor<o:p></o:p></span></p>
  </td>
 </tr>


									
		

</table>

<p class=msoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
"Times New Roman","serif"'><o:p>&nbsp;</o:p></span></p>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>	




<?php include('#'); ?>
</div>
<?php include('#'); ?>
 </body>
</html>