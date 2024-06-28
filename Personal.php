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
 <div class="card"id ="card1"  style="height: 80vh;">
 			<img class="card-img-top" src="Photo/image 5.png" alt="Card image cap">
	<div class="card-body">
				<p class="fw-bolder">Name<?php$name?></p>
				<span class="title">at work for <?php$join-$current?></span>
	</div>
</div></div></div>
	
<div class="col"><div class="row">
	 <div class="card" id="card2" style="height: 49vh;">
	 	<span class="personalhead">	Personal Details </span>
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
	 <div class="card" id="card2" style="height: 30vh;">
		<span class="personalhead"> Company Details </span>
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
