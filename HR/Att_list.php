<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance</title>
     <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="attlist.css">
    <link rel="stylesheet" href="../CSS/scroll.css">
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
</head>
<body>
    <header class="navbar">
       
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
        <button id="per"class="side button">Attendance</button>
        <button   class="side button">Payroll & Performance</button>
        <button  class="side button">Leaves</button>
        <button id="logout"  class="side button">Logout</button>
    </div>
<div id="content">

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

<script>
    
    $(document).ready(function () {
        $("#form1 #select-all").click(function(){
            console.log("hi")
            $("#form1 input[type='checkbox']").prop('checked',this.checked);
        });
    });
</script>
<span style="position: absolute; left: 1vw;"><a href="Att_stat.php"><button class="interval">Stastics</button></a><button class="interval" id="per">Approval</button></span>
<br>
<br>
<form id="form1" method="post">

<span style="float:right; margin: 1vh 0vw;display: flex;">
   
    <select class="interval" name="interval" class="input_div" >
                    <option hidden disabled selected value> -Filter by time- </option>
                    <option value="early">before 9:00</option>
                    <option value="on_time">9:00-9:15</option>
                    <option value="late">After 9:15</option></select>
 <button class="subbutton" type="submit" name="submit2" style="width:4vw ;margin-right: 38vw;" >Filter</button>
<button class="subbutton" type="submit" name="submit2">Accept</button>

  <button class="subbutton"type="submit" name="submit1">Late Punch IN</button></span>

<div role= "document", style= "width : 81vw; height: 81vh; overflow: auto; font-family: 'DM sans'; background: inherit;">


<table id="example" class="display" style="width:100%,">
        <thead>
            <tr>
                <th><input id="select-all" type="checkbox"/>  Select all</th>
                <th>Employee</th>
                <th>Role</th>
                <th>Punch-in-time</th>
                <th>Date</th>
                <th>Remarks</th>
               
            </tr>
        </thead>
        <tbody>
            <?php for($x=0;$x<45;$x++) {?>
            <tr>
                 <th><input type="checkbox" name='check[]' value=<?php echo $x; ?> style="float: left;" />ID</th>
                <td>Name <?php echo $x; ?></td>
                <td>worker<?php echo $x; ?></td>
                <td><?php echo date("h:i:s A")?></td>
                <td><?php echo date("d/m/y")?></td>
                <td>Text</td>
                
            </tr> 
            <?php } ?>
           </tbody>
       </table>
      

</div>
<br> 


</form>
<script> new DataTable('#example',{
    ordering:false,
     columns: [{ searchable: false }, null, { searchable: false }, { searchable: false }, { searchable: false },null]
});

</script>
<?php
if (isset($_POST['submit1'])) {
    if(!empty($_POST['check'])){
    foreach( $_POST['check'] AS $value){
        echo $value."<br>";
    }}
}
if (isset($_POST['submit2'])) {
    if(!empty($_POST['check'])){
    foreach( $_POST['check'] AS $value){
        echo $value."<br>";
    }}
}
  ?>

</div>