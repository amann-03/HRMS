<?php 

$username = "root";
$password = "";
$server = 'localhost';
$db = 'hrms';

$conn = mysqli_connect($server,$username,$password,$db);

if($conn){
	echo "COnnection Successful";
}
else{
	die("No connection ".mysqli_connect_error);
}

 ?>