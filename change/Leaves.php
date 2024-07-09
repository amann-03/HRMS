<link rel="stylesheet" type="text/css" href="_CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=1.1">
<link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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
						<?php include('charts/total_leaves.php') ?></div>
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
					<?php include('charts/total_leaves.php') ?></div>
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
				<?php include('charts/total_leaves.php') ?></div>
			</div>
		</div>
	</div>
	<div class="col"> <div class="card card3">
		<div class="card-body">
			Leave without Pay
			<script type="text/javascript">
				var barColors = [
			"rgba(20,20, 20, 0.8)",
			"rgba(120, 120, 120, 0.8)",
			];</script>
			<div class="chart_container">
				<canvas id="graph7" height="350px" width="450px"></canvas>
				<script>var chrt = document.getElementById("graph7").getContext('2d');</script>
			<?php include('charts/total_leaves.php') ?></div>
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
    padding-top: 0;"class="btn btn-success" data-toggle="modal" data-target="#Modal"><h5 class="fw-normal">Request Time Off</h5></button></span>

	<div class="scrollable">
		<table class="table text-center table-hover">
			<thead>
				<tr class="table-light">
					<th>Start Date</th>
					<th>End Date</th>
					<th>Type</th>
					<th>Status</th>
					
				</tr>
				
			</thead>
			<tbody>
			<?php for ($x = 0; $x <= 10; $x++) {?>
			<tr>	
				<td>hi</td>
				<td>helo</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php }?>
			</tbody>
		</table></div>





	</div>
</div>
<div class="col">
	<div class="card" id="card1" style="height:44vh; width:17vw;">
		<span class="personalhead" id="personalhead2">XYZ</span>
		<div>
			<br>
			Leave without Pay :
			<br>

			<h2><?php
			$lwp=7;
			$formattedNumber = sprintf("%02d", $lwp);
			echo $formattedNumber;?></h2>
		</div>
		
		<div>
			<br>
			Recent Leave Date :
			<br>
			<h2><?php
			$date = new DateTime("2023-07-08");
			echo $date->format("d-m-y");?><h2>
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
				<select id="Leave" name="Leave" class="input_div">
					<option hidden disabled selected value> -Select An Option- </option>
					<option value="cl">Casual Leave</option>
					<option value="sl">Sick Leave</option>
					<option value="hl">Half Leave</option>
					<option value="pl">Paid Leave</option>
					<option value="lwp">Leave without Pay</option>
				</select>
			</div>
           <div>
            <label>Start Date</label>
          </div>
          <div>
            <input type="date"  class="input_div" name="dob" required>
         </div>
           <div>
            <label>End Date</label>
          </div>
          <div>
            <input type="date"  class="input_div" name="dob" required>
         </div>
          <div>
            <label>Reason</label>
          </div>
          <div>
          	<textarea  class="input_div" name="reason"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-outline-dark" name="update_details" value="Update">
        </div>
      </form>
    </div>
  </div>
</div>