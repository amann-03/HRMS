<?php session_start();
require_once('connection.php');

if (isset($_SESSION['employee_id'])) { ?>

<link rel="stylesheet" type="text/css" href="_CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=1.1">
<link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
<div>
	<div class="upperbar">
<?php require_once('Common/upperbar.php') ?>
	</div>
<div>
	<div class="left-sidebar">
<?php require_once('Common/left-sidebar.php') ?>
	</div>
<div class="mainscreen">
<br>	
<div class="container text-center">
<div class="row">
<div class="col"><div class="col">
 <div class="card"id ="card1"  style="height: 80vh;">
 			<img class="card-img-top" src="Photo/image 5.png" alt="Card image cap">
	<div class="card-body">


		<?php 
			$qer = "SELECT name, joining_date from employee join emp_depart on employee.department_id = emp_depart.department_id where employee.employee_id = ".$_SESSION['employee_id'];
			$res = mysqli_query($conn, $qer);
			$ans = mysqli_fetch_object($res);
		 ?>

				<p class="fw-bolder">Name<br><?php echo $ans->name; ?></p>
				<span class="title">at work for <?php ?></span>
				<br>
				<h3>Team Members<h3>
				<ul class="list-group" id="projectlist">
					<br>


			<li class="list-group-item">Person1</li>
			<li class="list-group-item">Person2</li>
			<li class="list-group-item">Person3</li>
		</ul>
	</div>
</div></div></div>
	
<div class="col"><div class="row">
	 <div class="card" id="card2" style="height: 49vh;">
	 	<span class="personalhead">	Personal Details </span>
	 	<div class="card-body">
	 		

				<?php
	
				$statement = "SELECT name, work_status, department_id, employee_id, login_id, dob, gender, phone_number, address FROM employee where employee_id = ".$_SESSION['employee_id'];

				$res = mysqli_query($conn, $statement);
				$row = mysqli_fetch_object($res);


				$rows=array("Name"=>$row->name,"ID"=>$row->employee_id,"Date of Birth"=>date('d-m-Y', strtotime($row->dob)),"Gender"=>$row->gender,"Email"=>$row->login_id,"Phone no."=>$row->phone_number,"Address"=>$row->address);

?>
					<table style="width: 100%;">
				<?php
				foreach ($rows as $key => $value): ?>
					  <tr id="<?= $key ?>">
					    <th><?= $key ?></th>
					    <td><?= $value ?></td>
					  </tr>
					  <?php endforeach; ?>
					</table>

		</div>
	</div></div>
	<div class="row">
	 <div class="card" id="card2" style="height: 30vh;">
		<span class="personalhead"> Company Details </span>
	 	<div class="card-body">
	 		


				<?php

				$query1 = "SELECT department_name from department where department_id = $row->department_id";
				$query2 =  "select designation, joining_date from emp_depart where employee_id = ".$_SESSION['employee_id'];

				$res1 = mysqli_query($conn, $query1);
				$row1 = mysqli_fetch_object($res1);

				$res2 = mysqli_query($conn, $query2);
				$row2 = mysqli_fetch_object($res2);

				$rows=array("Department"=>$row1->department_name,"Postion"=>$row2->designation,"Status"=>$row->work_status,"Joining Date"=>date('d-m-Y', strtotime($row2->joining_date)));

				?>

					<table style="width: 100%;">
				<?php
				foreach ($rows as $key => $value): ?>
					  <tr id="<?= $key ?>">
					    <th><?= $key ?></th>
					    <td><?= $value ?></td>
					  </tr>
					  <?php endforeach; ?>
					</table>

		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
<?php } 
else{
	header('location:index.php');
}

?>