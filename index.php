<?php 

session_start();
require_once('config.php');

?>

<?php

	include 'connection.php';

	if(isset($_POST['form_submit'])){
		$user_email = $_POST['User_mail'];
		$user_password = $_POST['User_password'];

		$get_query = "select * from employee where login_id = '$user_email';";
		$res = mysqli_query($conn, $get_query);

		if($res->num_rows > 0){

			$user = mysqli_fetch_object($res);
			$user_E = $user->login_id;
			$pass = $user->password;
			// $encrypted_pass = md5($user_password);

			if($user_password == $pass){
				$_SESSION['employee_id'] = $user->employee_id;
		 		$_SESSION['login_id'] = $user_email;
				header('location:dashboard.php');
			}

		}

	}
?>



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS\login.css">
	<title>Login</title>
</head>

<body id="body">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<div class="flex-container">
<div class="flex-child 1">
<h1 id="heading">LOGIN</h1>
<form action ="" method="post">
<div class="block">
<div>
	<input type="email" name="User_mail" class="element" values="" placeholder="Username"required>
</div>
<div>
	<input type="Password" name="User_password" class="element" values=""placeholder="Password">
</div>
<div><button type="submit" name="forget_pass"style="scale:1.3 ;"class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal">Forgot password</button></div>
<div>
	<input type="submit" name="form_submit" id="submit" value='Sign In'>
</div>
</div></form>
</div>
<div class="flex-child 2">

<img class="cropped-ofp"src="Frame 13.png" alt="abcd" >


</div>
</div>



</body>
</html>

<?php 

	if(isset($_POST['forget_pass'])){

		require_once('popup.php');
		$user_email = $_POST['User_mail'];

		$new_pass = rand(1000,10000);
		$update_query = "update employee set password = $new_pass where login_id = '$user_email'";

		mysqli_query($conn, $update_query);

		$to_email = $user_email;

		$subject = "Forget Password : HRMS";

		$body = "Hi, greetings from HRMS team.\nYour new password : $new_pass\n\n Stay updated.";

		$headers = "From: aman030904@gmail.com";
		mail($to_email, $subject, $body, $headers);
		
		unset($_SESSION['employee_id']);
 		unset($_SESSION['login_id']);
 		session_destroy();
	}
		
?>

