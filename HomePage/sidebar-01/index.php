<?php
  session_start();
  include "../../connection.php";
  $uid=$_SESSION["uid"];
  $res=mysqli_query($con,"select img_url from users where userID='".$uid."'");
  if($res)
  {
    // echo "There is an image: ".mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);
    // echo "<img src='../../profile_photos/".$row['img_url']."'>";

  }
  else
  {
    echo mysqli_error($con);
  }
?>
<!doctype html>
<html lang="en">
  <head>
  	<!-- <title>Sidebar 01</title> -->
  	<title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
    
  <body>
    <?php 
    if(isset($_GET['clicked']))
    {
      session_unset();
      session_destroy();
      header("Location: ../../Welcome/Welcome/index.html");
    }
      if($_SESSION["role"]=='student')
      {
    ?>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<!-- <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a> -->
		  		<a href="../../profile_photos/<?=$row['img_url']?>" target="_blank" class="img logo rounded-circle mb-5" style="background-image: url(../../profile_photos/<?=$row['img_url']?>);"></a>
	        <!-- <img src="profile_photos/<?=$row['img_url']?>" class="img logo rounded-circle mb-5"/> -->
          <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <!-- <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a> -->
	            <!-- <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
	            </ul> -->
	          </li>
	          <li>
              <!-- <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a> -->
              <!-- <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                  <a href="#">Page 1</a>
                </li>
                <li>
                  <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul> -->
	          </li>
	          <li>
              <a href="../../Timetable/index.php" target="_blank">View Time Table</a>
	          </li>
            <li>
              <!-- <a href="#">About</a> -->
              <a href="../../ViewStudyMaterial/index.php" target="_blank">View Study Material</a>
            </li>
            <li>
              <a href="../../ViewStudentAttendance/colorlib-regform-5/index.php">View Attendance</a>
            </li>
	          <li>
              <a href="../../QuizResult/index.php" target="_blank">Quiz Results</a>
	          </li>
	          <li>
              <a href="../../Contact Us/contact/index.html" target="_blank">Contact</a>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
               <!-- This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a> -->
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>
      



      <?php $f=0; } 
      else if($_SESSION["role"]=='faculty')
      {
      ?>
      <div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<!-- <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a> -->
		  		<a href="../../profile_photos/<?=$row['img_url']?>" target="_blank" class="img logo rounded-circle mb-5" style="background-image: url(../../profile_photos/<?=$row['img_url']?>);"></a>
	        <!-- <img src="profile_photos/<?=$row['img_url']?>" class="img logo rounded-circle mb-5"/> -->
          <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <!-- <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a> -->
	            <!-- <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
	            </ul> -->
	          </li>
	          <li>
	              <!-- <a href="#">About</a> -->
	              <a href="../../Class Management/index.php" target="_blank">Class Management</a>
	          </li>
            <li>
              <a href="../../StudyMaterial/index.php" target="_blank">Add Study Material</a>
	          </li>
	          <li>
              <a href="../../ViewStudyMaterial/index.php" target="_blank">View Study Material</a>
	          </li>
            
	          <li>
              <a href="../../StudentAttendance/colorlib-regform-5/index.php" target="_blank">Take Attendance Of Students</a>
	          </li>
            <li>
              <a href="../../ViewStudentAttendance/colorlib-regform-5/index.php" target="_blank">View Attendance Of Students</a>
            </li>
            <li>
              <a href="../../Quiz/colorlib-regform-5/index.php" target="_blank">Create Quiz</a>
            </li>
            <li>
              <a href="../../QuizResult/index.php" target="_blank">Quiz Results</a>
            </li>
            
	          
	          <li>
              <a href="../../Contact Us/contact/index.html" target="_blank">Contact</a>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
              <!-- | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a> -->
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>


      <?php $f=0;} 
      else if($_SESSION["role"]=='admin')
      {?>


<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<!-- <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a> -->
		  		<a href="../../profile_photos/<?=$row['img_url']?>" target="_blank" class="img logo rounded-circle mb-5" style="background-image: url(../../profile_photos/<?=$row['img_url']?>);"></a>
	        <!-- <h4 style="color:white;">Dr. Mayur Vegad</h4> -->
          <!-- <img src="profile_photos/<?=$row['img_url']?>" class="img logo rounded-circle mb-5"/> -->
          <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <!-- <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a> -->
	            <!-- <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
	            </ul> -->
	          </li>
	          <li>
	              <!-- <a href="#">About</a> -->
	              <a href="../../Class Management/index.php" target="_blank">Class Management</a>
	          </li>
            <li>
              <a href="../../RegistrationForm/kush/index.php" target="_blank">Add New Faculty/Student</a>
            </li>
          </li>
          <li>
            <a href="../../ViewFacultySubject/index.php" target="_blank">View Faculty Subject</a>
          </li>
          <li>
            <a href="../../Subjects/details/index.php" target="_blank">Add New Subject</a>
          </li>
            <li>
              <a href="../../StudyMaterial/index.php" target="_blank">Add Study Material</a>
            </li>
	          <li>
              <a href="../../ViewStudyMaterial/index.php" target="_blank">View Study Material</a>
            </li>
	          <li>
              <a href="../../StudentAttendance/colorlib-regform-5/index.php" target="_blank">Take Attendance Of Students</a>
	          </li>
            <li>
              <a href="../../ViewStudentAttendance/colorlib-regform-5/index.php" target="_blank">View Attendance Of Students</a>
            </li>
            <li>
              <a href="../../Quiz/colorlib-regform-5/index.php" target="_blank">Create Quiz</a>
	          </li>
	          <li>
              <a href="../../QuizResult/index.php" target="_blank">Quiz Results</a>
	          </li>

	          <li>
              <a href="../../Contact Us/contact/index.html" target="_blank">Contact</a>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
              <!-- | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a> -->
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>



      <?php $f=1;} ?>




        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
	            
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="../../Contact Us/contact/index.html">Contact</a>
                </li>
                <li class="nav-item">
              <a class="nav-link" href="?clicked=true">Sign Out</a>
              <!-- <a href../../Welcome/Welcome/index.html">Sign Out</a> -->
	            </li>
              </ul>
            </div>
          </div>
        </nav>

        <!-- <h2 class="mb-4">Sidebar #01</h2> -->
        <h2 class="mb-4">Gyandeep Class</h2>
        <?php if($f==0){ ?>
        <h4 style="color:blue"> Welcome To Our Website </h4>
        <?php } else { ?>
        <h4 style="color:blue"> Welcome To Our Admin Panel </h4>
        <?php } ?>
        <div style="display: flex; justify-content: center; align-items: center;">
        <img src="gc.jpg"/>
        </div>
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>