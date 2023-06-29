<?php
    session_start();
    include "../../../connection.php";
    $aid = $_REQUEST["aid"];
    $res = mysqli_query($con, "SELECT studentID FROM stud_attendance WHERE attendanceID = '".$aid."';");
    while ($row = mysqli_fetch_row($res))
    {
        unset($_SESSION[$row[0]]);
    }
    header("Location: ../../../HomePage/sidebar-01/index.php");
?>