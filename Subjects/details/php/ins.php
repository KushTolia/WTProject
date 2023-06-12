<?php
    include "../../../connection.php";
    $fid=$_REQUEST["facultyID"];
    $sc=$_REQUEST["subject_code"];
    $sn=$_REQUEST["subject_name"];
    $bn=$_REQUEST["branch"];
    $sem=$_REQUEST["semester"];
    $ins=mysqli_query($con,"insert into subject_details values('".$fid."','".$sc."','".$sn."','".$bn."',".$sem.")");
    $ins2=mysqli_query($con,"insert into faculty_subject values('".$fid."','".$sc."')");
    if(($ins>0) && ($ins2>0))
    {
        echo "<h1 style='color:green;'>Data Successfully Added <a href='../../../HomePage/sidebar-01/index.php' style='color:blue;'> Click Here To Go To Home Page </a></h1>";
    }
    else
    {
        echo mysqli_error($con);
    }
    // echo $fid."  ".$sc."  ".$sn."  ".$bn."  ".$sem;
?>