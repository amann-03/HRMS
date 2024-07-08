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
    
        . "ON project.project_id = employee.employee_id;";
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
    <div class="box3"><h3> Change Deadline?</h3>
        Select Project Id: <br>
        <select id="ProjectId"> 
            <option value="1234">1234</option>
            <option value="5678">5678</option>
           <option value="1536">1536</option>
             <option value="1456">1456</option>
            

        </select>
         
        
            <textarea name="t1" rows="10" cols="20"placeholder="Reason to change deadline or drop.." id="Reason"></textarea>
            <input type="text" placeholder="Enter date: DD/MM/YYYY" id="Deadline_date"><br>
            <input type="button" value="Change Deadline" class="deadline_button">
            <input type="button" value="Delay project"class="deadline_button2">

        </div>

    
    
    
  

   <div class="box4"><h3>Complete Project?</h3>
  

    Select Project Id: <br>
    <select id="ProjectId"> 
        <option value="1234">1234</option>
        <option value="5678">5678</option>
       <option value="1536">1536</option>
         <option value="1456">1456</option>
        

    </select>
    
    <textarea name="t1" rows="10" cols="20"placeholder="Comments about project.." id="Reason"></textarea>
    Any Rewards:
    <select id="Deadline_date"> 
        <option value="Give rewards">Give Rewards</option>
        <option value="No Rewards">No Rewards</option>
       
        

    </select>
    
    <input type="button" value="End Project" class="deadline_button">


</div>
   <div class="box5"><h3># List of filtered projects and their details will be shown here</h3></div>
   <div class="box6"><h3>Create a New Project?</h3>
    
    <input type="text" placeholder="Enter Project Name"><br><br>
    Select Project Domain: 
    <select id="PDomain"> 
       
        <option value="Full Stack">Full Stack</option>
        <option value="Machine Learning">Machine Learning</option>
        <option value="Generative AI">Generative AI</option>

    </select><br><br>
    <input type="text" placeholder="Enter Client Name"><br><br>
    <input type="text" placeholder="Type Project Manager Id..."><br><br>
    Enter Deadline:
    <input type="text" placeholder="DD/MM/YYYY"><br>
    <input type="text" placeholder="Enter Budget"><br>
    Select Tech Stack:
    
        <select id="Tech Stack"> 
            
            <option value="Php">Php</option>
            <option value="MERN">MERN</option>
            <option value="Ruby">Ruby</option>

        </select><br>
        <input type="text" placeholder="Enter Employee Id..."><input type="Submit"value="Enter"><br><br><br>
        <p>   <input type="submit">    <input type="reset">  </p>











  </div>
   
</div>
  
    
</body>
</html>