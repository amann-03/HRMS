<?php session_start();
    ob_start();

require_once('C:\xampp\htdocs\hrms\config.php'); 
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
    <title>Performance</title>
     <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="../CSS/scroll.css">
    <link rel="stylesheet" href="Alert/alert.css">
    <link rel="stylesheet" href="attlist.css">
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
        <?php require_once('sidebar.php'); ?>
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
<span style="position: absolute; left: 1vw;"><a href="Att_stat.php"><button class="interval">Statistics</button></a><button class="interval" id="per">Approval</button></span>
<br>
<br>
<form id="form1" method="post">

<span style="float:right; margin: 1vh 0vw;display: flex;">
   
    <select class="interval" name="interval" class="input_div" >
                    <option hidden disabled selected value> -Filter by time- </option>
                    <option value="on_time">Before 9:15</option>
                    <option value="late">After 9:15</option>
                    <option value="all">All Time</option>
                </select>
 <button class="subbutton" type="submit" name="filter" style="width:4vw ;margin-right: 38vw;" >Filter</button>
<button class="subbutton" type="submit" name="approve">Approve</button>

  <button class="subbutton"type="submit" name="late">Late Punch IN</button></span>

<div role= "document", style= "width : 81vw; height: 81vh; overflow: auto; font-family: 'DM sans'; background: inherit;">

  <?php 

    date_default_timezone_set('Asia/Calcutta');
    $var = '>';
    $tt = date('Y-m-d 11:00:00');
    if(isset($_POST['filter'])){
        $time = $_POST['interval'];
        if($time != 'all'){
            $tt = date('Y-m-d 09:15:00');
            if($time == 'on_time'){
                $var = '<';
            }
            else $var = '>';
        }
    }

 ?>

<?php 

    $hr1 = "SELECT employee.employee_id, date_attendance, name, designation, punch_in_time, remark from attendance join employee on employee.employee_id = attendance.employee join emp_depart on emp_depart.employee_id = attendance.employee where status = 'Pending' and punch_in_time ".$var." '".$tt."' and date_attendance = '".date('Y-m-d')."' " ;
    $run1 = mysqli_query($conn, $hr1);

 ?>

<table id="example" class="display" style="width:100%,">
        <thead>
            <tr>
                <th><input id="select-all" type="checkbox"/></th>
                <th>ID</th>
                <th></th>
                <th>Employee</th>
                <th>Role</th>
                <th>Punch-in-time</th>
                <th>Date</th>
                <th>Remarks</th>
               
            </tr>
        </thead>
        <tbody>

            <?php while($row1 = mysqli_fetch_object($run1)) {?>
            <tr>
                 <th><input type="checkbox" name='check[]' value=<?php echo $row1->employee_id; ?> style="float: left;" /></th>
                <td><?php echo $row1->employee_id; ?></td>
                <td></td>
                <td><?php echo $row1->name; ?></td>
                <td><?php echo $row1->designation; ?></td>
                <td><?php echo date("h:i:s A", strtotime($row1->punch_in_time)); ?></td>
                <td><?php echo date("d/m/y", strtotime($row1->date_attendance));?></td>
                <td><?php echo $row1->remark; ?></td>
                
            </tr> 
            <?php } ?>
           </tbody>
       </table>
      

</div>
<br> 


</form>
<script> new DataTable('#example',{
    ordering:false,
     columns: [{ searchable: false }, { searchable: false }, { searchable: false }, null, { searchable: false }, { searchable: false }, { searchable: false },null]
});

</script>
<?php
$var = 'Att_list.php';
$dt = date('Y-m-d');
if (isset($_POST['approve'])) {
    $num = 0;
    if(!empty($_POST['check'])){
        foreach( $_POST['check'] AS $value){
            $num++;
            $hr2 = "UPDATE attendance set status = 'Approved' where employee = ".$value." and date_attendance = '".$dt."' ";
            $run2 = mysqli_query($conn, $hr2);
        }
    }
?><script> 
    customAlert.alert("<?php echo $num." employees attendance marked as Approved."; ?>");
</script> 

<?php  header('refresh:2;'); }

if (isset($_POST['late'])) {
    $num = 0;
    if(!empty($_POST['check'])){
        foreach( $_POST['check'] AS $value){
            $num++;
            $hr3 = "UPDATE attendance set status = 'Late Punch-in' where employee = ".$value." and date_attendance = '".$dt."' ";
            $run3 = mysqli_query($conn, $hr3);
        }
    }
?>
    <script>
    customAlert.alert("<?php echo $num." employees attendance marked as Late Punched-in."; ?>");
</script> 

<?php header('refresh:2;');}?>

</div>

<?php  }?>