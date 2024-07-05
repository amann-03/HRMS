<link rel="stylesheet" type="text/css" href="_CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="CSS/styles.css?v=1.1">
<link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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
				<h4 class="fw-bolder">Name<?php$name?></h4>
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

<div class="col">

	<div class="row">
	 <div class="card" id="card2" style="height: 49vh;">
	 	<span class="personalhead" id="personalhead2">	Personal Details 
	 	<button type="button" style="position: absolute;
    right: 2vw;
    height: 4vh;
    padding-top: 0;"class="btn btn-dark" data-toggle="modal" data-target="#Modal2">Edit</button>

	 	</span>

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
<?php require_once('popup2.php')?>