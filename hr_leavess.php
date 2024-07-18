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
    <link rel="stylesheet" href="hr_leaves (1).css">
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
            <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "hr_portal";
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // main material here
            $sql = "SELECT department.department_name, 
                           SUM(leave_type.cl + leave_type.sl + leave_type.lwp + leave_type.hl + leave_type.pl) AS total_leaves 
                    FROM emp_depart 
                    JOIN leave_type ON emp_depart.employee_id = leave_type.employee_id 
                    JOIN department ON emp_depart.department_id = department.department_id 
                    GROUP BY department.department_name";
            $result = $conn->query($sql);


            $departmentNames = [];
            $totalLeaves = [];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $departmentNames[] = $row['department_name'];
                    $totalLeaves[] = $row['total_leaves'];
                }
            }

           
            $departmentNamesJS = json_encode($departmentNames);
            $totalLeavesJS = json_encode($totalLeaves);

         
            $conn->close();
            ?>

            const ctx2 = document.getElementById('myChart2');
            
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: <?php echo $departmentNamesJS; ?>,
                    datasets: [{
                        label: '# Leaves',
                        data: <?php echo $totalLeavesJS; ?>,
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                }
            });
        </script>
    </div>

<div id="box3">
    <h3 style="color: blueviolet;">Leave Type Distribution%</h3>
    <canvas id="myChart"></canvas>
    
    <script>
        <?php
       
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "hr_portal";

        
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

       
        $sql = "SELECT SUM(cl) AS total_cl, SUM(sl) AS total_sl, SUM(lwp) AS total_lwp, 
                       SUM(hl) AS total_hl, SUM(pl) AS total_pl 
                FROM leave_type";
        $result = $conn->query($sql);

        
        $totalCL = $totalSL = $totalLWP = $totalHL = $totalPL = 0;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalCL = $row['total_cl'];
            $totalSL = $row['total_sl'];
            $totalLWP = $row['total_lwp'];
            $totalHL = $row['total_hl'];
            $totalPL = $row['total_pl'];
        }

     
        $totalCLJS = json_encode($totalCL);
        $totalSLJS = json_encode($totalSL);
        $totalLWPJS = json_encode($totalLWP);
        $totalHLJS = json_encode($totalHL);
        $totalPLJS = json_encode($totalPL);

       
        $conn->close();
        ?>

        const ctx = document.getElementById('myChart');
        
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Casual', 'Medical', 'Compensatory', 'Maternity', 'Extra Vacation'],
                datasets: [{
                    label: '# Leave Types',
                    data: [<?php echo $totalCLJS; ?>, <?php echo $totalSLJS; ?>, <?php echo $totalLWPJS; ?>, <?php echo $totalHLJS; ?>, <?php echo $totalPLJS; ?>],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
</div>

<script>
    $(document).ready(function () {
        $("#form1 #select-all").click(function(){
            $("#form1 input[type='checkbox']").prop('checked', this.checked);
        });
    });
</script>

<form id="form1" method="post" action="process_leaves.php">
    <h3 id="head">Leave Requests:</h3>
    <div id="box4">
        <input type="checkbox" id="select-all" value="Select All">
        <label for="select-all">Select All</label>
        <input type="submit" name="action" value="Reject">
        <input type="submit" name="action" value="Accept">
    </div>
    <div id="box5">
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
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
                    <th>type</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "hr_portal"; 

                $conn = new mysqli($servername, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "
                    SELECT 
                        employee.name,
                        employee.employee_id,
                        department.department_name,
                        (leave_type.cl + leave_type.sl + leave_type.lwp + leave_type.hl + leave_type.pl) AS total,
                        leave_requests.start_date,
                        leave_requests.end_date,
                        leave_requests.reason,
                        leave_requests.type
                    FROM 
                        employee
                    JOIN
                        department ON employee.department_id = department.department_id
                    JOIN 
                        leave_type ON employee.employee_id = leave_type.employee_id
                    JOIN 
                        leave_requests ON employee.employee_id = leave_requests.employee_id
                    WHERE
                        leave_requests.status = 'Pending'
                ";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
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
                        echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No data found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</form>

<script>
    $(document).ready(function () {
        $("#form1 #select-all").click(function(){
            $("#form1 input[type='checkbox']").prop('checked', this.checked);
        });
    });
</script>

        
      
        

       

    </div>
         
        </div>
           
         
            
        
          
          
        
        
        
        
        
        </div>
