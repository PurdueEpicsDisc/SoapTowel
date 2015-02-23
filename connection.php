<html>
<body>
<?php

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$db = 'testDataBase';
	
	$conn = mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_select_db($db);
?>

</body>
</html>