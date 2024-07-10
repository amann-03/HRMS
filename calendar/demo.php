<?php
// PHP code to prepare data
$leave = [
    ['date' => '2024-07-09'],
    ['date' => '2024-07-10']
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Leave Calendar</title>
</head>
<body>
    <table>
        <!-- HTML table to hold the calendar -->
        <tr>
            <td id="cell1"></td>
            <td id="cell2"></td>
            <!-- more cells as needed -->
        </tr>
    </table>
    
    <script>
        // JavaScript code to manipulate the DOM
        let leave = <?php echo json_encode($leave); ?>;
        let date = new Date().getDate();
        let year = new Date().getFullYear();
        let month = new Date().getMonth(); // zero-based month

        for (let i = 0; i < leave.length; i++) {
            let leaveDate = new Date(leave[i].date);
            if (date === leaveDate.getDate() &&
                year === leaveDate.getFullYear() &&
                month === leaveDate.getMonth()) {
                document.getElementById('cell1').className = "date-picker selected leave";
            }
        }
    </script>
</body>
</html>
