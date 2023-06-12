<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <script>
                  
    // function myFunction()
    // {
    //     var con_pwd=document.getElementById("con_pwd").value;
    //     var pwd=document.getElementById("pwd").value;
    //     var res=con_pwd.localeCompare(pwd);
    //     f=0;
    //     if(res!=0)
    //     {
    //         f=1;
    //         // event.preventDefault();
    //         alert("Password And Confirm Password Does Not Match");
    //     }
    //     console.log(f);
    // }
    // function validateData()
    // {

        
    //     if(f==1)
    //     {

    //         alert("Password And Confirm Password Does Not Match");
    //         location.href="index.php";
    //     }
    //     else
    //     {
    //         this.submit();
    //     }
    // }
//     document.getElementById('myForm').addEventListener('submit', function(event) {
//     // Add your validation logic here
//     // Assuming f is a variable representing the condition

//     if (f == 1) {
//       event.preventDefault(); // Prevent the form from submitting
//       alert("Password and Confirm Password do not match");
//       // Optionally, you can perform other actions here
//     }
//   });
    </script>
</head>
<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    
                    <?php
        if (isset($_GET["error"])) {
            echo "<script>alert('".$_GET["error"]."')</script>";
        }
    ?>
                    

                    <form method="POST" id="myform" action="PHP/registration.php" enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="firstName">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="lastName">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">User ID</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <input type="text" name="uid" class="input--style-4">
                            </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" id="pwd" type="password" name="password">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Confirm Password</label>
                                    <input class="input--style-4" id="con_pwd" type="password" name="confirm_password">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="dob">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender" value="male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <input class="input--style-4" type="text" name="address">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Pincode</label>
                                    <input class="input--style-4" type="text" name="pincode">
                                </div>
                            </div>

                        </div>

                        <div class="input-group">
                            <label class="label">Select Branch</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="branch">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option value="Computer Engineering">Computer Engineering</option>
                                    <option value="Civil Engineering">Civil Engineering</option>
                                    <option value="Electrical Engineering">Electrical Engineering</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Select Role</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="role">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option value="student">Student</option>
                                    <option value="faculty">Faculty</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>


                        <div class="input-group">
                            <!-- <label class="label">Profile Photo:</label> -->
 
                                <div class="input-group">
                                    <label class="label">Profile Photo</label>
                                    <input type="file" name="my_image" accept="image/png, image/gif, image/jpeg" class="input--style-4">
                                </div>
                            </div>
 

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="p-t-15">
                                    <button class="btn btn--radius-2 btn--green" onsubmit="validateData()" type="submit">Submit</button>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="p-t-15">
                                    <input type="reset" class="btn btn--radius-2 btn--red" value="Reset" />
                                </div>
                            </div>
                        </div>

                    </form>
                    <script>
                         document.getElementById('myform').addEventListener('submit', function(event) {
  var con_pwd = document.getElementById("con_pwd").value;
  var pwd = document.getElementById("pwd").value;
  var res = con_pwd.localeCompare(pwd);
  if (res !== 0) {
    event.preventDefault(); // Prevent the form from submitting
    alert("Password and Confirm Password do not match");
    // Optionally, you can perform other actions here
  }
});
                    </script>
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

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->