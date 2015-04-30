

<?php
//Donation Page
//
//This Page is for the Homeless shelter profile where they list the items they need, how badly they need it
// How many they need
// Capability to add or delete items from the list

//This page does the work of submiting the data to the data base once it recieves input from donationInputPage.php
//If page is accessed directly it submits an empty row in the database

//if create button was clicked make a new donation row
if($_POST['create']){
	$Shelter = $_POST["Shelter"];
	$ItemArray = $_POST["itemArray"];
	$ItemString = "";
	for ($i = 0; $i < sizeof($ItemArray); $i++){
		$ItemString .= $ItemArray[$i];
		$ItemString .= "-";
	}

	$Item1 = $ItemString;



	//include 'connectDonationPage.php';
	//create connection
	$conn = new mysqli("localhost", "root", "root", "DonationDatabase");
 

	if($conn-> connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO DonationTable(Shelter, Item1)
	VALUES('$Shelter', '$Item1')";

	if($conn->query($sql) === true) {
		echo "New record CREATED successfully" . "<br />";
	}
	else {
		echo "Error CREATING";
	}
}

//if remove button was clicked update and remove item from specified shelter
//This is connected to the remove button but DOES NOT remove anything at the moment
else if($_POST['remove']){
	$conn = new mysqli("localhost", "root", "root", "DonationDatabase");
 
	if($conn-> connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE DonationTable SET Item1='secondUPDATETEST' WHERE Shelter='rmvtest'";

	if($conn->query($sql) === true) {
		echo "New record UPDATED successfully" . "<br />";
	}
	else {
		echo "Error UPDATING";
	}
}
?>