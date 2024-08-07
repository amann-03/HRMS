<!-- index.html -->
 
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, 
                   initial-scale=1.0">
</head>
 
<body>
    <!-- Main wrapper for the calendar application -->
    <div class="wrapper">
        <div class="container-calendar">
            <div id="right">
                <h2 id="monthAndYear"></h2>
                <div class="button-container-calendar">
                    <button id="previous"
                            onclick="previous()">
                          ‹
                      </button>
                    <button id="next"
                            onclick="next()">
                          ›
                      </button>
                </div>
                <table class="table-calendar"
                       id="calendar"
                       data-lang="en">
                    <thead id="thead-month"></thead>
                    <!-- Table body for displaying the calendar -->
                    <tbody id="calendar-body"></tbody>
                </table>
                <div class="footer-container-calendar">
                    <label for="month">Jump To: </label>
                    <!-- Dropdowns to select a specific month and year -->
                    <select id="month" onchange="jump()">
                        <option value=0>Jan</option>
                        <option value=1>Feb</option>
                        <option value=2>Mar</option>
                        <option value=3>Apr</option>
                        <option value=4>May</option>
                        <option value=5>Jun</option>
                        <option value=6>Jul</option>
                        <option value=7>Aug</option>
                        <option value=8>Sep</option>
                        <option value=9>Oct</option>
                        <option value=10>Nov</option>
                        <option value=11>Dec</option>
                    </select>
                    <!-- Dropdown to select a specific year -->
                    <select id="year" onchange="jump()"></select>
                </div>
            </div>
             <div style="float:right;"><div class="dot" style="background-color: #ff00009c;"></div> Late Punch-in  </div> 
             <div style="float:right;"><div class="dot" style="background-color: #ffee00;"></div> Leaves  </div> 
             <div style="float:right;"><div class="dot" style="background-color: #00b300;"></div> Present Day  </div> 
        </div>
    </div>
    <!-- Include the JavaScript file for the calendar functionality -->
   <?php include('calendar.php') ?>
</body>