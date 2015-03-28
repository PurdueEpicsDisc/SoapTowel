<?php
//new upload.php
$myfile = fopen("C:\\Users\\Joshua\\Desktop\\DatabaseSave.txt", "r");
//open database connection
$conn = new mysqli("localhost", "root", "", "a_fresh_start");

while(!feof($myfile))
{
	//Remember no punctuation needed in insert into statement
	//or will screw up the entire insert statement
	$sql = "";
	$str = fgets($myfile);
	//String split with "-" delimiter into an array hopefully
	//gets rid of newline character at the end
	$strOne = str_replace(array("\r", "\n"), '', $str);
	//Seperates all the different fields that were delimited by the '-' character.
	$parts = (explode('-',$strOne,10));
	//Creates sql statement so that it may be reuploaded into database.
	$sql = "INSERT INTO contact_info VALUES('" . $parts[0] . "','" . $parts[1] . "','" . $parts[2] . "','" . $parts[3] . "','" . $parts[4] . "','" . 
					$parts[5] . "','" . $parts[6] . "','" . $parts[7] . "','" . $parts[8] . "','" . $parts[9] . "')";
	echo $sql . "<br />";
	if($conn->query($sql) === TRUE)
		echo "New Record Created";
}
fclose($myfile);
?>
