<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>

<div style="width: 100%;
  height: 100%;
  position: absolute;
  top: 40%;
  left: 0;
  z-index: -1;
  ">
<h4 class="chart_in"><?php echo $man1?></h4>
<h4 class="chart_in">/<?php echo $total;?></h4>
</div>


<script>
var xValues = ["Taken", "Remaining"];
var yValues = [<?php echo $man1;?> ,<?php echo $total - $man1;?> ];

// graph.defaults.font.size = 16;
 

      var graph = new Chart(chrt, {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
    borderColor: "rgba(255, 255, 255, 1)",
    borderWidth: 2,
    borderRadius: 10,
     hoverBackgroundColor: true,
    // hoverBorderColor: "rgba(2,4,0,1)",

      backgroundColor: barColors,
      data: yValues,

    }]
  },
options:  {
    responsive:true,
   legend:{
    display:false,
      position:'top',
      align:'center'},
    tooltips:{
        bodyFontSize:16
      },
    cutoutPercentage:70,
}
});

</script>



</body>
</html>
