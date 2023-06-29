<?php
include "../../connection.php";
$id = $_REQUEST["id"];
$s = explode("_", $id);
$studentID = $s[0];
$quizID = $s[1];
$res = mysqli_query($con, "SELECT * FROM quiz_questions WHERE quizID='" . $quizID . "';");
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
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Quiz</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <?php

                        // echo   "<input type='hidden' name='qid' value='$quizID'/>";
                        while ($row = mysqli_fetch_assoc($res)) {
                            $tp_sno = $row["sno"];
                            $sel = mysqli_query($con, "SELECT attempted_answer	FROM quiz_stud_answer WHERE studentID='$studentID' AND quizID='$quizID' AND sno='$tp_sno';");
                            $attempted_ans = mysqli_fetch_row($sel);

                            if ($attempted_ans[0] == $row["correct_answer"]) {
                                $marks_obtain = $row["marks"];
                            }
                            if ($attempted_ans[0] != $row["correct_answer"]) {
                                $marks_obtain = 0;
                            }



                            echo "
                        <label class='label label--block'>" . $row["sno"] . ") " . $row["question"] . " [ " . $row["marks"] . " Mark ]" . "</label>
                        <div class='p-t-1'>
                                    <label class='radio-container m-r-55'>" . $row["option1"] . "
                                        <input type='radio' disabled name='sno" . $row["sno"] . "' value='Option 1'>
                                        <span class='checkmark'></span>
                                    </label>                                 
                                </div>
                            

                                <div class='p-t-1'>
                                    <label class='radio-container m-r-55'>" . $row["option2"] . "
                                        <input type='radio' disabled name='sno" . $row["sno"] . "' value='Option 2'>
                                        <span class='checkmark'></span>
                                    </label>                                 
                                </div>

                                <div class='p-t-1'>
                                    <label class='radio-container m-r-55'>" . $row["option3"] . "
                                        <input type='radio' disabled name='sno" . $row["sno"] . "' value='Option 3'>
                                        <span class='checkmark'></span>
                                    </label>                                 
                                </div>

                                <div class='p-t-1'>
                                    <label class='radio-container m-r-55'>" . $row["option4"] . "
                                        <input type='radio' disabled name='sno" . $row["sno"] . "' value='Option 4'>
                                        <span class='checkmark'></span>
                                    </label>                                 
                                </div>
                                
                                <div class='form-row'>
                                    <div class='name'>Corect Answer</div>
                                    <div class='value'>    
                                        <div class='input-group'>
                                        <input class='input--style-5' type='text' name='company' value='" . $row["correct_answer"] . "' disabled/>
                                        </div>
                                        </div>
                                </div>
                                <div class='form-row'>
                                    <div class='name'>Your Answer</div>
                                    <div class='value'>    
                                    <div class='input-group'>
                                            <input class='input--style-5' type='text' name='company' value='" . $attempted_ans[0] . "' disabled/>
                                        </div>
                                    </div>  
                                </div>
                                <div class='form-row'>
                                    <div class='name'>Marks Obtain</div>
                                    <div class='value'>    
                                    <div class='input-group'>
                                            <input class='input--style-5' type='text' name='company' value='" . $marks_obtain . "' disabled/>
                                        </div>
                                    </div>
                                        </div>
                                ";
                        }
                        ?>
                        <div>
                            <button class="mt-3 btn btn--radius-2 btn--green" type='button' onclick="window.location.href='../../HomePage/sidebar-01/index.php'">Home</button>
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