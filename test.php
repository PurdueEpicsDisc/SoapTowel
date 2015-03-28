<?php //Soap Towel Adding people to a database
$conn = new mysqli("localhost", "root", "", "a_fresh_start");

if($conn-> connect_error)
	die("Connection failed: " . $conn->connect_error);
	
$sql = "INSERT INTO contact_info VALUES('jsulli0527', 'Sully Homeless Shelter', '54820 Belmont Stakes Drive', 'Mishawaka',
		'Indiana','46545','5748559684', 'jsulli0527@gmail.com', 0, '!josh0987')";
					
$conn->query($sql);
?>