<?php
$sc = $_REQUEST["subjectCode"];
include "../connection.php";
$res = mysqli_query($con, "select * from study_material where subjectCode='" . $sc . "'");
// if(mysqli_num_rows($res)==0)
// {
//     echo "No data";
// }
// else if(mysqli_num_rows($res)>0)
// {
// while($row=mysqli_fetch_assoc($res))
// {
//     echo $row["unitNo"]." ".$row["unitName"];
// }
// }
//     else
//     {
//         echo mysqli_error($con);
//     }
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

    <!-- Title Page-->
    <title>Add Study Material</title>

    <!-- Icons font CSS-->

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css" rel="stylesheet"> -->

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
                    <h2 class="title">Subject Details</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="php/view_pdf.php" enctype="multipart/form-data">
                        <!-- 2nd<div class="form-row">
                            <div class="name">Faculty</div>
                            <div class="value">
                                <div class="input-group">
                                    2nd<div class="rs-select2 js-select-simple select--no-search"> -->
                        <!-- 2nd<select name="facultyID">
                                            
                                        2nd<option disabled="disabled" selected="selected">Choose option</option> -->
                        <?php
                        // 2ndwhile($row=mysqli_fetch_assoc($res))
                        // {
                        //         echo "<option value='".$row['userID']."'>".$row['facultyID']."=>".$row['userID']."</option>";
                        
                        // }
                        ?>
                        <!-- <option>Computer Engineering</option>
                                        <option>Mechanical Engineering</option>
                                            <option>Electrical Engineering</option>
                                            <option>Electronics Engineering</option>
                                            <option>Civil Engineering</option>             -->
                        <!-- 2nd</select> -->
                        <!-- 2nd<div class="select-dropdown"></div> -->
                        <!-- 2nd          </div>
                                </div>
                            </div>
                        2nd</div> -->
                        <!-- <div class="form-row">
                            <div class="name">Faculty ID</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="company">
                                </div>
                            </div>
                        </div> -->




                        <div class="form-row">
                            <div class="name">Subject</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="unitDetails">
                                            <option disabled="disabled" selected="selected">Choose option</option>

                                            <?php
                                            if (mysqli_num_rows($res) == 0) {
                                                // echo "<script> alert('No Data Found');</script>";
                                                header("Location: index.php?error='No Record Found'");
                                            } else if (mysqli_num_rows($res) > 0) {
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    echo "<option value='".$sc." ".$row['unitNo']." ".$row['unitName']."'>". "Unit No: " . $row["unitNo"] . " => Unit Name: " . $row["unitName"] . "</option>";
                                                }
                                            } else {
                                                echo mysqli_error($con);
                                            }

                                            ?>


                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        
                        <!-- select  <div class="form-row m-b-55">
                           select <div class="name">Chapter</div> -->
                        <!-- <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="unit_no">
                                            
                                        </div> -->
                        <!-- select         <div class="value">
                                <div class="input-group">
                                <div class="row row-space">
                                <div class="col2">

                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subjectCode">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            
                                            <?php
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                echo "<option value='" . $row['subjectCode'] . "'>" . $row['subjectCode'] . "=>" . $row['subjectName'] . "</option>";

                                            }
                                            ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                    <label class="label--desc">Chapter No</label>
                              select  </div> -->


                        <!-- </div> -->
                        <!-- select   <div class="col-2">
                                        <div class="input-group-desc">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subjectCode">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                        select     -->
                        <?php
                        // while($row=mysqli_fetch_assoc($res))
                        // {
                        // echo "<option value='".$row['subjectCode']."'>".$row['subjectCode']."=>".$row['subjectName']."</option>";
                        
                        // }
                        ?>
                        <!-- <label class="label--desc">Chapter No</label> -->
                        <!-- </select>
                                        <div class="select-dropdown"></div>
                                    </div> -->
                        <!-- <input class="input--style-5" type="text" name="unit_name"> -->
                        <!-- <label class="label--desc">Chapter Name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="form-row">
                            <div class="name">Author</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="author_name">
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="form-row">
                            <div class="name">Content</div>
                            <div class="value">
                                <div class="input-group"> -->
                        <!-- <input class="input--style-5" type="text" name="author_name"> -->
                        <!-- <input type="file" class="input--style-5 custom-file-input" id="customFile" name="filename"> -->
                        <!-- <input name="content" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf"  class="form-control form-control-lg input--style-5" id="formFileLg" type="file">
                                    <label class="label--desc">PPT/PDF/DOCX</label>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="area_code">
                                            <label class="label--desc">Area Code</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone">
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->




                        <!-- <div class="form-row">
                            <div class="name">Branch</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="branch">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option value="computer">Computer Engineering</option>
                                            <option value="mechanical">Mechanical Engineering</option>
                                            <option value="electrical">Electrical Engineering</option>
                                            <option value="electronics">Electronics Engineering</option>
                                            <option value="civil">Civil Engineering</option>            
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="form-row p-t-20">
                            <label class="label label--block">Are you an existing customer?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" checked="checked" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> -->


                        <div style="margin-top: 10%;">
                            <button class="btn btn--radius-2  btn--green" type="submit">Next</button>
                            <button class="btn btn--radius-2 btn--red"
                                onclick="location.href='../HomePage/sidebar-01/index.php'" type="button">Home</button>
                        </div>
                        <!-- <div class="mt-5">
    <button class="btn btn-primary" type="submit">Submit</button>
    <button class="btn btn-danger" type="button">Home</button>
</div> -->

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

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->