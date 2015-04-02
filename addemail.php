<?php
	$dbc = mysqli_connect('localhost','root','root','individual_profile') or 
	die('Error connecting to MYSQL server');
	
	$first_name = $_POST['firstname'];
	$last_name = $_POST['lastname'];
	$email = $_POST['email'];
	
 $query = "INSERT INTO email_list (first_name, last_name, email)  VALUES ('$first_name', '$last_name', '$email')";
			
    mysqli_query($dbc,$query) or die('Error querying database.');
    
    echo 'Customer added.';
    
    mysqli_close($dbc);
    
    ?>