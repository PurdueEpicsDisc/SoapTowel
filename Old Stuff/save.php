<?php
$conn = new mysqli("localhost", "root", "", "a_fresh_start");
$fh = fopen("C:\\Users\\Joshua\\Desktop\\DatabaseSave.txt", "w+");
$query = "SELECT * FROM contact_info";

$result = mysqli_query($conn, $query);

$rows = mysqli_num_rows($result);
for($i = 0; $i < $rows; ++$i)
{
	$text = "";
	$row = mysqli_fetch_row($result);
	for($j = 0; $j < 10; ++$j)
	{
		if($j != 9) {
			$text = $text . (string)$row[$j] . "-";
			}
		else {
			$text = $text . (string)$row[$j];
		}
			
	}
	
	if($i == ($rows - 1))
		$textOne = $text;
	else
		$textOne = $text . "\r\n";
	fwrite($fh, $textOne);
}
?>