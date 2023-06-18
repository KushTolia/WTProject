    <?php
    include "../../../connection.php";
    $up1=mysqli_query($con,"UPDATE stud_attendance SET status='absent' WHERE attendanceID='4' AND studentID='22CP316';");
	if($up1)
    {
		$count=1;		
		echo "Ok";						
	}
	else
	{
    	$count=2;
		echo mysqli_error($con);
	}
?>