<?php session_start();

require_once('connection.php');
if (isset($_SESSION['employee_id'])) {
 ?>

<link rel="stylesheet" type="text/css" href="_CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=1.1">
<link rel="stylesheet" type="text/css" href="calendar/calendar.css?v=1.1">
<link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
<div>
	<div class="upperbar">
<?php require_once('Common/upperbar.php') ?>
	</div>

	<div class="left-sidebar">
<?php require_once('Common/left-sidebar.php') ?>
	</div>

	<div class="upperbar">
<?php require_once('Common/schedule_upper.php') ?>
	</div>
</div>

<div class="mainscreen">

<div class="container text-center">
<div class="row">
<div class="col"><div class="col">
 <div class="listcontainer">
 	<div class="attmark">Mark Your Attendance</div>
 	<?php $colors = ['Pending'=>'grey','Approved'=>'green','Late Punch-in'=>'Red']; ?>
 	<?php

 		$dt = date('Y-m-d');
 		$stat = "SELECT status from attendance where employee = ".$_SESSION['employee_id']." and date_attendance = '$dt'";
		$quer = mysqli_query($conn, $stat);
		$run = mysqli_fetch_object($quer);

		if($quer->num_rows > 0){
			?><br>
			<h3>Status:<h3>
			<div style="color: <?php echo $colors[$run->status]; ?>"> <?php echo $run->status; ?> </div>


		<?php }

		else{

			?> <form action="" method="post"><button name="mark" type="submit" class="btn btn-info" id="mark">Mark</button></form>
			<?php  
				if(isset($_POST['mark'])){

					date_default_timezone_set('Asia/Calcutta');
					 echo "<h3>Attendance Marked</h3>";

					 $tim = date('H:i:s');

					$stat = "INSERT INTO attendance(employee, status, date_attendance, punch_in_time) VALUES (".$_SESSION['employee_id'].", 'Pending', '".$dt."', '".$tim."' )";	

					$quer = mysqli_query($conn, $stat);
					header('location: attendance.php');
				}
		}
			 ?>
		
</div>
<div class="card"id ="card1" >
	<div class="card-body">
		<form action="" method="post">
		<div>
            <label><h3 style="font-size: 3.5vh; padding-bottom: 1vh; font-weight:700">Remark</h3> </label>
          </div>
          <div>
          	<textarea style="background-color:#49505714;"  class="input_div" name="Rem" placeholder="If Late-Punch-in is shown please give the remark" rows='4'></textarea>
          </div>
          <br>
        <div>
          <button name="remark" type="submit" class="btn btn-info" id="mark">Submit</button>
        </div>
        </form>
	</div>
</div>
</div></div>
	
	<?php 
		if(isset($_POST['remark'])){
			$rem = $_POST['Rem'];

			$dt = date('Y-m-d');
			$stat = "UPDATE attendance set remark = '".$rem."' where employee = ".$_SESSION['employee_id']." and date_attendance = '$dt'";

			$quer = mysqli_query($conn, $stat);
		}
	 ?>

<div class="col"><div class="row">
	 <div class="card" id="card2" style="height:79vh">
			<?php require_once("calendar/calendar_show.php")?>
	</div></div>
</div>
</div>
</div>
</div>

	

<?php }
else{
	header('location:index.php');
}
?>