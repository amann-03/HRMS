<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

 <canvas id="graph" aria - label="chart" height="350px" width="450px"></canvas>
<?php $man=15; ?>
<script>
var xValues = ["Absent", "Present"];
var yValues = [<?php echo $man; ?>,15];
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
      backgroundColor: barColors,
      data: yValues


    }]
  },
  options: {
  	maintainAspectRatio: true,
            responsive: true,

  }
});
</script>



</body>
</html>
