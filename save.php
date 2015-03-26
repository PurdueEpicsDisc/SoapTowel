<?php
$conn = new mysqli("localhost", "root", "", "soap_towel_campaign");
$fh = fopen("C:\\Users\\Joshua\\Desktop\\DatabaseSave.txt", "w+");
$query = "SELECT * FROM homeless_shelters";

$result = mysqli_query($conn, $query);

$rows = mysqli_num_rows($result);
for($i = 0; $i < $rows; ++$i)
{
	$text = "";
	$row = mysqli_fetch_row($result);
	for($j = 0; $j < 9; ++$j)
	{
		if($j != 8) {
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