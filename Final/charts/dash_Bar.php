<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

 <canvas id="graph2" aria - label="chart" height="240px" width="400px"></canvas>

<script>

var xValues = [];
var yValues = [];

var chrt = document.getElementById("graph2").getContext('2d');
const gradientBG= chrt.createLinearGradient(0,0,0,240);
gradientBG.addColorStop(1,'rgba(25,110,132,0.75)');
gradientBG.addColorStop(0.1,'rgba(25,45,120,0.9)');
var barcolors = [];

  <?php 

    $stat = "SELECT start_date, deadline, project_name from project join project_employees on project_employees.project_id = project.project_id where employee_id = ".$_SESSION['employee_id']." order by deadline ASC";
    $quer = mysqli_query($conn, $stat);

    while($run = mysqli_fetch_object($quer)){
        $diff = date_diff(date_create($run->deadline),date_create($run->start_date))->days;
 ?>
xValues.push('<?php echo $run->project_name; ?>');
yValues.push('<?php echo $diff; ?>')
barcolors.push(gradientBG);

<?php } ?>
yValues.push(0);
const gradientLast= chrt.createLinearGradient(0,0,0,240);
gradientLast.addColorStop(1,'rgba(125,110,32,0.75)');
gradientLast.addColorStop(0.1,'rgba(135,45,20,0.9)');

barcolors[barcolors.length - 1] = gradientLast; 

      var graph = new Chart(chrt, {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
    borderColor: "rgba(255, 255, 255, 1)",
    borderWidth: 2,
    hoverBackgroundColor: "rgba(25,99,132,0.4)",
    hoverBorderColor: "rgba(25,44,132,1)",

      backgroundColor: barcolors,
      data: yValues


    }]
  },
  options:{
    responsive: true,
    legend:{
      display:false,
      position:'right',
      align:'start'
    },
   scales:{
    yAxes:[{
      display:true,
      gridLines: {
                display:true
            },

    }],
    xAxes:[{
      display:false
    }],

   },

  }
});
</script>



</body>
</html>
