<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaves</title>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="hr_leaves.css">
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
    <link rel="stylesheet" href="scroll.css">
</head>
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
        <button id="overview">Overview</button>
        <button id="Employees">Employees</button>
        <button >Projects</button>
        <button>Onboarding</button>
        <button>Attendance</button>
        <button>Payroll & Performance</button>
        <button id="Leaves">Leaves</button>
        <button id="logout">Logout</button>
    </div>
    <div id="content">
       
        
        <div id="box2">Departmentwise Leaves This Month
            
            <div id="bar"></div>
            <canvas id="myChart2"></canvas>
            
            <script>
                const ctx2 = document.getElementById('myChart2');
              
                new Chart(ctx2, {
                  type: 'bar',
                  data: {
                    labels: ['IT', 'Marketing','Consulting'],
                    datasets: [{
                      label: '# Leaves ',
                      data: [12, 19,10],
                      borderWidth: 1
                    }]
                  },
                  options: {
                    indexAxis:'y',
                  }
                });
              </script>
        
        
        
        </div>
        
        
        <div id="box3"><h3 style="color: blueviolet;">Leave Type Distribution%</h3>
            <div id="bar2"></div>
                <canvas id="myChart"></canvas>
               
                <script>
                    const ctx = document.getElementById('myChart');
                  
                    new Chart(ctx, {
                      type: 'doughnut',
                      data: {
                        labels: ['Casual', 'Medical', 'Compensatory', 'Maternity', 'Extra Vacation',],
                        datasets: [{
                          label: '# Employees in each department',
                          data: [12, 19, 3, 5, 2,],
                          borderWidth: 1
                        }]
                      },
                      options: {
                        
                      }
                    });
                  </script>
         
              
            </div>
        
        <h3 id="head">Leave Requests:</h3>
            <div id="box4">
                <input type="submit" value="Reject">
                <input type="submit" value="Accept">
                <input type="submit" value="Select All">
    
    
          </div>
        
         <div id="box5"> 


        
            
        <script>
            $(document).ready( function () {
              $('#example').DataTable();
            });
          </script>
        
        <!-- <table id="example" width="82vw" >
        
            <thead>
                <tr>
                    
                    <th>name</th>
                    <th>department</th>
                    <th>employee_id</th>
                   <th>total</th>
                    <th>start_date</th>
                    <th>end_date</th>
                    <th>reason</th>
                </tr>
            </thead>
            <tbody>
                
                
            </tbody>
          
        
        </table> -->
        <table id="example" width="82vw">
        <thead>
            <tr>
                <th>Select</th>
                <th>name</th>
                <th>department</th>
                <th>employee_id</th>
                <th>total</th>
                <th>start_date</th>
                <th>end_date</th>
                <th>reason</th>

            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "hr_portal";  // Replace with your database name

            // Create a connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch the required data
            $sql = "
               SELECT 
                    employee.name,
                    
                    employee.employee_id,
                    department.department_name,
                    (leave_type.cl + leave_type.sl + leave_type.lwp + leave_type.hl + leave_type.pl) AS total,
                    leave_requests.start_date,
                    leave_requests.end_date,
                    leave_requests.reason
                FROM 
                    employee
                JOIN
                     department ON employee.department_id = department.department_id
                JOIN 
                    leave_type ON employee.employee_id = leave_type.employee_id
                JOIN 
                    leave_requests ON employee.employee_id = leave_requests.employee_id";


            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='select_employee[]' value='".htmlspecialchars($row['employee_id'])."'></td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['department_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['employee_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['total']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['start_date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['end_date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['reason']) . "</td>";
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No data found</td></tr>";
            }

            // Close the connection
            $conn->close();
            ?>
        </tbody>
    </table>
    </div>
         
        </div>
           
         
            
        
          
          
        
        
        
        
        
        </div>
