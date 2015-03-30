<?php //Soap Towel Adding people to a database
$conn = new mysqli("localhost", "root", "", "a_fresh_start");

if($conn-> connect_error)
	die("Connection failed: " . $conn->connect_error);

	//if the textboxes are set then it will execute this code.
	if(isset($_POST['username']) &&
	   isset($_POST['password']) &&
	   isset($_POST['name']) &&
	   isset($_POST['address']) &&
	   isset($_POST['city']) &&
	   isset($_POST['state']) &&
	   isset($_POST['zipCode']) &&
	   isset($_POST['phoneNumber']) &&
	   isset($_POST['email']))
	   {
			$username = get_post('username');
			$password = get_post('password');
			$name = get_post('name');
			$address = get_post('address');
			$city = get_post('city');
			$state = get_post('state');
			$zipCode = get_post('zipCode');
			$phoneNumber = get_post('phoneNumber');
			$email = get_post('email');
			
			$sql = "INSERT INTO contact_info VALUES('$username', '$name', '$address', '$city',
					'$state', '$zipCode', '$phoneNumber', '$email' , 0, '$password')";
					
			$conn->query($sql);
	   }
echo <<<EOL
	<form action="stchs.php" method="post"><pre>
		Username <input type="text" name="username" />
		Password <input type="text" name="password" />
		Name     <input type="text" name="name" />
		Address  <input type="text" name="address" />
		City     <input type="text" name="city" />
		State    <input type="text" name="state" />
		Zip Code <input type="text" name="zipCode" />
	    Phone Number <input type="text" name="phoneNumber" />
		Email    <input type="text" name="email" />
		<input type="submit" value="Add Shelter" />
	</pre></form>
EOL;

	mysqli_close($conn);
	
	function get_post($var)
	{
		$conn = new mysqli("localhost", "root", "", "a_fresh_start");
		return mysqli_real_escape_string($conn, $_POST[$var]);
	}
?>