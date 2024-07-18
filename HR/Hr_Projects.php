<?php ob_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" type="text/css" href="hr_projects.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"/>
 
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
        <?php require_once('sidebar.php'); ?>
    </div>
<div id="content">
    <div class="box1"> <h2>Ongoing Projects</h2>
    <div class="detail" id="Project1">
     <h4>Project 1 name:
        <?PHP  
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "hrms";
        
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
    <div class="box2"> 
    <h3>Add Employees to Project</h3>
            <form action="" method="POST">
                <label for="project_id">Select Project:</label>
                <select name="project_id" id="project_id">
                    <?php
                    $sql = "SELECT project_id, project_name FROM project";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['project_id']}'>{$row['project_id']} - {$row['project_name']}</option>";
                        }
                    }
                    ?>
                </select><br><br>

                <label for="employee_ids">Select Employees:</label>
                <select name="employee_ids[]" id="employee_ids" multiple>
                    <?php
                    $sql = "SELECT employee_id, name FROM employee";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['employee_id']}'>{$row['employee_id']} - {$row['name']}</option>";
                        }
                    }
                    ?>
                </select><br><br>

                <input type="submit" name="add_employees" value="Add Employees">
            </form>
            <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_employees'])) {
            $project_id = $_POST['project_id'];
            $employee_ids = $_POST['employee_ids'];

            foreach ($employee_ids as $employee_id) {
                $sql = "INSERT INTO project_employees (project_id, employee_id) VALUES ('$project_id', '$employee_id')";
                mysqli_query($conn, $sql);
            }
        }
        ?>

    
    
    </div>
    <form action="" method="POST">
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
    header("location:Hr_Projects.php");
}
    
    ?>
  
<form action="" method="POST">
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
        <option value="Rewarded">Give Rewards</option>
        <option value="Not Rewarded">No Rewards</option>
       
        

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
        $sql = "UPDATE project SET comments = '$comments', any_rewards = '$rewards' join project_employees on project.project_id = project_employees.project_id WHERE project_id = '$projectId'";
        mysqli_query($conn, $sql);
        // header("location:Hr_Projects.php");
    }

 ?>

   <div class="box5"><script>
    $(document).ready( function () {
      $('#example').DataTable();
    });
  </script>

<table id="example" width="60vw" >
    <?php
      $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "hrms";
     
     //Create a connection
     $conn = mysqli_connect($servername, $username, $password, $database);
     $sql2 = "SELECT * FROM `project` order by deadline desc";
        $result2 = mysqli_query($conn, $sql2);
    
    
     ?>

    <thead>
        <tr>
            <th>Project ID</th>
            <th>Project Name</th>
            <th>Project Manager</th>
            <th>Client</th>
            <th>Budget</th>
            <th>Dealdine</th>
            <th>Start Date</th>
            
        </tr>
    </thead>
    
           
    <tbody>
        <?php
        while($row2=mysqli_fetch_assoc($result2))
        {
        echo"<tr>";

            echo"<td>".$row2['project_id']."</td>";
            echo"<td>".$row2['project_name']."</td>";
            echo"<td>".$row2['project_manager']."</td>";
            echo"<td>".$row2['client']."</td>";
            echo"<td>".$row2['budget']."</td>";
            echo"<td>".$row2['deadline']."</td>";
            echo"<td>".$row2['start_date']."</td>";
          
       echo "</tr>";
        }
       ?>
    </tbody>
  

</table></div>
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
          
    Enter Deadline:
    
        <input type="datetime-local" name="deadline" required><br><br>
            <input type="text" name="budget" placeholder="Enter Budget" required><br><br>
                           
            <!-- <input type="text" name="employee_id" placeholder="Enter Employee Id..." required><br><br> -->
            <input type="submit" name="create_button" value="Create">

            <input type="reset" value="Reset">


  </div>
</form>
<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create_button"])) {
        // Get the form data
        $projectName = mysqli_real_escape_string($conn, $_POST['project_name']??NULL);
        $projectDomain = mysqli_real_escape_string($conn, $_POST['project_domain']??NULL);
        $clientName = mysqli_real_escape_string($conn, $_POST['client_name']??NULL);
        $projectManagerId = mysqli_real_escape_string($conn, $_POST['project_manager_id']??1);
        $deadline = mysqli_real_escape_string($conn, $_POST['deadline']??NULL);
        $budget = mysqli_real_escape_string($conn, $_POST['budget']??NULL);
        $date = date('Y-m-d'); 

        //$employeeId = mysqli_real_escape_string($conn, $_POST['employee_id']??NULL);

        // Insert the project data into the project table
        $sql = "INSERT INTO project (project_name, domain, client, project_manager, deadline, budget, start_date) VALUES ('$projectName', '$projectDomain', '$clientName', '$projectManagerId', '$deadline', '$budget', '$date')";
        
        // echo $sql; die;

        $run_query = mysqli_query($conn, $sql);
        
        // header("location:Hr_Projects.php");
    }
?>
</div>
  
    
</body>
</html>