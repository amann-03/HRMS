<?php session_start();

ob_start();
require_once('connection.php');
if (isset($_SESSION['employee_id'])) {
 ?>

<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="_CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=1.1">
<link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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

			$stat = "SELECT name, joining_date from employee join emp_depart on emp_depart.employee_id = employee.employee_id where employee.employee_id = ".$_SESSION['employee_id'];
			$quer = mysqli_query($conn, $stat);
			$res = mysqli_fetch_object($quer);
			$dt = date_create($res->joining_date);

		 ?>
				<h4 class="fw-bolder"><?php echo $res->name; ?></h4>
				<br>
				<span class="title">At work for : <br><?php  $diff = date_diff(date_create(date('Y-m-d')),$dt); echo $diff->format("%y Years %m Months"); ?></span>
				<br>
				<h3>Team Members<h3>
				<ul class="list-group" id="projectlist">
					<br>
							<?php 

			$stat = "SELECT name, employee.employee_id as id from employee join emp_depart on emp_depart.employee_id = employee.employee_id where employee.department_id = ".$_SESSION['department_id']." limit 3 ";
			$quer = mysqli_query($conn, $stat);
			while($res = mysqli_fetch_object($quer)){
				if($res->id ==$_SESSION['employee_id']){
					continue;
				}
		 ?>

			<li class="list-group-item"><?php echo $res->name ?></li>
			<?php } ?>
		</ul>
	</div>
</div></div></div>

<div class="col">


	<div class="row">
	 <div class="card" id="card2" style="height: 49vh;">
	 	<span class="personalhead" id="personalhead2">	Personal Details 
	 	
	 	<button type="submit" name="edit" style="position: absolute;
    right: 0.5vw;
    height: 4.5vh;
    padding-top: 0.5vh;"class="btn btn-dark" data-toggle="modal" data-target="#Modal2">Edit</button>
   
	 	</span>

	 	<div class="card-body">	

				<?php

				$stat = "SELECT name, employee_id, dob, gender, login_id, phone_number, address from employee  where employee_id = ".$_SESSION['employee_id'];
				$quer = mysqli_query($conn, $stat);
				$res = mysqli_fetch_object($quer);


				$rows=array("Name"=>$res->name,"ID"=>$res->employee_id,"Date of Birth"=>$res->dob,"Gender"=>$res->gender,"Email"=>$res->login_id,"Phone no."=>$res->phone_number,"address"=>$res->address);
				?>

					<table style="width: 100%; text-align: left;">
				<?php
				foreach ($rows as $key => $value): ?>
					  <tr id="<?= $key ?>">
					    <th><?= $key ?></th>
					    <td>:  <?= $value ?></td>
					  </tr>
					  <?php endforeach; ?>
					</table>

		</div>
	</div></div>
	<div class="row">
	 <div class="card" id="card2" style="height: 32vh;">
		<span class="personalhead" id="personalhead3"> Company Details </span>
	 	<div class="card-body">
	 		


				<?php

				$stat = "SELECT department_name, joining_date, designation, work_status from employee join emp_depart on emp_depart.department_id = employee.department_id join department on department.department_id = employee.department_id where employee.employee_id = ".$_SESSION['employee_id'];
				$quer = mysqli_query($conn, $stat);
				$row = mysqli_fetch_object($quer);

				$rows=array("Department"=>$row->department_name,"Designation"=>$row->designation,"Status"=>$row->work_status,"Joining Date"=>$row->joining_date);

				?>

					<table style="width: 100%; text-align: left">
				<?php
				foreach ($rows as $key => $value): ?>
					  <tr id="<?= $key ?>">
					    <th><?= $key ?></th>
					    <td>:  <?= $value ?></td>
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

</body>
</html>

<div id="Modal2" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title" style="padding-left: 2vh;">Edit Details</h5>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div>
            <label>Name</label>
          </div>
          <div>
            <input type="text" class="input_div" name="name" value="<?php echo $res->name ?>" required>
          </div>
           <div>
            <label>DOB</label>
          </div>
          <div>
            <input type="date"  class="input_div" name="dob" value="<?php echo $res->dob ?>" required>
          <div>
            <label>Gender</label>
          </div>
          <div>
            <input type="text"  class="input_div" name="gender" value="<?php echo $res->gender ?>" required>
          </div>
          <div>
            <label>Email</label>
          </div>
          <div>
            <input type="email" class="input_div" name="email" value="<?php echo $res->login_id ?>" required>
          </div>
          <div>
            <label>Contact Number</label>
          </div>
          <div>
            <input type="text"  class="input_div" name="contact_number" value="<?php echo $res->phone_number ?>" required>
          </div>
          </div>
          <div>
            <label>Address</label>
          </div>
          <div>
            <input type="text" class="input_div" name="address" value="<?php echo $res->address ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-secondary" name="update_details" value="Update">
        </div>
      </form>
    </div>
  </div>
</div>


	 <?php 
 	
		if(isset($_POST['update_details'])){
			$name  	 = $_POST['name'];
		$gender      = $_POST['gender'];
		$contact_number  = $_POST['contact_number'];
		$dob  			 = $_POST['dob'];
		$login_id  		 = $_POST['email'];
		$address 		 = $_POST['address'];


	$statement = "UPDATE employee set name= '".$name."', gender= '".$gender."', phone_number= '".$contact_number."', dob= '".$dob."', login_id= '".$login_id."', address= '".$address."' where employee_id = ".$_SESSION['employee_id'];

	$run_query = mysqli_query($conn,$statement);
	header('location:Personal.php');
}

?>


<?php }
else{
	header('location:index.php');
}
?>