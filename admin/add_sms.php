   <div class="row-fluid">
   	<!-- block -->
   	<div class="block">
   		<div class="navbar navbar-inner block-header">
   			<div class="muted pull-left"><i class="icon-plus-sign icon-large"> ADD MESSAGE</i></div>
   		</div>
   		<div class="block-content collapse in">
   			<div class="span12">
   				<form method="post">
   					<table>
   						<tr>
   							<td style="color: #003300; font-weight: bold; font-size: 16px">Add Message Here:</td>
   						</tr>
   						<tr>
   							<td>&nbsp;</td>
   						</tr>
   						<tr>
   							<td><input type="text" style='padding: 1rem;' name="title" placeholder="Enter your Title"></td>
   						</tr>

   						<tr>
   							<td>
   								<textarea name="contact" style='padding: 1rem;' placeholder="contact" class="text" id="selectedContacts"></textarea>
   							</td>
   						</tr>

   						<tr>
   							<td>
   								<textarea name="content" style='padding: 1rem;' placeholder="Description" class="text"></textarea>
   							</td>
   						</tr>
   						<tr>
   							<td><input type="submit" style='text-decoration: none; border: none; padding: 0.4rem; background: orange; color: #fff; border-radius: 0.4rem;' name="send" value="Send"></td>
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
		$contact = $_POST['contact'];
		$content = $_POST['content'];

		$contactsArray = explode(",", $contact);



		print_r($title);
		print_r($contact);
		print_r($content);





		foreach ($contactsArray as $contact) {
			send_sms($contact, $title, $content);
		}
		$qry = "INSERT INTO sms (title,contact,content)
							VALUES('$title','$contact','$content')";
		$result = mysqli_query($conn, $qry);
		if ($result == TRUE) {
			echo "<script type = \"text/javascript\">
											
											window.location = (\"addsms.php\")
											</script>";
		} else {
			echo "<script type = \"text/javascript\">
											alert(\"message Not Send. Try Again\");
											</script>";
		}
	}


	?>