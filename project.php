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
			<li class="list-group-item">Project Name :</li>
			<li class="list-group-item">Client Name :</li>
			<li class="list-group-item">Domain :</li>
			<li class="list-group-item">Budget :</li>
			<li class="list-group-item">Details :</li>
		</ul>
	</div>
</div>
</div>
	
</div>
<div class="row">
	<div style="display: block;"><form class="example" action="action_page.php">
		<input type="text" placeholder="Search.." name="search">
		<button type="submit"><i class="fa fa-search"></i></button>
	</form></div>
</div>
<div class="row">
	<div class="col">
<div class="listcontainer" style="width: 73vw; height: 37vh;">
	

	<div class="scrollable">
		<table class="table table-bordered text-center">
			<thead>
				<tr style="background-color: pink;">
					<th>#</th>
					<th>Project Name</th>
					<th>Role</th>
					<th>Due Date</th>
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
	</div>
				
</div>
</div>
</div>