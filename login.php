<?php
//Login Page
//connect to A Fresh Start database
$conn = new mysqli("localhost", "root", "", "a_fresh_start");

if($conn->connect_error)
	die ("Connection failed: " . $conn->connect_error);

$var = 0;
$username = "";
$password = "";

//create form handling for when submit button is clicked
echo <<< EOL
	<form action="login.php" method="post"><pre>
		Username <input type="text" name="username" />
		Password <input type="password" name="password" />
		<input type="submit" value="Login" />
	</pre></form>
EOL;

//if the username and password is set this code will execute, and take you to a page
//currently set at the registration page
	if(isset($_POST['username']) && isset($_POST['password']))
	{	
		$username = get_post('username');
		$password = get_post('password');
	
		$query = "SELECT * FROM `contact_info` WHERE Username='$username'";
		$result = mysqli_query($conn, $query);
		
		$row = mysqli_fetch_row($result);
		
		//if the username and password match the info in database
		//User will be redirected to the homepage.
		if($username === $row[0] && $password === $row[9])
		{
			echo "Login Successful" . '<br />';
			header("Location: stchs.php");
		}
		//Else the page will print out login unsucessful;
		else
		{
			echo "Login unsucessful" . '<br />';
		}
	}
	else
	{
		echo "Please enter information in all the fields" . '<br />';
	}
	
	function get_post($var)
	{
		$conn = new mysqli("localhost", "root", "", "a_fresh_start");
		return mysqli_real_escape_string($conn, $_POST[$var]);
	}

?>