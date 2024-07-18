<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance</title>
    <link rel="stylesheet" href="hr_payroll1.css">
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
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
        <?php require_once('sidebar.php'); ?>
    </div>
<div id="content">
<div id="box1"><a href="hr_payroll1.html" id="lin">Analysis</a></div>
<div id="box2"id="lin"></div>
<div id="box3"><h4 class="text">Average Salary of employees<br><br> 1,740 $</h4> </div>
<div id="box4"><h4 class="text">Average Salary of employees<br><br> 1,740 $</h4> </div>
<div id="box5"><h4 class="text">Average Salary of employees<br><br> 1,740 $</h4> </div>
<div id="box6"><h4 class="text">Average Salary of employees<br><br> 1,740 $</h4> </div>
<div id="box7"><h4 class="text">Average Salary of employees<br><br> 1,740 $</h4> </div>
<div id="box8"><h2>Budget across departments</h2>
    <div id="bar2">
    <canvas id="myChart2"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
      <script>
    <?php
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hrms";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch department names and budgets from the database
    $sql = "SELECT department_name, budget FROM department";
    $result = $conn->query($sql);

    // Initialize arrays to hold department names and budget values
    $departmentNames = [];
    $budgets = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $departmentNames[] = $row['department_name'];
            $budgets[] = $row['budget'];
        }
    }

    // Convert PHP arrays to JavaScript arrays
    $departmentNamesJS = json_encode($departmentNames);
    $budgetsJS = json_encode($budgets);

    // Close the connection
    $conn->close();
    ?>

    const ctx2 = document.getElementById('myChart2');
    
    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: <?php echo $departmentNamesJS; ?>,
            datasets: [{
                label: '# Budget',
                data: <?php echo $budgetsJS; ?>,
                borderWidth: 1
            }]
        },
    
   
    options: {
                plugins: {
                    legend: {
                        display: true,
                        position: 'right',
                        align: 'center',
                        labels: {
                            boxWidth: 20,
                            padding: 20
                        }
                    }
                },
                layout: {
                    padding: {
                        right: 70
                    }
                }
            }
        });
</script>
</div>
</div> 
<div id="box9">
    <div id="bar"></div>
        <canvas id="myChart"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
          <script>
    <?php
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hrms";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch project names and budgets from the database
    $sql = "SELECT project_name, budget FROM project";
    $result = $conn->query($sql);

    // Initialize arrays to hold project names and budget values
    $projectNames = [];
    $budgets = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $projectNames[] = $row['project_name'];
            $budgets[] = $row['budget'];
        }
    }

    // Convert PHP arrays to JavaScript arrays
    $projectNamesJS = json_encode($projectNames);
    $budgetsJS = json_encode($budgets);

    // Close the connection
    $conn->close();
    ?>

    const ctx = document.getElementById('myChart');
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo $projectNamesJS; ?>,
            datasets: [{
                label: 'Budget allocated to different projects',
                data: <?php echo $budgetsJS; ?>,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend : {
                    labels : {
                        font : {
                            size : 20
                        }
                    }
                }
            }
        }
    });
</script>
</div>
