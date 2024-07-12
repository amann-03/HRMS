<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

 <canvas id="graph2" aria - label="chart" height="240px" width="400px"></canvas>

<script>
var xValues = ["", "","","","","",];
var yValues = [20,17,11,12,11,24,0];
var barColors = 
  "rgba(25,99,132,0.5)"
  ;
 var chrt = document.getElementById("graph2").getContext('2d');
const gradientBG= chrt.createLinearGradient(0,0,0,240);
gradientBG.addColorStop(1,'rgba(25,110,132,0.75)');
gradientBG.addColorStop(0.1,'rgba(25,45,120,0.9)');


      var graph = new Chart(chrt, {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
    borderColor: "rgba(255, 255, 255, 1)",
    borderWidth: 2,
    hoverBackgroundColor: "rgba(25,99,132,0.4)",
    hoverBorderColor: "rgba(25,44,132,1)",

      backgroundColor: gradientBG,
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
