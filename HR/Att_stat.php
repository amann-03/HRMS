
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
        <button class="side button">Overview</button>
        <button class="side button">Employees</button>
        <button class="side button">Projects</button>
        <button  class="side button">Onboarding</button>
        <button class="side button" id="per">Attendance</button>
        <button  class="side button">Payroll & Performance</button>
        <button  class="side button">Leaves</button>
        <button id="logout"  class="side button">Logout</button>
    </div>
<div id="content" >
<span style="position: absolute; left: 1vw;"><button class="interval" id="per">Stastics</button><a href="Att_list.php"><button class="interval">Approval</button></a></span>
<div id="box6">
<br><br><br>
<ul class="stat">
            <li >Employees Present :<br><div class="bar-list">9 </div></li>
            <li > On time :          <br><div class="bar-list">9</div></li>
            <li >Absent              <br><div class="bar-list">9</div></li>
            <li >Late Arrival:      <br><div class="bar-list">9</div></li>
         </ul></div>

<div id="box8">% attendance 
    <div id="bar2">
    <canvas id="myChart2"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx2 = document.getElementById('myChart2');
      
        new Chart(ctx2, {
          type: 'line',
          data: {
            labels: ['date', 'date','date','date'],
            datasets: [{
              label: '# Employees ',
              data: [12, 19,5,9],
              borderWidth: 1,
              tension: 0.3,
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
<div id="box9">Department wise attendance
    <div id="bar">
        <canvas id="myChart"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');
          
            new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                  label: 'Department wise attendance',
                  data: [100, 22, 43, 35, 82, 10],
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


<table id="example1" class="display" style="width:78vw;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Role</th>
                <th>Department</th>
                <th>Punch-Time</th>
            </tr>
        </thead>
        <tbody>
            <?php for($x=0;$x<15;$x++) {?>
            <tr>
                 <td>ID</td>
                <td>Name <?php echo $x; ?></td>
                <td>worker</td>
                 <td>Text</td>
                <td><?php echo date("h:i:s A")?></td>
                
               
                
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