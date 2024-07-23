
<ul class="list-group" id = "side" >
	 <li class="iist-group-item"><a href="dashboard.php"class="list-group-item <?php if(basename($_SERVER['PHP_SELF'])=="dashboard.php"){echo "active";}
	  else {echo "";}?>">Dashboard</a>
  </li>
	<li class="iist-group-item"><a href="Personal.php"class="list-group-item <?php if(basename($_SERVER['PHP_SELF'])=="Personal.php"){echo "active";}
	  else {echo "";}?>">Personal</a>
  </li>
	<li class="iist-group-item"><a href="Schedule.php"class="list-group-item <?php if(basename($_SERVER['PHP_SELF'])=="Schedule.php" || basename($_SERVER['PHP_SELF'])=="attendance.php" || basename($_SERVER['PHP_SELF'])=="Leaves.php"){echo "active";}
	  else {echo "";}?>">Schedule</a>
  </li>
	<li class="iist-group-item"><a href="project.php"class="list-group-item <?php if(basename($_SERVER['PHP_SELF'])=="project.php"){echo "active";}
	  else {echo "";}?>">Project</a>
  </li>
	
</ul>