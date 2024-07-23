<?php session_start();
if (isset($_SESSION['employee_id'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="HR_Employee.css">
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
    <link rel="stylesheet" href="scroll.css">
</head>
<?php  
    $servername="localhost";
    $username="root";
    $password="";
    $database="hrms";
    $conn=mysqli_connect($servername,$username,$password,$database);
    if(!$conn)
    {
        die("Sorry we failed to connect".mysqli_connect_error());
    }
    else{
        
    }
    $sql="SELECT * FROM employee join department on department.department_id = employee.department_id join emp_depart on emp_depart.employee_id = employee.employee_id";
    $sql2="SELECT * FROM employee WHERE work_status='Work from home'" ;

    $result=mysqli_query($conn,$sql);
    $result2=mysqli_query($conn,$sql2);
    
    $num=mysqli_num_rows($result);
    $num2=mysqli_num_rows($result2);
    

           ?>
<body>
    <header class="navbar">
       
        <img src="indo.png" id="logo" alt="logo">
        <a href>About Us</a>
       
        <select id="Settings"> 
            <option value="Home">Home</option>
            <option value="View Profile">View Profile</option>
            <option value="Configure">Configure</option>
        </select>
    </header>
      
    
       <div class="sidebar">
        <?php require_once('sidebar.php'); ?>
    </div>
<div id="content">
<div id="box1"><h3 id="va"style="color: blue;text-align:center;">Total Employees</h3><br>
<pre id="va" style="font-size:700%; color:blue; text-align:center;">    <?php echo $num;?></pre>
</div>


<div id="box2"><h3 style="color:rgb(115, 30, 130);">WFO/<br>WFH</h3>
    
    <div id="bar">
    <canvas id="myChart2"></canvas>
    
    <script>
        const ctx2 = document.getElementById('myChart2');
      
        new Chart(ctx2, {
          type: 'pie',
          data: {
            labels: ['WFO', 'WFH'],
            datasets: [{
              label: '# Employees ',
              data: [<?php echo $num-$num2;?>, <?php echo $num2;?>],
              borderWidth: 5
            }]
          },
          options: {
            
          }
        });
      </script>
      </div>


</div>

<?php 
  $sql3 = "SELECT department_name,department_id FROM department";
  $result3 = $conn->query($sql3);
   // Initialize arrays to hold department names and budget values
   $departmentNames = [];
   $num3=[];
  while($row=mysqli_fetch_assoc($result3))
  {
    $departmentNames[] = $row['department_name'];
    $d= $row['department_id'];
    $sql4 = "SELECT * FROM employee WHERE department_id=$d";
    $result4 = $conn->query($sql4);
    $num3[]=mysqli_num_rows($result4);
  }
    

   
  

    // Convert PHP arrays to JavaScript arrays
    $Dep_nameJS= json_encode($departmentNames);
    $num3_JS=json_encode($num3);

 
    ?>



<div id="box3">
    <div id="bar">
        <canvas id="myChart"></canvas>
       
        <script>
            const ctx = document.getElementById('myChart');
          
            new Chart(ctx, {
              type: 'bar',
              data: {
                labels: <?php echo $Dep_nameJS; ?>,
                datasets: [{
                  label: '# Employees in each department',
                  data: <?php echo $num3_JS; ?>,
                  borderWidth: 1
                }]
              },
              options: {
                maintainAspectRatio : false,
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>
        </div>
      
    </div>


<div id="box4"><h3 id="va"style="color: green;text-align:center;">Work From Home:</h3><br><br>
<pre id="va" style="font-size:700%; color:green; text-align:center;"> <?php echo $num2;?></pre><br></div>





<div id="box5">
 

    
<script>
    $(document).ready( function () {
      $('#example').DataTable();
    });
  </script>

<table id="example" class="stripe" width="82vw" >

    <thead>
        <tr>
            <th>Employee Id</th>
            <th>Name</th>
            <th>Login Id</th>
            <th>DOJ</th>
            <th>Gender</th>
            <th>Designation</th>
            <th>Contact Number</th>
            <th>Department</th>
            <th>Work Status</th>
        </tr>
    </thead>
    
           
    <tbody>
        <?php
        while($row=mysqli_fetch_assoc($result))
        {
        echo"<tr>";

            echo"<td>".$row['employee_id']."</td>";
            echo"<td>".$row['name']."</td>";
            echo"<td>".$row['login_id']."</td>";
            echo"<td>".date('y/m/d' ,strtotime($row['dob']))."</td>";
            echo"<td>".$row['gender']."</td>";
            echo"<td>".$row['designation']."</td>";
            echo"<td>".$row['phone_number']."</td>";
            echo"<td>".$row['department_name']."</td>";
            echo"<td>".$row['work_status']."</td>";
       echo "</tr>";
        }
       ?>
    </tbody>
  

</table>
 
</div>
   </div>
 
</div>

<?php
$conn->close();
?>
    </body>
</html>

<?php } ?>