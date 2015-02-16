<?php
//Query tables where data equals certain zip code inputted by the user;

//connect to the database
$conn = new mysqli("localhost", "root", "", "soap_towel_campaign");
//Create aquery for the database to execute
$query = "SELECT * FROM `homeless_shelters` WHERE ZipCode='46545'";

//query it and put information into result(array)
$result = mysqli_query($conn, $query);

$rows = mysqli_num_rows($result);
//Cycle through the array and display information
//of the homeless shelter.

$text = "";

for($i = 0; $i < $rows; ++$i)
{
	$row = mysqli_fetch_row($result);
	for($j = 0; $j < 9; ++$j)
	{
		$text = $text . (string)$row[$j] ." ";
	}
	$text = $text . "\r\n";
}

$fh = fopen("C:\\Users\\Joshua\\Desktop\\DatabaseSave.txt", 'w');
fwrite($fh, $text) or die("Could not write to file");
fclose($fh);
echo 'DatabaseSave written';
?>