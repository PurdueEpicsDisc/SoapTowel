<?php
//Company Profile page
//This Page is for the Company profile to store their datails

//Data is stored once user on the company.html clicks submit
$Company = $_POST["Company"];
$Username = $_POST["Username"];
$Password = $_POST["Password"];
$Address = $_POST["Address"];
$City = $_POST["City"];
$State = $_POST["State"];
$ZipCode = $_POST["ZipCode"];
$Phone = $_POST["Phone"];
$Email = $_POST["Email"];

//creating connection with Company Profile Database
$conn = new mysqli("localhost", "root", "", "company_profile");


if($conn-> connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO list(Username, Password, CompanyName, Address, City, State, ZipCode, PhoneNumber, Email)
VALUES('$Username', '$Password', '$Company', '$Address', '$City', '$State', '$ZipCode', '$Phone', '$Email')";
echo $sql;

if($conn->query($sql) === true) {
	echo "Success" . "<br />";
}
else
        echo "Failed" . "<br / >";

?>