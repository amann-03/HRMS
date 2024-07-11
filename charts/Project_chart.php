<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>

 <canvas id="graph" aria - label="chart" height="500px" width="1000px"></canvas>

<script>
var xValues = ["No. of projects assigned", "No. of projects completed","No. of projects ongoing"];
var yValues = [20,10,5];
var barColors = [
  "rgba(23, 232, 145, 1)",
  "rgba(25,190,220,1)",
  "rgba(25,44,212,0.5)"];
// Chart.defaults.font.size = 16;
 var chrt = document.getElementById("graph");
      var graph = new Chart(chrt, {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
    borderColor: "rgba(255, 255, 255, 1)",
    borderWidth: 2,
    hoverBackgroundColor: "rgba(25,99,132,0.4)",
    hoverBorderColor: "rgba(25,44,102,1)",

      backgroundColor: barColors,
      data: yValues


    }]
  },
  options:  {
    responsive:true,
   legend:{
      position:'right',
      align:'start'},
    tooltips:{
        bodyFontSize:16
      }
}
});
</script>



</body>
</html>
 