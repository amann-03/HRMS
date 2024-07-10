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
 	<?php
		if (isset($_POST['mark'])){
			 echo "<h3>Attendance Marked</h3>";?>
			 <br>
			<h3>Status:<h3>
			<div style="color:"> <?php echo "Pending" ?> </div>
	<?php	}
		else{
		?>
		<form action="" method="post"><button name="mark" type="submit" class="btn btn-info" id="mark">Mark</button></form>
		<?php }?>

		
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
          <button name="mark" type="submit" class="btn btn-info" id="mark">Submit</button>
        </div>
        </form>
	</div>
</div>
</div></div>
	
<div class="col"><div class="row">
	 <div class="card" id="card2" style="height:79vh">
			<?php require_once("calendar/calendar_show.php")?>
	</div></div>
</div>
</div>
</div>
</div>

	

