<?php
//Company Profile page
//This Page is for the Company profile to store their datails

//Data is stored once user on the company.html clicks submit
$sUsername = $_POST["Username"];
$sPassword = $_POST["Password"];

//creating connection with Company Profile Database
$conn = new mysqli("localhost", "root", "", "company_profile");


if($conn-> connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Username FROM list";
if($conn->query($sql) === true) {
	echo "Success" . "<br />";
}
else
        echo "Failed" . "<br / >";

?>