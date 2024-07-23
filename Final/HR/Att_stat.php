<?php 
   session_start();
require_once('C:\xampp\htdocs\hrms\config.php'); 
if (isset($_SESSION['employee_id'])) {?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance</title>
    <link rel="stylesheet" href="attlist.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
</head>
<body>
    <header class="navbar" >
       
        <img src="indo.png" id="logo" alt="logo">
        <a href id="aboutus">About Us</a>
       
        <select id="Settings"> 
            <option value="Home">Home</option>
            <option value="View Profile">View Profile</option>
            <option value="Configure">Configure</option>
        </select>
    </header>
      
    
       <div class="sidebar">
        <?php require_once('sidebar.php'); ?>
    </div>
<div id="content" >
<span style="position: absolute; left: 1vw;"><button class="interval" id="per">Statistics</button><a href="Att_list.php"><button class="interval">Approval</button></a></span>
<div id="box6">
<br><br><br>
<ul class="stat">
        <?php 

            $hr4 = "SELECT employee_id from employee order by employee_id desc";
            $run4 = mysqli_query($conn, $hr4);
            $row4 = mysqli_fetch_object($run4);
            $total = $row4->employee_id;

            $hr5 = "SELECT status from attendance where date_attendance = '".date('Y-m-d')."'";
            $run5 = mysqli_query($conn, $hr5);
            $on_time = 0;
            $late_arrival = 0;

            while($row5 = mysqli_fetch_object($run5)){
                if($row5->status == 'Approved') $on_time++;
                elseif($row5->status == 'Late Punch-in') $late_arrival++;
            }


         ?>
            <li >Employees Present :<br><div class="bar-list"><?php echo $on_time + $late_arrival; ?> </div></li>
            <li > On time :          <br><div class="bar-list"><?php echo $on_time; ?></div></li>
            <li >Absent              <br><div class="bar-list"><?php echo $total - $on_time - $late_arrival; ?></div></li>
            <li >Late Arrival:      <br><div class="bar-list"><?php echo $late_arrival; ?></div></li>
         </ul></div>

<script type="text/javascript">
stat = [];
dt = [];
 </script>
         <?php 

            $hr7 = "SELECT count(status) as present, date_attendance  from attendance where date_attendance between'".date('Y-m-01')."' and '".date('Y-m-d')."' and status != 'Pending' group by date_attendance";
            $run7 = mysqli_query($conn, $hr7);

            while($row7 = mysqli_fetch_object($run7)){
                ?><script type="text/javascript">
                dt.push('<?php echo $row7->date_attendance; ?>')
                stat.push(<?php echo ($row7->present/$total)*100 ; ?>)
                 </script>
                <?php
            }
          ?>

<div id="box8">% attendance (Monthly)
    <div id="bar2">
    <canvas id="myChart2"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx2 = document.getElementById('myChart2');
      
        new Chart(ctx2, {
          type: 'line',
          data: {
            labels: dt,
            datasets: [{
              label: '% Employees ',
              data: stat,
              borderWidth: 1,
              tension: 0.4,
              fill: {
                target: true,
                above: 'rgba(120,120, 220,0.5)',   // Area will be red above the origin     
                },
                pointRadius:5,
                backgroundColor : 'royalblue'
            }]
          },
          options: {
            maintainAspectRatio:false,
            plugins:{
                legend:{
                    display:false,
                    position:'right',
                    align:'start'
                }

            },

    scales: {
      x: {
        display:false
      },
        y: {
                    beginAtZero: true
                  }
    }
  
          }
        });
      </script> 
</div>
</div> 

<script type="text/javascript">
stat = [];
dt = [];
 </script>

<?php 

            $hr8 = "SELECT count(status) as present, department_name from attendance join emp_depart on emp_depart.employee_id = attendance.employee join department on department.department_id = emp_depart.department_id where date_attendance = '".date('Y-m-d')."' and status != 'Pending' group by department.department_id";
            $run8 = mysqli_query($conn, $hr8);

            while($row8 = mysqli_fetch_object($run8)){
                ?><script type="text/javascript">
                dt.push('<?php echo $row8->department_name; ?>')
                stat.push(<?php echo $row8->present; ?>)
                 </script>
                <?php
            }

?>
<div id="box9">Department wise attendance (Today)
    <div id="bar">
        <canvas id="myChart"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');
          
            new Chart(ctx, {
              type: 'bar',
              data: {
                labels: dt,
                datasets: [{
                  label: 'Department wise attendance',
                  data: stat,
                  borderWidth: 1,
                   backgroundColor: 'rgba(23,15,120,0.7)',
                   borderRadius:40
                }]
              },
              options: {  maintainAspectRatio:false,
            plugins:{
                legend:{
                    display:false,
                }

            },
  
          
                scales: {
                    x:{
                        display:false
                    },
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>

  </div>
  
</div>



<div id="box6" style="height:50vh; position: relative;
    top:-5vh;left:-1    vw;">
<form id="form1" method="post">
<div role= "document", style= "width : 81vw; height: 45vh; overflow-y: scroll; font-family: 'DM sans';">
<?php

    $hr6 = "SELECT employee.employee_id, status, name, designation, punch_in_time from attendance join employee on employee.employee_id = attendance.employee join emp_depart on emp_depart.employee_id = attendance.employee where status != 'Pending' and date_attendance = '".date('Y-m-d')."' " ;
    $run6 = mysqli_query($conn, $hr6);

?>
<table id="example1" class="display" style="width:78vw;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Role</th>
                <th>Status</th>
                <th>Punch-Time</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row6 = mysqli_fetch_object($run6)) {?>
            <tr>
                 <td><?php echo $row6->employee_id; ?></td>
                <td><?php echo $row6->name; ?></td>
                <td><?php echo $row6->designation; ?></td>
                 <td><?php echo $row6->status; ?></td>
                <td><?php echo date("H:i:s", strtotime($row6->punch_in_time)); ?></td>
                
               
                
            </tr> 
            <?php } ?>
           </tbody>
       </table>
      

</div>

</form>
<script> new DataTable('#example1',{
    ordering:false,
    searching: false
});

</script>

</div>
</div>

<?php } ?>