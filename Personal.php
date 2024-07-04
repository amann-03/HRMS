<link rel="stylesheet" type="text/css" href="_CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=1.1">
<link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
<div>
	<div class="upperbar">
<?php require_once('Common/upperbar.php') ?>
	</div>
<div>
	<div class="left-sidebar">
<?php require_once('Common/left-sidebar.php') ?>
	</div>
<div class="mainscreen">
<br>	
<div class="container text-center">
<div class="row">
<div class="col"><div class="col">
 <div class="card"id ="card1"  style="height: 83vh;">
 			<img class="card-img-top" src="Photo/image 5.png" alt="Card image cap">
	<div class="card-body">
				<h3 class="fw-bolder">Name<?php$name?></h3>
				<br>
				<span class="title">at work for : <?php$join-$current?></span>
				<br>
				<h3>Team Members<h3>
				<ul class="list-group" id="projectlist">
					<br>
			<li class="list-group-item">Person1</li>
			<li class="list-group-item">Person2</li>
			<li class="list-group-item">Person3</li>
		</ul>
	</div>
</div></div></div>
	
<div class="col"><div class="row">
	 <div class="card" id="card2" style="height: 49vh;">
	 	<span class="personalhead" id="personalhead2">	Personal Details </span>
	 	<div class="card-body">
	 		


				<?php
				$rows=array("Name"=>"#","ID"=>"#","Date of Birth"=>"#","Gender"=>"#","Email"=>"#","Phone no."=>"#","address"=>"#");
				?>

					<table style="width: 100%;">
				<?php
				foreach ($rows as $key => $value): ?>
					  <tr id="<?= $key ?>">
					    <th><?= $key ?></th>
					    <td><?= $value ?></td>
					  </tr>
					  <?php endforeach; ?>
					</table>

		</div>
	</div></div>
	<div class="row">
	 <div class="card" id="card2" style="height: 32vh;">
		<span class="personalhead" id="personalhead3"> Company Details </span>
	 	<div class="card-body">
	 		


				<?php
				$rows=array("Department"=>"#","postion"=>"#","status"=>"#","project"=>"#");
				?>

					<table style="width: 100%;">
				<?php
				foreach ($rows as $key => $value): ?>
					  <tr id="<?= $key ?>">
					    <th><?= $key ?></th>
					    <td><?= $value ?></td>
					  </tr>
					  <?php endforeach; ?>
					</table>

		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
