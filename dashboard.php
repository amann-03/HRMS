<?php session_start();

require_once('connection.php');
if (isset($_SESSION['employee_id'])) {
 ?>


<html>
<head>
	<script src="jquery-3.7.1.js"></script>
	<script language="javascript">
		$(document).ready(function(){
			setInterval(function(){
				$('#clock').load('Dash_el/clock.php');
			},1000);
		});
	</script>
</head>

<link rel="stylesheet" type="text/css" href="_CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=1.1">
<link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<div>
	<div class="upperbar">
		<?php require_once('Common/upperbar.php') ?>
	</div>
	<div class="left-sidebar">
		<?php require_once('Common/left-sidebar.php') ?>
	</div>
	
	<div class="mainscreen">
		<h2>Welcome, <?php echo $_SESSION['name']; ?></h2>
		<div class="container text-center">
			
<div class="row">

<a href="Schedule.php"class="col"> <div class="card"id ="card1">
<br>
		<div class="chart_container"><?php require_once('charts/Pie_chart_Dashboard.php') ?></div>
</div>
</a>

<?php 
      $stat = "SELECT start_date, deadline,any_rewards from project join project_employees on project.project_id = project_employees.project_id where employee_id = ".$_SESSION['employee_id'];

      $res = mysqli_query($conn, $stat);

      $ongoing = 0;
      $rewarded = 0;
      $not_rewarded = 0;
      $diff;
      
      while($run = mysqli_fetch_object($res)){

        if($run->deadline > date('Y-m-d')) {
        	$ongoing++;
        	$diff = date_diff(date_create(date('Y-m-d')),date_create(date('Y-m-d',strtotime($run->deadline))))->days; 
        }
        else{
            if($run->any_rewards == "Rewarded") $rewarded++;
            else $not_rewarded++;
          }

      }


  ?>

	<div class="col" > <div class="card" id="card2" style="display: flex; flex-direction: row; justify-content:space-around;">
		<div class="bar_container"><?php require_once('charts/dash_Bar.php') ?></div>
		 <div id="side-list">
         <ul class="list-group" id="dashboardlist">
			<li class="list-group-item">Project Completed :<br><div class="bar-list"><?php echo $rewarded + $not_rewarded; ?></div></li>
			<li class="list-group-item">Ongoing Project Duration: <br><div class="bar-list"><?php echo $diff; ?> days</div></li>
			<li class="list-group-item">Projects Rewarded: <br><div class="bar-list"><?php echo $rewarded; ?></div></li>
         </ul>
		</div>
		
		
         
        
	</div>
</div>
</div>

<?php 

	date_default_timezone_set('Asia/Calcutta');
	$stat = "SELECT agenda, meet_time, duration, meeting_url, name from meeting_project join employee on employee.employee_id = meeting_project.host join project_employees on project_employees.employee_id = ".$_SESSION['employee_id']." and project_employees.project_id = meet_proj_id order by meet_time DESC limit 1" ;
	$run = mysqli_query($conn, $stat);
	$row = mysqli_fetch_object($run);
	$dt = date('Y-m-d H:i:s');

	$copy = date('Y-m-d H:i:s', strtotime($row->meet_time));
	$min = $row->duration;
	$add = date('Y-m-d H:i:s', strtotime(''.$copy.' + '.$min.' minutes'));

	$status;
	if($dt < $copy) $status =  "Upcoming";
	elseif(strtotime($add) > strtotime($dt)) $status =  "Started";
	else $status = "Completed";

 ?>
<div class="row">
	<div class="col">
		<div class="card">
			<?php if($status != 'Completed') {?>
			<div class="card-body">
				<dt class="h7"><?php echo $status; ?> Meeting</dt>
			<br>
			<div style="display:flex; justify-content:space-around;">
			<dl style="float: left;">
				<dt>Agenda</dt>
				<dd><?php echo $row->agenda; ?></dd>
				
			</dl>
			<dl style="float: right;">
				<dt>Meeting Host</dt>
				<dd><?php echo $row->name; ?></dd>
				

			</dl>

		</div>
		<dl >
				<dt>Time</dt>
				<dd><?php echo date('H:i', strtotime($row->meet_time)); ?></dd>
				<a href="<?php echo $row->meeting_url; ?>" target="_blank"  class="link-primary"><dt><h3>Join the meeting</h3></dt></a>
				<br>

			</dl>
			</div>
		<?php }else{
			echo "<br><br><br><br><h2> No Upcoming Meetings! </h2>";
		} ?>
		</div>
	</div>

<?php 

	$stat1 = "SELECT project_name, deadline, project_manager, name from project_employees join project on project_employees.project_id = project.project_id join employee on employee.employee_id = project.project_manager where project_employees.employee_id = ".$_SESSION['employee_id']." order by deadline desc LIMIT 1";
	$run_query = mysqli_query($conn, $stat1); 
	$row = mysqli_fetch_object($run_query);
	$dt = date_create(date('Y-m-d', strtotime($row->deadline)));

 ?>

	<a href="project.php" class="col"> <div class="card">
		<div class="card-body" >
			<dt class="h7">Project Detail</dt>
			<br>
			<div style="display:flex; justify-content:space-around;">
			<dl style="float: left;">
				<dt>Name</dt>
				<dd><?php echo $row->project_name; ?></dd>
				<br>
				<dt>Remaining Time</dt>
				<dd><?php $diff = date_diff($dt,date_create(date('Y-m-d'))); echo $diff->format("%a days"); ?></dd>
			</dl>
			<dl style="float: right;">
				<dt>Team Leader</dt>
				<dd><?php echo $row->name; ?></dd>
				<br>
				<dt>Deadline</dt>
				<dd><?php echo $row->deadline; ?></dd>
			</dl>
		</div>
		</div>
	</div>
</a>
<div class="col"> <div class="card">
	
	 <div id="clock">
	 	<?php date_default_timezone_set("Asia/Kolkata");
	?>
    <div style="padding: 0.5vw;font-size: 4vh; font-weight: 700;"><?php echo date("h:i:s A")?></div>

    <div style="padding: 0.5vw;font-size: 3vh;"><?php echo date("l jS  F Y")?></div>

	 </div>

	<a href="attendance.php" class="link-primary"><h3 style="font-size: 3.5vh;">Mark Your Attendance</h3></a>
</div>
</div>
</div>
</div>
</div>
</div>
</html>


<?php }
else{
	header('location:index.php');
}
?>