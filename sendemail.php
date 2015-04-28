<?php
	$from = 'lee1961@purdue.edu';
	
	$subject = $_POST['subject'];
	$text = $_POST['mail'];
	$dbc = mysqli_connect('localhost','root','root','individual_profile') or die ('Error connecting to MYSQL server.');
	
	$query = "SELECT * FROM email_list";
	$result = mysqli_query($dbc,$query) or die ('Error querying database.');
	
	while($row = mysqli_fetch_array($result)) {
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		
		$msg = "Dear $first_name $last_name,\n $text";
		
		$to = $row['email'];
		mail($to,$subhect,$msg,'From:'.$from);
		echo 'Email sent to: ' . $to . 'br/>';
	
	}
	
	mysqli_close($dbc);
	?>