<?php session_start();
require_once('connection.php');

if (isset($_SESSION['employee_id'])) { ?>

<link rel="stylesheet" type="text/css" href="_CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=1.1">
<link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<div>
	<div class="upperbar">
		<?php require_once('Common/upperbar.php') ?>
	</div>
	<div class="left-sidebar">
		<?php require_once('Common/left-sidebar.php') ?>
	</div>
	<div class="mainscreen">
		<br>
		<div class="container text-center">
			
<div class="row">

<div class="col">
	<div class="card" id="card2"style="width: 42vw; height: 40vh;">
	<div class="chart_container">	<?php require_once('charts/Project_chart.php') ?></div>
		
</div>
	</div>


<div class="col"> <div class="card"id ="card1"style="width: 30vw; height: 40vh;	">
	<span class="personalhead">	Project Details </span>
	<div class="card-body">
		<ul class="list-group" id="projectlist">
<?php 
	

	$stat1 = "SELECT project_name, deadline, client, budget from project_employees join project on project_employees.project_id = project.project_id where employee_id = ".$_SESSION['employee_id']." order by deadline desc";
	$run_query = mysqli_query($conn, $stat1); 
	$row = mysqli_fetch_object($run_query);

	$dt = date_create(date('Y-m-d', strtotime($row->deadline)));

 ?>
			<li class="list-group-item">Project Name : <?php echo $row->project_name; ?></li>
			<li class="list-group-item">Client Name : <?php echo $row->client; ?></li>
			<li class="list-group-item">Deadline : <?php echo $row->deadline ?></li>
			<li class="list-group-item">Budget : <?php echo $row->budget ?></li>
			<li class="list-group-item">Remaining Time: <?php  $diff = date_diff($dt,date_create(date('Y-m-d'))); echo $diff->format("%a days"); ?></li>
		</ul>
	</div>
</div>
</div>
	
</div>
<div class="row">
	<div style="display: block;"><form class="example" action="" method = "get">
		<input type="text" placeholder="Search.." name="search" required>
		<button type="submit"><i class="fa fa-search"></i></button>
	</form></div>
</div>
<div class="row">
	<div class="col">
<div class="listcontainer" style="width: 73vw; height: 37vh;">
	

	<div class="scrollable">
		<table class="table table-bordered text-center">
			<thead>
				<tr>
					<th>Project Id</th>
					<th>Project Name</th>
					<th>Role</th>
					<th>Due Date</th>
					<th>Status</th>
					<th>Reward</th>
				</tr>
				
			</thead>
			<?php if(!isset($_GET['search'])){ ?>
			<tbody>
			<?php 

				$stat2 = "SELECT project.project_id, any_rewards, project_name, deadline from project join project_employees on project.project_id = project_employees.project_id where employee_id = ".$_SESSION['employee_id']." order by deadline desc" ;

				$run_query2 = mysqli_query($conn, $stat2); 

				while($row2 = mysqli_fetch_object($run_query2)){?>
			<tr>	
				<td><?php echo $row2->project_id ?></td>
				<td><?php echo $row2->project_name ?></td>
				<td></td>
				<td><?php echo $row2->deadline ?></td>
				<td><?php if($row2->deadline < date('Y-m-d')) echo "Completed"; else echo "Ongoing"; ?></td>
				<td><?php if($row2->any_rewards) echo "Rewarded"; else echo "Not rewarded"; ?></td>
			</tr>
			<?php }?>
			</tbody>
			<?php }else{ ?>
			<tbody>
			<?php 

				$filtervalues = $_GET['search'];

				$stat2 = "SELECT project.project_id, any_rewards, project_name, deadline from project join project_employees on project.project_id = project_employees.project_id where employee_id = ".$_SESSION['employee_id']." and CONCAT(project_name) LIKE '%$filtervalues%'" ;

				$run_query2 = mysqli_query($conn, $stat2); 

				while($row2 = mysqli_fetch_object($run_query2)){?>
			<tr>	
				<td><?php echo $row2->project_id ?></td>
				<td><?php echo $row2->project_name ?></td>
				<td></td>
				<td><?php echo $row2->deadline ?></td>
				<td><?php if($row2->deadline < date('Y-m-d')) echo "Completed"; else echo "Ongoing"; ?></td>
				<td><?php echo $row2->any_rewards; ?></td>
			</tr>
			<?php } }?>
			</tbody>

		</table></div>
			</div>
		</div>
	</div>
				
</div>
</div>
</div>

<?php 
} 
else{
  header('location:index.php');
}

?>