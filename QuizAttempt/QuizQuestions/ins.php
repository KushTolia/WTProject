<?php
    include "../../connection.php";
    $quizID=$_REQUEST["qid"];
    session_start();
    
    if(!isset($_REQUEST["s1"]))
    {
        ?>
        <script>
            alert("Quiz Time Finished And Quiz Has Been Automatically Submitted");
        </script>
        <?php
    }
    $total_marks=0;
    // $correct_ans="";
    $temp_correct_ans="";
    $correct_option="";
    $res=mysqli_query($con,"SELECT * FROM quiz_questions WHERE quizID='".$quizID."';");
    $sno=array();
    while($row=mysqli_fetch_assoc($res))
    {
        // $sno[]=$row["sno"];
        $temp_correct_ans="";
        if(isset($_REQUEST["sno" . $row["sno"]]))
        {
            $temp_correct_ans = $_REQUEST["sno" . $row["sno"]];
            $correct_option=$row["correct_answer"];
            if($correct_option==$temp_correct_ans)
            {
                $res2=mysqli_query($con,"SELECT marks FROM quiz_questions WHERE quizID='".$quizID."' AND sno='".$row['sno']."';");
                if($res2){
                $marks_per_ques=mysqli_fetch_row($res2);
                $total_marks+=$marks_per_ques[0];
                }
                else
                {
                    echo mysqli_error($con);
                }
                // echo "Ans Is Correct<br/>";
            }
            if($correct_option!=$temp_correct_ans)
            {
                // echo "Ans Is Not Correct<br/>";
            }
            $ins=mysqli_query($con,"insert into quiz_stud_answer values('".$quizID."','".$row["sno"]."','".$_SESSION["studentID"]."','".$temp_correct_ans."');");
            if($ins)
            {
                
            }
            else
            {
                // echo mysqli_error($con);
            }
        }
        if(!isset($_REQUEST["sno" . $row["sno"]]))
        {
            $ins=mysqli_query($con,"insert into quiz_stud_answer values('".$quizID."','".$row["sno"]."','".$_SESSION["studentID"]."','Not Attempted');");
            if($ins)
            {

            }
            else
            {
                echo mysqli_error($con);
            }
            // echo "Ans is Wrong";
        }
        // $temp_correct_ans = $_REQUEST["sno" . $row["sno"]];
        // $correct_option=$row["correct_answer"];
        // if($correct_option==$temp_correct_ans)
        // {
        //     echo "Ans Is Correct<br/>";
        // }
        // if($correct_option!=$temp_correct_ans)
        // {
        //     echo "Ans Is Not Correct<br/>";
        // }



        // if($temp_correct_option=="Option 1")
        // {
        //     $correct_ans=$row["option1"];
        // }
        // if($temp_correct_option=="Option 2")
        // {
        //     $correct_ans=$row["option2"];
        // }
        // if($temp_correct_option=="Option 3")
        // {
        //     $correct_ans=$row["option3"];
        // }
        // if($temp_correct_option=="Option 4")
        // {
        //     $correct_ans=$row["option4"];
        // }


        // if($temp_correct_ans==$correct_ans)
        // {
        //     $ins=mysqli_query($con,"insert into quiz_stud_answer values('".$quizID."','".$row["sno"]."','".$_SESSION["studentID"]."','".$temp_correct_ans."');");
        // }
        // if($temp_correct_ans!=$correct_ans)
        // {
        // }

    }
    $res3 = mysqli_query($con, "INSERT INTO quiz_result VALUES ('$quizID', '".$_SESSION["studentID"]."', '$total_marks')");
    if($res3)
    {
        // echo "Quiz is submitted successfully result is available after quiz end time";
        echo "<h1 style='color:green;'>Quiz is submitted successfully result is available after quiz end time</h1>";
    }
    else
    {
        echo mysqli_error($con);
    }
?>