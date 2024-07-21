

<script type="text/javascript">
	
// script.js 
// Function to generate a range of 
// years for the year select input
function generate_year_range(start, end) {
    let years = "";
    for (let year = start; year <= end; year++) {
        years += "<option value='" +
            year + "'>" + year + "</option>";
    }
    return years;
}
var leave =[];



<?php 

    $stat = "SELECT start_date, end_date from leave_requests where employee_id = ".$_SESSION['employee_id']." and status = 'Approved' ";

    $quer = mysqli_query($conn, $stat);


    while($run = mysqli_fetch_object($quer)){
        $diff = date_diff(date_create($run->end_date),date_create($run->start_date))->days;
    
 ?>

var no_days = <?php echo $diff; ?>;

startdate = new Date('<?php echo date("m-d-Y", strtotime($run->start_date)); ?>');
for (let i = 0; i <= no_days; i++) {
if(i===0){
    new_date=new Date(startdate.setDate(startdate.getDate()));
leave.push(new_date);
}
else{
    new_date=new Date(startdate.setDate(startdate.getDate()+1));
leave.push(new_date);

 }
}

<?php } ?>

var late = [];

<?php 

    $st = "SELECT date_attendance, status from attendance where employee = ".$_SESSION['employee_id']." and status = 'Late Punch-in' ";
    $qu = mysqli_query($conn, $st);
    while($row = mysqli_fetch_object($qu)){
 ?>

latedate = new Date('<?php echo date("m-d-Y", strtotime($row->date_attendance)); ?>');
late.push(latedate);

<?php } ?>
console.log(late);

// Initialize date-related letiables
today = new Date();
currentMonth = today.getMonth();
currentYear = today.getFullYear();
selectYear = document.getElementById("year");
selectMonth = document.getElementById("month");
 
createYear = generate_year_range(1970, 2050);
 
document.getElementById("year").innerHTML = createYear;
 
let calendar = document.getElementById("calendar");
 
let months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];
let days = [
    "Sun", "Mon", "Tue", "Wed",
    "Thu", "Fri", "Sat"];
 
$dataHead = "<tr>";
for (dhead in days) {
    $dataHead += "<th data-days='" +
        days[dhead] + "'>" +
        days[dhead] + "</th>";
}
$dataHead += "</tr>";
 
document.getElementById("thead-month").innerHTML = $dataHead;
 
monthAndYear =
    document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);
 
// Function to navigate to the next month
function next() {
    currentYear = currentMonth === 11 ?
        currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}
 
// Function to navigate to the previous month
function previous() {
    currentYear = currentMonth === 0 ?
        currentYear - 1 : currentYear;
    currentMonth = currentMonth === 0 ?
        11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}
 
// Function to jump to a specific month and year
function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}
 
// Function to display the calendar
function showCalendar(month, year) {
    let firstDay = new Date(year, month, 1).getDay();
    tbl = document.getElementById("calendar-body");
    tbl.innerHTML = "";
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;
 // console.log('leavelength'+leave.length);
    let date = 1;
    for (let i = 0; i < 6; i++) {
        let row = document.createElement("tr");
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                cell = document.createElement("td");
                cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            } else if (date > daysInMonth(month, year)) {
                break;
            } else {
                cell = document.createElement("td");
                cell.setAttribute("data-date", date);
                cell.setAttribute("data-month", month + 1);
                cell.setAttribute("data-year", year);
                cell.setAttribute("data-month_name", months[month]);
                cell.className = "date-picker";
                cell.innerHTML = "<span>" + date + "</span";
 
                if (
                    date === today.getDate() &&
                    year === today.getFullYear() &&
                    month === today.getMonth()
                ) {
                    cell.className = "date-picker selected";
                }
                for (let i = 0; i < leave.length; i++) {
                	  if(date === leave[i].getDate() &&
                    year === leave[i].getFullYear() &&
                    month === leave[i].getMonth()){

                	cell.className = "leave";
                }
                }
                for (let i = 0; i < late.length; i++) {
                      if(date === late[i].getDate() &&
                    year === late[i].getFullYear() &&
                    month === late[i].getMonth()){

                    cell.className = "late";
                }
            }
                row.appendChild(cell);
                date++;
            }
        }
        tbl.appendChild(row);
    }
 
}
 
 
// Function to get events on a specific date
 
 
// Function to get the number of days in a month
function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}
 
// Call the showCalendar function initially to display the calendar
showCalendar(currentMonth, currentYear);
</script>

