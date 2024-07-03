<link rel="stylesheet" type="text/css" href="_CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=1.1">
<link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>

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

<div class="col"> <div class="card"id ="card1">
		<div class="chart_container"><?php require_once('charts/Pie_chart_Dashboard.php') ?></div>
		
</div>
</div>
	<div class="col"> <div class="card" id="card2">
		<div class="chart_container"><?php require_once('charts/dash_Bar.php') ?></div>
		 <div>
         <ul class="list-group" id="dashboardlist">
			<li class="list-group-item">Project Name :</li>
			<li class="list-group-item">Client Name :</li>
			<li class="list-group-item">Domain :</li>
         
		</div>
         
        
	</div>
</div>
</div>
<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-body">
							card 1
						</div>
					</div>
				</div>
				<div class="col"> <div class="card">
					<div class="card-body">
						card 2
					</div>
				</div>
			</div>
			<div class="col"> <div class="card">
				<div class="card-body">
					card 3
				</div>
			</div>
		</div>
</div>
</div>
</div>
</div>