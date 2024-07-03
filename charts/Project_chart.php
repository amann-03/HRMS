<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

 <canvas id="graph" aria - label="chart" height="30px" width="60px"></canvas>

<script>
var xValues = ["No. of projects assigned", "No. of projects completed","No. of projects ongoing"];
var yValues = [20,15,13];
var barColors = [
  "rgba(23, 232, 145, 1)",
  "rgba(25,190,220,0.4)",
  "rgba(25,44,132,1)"];
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
    hoverBorderColor: "rgba(25,44,132,1)",

      backgroundColor: barColors,
      data: yValues


    }]
  },
  options:{
    responsive: true,
    legend:{
      position:'right',
      align:'start'
    }  
            


  }
});
</script>



</body>
</html>
