<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
			
				<div class="span9" id="content">
                     <div class="row-fluid">
					 
					  <script type="text/javascript">
		              $(document).ready(function(){
		              $('#add').tooltip('show');
		              $('#add').tooltip('hide');
		              });
		             </script> 
					 <div id="sc" align="center"><image src="images/sclogo.png" width="45%" height="45%"/></div>
				<?php	
	             $count_student=mysqli_query($conn,"select * from sms");
	             $count = mysqli_num_rows($count_student);
                 ?>	 
				   <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><i class="icon-reorder icon-large"></i> SMS list</div>
                          <div class="muted pull-right">
								Number of payments: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
						  </div>
						  
                 <h4 id="sc">
					<div align="right" id="sc">Date:
						<?php
                            $date = new DateTime();
                            echo $date->format('l, F jS, Y');
                         ?></div>
				 </h4>

													
<div class="container-fluid">
  <div class="row-fluid"> 
     <div class="empty">
	     <div class="pull-right">
		   <script type="text/javascript">
		     $(document).ready(function(){
		     $('#print').tooltip('show');
		     $('#print').tooltip('hide');
		     });
		   </script>        	   
         </div>
      </div>
    </div> 
</div>
	
<div class="block-content collapse in">
    <div class="span12">
	<form action="" method="post">
  	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
		<thead>		
		        <tr>			        
                	<th>Title </th>
                	<th>Contact </th>
					<th>Description </th>	       
					<th>Date & Time  </th>
						
                   		
                    				
		    </tr>
		</thead>
<tbody>
<!-----------------------------------Content------------------------------------>
<?php
		$student_query = mysqli_query($conn,"SELECT *FROM sms");
		while($row = mysqli_fetch_array($student_query)){
		
	
		?>
									
		<tr>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['contact']; ?></td>
		    <td><?php echo $row['content']; ?></td>
			<td><?php echo $row['date']; ?></td>
		
            </tr>
											
	<?php } ?>   

</tbody>
</table>
</form>	
		
			  		
</div>
</div>
</div>
</div>
</div>
	
</div>	
<?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
 </body>
</html>