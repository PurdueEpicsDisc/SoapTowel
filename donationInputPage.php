<!DOCTYPE HTML>
<html> 
<body>
<!--GUI for inputing donation Page information-->
<!--Once the user hits submit the information in the textbox fields are sent  donationPage.php seen in the line below-->
<form action="donationPage.php" method="post">
<?php

$itemArray = array();

?>
Shelter Name: <input type="text" name="Shelter"><br><!--text box followed by line break-->
Item: <input type="text" name="itemArray[0]"> Importance: <input type="text" name="itemArray[1]"><br> <!--two text boxes followed by line break-->
Item: <input type="text" name="itemArray[2]"> Importance: <input type="text" name="itemArray[3]"><br>
Item: <input type="text" name="itemArray[4]"> Importance: <input type="text" name="itemArray[5]"><br>
Item: <input type="text" name="itemArray[6]"> Importance: <input type="text" name="itemArray[7]"><br>
Item: <input type="text" name="itemArray[8]"> Importance: <input type="text" name="itemArray[9]"><br>
<input type="submit"> <!--submit button-->
</form>

</body>
</html>