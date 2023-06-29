<?php
    include "../connection.php";
    $res = mysqli_query($con, "SELECT status FROM stud_attendance WHERE attendanceID='8' AND studentID='22CP301'");

    if ($res === false) {
        echo "Query error: " . mysqli_error($con);
    } else {
        if(mysqli_num_rows($res) == 0) {
            echo "NOT ";
        }
    }
?>
