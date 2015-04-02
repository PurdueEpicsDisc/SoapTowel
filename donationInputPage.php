<!DOCTYPE HTML>
<html> 
<body>
<!--GUI for inputing donation Page information-->
<!--Once the user hits submit the information in the textbox fields are sent  donationPage.php seen in the line below-->
<form action="donationPage.php" method="post">
<?php

$itemArray = array();
$Shelter = $_POST["Shelter"];


$conn = new mysqli("localhost", "root", "root", "DonationDatabase");
//Create aquery for the database to execute
$query = "SELECT * FROM `DonationTable` WHERE Shelter='$Shelter'";

//query it and put informaiton into result(array)
$result = mysqli_query($conn, $query);

$rows = mysqli_num_rows($result);
$removeButton = "<button onclick='alert('helloworld')'>Removes</button>";


// Retreives Information from Database and prints the Shelter name and saves the string to listString
echo 'Your Donation Requests<br>';

	$row = mysqli_fetch_row($result);
	//echo 'Name: ' . mysql_result($result,$i,'name') . '<br />';
	echo ''.	$row[0] .'<br>';
	echo 'Item || Quantity || Importance<br>';
	$listString = $row[1];
	$previousIndex = 0;
	$columnCounter = 0;
	
	// Takes the listString which holds the selected shelters needed items and seperates the string and removes the dashes
	while(strlen($listString)>0){
		$currentIndex = strpos($listString,'-');
		if($columnCounter%3 == 2){
			echo ''. substr($listString,0,$currentIndex) .'<br>';
		}
		else {
			echo ''. substr($listString,0,$currentIndex) .' || ';		
		}
		$listString = substr($listString,$currentIndex + 1);
		$columnCounter++;
	}


?>
Shelter Name: <input type="text" name="Shelter"><br><!--text box followed by line break-->
Item: <input type="text" name="itemArray[0]"> Quantity: <input type="text" name="itemArray[1]"> Importance: <input type="text" name="itemArray[2]"><br> <!--two text boxes followed by line break-->
Item: <input type="text" name="itemArray[3]"> Quantity: <input type="text" name="itemArray[4]"> Importance: <input type="text" name="itemArray[5]"><br>
Item: <input type="text" name="itemArray[6]"> Quantity: <input type="text" name="itemArray[7]"> Importance: <input type="text" name="itemArray[8]"><br>
Item: <input type="text" name="itemArray[9]"> Quantity: <input type="text" name="itemArray[10]"> Importance: <input type="text" name="itemArray[11]"><br>
Item: <input type="text" name="itemArray[12]"> Quantity: <input type="text" name="itemArray[13]"> Importance: <input type="text" name="itemArray[14]"><br>
<input type="submit"> <!--submit button-->
</form>

</body>
</html>