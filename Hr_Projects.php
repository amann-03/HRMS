<?php ob_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" type="text/css" href="HR_Projects.css">
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
        <button>Employees</button>
        <button id="projects">Projects</button>
        <button>Onboarding</button>
        <button>Attendance</button>
        <button>Payroll & Performance</button>
        <button>Leaves</button>
        <button id="logout">Logout</button>
    </div>
<div id="content">
    <div class="box1"> <h3>Ongoing Projects</h3>
    <div class="detail" id="Project1">
     <h4>Project 1 name:
        <?PHP  
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "hr_portal";
        
        // Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Die if connection was not successful
        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }
        else{
           // echo "Connection was successful<br>";
        }
        
       // $sql = "SELECT * FROM `project`";
        $sql = "SELECT *\n"

        . "FROM project INNER JOIN employee\n"
    
        . "ON project.project_manager = employee.employee_id;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo $row['project_name'];
        ?></h4>
     <h4>Project ID: <?PHP echo $row['project_id'];?></h4><h4>Project Manager: <?PHP echo $row['name'];?></h4><h4>Client: <?PHP echo $row['client'];?></h4><h4>Project Deadline: <?PHP echo $row['deadline'];?></h4><h4>Project Domain: <?PHP echo $row['domain'];?></h4>
     
    </div>
    <div class="detail" id="Project2">
        <h4>Project 2 name: <?PHP $row = mysqli_fetch_assoc($result);
        echo $row['project_name'];?></h4>
        <h4>Project ID: <?PHP echo $row['project_id'];?></h4><h4>Project Manager: <?PHP echo $row['name'];?></h4><h4>Client: <?PHP echo $row['client'];?></h4><h4>Project Deadline: <?PHP echo $row['deadline'];?></h4><h4>Project Domain: <?PHP echo $row['domain'];?></h4>
       </div>

    </div>
    
    
    
    </div>
    <div class="box2"> <h3>Filter Projects</h3>
        <input type="text" placeholder="Search by Project name..."><br><br><br>
        Domain:
        <select id="Domain"> 
            <option value="All">All</option>
            <option value="Full Stack">Full Stack</option>
            <option value="Machine Learning">Machine Learning</option>
            <option value="Generative AI">Generative AI</option>

        </select><br><br>
        Tech Stack:
        <select id="Tech Stack"> 
            <option value="All">All</option>
            <option value="Php">Php</option>
            <option value="MERN">MERN</option>
            <option value="Ruby">Ruby</option>

        </select><br><br>
        Client:
        <select id=" Client"> 
            <option value="All">All</option>
            <option value="Client 1">Client 1</option>
            <option value="Client 2">Client 2</option>
            <option value="Client 3">Client 3</option>

        </select><br><br>
        Budget:
        <select id="Budget"> 
            <option value="All">All</option>
            <option value="2,00,000$">2,00,000$</option>
            <option value="5,00,000$">5,00,000$</option>
            <option value="7,00,000$">7,00,000$</option>

        </select><br><br>
        Delayed:
        <select id="Delayed"> 
            <option value="Yes">Yes</option>
            <option value="No">No</option>

        </select>


    
    
    </div>
    <form action="Hr_Projects.php" method="POST">
   <div class="box3"><h3> Change Deadline?</h3>
        Select Project Id: <br>
        <select name="project_id" id="ProjectId" > 
        <?PHP  $sql = "SELECT * FROM `project`";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $projectId = htmlspecialchars($row['project_id']);
                $projectName = htmlspecialchars($row['project_name']);
                echo "<option value='$projectId'>$projectId - $projectName</option>";    
                //'<h4>Hello  </h4>'
            }
        } else {
            echo '<option value="">No projects found</option>';

        }
        ?>

        </select>
        
        
            <textarea name="t1" rows="10" cols="20"placeholder="Reason to change deadline or drop.." id="Reason"></textarea>
            <!-- <input type="text" placeholder="Enter date: DD/MM/YYYY" id="Deadline_date"><br> -->
            <input type="date" name="Deadline_date" id="Deadline_date"><br>
            <input type="submit" name="action" value="change_deadline" class="deadline_button">
            <input type="submit" name="action" value="delay_project"class="deadline_button2">

        </div>

        </form>
    
    <?PHP
    //  $servername = "localhost";
    //  $username = "root";
    //  $password = "";
    //  $database = "hr_portal";
     
    //  Create a connection
    //  $conn = mysqli_connect($servername, $username, $password, $database);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectId = $_POST['project_id'];
    $reason = $_POST['t1'];
    $deadlineDate = $_POST['Deadline_date'];
    $action = $_POST['action'];
     
    if ($action == 'change_deadline') {
       $sql = "UPDATE project SET deadline = '$deadlineDate', reason = '$reason' WHERE project_id = '$projectId'";
    } elseif ($action == 'delay_project') {
        $sql = "UPDATE project SET deadline = '$deadlineDate', reason = '$reason', is_delay = 1 WHERE project_id = '$projectId'";
    }
    
    mysqli_query($conn, $sql);
    // if (mysqli_query($conn, $sql)) {
    //   echo "Record updated successfully";
    // } else {
    // echo "Error updating record: " . mysqli_error($conn);
    // }
}
    
    ?>
  
<form action="Hr_Projects.php" method="POST">
<div class="box4"><h3>Complete Project?</h3>
    Select Project Id: <br>
    <select name="project_id" id="ProjectId"> 
    <?PHP  $sql = "SELECT * FROM `project`";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $projectId = htmlspecialchars($row['project_id']);
                $projectName = htmlspecialchars($row['project_name']);
                echo "<option value='$projectId'>$projectId - $projectName</option>";    
            }
        } else {
            echo '<option value="">No projects found</option>';
        }
        ?>

    </select>
    
    <textarea name="t1" rows="10" cols="20"placeholder="Comments about project.." id="Reason"></textarea>
    Any Rewards:
    <select name="rewards" id="Deadline_date"> 
        <option value="Give rewards">Give Rewards</option>
        <option value="No Rewards">No Rewards</option>
       
        

    </select>
    
    <input type="submit" value="End Project" class="deadline_button">

</div>
    </form>
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $projectId = $_POST['project_id'];
        $comments = $_POST['t1'];
        $rewards = $_POST['rewards']??NULL;

        // Construct the SQL query
        $sql = "UPDATE project SET status = 'completed', comments = '$comments', rewards = '$rewards' WHERE project_id = '$projectId'";
        mysqli_query($conn, $sql);
    }

 ?>

   <div class="box5"><h3># List of filtered projects and their details will be shown here</h3></div>
   <form action="Hr_Projects.php" method="POST">
   <div class="box6"><h3>Create a New Project?</h3>
    
    <input type="text" name="project_name" placeholder="Enter Project Name"><br><br>
    Select Project Domain: 
    <select name="project_domain" id="PDomain"> 
       
        <option value="Full Stack">Full Stack</option>
        <option value="Machine Learning">Machine Learning</option>
        <option value="Generative AI">Generative AI</option>

    </select><br><br>
           <input type="text" name="client_name" placeholder="Enter Client Name" required><br><br>
            <input type="text" name="project_manager_id" placeholder="Type Project Manager Id..." required><br><br>
           <!-- Enter Beginning:
     <input type="text" placeholder="DD/MM/YYYY"><br> 
    <input type="datetime-local" name="deadline" required><br><br>-->
    Enter Deadline:
    <!-- <input type="text" placeholder="DD/MM/YYYY"><br> -->
    <!-- <input type="datetime-local"><br><br>
    <input type="text" placeholder="Enter Budget">
   
         <input type="text" placeholder="Enter Employee Id..."> -->
       <!-- <input type="Submit"value="Enter"><br><br><br>
        <p>   <input type="submit">    <input type="reset">  </p> -->
        <input type="datetime-local" name="deadline" required><br><br>
            <input type="text" name="budget" placeholder="Enter Budget" required><br><br>
            <!-- <input type="text" name="employee_id" placeholder="Enter Employee Id..." required><br><br> -->
            <input type="submit" value="Enter">
            <input type="reset" value="Reset">


  </div>
</form>
<?php
    // // Database connection parameters
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "hr_portal";

    // // Create a connection
    // $conn = mysqli_connect($servername, $username, $password, $database);

    // // Check the connection
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $projectName = mysqli_real_escape_string($conn, $_POST['project_name']??NULL);
        $projectDomain = mysqli_real_escape_string($conn, $_POST['project_domain']??NULL);
        $clientName = mysqli_real_escape_string($conn, $_POST['client_name']??NULL);
        $projectManagerId = mysqli_real_escape_string($conn, $_POST['project_manager_id']??1);
        $deadline = mysqli_real_escape_string($conn, $_POST['deadline']??NULL);
        $budget = mysqli_real_escape_string($conn, $_POST['budget']??NULL);
        //$employeeId = mysqli_real_escape_string($conn, $_POST['employee_id']??NULL);

        // Insert the project data into the project table
        $sql = "INSERT INTO project (project_name, domain, client, project_manager, deadline, budget) VALUES ('$projectName', '$projectDomain', '$clientName', '$projectManagerId', '$deadline', '$budget')";
        
        // echo $sql; die;

        $run_query = mysqli_query($conn, $sql);
        
        if($run_query){
            header("location:http://localhost/personal/HRMS07/HRMS-master/Hr_Projects.php"); // if data successfully saved.
            exit();
        } else {
            header("location:http://localhost/personal/HRMS07/HRMS-master/Hr_Projects.php"); // if data not saved.
            exit();
        }
    }
?>
</div>
  
    
</body>
</html>