<?php
include "../../connection.php";
$sel = mysqli_query($con, "SELECT * FROM available_class");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">student attendance management form</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="attendance/index.php">
                            <div class="form-row">
                            <div class="name">Subject</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="lectureID">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($sel)) {
                                                $t = $row["timeID"];
                                                $d = $row["dayID"];
                                                $sel2 = mysqli_query($con, "select start_time,end_time from time_of_class where timeID='" . $t . "'");
                                                $row2 = mysqli_fetch_row($sel2);
                                                $s = strtotime($row2[0]);
                                                $st = date("H:i", $s);
                                                $e = strtotime($row2[1]);
                                                $et = date("H:i", $s);
                                                $sel3 = mysqli_query($con, "select day from day_of_class where dayID=" . $d);
                                                $row3 = mysqli_fetch_row($sel3);
                                                $sc = $row["subjectCode"];
                                                $sel4 = mysqli_query($con, "select subjectName from subject_details where subjectCode='" . $sc . "'");
                                                $row4 = mysqli_fetch_row($sel4);
                                                echo "<option value='".$row['lectureID']." ".$sc."'>Lecture ID: " . $row['lectureID'] . " => Class ID: " . $row["classID"] . " => Time: " . $st . " To " . $et . " => Day: " . $row3[0] . " => Subject Code: " . $sc . " => Subject Name: " . $row4[0]."</<option>";
                                                // echo "<input type='hidden' value=$sc name='subjectCode'/>";
                                            }
                                            ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--green" type="submit">Take Attendance</button>
                            <button class="btn btn--radius-2 btn--red" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->