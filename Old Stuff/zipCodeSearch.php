<?php
//Query tables where data equals certain zip code inputted by the user;

//connect to the database
$conn = new mysqli("localhost", "root", "", "a_fresh_start");
//Create aquery for the database to execute
$query = "SELECT * FROM `contact_info` WHERE ZipCode='46545'";

//query it and put information into result(array)
$result = mysqli_query($conn, $query);

$rows = mysqli_num_rows($result);
//Cycle through the array and display information
//of the homeless shelter.
for($i = 0; $i < $rows; ++$i)
{
	$row = mysqli_fetch_row($result);
	//echo 'Name: ' . mysql_result($result,$i,'name') . '<br />';
	echo 'Name: ' .		$row[1] . '<br />';
}
?>