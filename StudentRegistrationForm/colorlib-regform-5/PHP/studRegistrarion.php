<?php
    include '../../../connection.php';
    if($db)
    {
        $studID=$_REQUEST["sid"];
        $fName=$_REQUEST["father_name"];
        $mName=$_REQUEST["mother_name"];
        $semester=$_REQUEST["semester"];
        $uid=$_REQUEST["uid"];
        $ins="insert into stud values('".$studID."','".$uid."','".$fName."','".$mName."',".$semester.")";
        // echo $studID."  ".$fName."  ".$mName."  ".$semester."  ".$uid;
        if(mysqli_query($con,$ins))
        {
            echo "Data Inserted..Thank You..<a href='../../../login-form/Login_v1/index.html'>Click Here To Login</a>";
        }
        else
        {
                // echo "Data Inserted..Thank You..";
        
            echo mysqli_error($con);
        }
    }
?>