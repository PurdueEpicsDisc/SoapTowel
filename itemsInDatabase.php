<?php
	//Putting items in database
	//Generate DonIdentification
	
	$conn = new mysqli("localhost","root", "","a_fresh_start");
	
	if($conn-> connect_error)
		die("Connection failed: " . $conn->connect_error);

	$donationID = getDonationID();   
	 
	 
	  
	$date = getDateOfDonation();
	$donorName = "Gary McFall";
	$recieved = "Garys Homeless Shelter";
	$status = "Pending";
	$organization = "A Fresh Start";
	$sql = "INSERT INTO donations VALUES('$donationID', '$donorName', '$recieved', '$organization', '$date', '$status')";
	
	$conn->query($sql);
	
	function getDateOfDonation() 
	{
		$date_array = getdate();
		$date = $date_array['mon'] . "/" . $date_array['mday'] . "/" . $date_array['year'];
		return $date;
	}
	function getDonationID()
	{
		$idNumber = mt_rand(2000000000, 2147483647);
		
		$conn = new mysqli("localhost","root", "","a_fresh_start");
		$query = "SELECT * FROM `donations` WHERE Don-ID=$idNumber";
		$result = mysqli_query($conn, $query);
		if($result === false)
			return $idNumber;
		else
			getDonationID();
			
	}
?>