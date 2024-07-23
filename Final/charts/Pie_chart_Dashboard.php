<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>

 <canvas id="graph" height="350px" width="450px"></canvas>

<script>
<?php 
    function countWeekdaysBetweenDates($startDate, $endDate) {
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);
    $interval = new DateInterval('P1D');
    $period = new DatePeriod($start, $interval, $end);
    
    $weekdays = 0;
    
    foreach ($period as $date) {
        if ($date->format('N') < 6) {
            $weekdays++;
        }
    }
    
    return $weekdays;


}

?>
<?php 

    $first_day = date('Y-m-01');
    $dtt = date('Y-m-d');
    $last_day = date('Y-m-t');
    $count = countWeekdaysBetweenDates($first_day, $dtt);

    $stat = "SELECT status from attendance where employee = ".$_SESSION['employee_id']." and date_attendance between '".$first_day."' and '".$last_day."' "; 
    $quer = mysqli_query($conn, $stat);

    $absent = 0;
    $present = 0;

    while($row = mysqli_fetch_object($quer)){
        if($row->status == "Approved" || $row->status == "Late Punch-in") $present++;
    }

    $absent = $count - $present;

 ?>

var xValues = ["Absent", "Present"];
var yValues = [<?php echo $absent; ?>,<?php echo $present; ?>];
var barColors = [
  "rgba(232, 40, 40, 0.8)",
  "rgba(31, 168, 239, 0.8)",
];
// graph.defaults.font.size = 16;
 var chrt = document.getElementById("graph");
      var graph = new Chart(chrt, {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
    borderColor: "rgba(255, 255, 255, 1)",
    borderWidth: 2,
    borderRadius: 10,
     hoverBackgroundColor: "rgba(125,9,102,0.2)",
    hoverBorderColor: "rgba(25,44,102,1)",

      backgroundColor: barColors,
      data: yValues


    }]
  },
options:  {
    responsive:true,
   legend:{
      position:'bottom',
      align:'center'},
    tooltips:{
        bodyFontSize:16
      }
}
});
</script>



</body>
</html>
