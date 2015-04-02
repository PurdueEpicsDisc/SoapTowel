<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Soap and Towel Individual Form</title>
</head>
<body>
  <h2>Soap and Towel Individual Form</h2>

<?php
  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $user_name = $_POST['username'];
  $user_password = $_POST['userpassword'];
  $address = $_POST['address'];
  $City = $_POST['city'];
  $state = $_POST['state'];
  $zip_code = $_POST['zipcode'];
  $phone_number = $_POST['phonenumber'];
  $user_email = $_POST['emailaddress'];
  
  $dbc = mysqli_connect('localhost','root','root','individual_profile')
  	or die('Error connecting to MySQL server.');
  	
  	$query = "INSERT INTO individualProfile (first_name, last_name, user_name, user_password,
  	address, City, state, zip_code, phone_number, user_email)".
  	"VALUES('$first_name','$last_name','$user_name','$user_password','$address', ".
  	" '$City', '$state' , '$zip_code' , '$phone_number', '$user_email')";
  
  



$result = mysqli_query($dbc, $query)
or die('Error queerying database.');



mysqli_close($dbc);

  echo 'Thanks for submitting the form.<br />';
  echo 'Your username: ' . $user_name . '<br />';
  echo 'Your address: ' . $address . '<br />';
  echo 'City: ' . $City . '<br />';
  echo 'State: ' . $state . '<br />';
  echo 'Zip Code: ' . $zip_code . '<br />';
  echo 'Your Phone number: ' . $phone_number. '<br />';
  echo 'Your email address is ' . $user_email;
?>

</body>
</html>
