<?php
include "../../connection.php";
$quizID = $_REQUEST["qid"];
$res = mysqli_query($con, "SELECT * FROM quiz_questions WHERE quizID='" . $quizID . "';");
$temp_end_time = $_REQUEST["end_time"];
// echo $temp_end_time;
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


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <!-- Title Page-->
    <title>Quiz</title>

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
    <?php
    date_default_timezone_set("Asia/Calcutta");
    $current_time = date("H:i");
    ?>
    <script>
        var tp_end_time = '<?php echo $temp_end_time; ?>';
        var end_time = convertStringToTime(tp_end_time);
            
        function convertStringToTime(timeString) {
            var [hours, minutes] = timeString.split(':');
            var dateObj = new Date();

            // Set the hours and minutes of the Date object
            dateObj.setHours(hours);
            dateObj.setMinutes(minutes);

            return dateObj;
        }
        setInterval(checkTime, 1000);

        function time() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();

            // Format hours and minutes with leading zeros if needed
            var formattedHours = hours < 10 ? '0' + hours : hours;
            var formattedMinutes = minutes < 10 ? '0' + minutes : minutes;

            var currentTime = formattedHours + ':' + formattedMinutes;
            return currentTime;
        }
        time();
        function checkTime() {
            var curr_time = convertStringToTime(time());
            console.log("Current Time"+curr_time);
            console.log("End Time"+end_time);
            console.log("Hello");
            if (curr_time > end_time) {
                var f = document.getElementById("myForm");
                
                if (f) {
                    f.submit();
                } else {
                    console.log('form is not found');
                }
            }
        }
        checkTime();
    </script> 
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Quiz</h2>
                </div>
                <div class="card-body">
                    <form id="myForm" method="POST" action='ins.php'>
                        <!-- <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="first_name">
                                            <label class="label--desc">first name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name">
                                            <label class="label--desc">last name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Company</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="company">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="area_code">
                                            <label class="label--desc">Area Code</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone">
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Subject</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <?php
                        
                        echo   "<input type='hidden' name='qid' value='$quizID'/>";
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "
                        <label class='label label--block'>" . $row["sno"] . ") " . $row["question"] . " [ " . $row["marks"] . " Mark ]" . "</label>
                                <div class='p-t-1'>
                                    <label class='radio-container m-r-55'>" . $row["option1"] . "
                                        <input type='radio' name='sno".$row["sno"]."' value='Option 1'>
                                        <span class='checkmark'></span>
                                    </label>                                 
                                </div>
                            

                                <div class='p-t-1'>
                                    <label class='radio-container m-r-55'>" . $row["option2"] . "
                                        <input type='radio' name='sno".$row["sno"]."' value='Option 2'>
                                        <span class='checkmark'></span>
                                    </label>                                 
                                </div>

                                <div class='p-t-1'>
                                    <label class='radio-container m-r-55'>" . $row["option3"] . "
                                        <input type='radio' name='sno".$row["sno"]."' value='Option 3'>
                                        <span class='checkmark'></span>
                                    </label>                                 
                                </div>

                                <div class='p-t-1'>
                                    <label class='radio-container m-r-55'>" . $row["option4"] . "
                                        <input type='radio' name='sno".$row["sno"]."' value='Option 4'>
                                        <span class='checkmark'></span>
                                    </label>                                 
                                </div>
                                ";
                            
                            }
                        ?>
                        <!-- <div class='form-row p-t-20'>
                            <label class='label label--block'>Are you an existing customer?</label>
                            <div class='p-t-1'>
                                <label class='radio-container m-r-55'>Yes
                                    <input type='radio' checked='checked' name='exist'>
                                    <span class='checkmark'></span>
                                </label>
                                <label class='radio-container'>No
                                    <input type='radio' name='exist'>
                                    <span class='checkmark'></span>
                                </label>
                            </div>
                        </div> -->
                        <div>
                            <button class="mt-3 btn btn--radius-2 btn--green" name="s1" type="submit">Submit</button>
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



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->