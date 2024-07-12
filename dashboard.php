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
		<h2>Welcome Employee</h2>
		<div class="container text-center">
			
<div class="row">

<a href="Schedule.php"class="col"> <div class="card"id ="card1">
<br>
		<div class="chart_container"><?php require_once('charts/Pie_chart_Dashboard.php') ?></div>
</div>
</a>
	<div class="col" > <div class="card" id="card2" style="display: flex; flex-direction: row; justify-content:space-around;">
		<div class="bar_container"><?php require_once('charts/dash_Bar.php') ?></div>
		 <div id="side-list">
         <ul class="list-group" id="dashboardlist">
			<li class="list-group-item">Project Completed :<br><div class="bar-list">9 days</div></li>
			<li class="list-group-item">Current Project Duration :<br><div class="bar-list">9 days</div></li>
			<li class="list-group-item">Remaing Duration :<br><div class="bar-list">9 days</div></li>
         </ul>
		</div>
		
		
         
        
	</div>
</div>
</div>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<dt class="h7">Upcoming Meetings</dt>
			<br>
			<div style="display:flex; justify-content:space-around;">
			<dl style="float: left;">
				<dt>Agenda</dt>
				<dd>xyz</dd>
				
			</dl>
			<dl style="float: right;">
				<dt>Meeting Host</dt>
				<dd>Abc</dd>
				

			</dl>

		</div>
		<dl >
				<dt>Time</dt>
				<dd>Abc</dd>
				<a href="#"  class="link-primary"><dt><h3>Join the meeting</h3></dt></a>
				<br>

			</dl>
			</div>
		</div>
	</div>
	<a href="project.php" class="col"> <div class="card">
		<div class="card-body" >
			<dt class="h7">Project Detail</dt>
			<br>
			<div style="display:flex; justify-content:space-around;">
			<dl style="float: left;">
				<dt>Name</dt>
				<dd>xyz</dd>
				<br>
				<dt>Team Leader</dt>
				<dd>Abc</dd>
			</dl>
			<dl style="float: right;">
				<dt>#</dt>
				<dd>A019</dd>
				<br>
				<dt>Status</dt>
				<dd>Ongoing</dd>
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