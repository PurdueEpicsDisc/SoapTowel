<?php

$username = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["name"];
$address = $_POST["address"];
$zipCode = $_POST["zipCode"];
$phone = $_POST["phone"];
$email = $_POST["email"];

$conn = new mysqli("localhost", "root", "root", "ShelterDatabase");

if($conn->connect_error)
	die ("Connection failed: " . $conn->connect_error);

$sql = "INSERT INTO ShelterTable(username, password, name, address, zipCode, email) VALUES ('$username', '$password', '$name', '$address', '$zip', '$email')";

//username, password, name, address, zipCode, email) VALUES
if($conn->query($sql) === true) {
	echo "New shelter created." . "<br />";
}

?>