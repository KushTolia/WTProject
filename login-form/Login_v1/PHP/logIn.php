<?php
    include '../../../connection.php';
    $sql="select * from users";
    $uid=$_REQUEST["uid"];
    $password=$_REQUEST["password"];
    if($db)
    {
        $res=mysqli_query($con,$sql);
        if($res)
        {
            $temp=0;
            while($row=mysqli_fetch_row($res)){
                if($row[0]==$uid && $row[6]==$password)
                {
                    $role=$row[8];
                    $temp=1;
                }
            }
            if($temp==1)
            {
                session_start();
                $_SESSION["role"]=$role;
                $_SESSION["uid"]=$uid;
                if(isset($_SESSION["role"]))
                {
                    if($role=="faculty")
                    {
                        $sql2="select * from faculty where userID='$uid'";
                        $res2=mysqli_query($con,$sql2);
                        $row=mysqli_fetch_row($res2);
                        $_SESSION["facultyID"]=$row[0];
                        if(isset($_SESSION["facultyID"]))
                        {
                        // echo "Login Success"." Session Created For: ".$uid." And Role ".$role;

                        // echo "<br/><a href='../../../Class Management/index.php'>Class Management</a>";
                        // echo "<br/><a href='../../../Attendace Of Student/Timetable/index.html'>Attendence Of Student</a>";
                        // echo "<br/><a href='../../../Study Material/addS.html'>Add Study Material</a>";
                        // echo "<br/><a href='../../../Study Material/lec.html'>View Study Material</a>";
                        header("Location:../../../HomePage/sidebar-01");
                        
                        }
                    
                    }
                    else if($role=="student")
                    {
                        $sql2="select * from stud where userID='$uid'";
                        $res2=mysqli_query($con,$sql2);
                        $row=mysqli_fetch_row($res2);
                        $_SESSION["studentID"]=$row[0];
                        if(isset($_SESSION["studentID"]))
                        {
                        // echo "Login Success"." Session Created For: ".$uid." And Role ".$role;
                        // echo "<br/><a href='../../../Timetable/index.php'>View TIme Table</a>";
                        // echo "<br/><a href='../../../Study Material/lec.html'>View Study Material</a>";
                            header("Location:../../../HomePage/sidebar-01");
                        }

                    }
                    else if($role=="admin")
                    {
                        
                        // echo "Login Success"." Session Created For: ".$uid." And Role ".$role;
                        // echo "<br/><a href='../../../Timetable/index.php'>View TIme Table</a>";
                        // echo "<br/><a href='../../../Study Material/lec.html'>View Study Material</a>";
                            header("Location:../../../HomePage/sidebar-01");
                        
                    }
                }
                else
                {

                }
            }
            else
            {?>
                <script>
                    alert("Sorry User ID OR Password Incorrect Please Try Again");
                    window.location.href='../index.html';
                </script>
                <?php    
                // header("Location:../index.html");
            }
        }
        else
        {
            echo mysqli_error($con);
        }
    
    }
    else{
        echo mysqli_error($con);
    }
    
?>