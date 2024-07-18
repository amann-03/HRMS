<a href="DashHR.php"><button class="side button" id="<?php if(basename($_SERVER['PHP_SELF'])=="DashHR.php"){echo "per";}
         else {echo "";}?>">Overview</button></a>
<a href=""><button class="side button" id="<?php if(basename($_SERVER['PHP_SELF'])==""){echo "per";}
         else {echo "";}?>">Employees</button></a>
<a href=""><button class="side button" id="<?php if(basename($_SERVER['PHP_SELF'])==""){echo "per";}
         else {echo "";}?>">Projects</button></a>
<a href=""><button class="side button" id="<?php if(basename($_SERVER['PHP_SELF'])==""){echo "per";}
         else {echo "";}?>">Onboarding</button></a>        
<a href="Att_stat.php"><button class="side button" id="<?php if(basename($_SERVER['PHP_SELF'])=="Att_stat.php"||basename($_SERVER['PHP_SELF'])=="Att_list.php"){echo "per";}
         else {echo "";}?>">Attendance</button></a>
<a href=""><button class="side button" id="<?php if(basename($_SERVER['PHP_SELF'])==""){echo "per";}
         else {echo "";}?>">Payroll & Performance</button></a>
<a href=""><button class="side button" id="<?php if(basename($_SERVER['PHP_SELF'])==""){echo "per";}
         else {echo "";}?>">Leaves</button></a>
        <a href=""><button id="logout"  class="side button">Logout</button></a>