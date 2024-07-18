<?php 
   // ob_start();
require_once('C:\xampp\htdocs\hrms\config.php'); ?>
<script>if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}</script>
<html>
<link rel="stylesheet" type="text/css" href="../_CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../CSS/scroll.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
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
        <?php require_once('sidebar.php'); ?>
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
  <form class="dropdown-menu p-4" style="width:30vw;"action="" method="post">
    <div class="mb-3">
      <label for="1" class="form-label">Meet Link</label>
      <input name ="url" type="url" class="form-control" id="1" placeholder="https://meetlink.com" required>
    </div>
    <div class="mb-3">
      <label for="2" class="form-label">Agenda</label>
      <input name="agen" type="text" class="form-control" id="2" placeholder="Agenda" required>
    </div>
    <div class="mb-3">
      <label for="3" class="form-label">Date & Time</label>
      <input name="when" type="datetime-local" class="form-control" id="3" required>
    </div>
    <div class="mb-3">
      <label for="4" class="form-label">Expected Duration</label>
      <input name="dur" type="text" class="form-control" id="4" placeholder="Duration in minutes" required>
    </div>
    <div class="mb-3">
      <label for="5" class="form-label">For Project</label>
      <input name="proj" type="text" class="form-control" id="5" placeholder="Enter Project Id" required>
    </div>
    <button type="submit" name ="create" class="btn btn-primary">Create</button>
  </form>
</div></li></ul>
 <?php if(isset($_POST['create'])){ 

      $url = $_POST['url'];
      $agenda = $_POST['agen'];
      $dt = $_POST['when'];
      $dur = $_POST['dur'];
      $proj = $_POST['proj'];

      $ins = "INSERT INTO `meeting_project`(`meeting_url`, `host`, `agenda`, `meet_time`, `meet_proj_id`, `duration`) VALUES ('".$url."', 1, '".$agenda."', '".$dt."', ".$proj.", ".$dur." )";
      $quer = mysqli_query($conn, $ins);

      unset($_POST['create']);
      echo('<div class="alert alert-success alert-dismissible fade show" role="alert" style=" width: 30vw;
    position: absolute;
    left: 25vw;
    top: -9vh;
    z-index: 2;"">
  Meet Scheduled!
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');

      // unset($_POST['create']);
 } ?>
 	
 <div class="card-body">

  <?php 

    $get = "SELECT meeting_url, duration, agenda, meet_time from meeting_project where meet_time between '".date('Y-m-d 00:00:00')."' and '".date('Y-m-d 23:59:59')."' order by meet_time desc";
    $rung = mysqli_query($conn, $get);
    date_default_timezone_set('Asia/Calcutta');
    $dt = date('Y-m-d H:i:s');
    $colors = ['Start'=>'royalblue','Started'=>'green','Completed'=>'grey'];
   ?>
 <ul class="list-group" id="dashboardlist">
            <?php while($rowg= mysqli_fetch_object($rung)){?>

              <?php 
              $var;
              $copy = date('Y-m-d H:i:s', strtotime($rowg->meet_time));
          $min = $rowg->duration;
          $add = date('Y-m-d H:i:s', strtotime(''.$copy.' + '.$min.' minutes'));

          if($dt < $copy)  $var = "Start";
          elseif(strtotime($add) > strtotime($dt)) $var =  "Started";
          else $var = "Completed";
         ?>

          <a><li class="bar-list"><?php echo $rowg->agenda; ?><div class="gu1"><?php echo date('H:i',strtotime($rowg->meet_time)); ?></div></a></li><a href="<?php echo $rowg->meeting_url; ?>" target ="_blank" style = "color: <?php echo $colors[$var]; ?>;"><div style="height: 0px;"class="item1"><?php echo $var; ?></div></a>
    <?php } ?>

         </ul>
         </div>

		</div>


	<div class="col" > <div class="card" id="card2" style=" width:44vw;padding-top: 1vh;">
		
<ul >
 	
 	<li>	
	<div class="dropdown" style="width:40vw;display:inline-flex;justify-content: space-evenly;">
      <h3><i class="bi bi-megaphone"></i></h3>
	<h4><dt>Notices & Announcements</dt></h4>
  <button type="button" id="dropdownMenuButton2"class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
   Create
  </button>
  <form class="dropdown-menu p-4" style="width:35vw" action="" method="post">
    <div class="mb-3">
      <label for="1" class="form-label">Notice Title</label>
      <input type="text" name="title" class="form-control" id="1" placeholder="Title" required>
    </div>
    <div class="mb-7">
      <label for="2" class="form-label">Agenda</label>
      <textarea type="text" name="content" class="form-control" id="2" placeholder="Content"></textarea>
    </div>
    <br>
    <button type="submit" name ="notice"class="btn btn-primary">Create</button>
  </form>
</div></li></ul>
 <?php if(isset($_POST['notice'])){ 
    $content = $_POST['content'];
    $title = $_POST['title'];
    $dt = date('Y-m-d H:i:s');

  $hr8 = "INSERT INTO `notices`(`notice_creator`, `content`, `notice_time`, `title`) VALUES (2, '".$content."', '".$dt."', '".$title."')";
  $run8 = mysqli_query($conn, $hr8);


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

    <?php 

        $stat = "SELECT notice_creator, notice_time, content, title, name from notices join employee on employee.employee_id = notices.notice_creator";
        $quer = mysqli_query($conn, $stat);

       ?>


 <ul class="list-group" id="dashboardlist">
            <?php while($row = mysqli_fetch_object($quer)) {?>

          <a class='not' dataid="<?php echo $row->content; ?>" dtile="<?php echo $row->title; ?>" dtime ="<?php echo date('H:i', strtotime($row->notice_time)); ?>" data-bs-toggle="modal" data-bs-target="#myModal" style="font-weight: 700; border: 0px; cursor: pointer;"><li class="bar-list" style="cursor:pointer;height: 6vh; "><div class="notice"><?php  echo $row->title; ?></div>

            <div class="min"><?php echo date('d/m - H:i', strtotime($row->notice_time)); ?></div> <div class="min notice"><?php echo $row->name; ?></div> </li></a>

    <?php } ?>

         </ul>
         </div>
		
         
        <?php 

          $hr10 = "SELECT name, designation from employee join emp_depart on emp_depart.employee_id = employee.employee_id where joining_date >= '".date('Y-m-01')."' order by joining_date desc limit 5";
          $run10 = mysqli_query($conn, $hr10);


         ?>
	</div>
</div>
</div>
<div class="row">

		<div class="card" style ="width:27vw;margin-left: 1vw;">
			<div class="card-body">
			<h4 class="fw-bolder" style="padding-left:2vw">Newly Joined Employees</h4>
      <div>
        <ul class="list-group" id="dashboardlist">
            <?php while($row10 = mysqli_fetch_object($run10)) {?>

      <a><li class="bar-list" style="height:6vh " ><div class="notice emp"><?php echo $row10->name; ?></div> <div class="min"><?php echo $row10->designation; ?></div></li></a>
    <?php } ?>
         </ul>
      </div> 
			</div>
		</div>
	
	<div class="col"> <div class="card">
		<div class="card-body" style="z-index: 3;">
			<canvas id="myChart2"></canvas>

      <?php 

        $gen = "SELECT count(gender) as gender from employee group by gender";
        $run = mysqli_query($conn, $gen);
        $row = mysqli_fetch_object($run);
        $male = $row->gender;
        $row = mysqli_fetch_object($run);
        $female = $row->gender;

       ?>
    <script>
        const ctx2 = document.getElementById('myChart2');
      
        new Chart(ctx2, {
          type: 'doughnut',
          data: {
            labels: ['Male', 'Female',],
            datasets: [{
              label: '# Employees ',
              data: [<?php echo $female; ?>, <?php echo $male; ?>],
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

<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel" style="color: #252C58"></h4>
                </div>
                <br>
                <div style="background-color: #FFE601">
                <div id="Notice" class="modal-body" >

                </div>
                 <div id="Time" style="margin-left: 50vw"></div> </div>
                 <br>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

  <script>
  $(".not").click(function () {
 
var NoticeId = $(this).attr("dataid"); 
 var Title = $(this).attr("dtile"); 
 var time = $(this).attr("dtime");

 document.getElementById("Notice")
                .innerHTML = NoticeId ;

  document.getElementById("myModalLabel")
                .innerHTML = Title;

   document.getElementById("Time")
                  .innerHTML = time;
});
</script>
