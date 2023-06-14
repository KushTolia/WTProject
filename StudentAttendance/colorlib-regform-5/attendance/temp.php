<?php
    include "../../../connection.php";
				$res4=mysqli_query($con,"SELECT MAX(attendanceID) AS max_value FROM stud_attendance_detail");
				$row4=mysqli_fetch_assoc($res4);
				if($res4)
				{
					echo $row4["max_value"];
				}
				else
				{
					echo mysqli_error($con);
				}
?>