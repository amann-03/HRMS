<?php   
session_start();ob_start();
require_once('Alert/alert.php');
if (isset($_SESSION['employee_id'])) {?>

    <script>if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}</script>

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
  <link rel="stylesheet" href="../CSS/scroll.css">
  <link rel="stylesheet" href="Alert/alert.css">
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
    <?PHP  
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "hrms";
        
        // Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        
       // $sql = "SELECT * FROM `project`";
        $sql = "SELECT *\n"

        . "FROM project INNER JOIN employee\n"
    
        . "ON project.project_manager = employee.employee_id where deadline > '".date('Y-m-d')."' order by deadline asc";
        $result = mysqli_query($conn, $sql);
        $it = 1;
    ?>

<div id="content">
    <div class="box1"> <h2>Ongoing Projects</h2>
    <div id="proj">
    <?php if($result->num_rows > 0){ 
        while($row = mysqli_fetch_object($result)){ ?>
    <div class="detail Project1" style=" float: left">
     <h4>Project <?php echo $it++; ?> name: <?php echo $row->project_name; ?>
        </h4>
     <h4>Project ID: <?PHP echo $row->project_id;?></h4><h4>Project Manager: <?PHP echo $row->name;?></h4><h4>Client: <?PHP echo $row->client;?></h4><h4>Project Deadline: <?PHP echo $row->deadline;?></h4><h4>Project Domain: <?PHP echo $row->domain;?></h4>
     </div>
    <?php }}
    else{
        echo 
        "<br><h1>No ongoing Projects</h1>";
    }?>
    </div>
    </div>

    <div class="box2"> 
    <h3>Add Employees to Project</h3>
            <form action="" method="POST">
                <label for="project_id">Select Project:</label>
                <select name="project_id" id="project_id">
                <option hidden disabled selected value> -Select An Option- </option>
                    <?php
                    $sql = "SELECT project_id, project_name FROM project  WHERE deadline > '".date('Y-m-d')."'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['project_id']}'>{$row['project_id']} - {$row['project_name']}</option>";
                        }
                    }
                    ?>
                </select><br><br>

                <label for="employee_ids">Select Employees:</label>
                <select name="employee_ids[]" id="employee_ids" style="height:7vh ;" multiple>
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

            $num = 0;
            foreach ($employee_ids as $employee_id) {
                $sql = "INSERT INTO project_employees (project_id, employee_id) VALUES ('$project_id', '$employee_id')";
                $num++;
                mysqli_query($conn, $sql);
            }

            ?><script> 
            customAlert.alert("<?php echo $num." Employees are added to project having Id : ".$project_id; ?>");
    </script> 

<?php  header('refresh:3;');
        }
        ?>
    </div>

    <form action="" method="POST">
   <div class="box3"><h3> Change Deadline?</h3>
        Select Project Id: <br>
        <select name="project_id" id="ProjectId" > 
        <option hidden disabled selected value> -Select An Option- </option>
        <?PHP  $sql = "SELECT * FROM `project` where deadline > '".date('Y-m-d')."'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $projectId = htmlspecialchars($row['project_id']);
                $projectName = htmlspecialchars($row['project_name']);
                echo "<option value='$projectId'>$projectId - $projectName</option>";    
                //'<h4>Hello  </h4>'
            }

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
       mysqli_query($conn, $sql);
       ?><script> 
    customAlert.alert("<?php echo "For projectId : ".$projectId.", Deadline changed to: ".date('Y-m-d', strtotime($deadlineDate)) ?>");
</script> 

<?php  header('refresh:3;');
} 
    elseif ($action == 'delay_project') {
        $sql = "UPDATE project SET deadline = '$deadlineDate', reason = '$reason', is_delay = 1 WHERE project_id = '$projectId'";
        mysqli_query($conn, $sql);
        ?><script> 
    customAlert.alert("<?php echo "For projectId : ".$projectId.", Project is delayed. Deadline changed to: ".date('Y-m-d', strtotime($deadlineDate)) ?>");
</script> 
<?php  header('refresh:3;');
    }
    
}
    ?>
  
  <form action="hr_projects.php" method="POST">
<div class="box4"><h3>Complete Project?</h3>
    Select Project Id: <br>
    <select name="project_id" id="ProjectId"> 
    <option hidden disabled selected value> -Select An Option- </option>
    <?PHP  $sql = "SELECT * FROM `project` where deadline > '".date('Y-m-d')."' ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $projectId = htmlspecialchars($row['project_id']);
                $projectName = htmlspecialchars($row['project_name']);
                echo "<option value='$projectId'>$projectId - $projectName</option>";    
            }
        } 
        ?>

    </select>
    
    <textarea name="t2" rows="10" cols="20"placeholder="Comments about project.." id="Reason"></textarea>
    Any Rewards:
    <select name="rewards" id="Deadline_date"> 
        <option value="Rewarded">Give Rewards</option>
        <option value="Not Rewarded">No Rewards</option>
       
        

    </select>
    
    <input type="submit" value="End Project" name="end_project" class="deadline_button">

</div>
    </form>
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['end_project'])) {
        // Get the form data
        $projectId = $_POST['project_id'];
        $comments = $_POST['t2'];
        $rewards = $_POST['rewards']??NULL;

        // Construct the SQL query
        $sql = "UPDATE project SET comments = '$comments', deadline = '".date('Y-m-d', )."' WHERE project_id = '$projectId'";
    
        $sql2 = "UPDATE `project_employees` SET `any_rewards` = '$rewards' WHERE `project_id` = '$projectId'";
    
        mysqli_query($conn, $sql);
        mysqli_query($conn, $sql2);
        ?><script> 
    customAlert.alert("<?php echo  "The project having Id : ".$projectId." is completed. It is ".$rewards.". "; ?>");
</script> 
<?php  header('refresh:3;');
    }

 ?>
 

   <div class="box5"><script>
    $(document).ready( function () {
      new DataTable("#example",{
        ordering: false
      })
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
     $sql2 = "SELECT * FROM `project` join employee on employee.employee_id = project.project_manager order by deadline asc";
        $result2 = mysqli_query($conn, $sql2);
     ?>

    <thead>
        <tr>
            <th>Project ID</th>
            <th>Project Name</th>
            <th>Project Manager</th>
            <th>Client</th>
            <th>Budget</th>
            <th>Deadline</th>
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
            echo"<td>".$row2['name']."</td>";
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
        
        ?><script> 
    customAlert.alert("<?php echo "A New project with name '".$projectName."' is created. <br> Kindly add employees to it." ?>");
</script> 

<?php  header('refresh:3;');
    }
?>
</div>
  
<script>
    function callAlert(variable){
        customAlert.alert(variable);
    }
</script>

</body>
</html>
<?php } ?>