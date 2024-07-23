<a href="DashHR.php"><button class="side button" id="<?php if(basename($_SERVER['PHP_SELF'])=="DashHR.php"){echo "per";}
         else {echo "";}?>">Overview</button></a>
<a href="HR_Employee.php"><button class="side button" id="<?php if(basename($_SERVER['PHP_SELF'])=="HR_Employee.php"){echo "per";}
         else {echo "";}?>">Employees</button></a>
<a href="Hr_Projects.php"><button class="side button" id="<?php if(basename($_SERVER['PHP_SELF'])=="Hr_Projects.php"){echo "per";}
         else {echo "";}?>">Projects</button></a>
<a href="Att_stat.php"><button class="side button" id="<?php if(basename($_SERVER['PHP_SELF'])=="Att_stat.php"||basename($_SERVER['PHP_SELF'])=="Att_list.php"){echo "per";}
         else {echo "";}?>">Attendance</button></a>
<a href="hr_payroll1.php"><button class="side button" id="<?php if(basename($_SERVER['PHP_SELF'])=="hr_payroll1.php"){echo "per";}
         else {echo "";}?>">Payroll & Performance</button></a>
<a href="hr_leaves.php"><button class="side button" id="<?php if(basename($_SERVER['PHP_SELF'])=="hr_leaves.php"){echo "per";}
         else {echo "";}?>">Leaves</button></a>
        <a href="../index.php"><button id="logout"  class="side button">Logout</button></a>