
<html>

<script>
function myFunction() {
    document.getElementById("demo").innerHTML = "Hello World";
}
</script>

<?php
//Query tables where data equals certain zip code inputted by the user;

//connect to the database

$Shelter = $_POST["Shelter"];


$conn = new mysqli("localhost", "root", "root", "DonationDatabase");
//Create aquery for the database to execute
$query = "SELECT * FROM `DonationTable` WHERE Shelter='$Shelter'";

//query it and put informaiton into result(array)
$result = mysqli_query($conn, $query);

$rows = mysqli_num_rows($result);
$removeButton = "<button onclick='alert('helloworld')'>Removes</button>";
//Cycle through the array and display information
//of the homeless shelter.
for($i = 0; $i < $rows; ++$i)
{
	$row = mysqli_fetch_row($result);
	//echo 'Name: ' . mysql_result($result,$i,'name') . '<br />';
	echo ''.	$row[0] .'<br>';
	echo 'Your Donation Requests<br>';
	echo ''.	$row[1] .' '.	$row[2] .' <br>' ;
	//echo $removeButton;
	echo ''.	$row[3] .' '.	$row[4] .'<br />';
	echo ''.	$row[5] .' '.	$row[6] .' <br>' ;
	echo ''.	$row[7] .' '.	$row[8] .' <br>' ;
	echo ''.	$row[9] .' '.	$row[10] .' <br>' ;


}
?>
<!--<button onclick="myFunction()">Remove</button>-->

</html>