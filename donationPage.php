

<?php
//Donation Page
//Variables to store in a database
//
//Work on donation page
//This Page is for the Homeless shelter profile where they list the items they need, how badly they need it
// How many they need
// Capability to add or delete items from the list

//This page does the work of submiting the data to the data base once it recieves input from donationInputPage.php
//If page is accessed directly it submits an empty row in the database
$Shelter = $_POST["Shelter"];
$Item1 = $_POST["Item1"];
$Item2 = $_POST["Item2"];
$Item3 = $_POST["Item3"];
$Item4 = $_POST["Item4"];
$Item5 = $_POST["Item5"];
$Importance1 = $_POST["Importance1"];
$Importance2 = $_POST["Importance2"];
$Importance3 = $_POST["Importance3"];
$Importance4 = $_POST["Importance4"];
$Importance5 = $_POST["Importance5"];

//include 'connectDonationPage.php';
//create connection
$conn = new mysqli("localhost", "root", "root", "DonationDatabase");
 

if($conn-> connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO DonationTable(Shelter, Item1, Importance1, Item2, Importance2, Item3, Importance3, Item4, Importance4, Item5, Importance5)
VALUES('$Shelter', '$Item1', '$Importance1', '$Item2', '$Importance2', '$Item3', '$Importance3', '$Item4', '$Importance4', '$Item5', '$Importance5')";

if($conn->query($sql) === true) {
	echo "New record created successfully" . "<br />";
}
?>