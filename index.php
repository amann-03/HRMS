<?php

	include 'connection.php';

	if(isset($_POST['form_submit'])){
		$user_email = $_POST['User_mail'];
		$user_password = $_POST['User_password'];

		$insert_query = "insert into login_page(username,password)values('$user_email','$user_password')";

		mysqli_query($conn, $insert_query);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login.css">
	<title>Login</title>
</head>

<body id="body">
<div class="flex-container">
<div class="flex-child 1">
<h1 id="heading">LOGIN</h1>
<form action ="" method="post">
<div class="block">
<div>
	<input type="email" name="User_mail" class="element" values="" placeholder="Username"required>
</div>
<div>
	<input type="Password" name="User_password" class="element" values=""placeholder="Password"required>
</div>
<div><button id="click">Forgot password</button></div>

<div>
	<input type="submit" name="form_submit" id="submit" value='Sign In'>
</div>
</div></form>
</div>
<div class="flex-child 2">

<img class="cropped-ofp"src="Frame 13.png" alt="abcd" >


</div>
</body>
</html>



