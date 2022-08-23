   
   <div class="row-fluid">
   	<!-- block -->
   	<div class="block">
   		<div class="navbar navbar-inner block-header">
   			<div class="muted pull-left"><i class="icon-plus-sign icon-large"> Add Event</i></div>
   		</div>
   		<div class="block-content collapse in">
   			<div class="span12">
   				<form method="post">
   					<table>
   						<tr>
   							<td style="color: #003300; font-weight: bold; font-size: 16px">Add Event Here:</td>
   						</tr>
   						<tr>
   							<td>&nbsp;</td>
   						</tr>
   						<tr>
   							<td><input style='padding: 1rem;' type="text" name="title" value="Title"></td>
   						</tr>

   						<tr>
   							<td><input style='padding: 1rem;' type="date" name="date" value="Date"></td>
   						</tr>
   						<tr>
   							<td>
   								<textarea style='padding: 1rem;' name="content" placeholder="Description" class="text"></textarea>
   							</td>
   						</tr>
   						<tr>
   							<td><input type="submit" style='text-decoration: none; border: none; padding: 0.4rem; background: #8ef3c5; color: #fff; border-radius: 0.4rem;' name="send" value="Save"></td>
   						</tr>
   					</table>
   				</form>
   			</div>
   		</div>
   	</div>
   	<!-- /block -->
   </div>

   <?php

	if (isset($_POST['send'])) {


		$title = $_POST['title'];
		$date = $_POST['date'];
		$content = $_POST['content'];
		$qry = "INSERT INTO event (Title,Date,content)
							VALUES('$title','$date','$content') where church_id='$church_id'";
		$result = mysqli_query($conn, $qry) or die(mysqli_error($conn));

		$activity = 'Added an event '. $title;
		mysqli_query($conn, "insert into activity_log(username, church_id, action) values('$name', '$id', '$activity')") or die (mysqli_error($conn));
		if ($result == TRUE) {
			echo "<script type = \"text/javascript\">
											
											window.location = (\"events.php\")
											</script>";
		} else {
			echo "<script type = \"text/javascript\">
											alert(\"message Not Send. Try Again\");
											</script>";
		}
	}


	?>