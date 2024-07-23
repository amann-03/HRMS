<?php session_start();

ob_start();
require_once('connection.php');
require_once('HR/Alert/alert.php');
if (isset($_SESSION['employee_id'])) {
 ?>

  <script>if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}</script>

<link rel="stylesheet" type="text/css" href="_CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=1.1">
<link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link rel="stylesheet" href="HR/Alert/alert.css">
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
	<div class="mainscreen">
		<br>
		<div class="container text-center">

			<?php 


				$stat = "SELECT cl, sl,pl,hl,lwp from leave_type where emp_id = ".$_SESSION['employee_id'];
				$quer = mysqli_query($conn, $stat);
				if($quer->num_rows > 0) {
					$run = mysqli_fetch_object($quer);
					$cl = $run->cl;
					$pl = $run->pl;
					$sl = $run->sl;
					$hl = $run->hl;
					$lwp = $run->lwp;
				}
				else{
					$cl = 0;
					$sl = 0;
					$pl = 0;
					$hl = 0;
					$lwp = 0;
				}

			 ?>
			
			<div class="row" style="">
				<div class="col"> <div class="card card3">
					<div class="card-body" >
						Casual Leaves
						<script type="text/javascript">
							var barColors = [
						"rgba(81, 28, 39, 0.8)",
						"rgba(222,40, 40, 0.8)",
						];</script>
						<div class="chart_container">
							<canvas id="graph4" height="350px" width="450px"></canvas>
							<script>var chrt = document.getElementById("graph4").getContext('2d');</script>
						<?php 

							$man1 = $cl;
							$total = 5;

						include('charts/total_leaves.php') ?></div>
					</div>
				</div>
			</div>
			<div class="col"> <div class="card card3">
				<div class="card-body">
					Paid Leaves
					<script type="text/javascript">
						var barColors = [
					"rgba(81, 88, 39, 0.8)",
					"rgba(202,200, 40, 0.8)",
					];</script>
					<div class="chart_container">
						<canvas id="graph5" height="350px" width="450px"></canvas>
						<script>var chrt = document.getElementById("graph5").getContext('2d');</script>
					<?php 
							$man1 = $pl;
							$total = 5;

					include('charts/total_leaves.php') ?></div>
				</div>
			</div>
		</div>
		<div class="col"> <div class="card card3">
			<div class="card-body">
				Half leaves
				<script type="text/javascript">
					var barColors = [
				"rgba(11, 78, 89, 0.8)",
				"rgba(20,160, 190, 0.8)",
				];</script>
				<div class="chart_container">
					<canvas id="graph6" height="350px" width="450px"></canvas>
					<script>var chrt = document.getElementById("graph6").getContext('2d');</script>
				<?php 
							$man1 = $hl;
							$total = 5;
				include('charts/total_leaves.php') ?></div>
			</div>
		</div>
	</div>
	<div class="col"> <div class="card card3">
		<div class="card-body">
			Sick Leaves
			<script type="text/javascript">
				var barColors = [
			"rgba(20,20, 20, 0.8)",
			"rgba(120, 120, 120, 0.8)",
			];</script>
			<div class="chart_container">
				<canvas id="graph7" height="350px" width="450px"></canvas>
				<script>var chrt = document.getElementById("graph7").getContext('2d');</script>
			<?php 
					$man1 = $sl;
					$total = 5;
			include('charts/total_leaves.php') ?></div>
		</div>
	</div>
</div>

</div>
<div class="row">
<div class="col">
	<div class="card" id="card2" style="height:44vh; width:54vw">
		<span class="personalhead" id="personalhead2">	Leaves Log 
	 	<button type="button" style="position: absolute;
    margin: 3px;
    right: 2vw;
    height: 3.5vh;
    padding-top: 0.5vh;"class="btn btn-success" data-toggle="modal" data-target="#Modal"><h5 class="fw-normal">Request Time Off</h5></button></span>

    <?php 

	    $stat = "SELECT start_date, end_date, status, type from leave_requests where employee_id = ".$_SESSION['employee_id']." order by start_date DESC ";
	    $run = mysqli_query($conn, $stat);

	    $colors = ['Pending'=>'grey','Approved'=>'green','Rejected'=>'Red'];
     ?>

	<div class="scrollable">
		<table class="table text-center table-hover table-striped">
			<thead>
				<tr class="table-light">
					<th>Start Date</th>
					<th>End Date</th>
					<th>Type</th>
					<th>Status</th>
					
				</tr>
				
			</thead>
			<tbody>
			<?php while($row = mysqli_fetch_object($run)){?>
			<tr>	
				<td><?php echo $row->start_date; ?></td>
				<td><?php echo $row->end_date; ?></td>
				<td><?php echo $row->type; ?></td>
				<td style="color:<?php echo $colors[$row->status];  ?>"><?php echo $row->status; ?></td>
			</tr>
			<?php }?>
			</tbody>
		</table></div>

	</div>
</div>


<div class="col">
	<div class="card" id="card1" style="height:44vh; width:17vw;">
		<span class="personalhead" id="personalhead2">Recents</span>
		<div>
			<br>
			Leave without Pay 
			<br>

			<h2><?php
			$formattedNumber = sprintf("%02d", $lwp);
			echo $formattedNumber;?></h2>
		</div>
		
		<div>
			<br>
			Latest Leave Date :
			<br>
			<h2><?php

				$stat = "SELECT start_date from leave_requests where employee_id = ".$_SESSION['employee_id']." and status = 'Approved' order by start_date DESC LIMIT 1";
				$run = mysqli_query($conn, $stat);
				if($run->num_rows > 0){
				$row = mysqli_fetch_object($run);

			$date = $row->start_date;
			echo $date;}
			else{
				echo "No Leaves Yet!";}?><h2>
		</div>
	</div>
</div>
</div>

</div>
</div>
</div>

<div id="Modal" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title" style="padding-left: 2vh;">Apply for a Leave</h5>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div>
           <label for="Leave">Type:</label>
          </div>
			<div>
				<select id="Leave" name="Leave" class="input_div" required>
					<option hidden disabled selected value> -Select An Option- </option>
					<option value="Casual">Casual Leave</option>
					<option value="Sick ">Sick Leave</option>
					<option value="Half">Half Leave</option>
					<option value="Paid">Paid Leave</option>
					<option value="lwp">Leave without Pay</option>
				</select>
			</div>
           <div>
            <label>Start Date</label>
          </div>
          <div>
            <input type="date"  class="input_div" name="start" required>
         </div>
           <div>
            <label>End Date</label>
          </div>
          <div>
            <input type="date"  class="input_div" name="end" required>
         </div>
          <div>
            <label>Reason</label>
          </div>
          <div>
          	<textarea  class="input_div" name="reason"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-outline-dark" name="apply" value="Apply">
        </div>
      </form>
    </div>
  </div>
</div>

<?php 

	if(isset($_POST['apply'])){
		$start  	 = $_POST['start'];
		$end      = $_POST['end'];
		$reason  = $_POST['reason'];
		$type  			 = $_POST['Leave'];
		if($type == 'Half') $end = $start;
		if($type != "lwp"){
			$lea = ['Half'=>'hl','Sick'=>'sl','Paid'=>'pl','Casual'=>'cl'];
			$last_q = "SELECT ".$lea[$type]." as num from leave_type where emp_id = ".$_SESSION['employee_id'];
			$last_run = mysqli_query($conn, $last_q);
			$last_fetch = mysqli_fetch_object($last_run);
			$diff = date_diff(date_create(date('Y-m-d', strtotime($end))),date_create(date('Y-m-d', strtotime($start))))->days + 1;
			if($diff > $total - $last_fetch->num){
				?><script> 
    customAlert.alert("<?php echo "Exceeded Leaves Limit for ".$type." type!" ?>");
</script> 
<?php  header('refresh:2;');
			}
			else{
				$stat = "INSERT INTO leave_requests (employee_id, status, start_date, end_date, reason, type) VALUES (".$_SESSION['employee_id']." ,'Pending' ,'".$start."', '".$end."', '".$reason."', '".$type."' )";
				$quer = mysqli_query($conn, $stat);
				header('location:Leaves.php');
			}
		}
		else{
			$stat = "INSERT INTO leave_requests (employee_id, status, start_date, end_date, reason, type) VALUES (".$_SESSION['employee_id']." ,'Pending' ,'".$start."', '".$end."', '".$reason."', '".$type."' )";
			$quer = mysqli_query($conn, $stat);
			header('location:Leaves.php');
		}
	}



 ?>

<?php }
else{
	header('location:index.php');
}
?>