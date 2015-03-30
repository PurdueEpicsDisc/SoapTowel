<?php
$conn = new mysqli("localhost", "root", "", "a_fresh_start");

if($conn->connect_error)
	die ("Connection failed: " . $conn->connect_error);
	
echo <<< EOL
	<form action="stchs.php" method="post"><pre>
		Username <input type="text" name="username" />
		Password <input type="text" name="password" />
		<input type="submit" value="Login" />
	</pre></form>
EOL;

?>