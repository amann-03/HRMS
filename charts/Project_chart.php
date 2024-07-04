<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>

 <canvas id="graph" aria - label="chart" height="50px" width="100px"></canvas>

<script>
var xValues = ["No. of projects assigned", "No. of projects completed","No. of projects ongoing"];
var yValues = [20,15,13];
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
    hoverBorderColor: "rgba(25,44,132,1)",

      backgroundColor: barColors,
      data: yValues


    }]
  },
  options:  {
    responsive:true,
   
  events: false,
   legend:{
      position:'right',
      align:'start'},
  animation: {
    duration: 500,
    easing: "easeOutQuart",
    onComplete: function () {
      var ctx = this.chart.ctx;
      ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);

        ctx.font =   `18px Verdana`;
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';

      this.data.datasets.forEach(function (dataset) {

        for (var i = 0; i < dataset.data.length; i++) {
          var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
              total = dataset._meta[Object.keys(dataset._meta)[0]].total,
              mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
              start_angle = model.startAngle,
              end_angle = model.endAngle,
              mid_angle = start_angle + (end_angle - start_angle)/2;

          var x = mid_radius * Math.cos(mid_angle);
          var y = mid_radius * Math.sin(mid_angle);

         
            ctx.fillStyle = '#000';
          
          var percent = String(Math.round(dataset.data[i]/total*100)) + "%";
          ctx.fillText(dataset.data[i], model.x + x, model.y + y);
        }
      });               
    }
  }
}
});
</script>



</body>
</html>
 