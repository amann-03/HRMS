<html>
<link rel="stylesheet" type="text/css" href="../_CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../CSS/scroll.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" type="text/css" href="dashHR.css">
<link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>


<meta name="viewport" content="width=device-width, initial-scale=1.0">


<body>
 <header class="navbar" >
       
        <img src="indo.png" id="logo" alt="logo">
        <a href id="aboutus">About Us</a>
       
        <select id="Settings"> 
            <option value="Home">Home</option>
            <option value="View Profile">View Profile</option>
            <option value="Configure">Configure</option>
        </select>
    </header>
      
    
       <div class="sidebar">
        <button class="side button"  id="per" >Overview</button>
        <button class="side button">Employees</button>
        <button class="side button">Projects</button>
        <button  class="side button">Onboarding</button>
        <button class="side button">Attendance</button>
        <button  class="side button">Payroll & Performance</button>
        <button  class="side button">Leaves</button>
        <button id="logout"  class="side button">Logout</button>
    </div>

	
	<div id="content">
		  <h2 style="margin-left: 5px;">Welcome HR</h2>
		
			
<div class="row" style="display:inline-flex; width: 84vw;">

 <div class="card" style="width: 33vw;padding-top: 1vh;">
 
 <ul >
 	
 	<li>	
	<div class="dropdown" style="width:30vw;display:inline-flex;justify-content: space-around;">
	<h3><i class="bi bi-calendar-minus"></i></h3>
  <h4><dt>Scheduled Meetings</dt></h4>
  <button type="button" id="dropdownMenuButton2"class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
   Create
  </button>
  <form class="dropdown-menu p-4" action="" method="post">
    <div class="mb-3">
      <label for="1" class="form-label">Meet Link</label>
      <input type="url" class="form-control" id="1" placeholder="https://example.com" required>
    </div>
    <div class="mb-3">
      <label for="2" class="form-label">Agenda</label>
      <input type="text" class="form-control" id="2" placeholder="Agenda" required>
    </div>
    <div class="mb-3">
      <label for="3" class="form-label">Date & Time</label>
      <input type="datetime-local" class="form-control" id="3" required>
    </div>
    <button type="submit" name ="create"class="btn btn-primary">Create</button>
  </form>
</div></li></ul>
 <?php if(isset($_POST['create'])){ 
  echo('<div class="alert alert-success alert-dismissible fade show" role="alert" style=" width: 30vw;
    position: absolute;
    left: 20vw;
    top: 7vh;
    z-index: 2;"">
  Meet Successfully created!
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
 } ?>
 	
 <div class="card-body">

 <ul class="list-group" id="dashboardlist">
            <?php for($x=0;$x<5;$x++) {?>

			<a><li class="bar-list">Meeting Agenda<div class="gu">date time</div></a><a><div class="item">Start</div></a></li>
		<?php } ?>
         </ul>
         </div>

		</div>


	<div class="col" > <div class="card" id="card2" style=" width:44vw;padding-top: 1vh;">
		
<ul >
 	
 	<li>	
	<div class="dropdown" style="width:40vw;display:inline-flex;justify-content: space-around;">
      <h3><i class="bi bi-megaphone"></i></h3>
	<h4><dt>Notices & Announcements</dt></h4>
  <button type="button" id="dropdownMenuButton2"class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
   Create
  </button>
  <form class="dropdown-menu p-4" style="width:35vw" action="" method="post">
    <div class="mb-3">
      <label for="1" class="form-label">Notice Title</label>
      <input type="text" class="form-control" id="1" placeholder="Title" required>
    </div>
    <div class="mb-7">
      <label for="2" class="form-label">Agenda</label>
      <textarea type="text" class="form-control" id="2" placeholder="Content"></textarea>
    </div>
    <br>
    <button type="submit" name ="notice"class="btn btn-primary">Create</button>
  </form>
</div></li></ul>
 <?php if(isset($_POST['notice'])){ 
  echo('<div class="alert alert-success alert-dismissible fade show" role="alert" style=" width: 30vw;
    position: absolute;
    left: -10vw;
    top: 7vh;
    z-index: 2;"">
  Notice Successfully Publsihed!
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
 } ?>
 	
 <div class="card-body">

 <ul class="list-group" id="dashboardlist">
            <?php for($x=0;$x<5;$x++) {?>

			<a class='not' data="notice"><li class="bar-list" style="cursor:pointer; height: 6vh;">Notice Title<br><div class="item">date time</div> <div class="item">Creator</div> </li></a>
		<?php } ?>



         </ul>
         </div>
		
         
        
	</div>
</div>
</div>
<div class="row">

		<div class="card" style ="width:27vw;margin-left: 1vw;">
			<div class="card-body">
			<h4 class="fw-bolder" style="padding-left:2vw">Newly Joined Employees</h4>
      <div>
        <ul class="list-group" id="dashboardlist">
            <?php for($x=0;$x<5;$x++) {?>

      <a><li class="bar-list" style="height:6vh;">Emp name<br><div class="item">Role</div></li></a>
    <?php } ?>
         </ul>
      </div>
			</div>
		</div>
	
	<div class="col"> <div class="card">
		<div class="card-body" >
			<canvas id="myChart2"></canvas>

    <script>
        const ctx2 = document.getElementById('myChart2');
      
        new Chart(ctx2, {
          type: 'doughnut',
          data: {
            labels: ['Male', 'Female',],
            datasets: [{
              label: '# Employees ',
              data: [12, 9],
              borderWidth: 1,
              fill: {
                target: true,
                above: 'rgba(120,120, 220,0.5)',   // Area will be red above the origin     
                },
                pointRadius:5,
                backgroundColor : ['royalblue','rgb(245,31,93)']
            }]
          },
          options: {
            maintainAspectRatio:false,
            plugins:{
                legend:{
                    position:'top',
                    align:'center',
                    labels: {
                    // This more specific font property overrides the global property
                    font: {
                        size: 20
                    }
                }
                }

            },


  
          }
        });
      </script> 
		</div>
	</div>
</div>
<div class="col">

	

</div>
</div>
<?php require_once('calendar-01/index.html') ?>

</div>
</body>
</html>
  <script>
  $(".not").click(function () {
 var Notice = $(this).attr("data"); 
alert(Notice);
});
</script>