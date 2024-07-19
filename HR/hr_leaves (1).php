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
        <div id="bar">
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

<script>
    $(document).ready(function () {
        $("#select-all").click(function () {
            $("input[type='checkbox']").prop('checked', this.checked);
        });
    });
</script>

<form id="form1" method="post">
    <h3 id="head">Leave Requests:</h3>
    <div id="box4">
        <input type="checkbox" id="select-all" value="Select All">
        <label for="select-all">Select All</label>
        <input type="submit" name="reject" value="Reject">
        <input type="submit" name="approve" value="Approve">
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
                    
                    <th>start_date</th>
                    <th>end_date</th>
                    <th>reason</th>
                    <th>type</th>
                    <th>leave_id</th>
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

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['approve']) || isset($_POST['reject'])) {
                        $status = isset($_POST['approve']) ? 'Approved' : 'Rejected';
                        if (isset($_POST['select_employee'])) {
                            foreach ($_POST['select_employee'] as $leave_id) {
                                // Update the leave_requests table
                                $update_sql = "UPDATE leave_requests SET status='$status' WHERE leave_id='$leave_id' AND status='Pending'";
                                $conn->query($update_sql);

                                if ($status === 'Approved') {
                                    // Get leave details
                                    $leave_sql = "SELECT employee_id, start_date, end_date, type FROM leave_requests WHERE leave_id='$leave_id'";
                                    $leave_result = $conn->query($leave_sql);

                                    if ($leave_result->num_rows > 0) {
                                        $leave_row = $leave_result->fetch_assoc();
                                        $employee_id = $leave_row['employee_id'];
                                        $start_date = $leave_row['start_date'];
                                        $end_date = $leave_row['end_date'];
                                        $type = $leave_row['type'];

                                        // Calculate the number of leave days
                                        $start = new DateTime($start_date);
                                        $end = new DateTime($end_date);
                                        $interval = $start->diff($end);
                                        $leave_days = $interval->days + 1; // Include the end date

                                        // Map leave type to corresponding column
                                        $leave_column = '';
                                        switch ($type) {
                                            case 'Casual':
                                                $leave_column = 'cl';
                                                break;
                                            case 'Sick':
                                                $leave_column = 'sl';
                                                break;
                                            case 'Half':
                                                $leave_column = 'hl';
                                                break;
                                            case 'Paid':
                                                $leave_column = 'pl';
                                                break;
                                            case 'lwp':
                                                $leave_column = 'lwp';
                                                break;
                                        }

                                        if (!empty($leave_column)) {
                                            // Update or insert the leave_type record
                                            $check_sql = "SELECT * FROM leave_type WHERE employee_id='$employee_id'";
                                            $check_result = $conn->query($check_sql);

                                            if ($check_result->num_rows > 0) {
                                                // Update the existing record
                                                $update_leave_sql = "UPDATE leave_type SET $leave_column = $leave_column + $leave_days WHERE employee_id='$employee_id'";
                                                if (!$conn->query($update_leave_sql)) {
                                                    echo "Error updating record: " . $conn->error;
                                                }
                                            } else {
                                                // Insert a new record
                                                $insert_leave_sql = "INSERT INTO leave_type (employee_id, cl, sl, hl, pl, lwp) VALUES ('$employee_id', 0, 0, 0, 0, 0)";
                                                if ($conn->query($insert_leave_sql)) {
                                                    $update_leave_sql = "UPDATE leave_type SET $leave_column = $leave_days WHERE employee_id='$employee_id'";
                                                    if (!$conn->query($update_leave_sql)) {
                                                        echo "Error updating record: " . $conn->error;
                                                    }
                                                } else {
                                                    echo "Error inserting record: " . $conn->error;
                                                }
                                            }
                                        } else {
                                            //echo "Error: Invalid leave type.";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                $sql = "
                   SELECT 
                        employee.name,
                        employee.employee_id,
                        department.department_name,
                       
                        leave_requests.start_date,
                        leave_requests.end_date,
                        leave_requests.reason,
                        leave_requests.type,
                        leave_requests.leave_id
                    FROM 
                        employee
                    JOIN
                        department ON employee.department_id = department.department_id
                    
                    JOIN 
                        leave_requests ON employee.employee_id = leave_requests.employee_id
                    WHERE
                        leave_requests.status = 'Pending'
                ";

                $result = $conn->query($sql);
               


                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='select_employee[]' value='" . htmlspecialchars($row['leave_id']) . "'></td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['department_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['employee_id']) . "</td>";
                        
                        echo "<td>" . htmlspecialchars($row['start_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['end_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['reason']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['leave_id']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                   // echo "<tr><td colspan='10'>No data found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    <div>
            </div>
</form>
            </div>
      
        
       
            
        
          
          
        
        
        
        
        
        
            </body>
            </html>