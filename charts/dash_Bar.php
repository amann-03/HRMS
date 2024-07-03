<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

 <canvas id="graph2" aria - label="chart" height="250px" width="400px"></canvas>

<script>
var xValues = ["", "","",""];
var yValues = [20,15,13,9,0];
var barColors = [
  "rgba(232, 232, 145, 1)",
  "rgba(251,190,220,1)",
  "rgba(215,44,132,1)",
  "rgba(25,99,132,1)"
  ];

// Chart.defaults.font.size = 16;
 var chrt = document.getElementById("graph2");
      var graph = new Chart(chrt, {
  type: "bar",
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
    responsive: false,
    legend:{
      display:false,
      position:'right',
      align:'start'
    }  
            


  }
});
</script>



</body>
</html>
