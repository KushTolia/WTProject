<?php
    // echo "Hello Friends";
    $con=mysqli_connect("localhost","root","");
    if($con)
    {
        $db=mysqli_select_db($con,"gc");
        if($db)
        {
        }
        else
        {
            echo mysqli_error($con);
        }
    }
    else
    {
        echo mysqli_error($con);
    }
?>