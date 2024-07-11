<?php session_start();

require_once('connection.php');
if (isset($_SESSION['employee_id'])) {
 ?>

<link rel="stylesheet" type="text/css" href="_CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=1.1">
<link rel="stylesheet" type="text/css" href="CSS/scroll.css?v=1.1">
<link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
<script src="jquery-3.7.1.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 <!-- Include all compiled plugins (below), or include individual files as needed -->


<?php 

		$stat = "SELECT cl, sl,pl,hl from leave_type where emp_id = ".$_SESSION['employee_id'];
        $quer = mysqli_query($conn, $stat);

 ?>

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
 <div class="card"id ="card1" >
 	Attedance this Month
	<div class="card-body">
		
		<div class="chart_container"><?php require_once('charts/Pie_chart_Dashboard.php') ?></div>
	</div>
</div>
<div class="card"id ="card1" >
	Leaves
	<div class="card-body">

		<script type="text/javascript"> 
			var barColors = [
  "rgba(22,140, 40, 0.8)",
  "rgba(21, 78, 39, 0.8)",
];</script>
		<div class="chart_container"> 
			<canvas id="graph3" height="350px" width="450px"></canvas>
			<script>var chrt = document.getElementById("graph3").getContext('2d');</script>
			<?php 

				$total = 20;
				if($quer->num_rows > 0){

					$run = mysqli_fetch_object($quer);

			        $cl = $run->cl;
			        $sl = $run->sl;
			        $hl = $run->hl;
			        $pl = $run->pl;

					$man1 = $cl + $sl + $hl + $pl;
				}

				else $man1 = 0;
			require_once('charts/total_leaves.php') ?></div>
	</div>
</div>
</div></div>
	
<div class="col"><div class="row">
	 <div class="card" id="card2">
	 		<h3 style="text-align:left ; padding-left: 2vw; padding-top: 1vh">Scheduled Meetings</h3>
		
		<?php 

			$stat = "SELECT agenda, meet_time, duration from meeting_project join project_employees on project_employees.employee_id = ".$_SESSION['employee_id']." and project_employees.project_id = meet_proj_id order by meet_time DESC" ;
			$run = mysqli_query($conn, $stat);
			$dt = date('d-m-y h:i:s');

		 ?>
					<div class="scrollable" style=" height: 30vh; ">
		<table class= "table" style="text-align: center;" >
		<thead class="table-primary">
				<tr>
					<th style="width:0vw" >Date</th>
					<th>Agenda</th>
					<th>Time</th>
					<th>Duration</th>
					<th>Status</th>
					
				</tr>
				
			</thead>
			<tbody>
			<?php while($row = mysqli_fetch_object($run)){?>
			<tr>
				<td><?php echo date('d/m/y', strtotime($row->meet_time));?></td>
			    <td ><?php echo $row->agenda; ?></td>	
				<td><?php echo date('h:i:s', strtotime($row->meet_time)); ?></td>
				<td><?php echo $row->duration ?></td>
				<td><?php  
					// $data = $row->meet_time;

					$copy = date('d-m-y h:i:s', strtotime($row->meet_time));
					$hours = $row->duration / 60;
					$min = $row->duration%60;
					$add = date('d-m-y h:i:s', strtotime($copy. ' + '.$hours.' hours + '.$min.' minutes'));
					echo $add;
					// die();

					// $data->add(new DateInterval('PTH'.$hours.'M'.$min.'S0')); 
					if($dt < $copy) echo "Upcoming";
					else if($add > $dt) echo "Started";
					else echo "Completed";
			?></td>
							</tr>
			<?php }?>
			</tbody>
		</table></div>
	
	</div></div>
	<div class="row">
	 <div class="card" id="card2">	
	 	<h3 style="text-align:left ; padding-left: 2vw; padding-top: 1vh">Notices</h3>
			
			<div class="scrollable" style="display: flex; height: 30vh; ">
		<table class= "table table-striped table-hover" style="text-align: center;" >
			<thead class="table-primary">
				<tr >
					
					<th>Title</th>
					<th>Creator</th>
					<th style="width:0vw" >Date</th>
					
				</tr>
				
			</thead>
			<tbody>
			<?php for ($x = 0; $x <= 10; $x++) {?>
			<tr >
			    <td>
			    	<a dataid= "<?php echo $x; ?>" data-toggle="modal" data-target="#myModal" class= "view_detail" style="font-weight: 700; border: 0px; cursor: pointer;">
			    Emergency Meeting</a>
			</td>	
				<td>hi</td>
				<td></td>
			</tr>
			<?php }?>
			</tbody>
		</table></div>
		
	</div>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel"></h4>
								</div>
								<div id="Notice" class="modal-body">

								</div>
								 <div class="time">Time</div> 
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>

<script>

  	$(".view_detail").click(function () {
 var NoticeId = $(this).attr("dataid"); 

 document.getElementById("Notice")
                .innerHTML = NoticeId ;
  document.getElementById("myModalLabel")
                .innerHTML = " Title";
   document.getElementsByClassName("time")
                  .innerHTML = "Time";
});



  	</script>
	

<?php }
else{
	header('location:index.php');
}
?>