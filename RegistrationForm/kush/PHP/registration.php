<?php
// echo "Hello Friends";
include "../../../connection.php";
    $firstName = $_REQUEST["firstName"];
    $lastName = $_REQUEST["lastName"];
    $fullName = $firstName . " " . $lastName;
    $uid = $_REQUEST["uid"];
    $password = $_REQUEST["password"];
    $dob = $_REQUEST["dob"];
    // $dob="2023-04-05";
    $gender = $_REQUEST["gender"];
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];
    $address = $_REQUEST["address"];
    $pincode = $_REQUEST["pincode"];
    $branch = $_REQUEST["branch"];
    $role = $_REQUEST["role"];
    // echo date('Y/m/d', strtotime($dob));



    if (isset($_FILES['my_image'])) {

        // print_r($_FILES['my_image']);
        $img_nm = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $img_path = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];
        if ($error > 0) {
            $er = 'Unknown Error Occured';
            header("Location: ../index.php?error=$er");
        }
        if ($img_size > 2097152) {
            $er = 'Sorry Your File Is Too Larger It Must Be Less Than 2MB';
            header("Location: ../index.php?error=$er");
        } else {
            $img_ex = pathinfo($img_nm, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) { 
                $new_img_nm = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../../../profile_photos/' . $new_img_nm;
                move_uploaded_file($img_path, $img_upload_path);



                // echo $dob;
                $sql = "insert into users values ('" . $uid . "','" . $firstName . "','" . $lastName . "','" . $fullName
                    . "','" . $branch . "','" . $email . "','" . $password . "','" . $gender . "','" . $role . "','" . $phone . "','" . date('Y/m/d', strtotime($dob))
                    . "','" . $address . "'," . $pincode . ",'" . $new_img_nm . "'" . ")";
                // $sql="insert into stud values(".$pincode.", '".$fullName."')";
                // $_SESSION["uid"]=$uid;
                // if(isset($_SESSION["uid"]))
                // {
                //     echo "Session IS Set";
                // }
                if (mysqli_query($con, $sql)) {
                    if ($role == "faculty") {
                        // header("Location: http://localhost/WT%20Project/StudentRegistrationForm/colorlib-regform-5/");
                        // echo "OK YOU ARE FACULTY";
                        header("Location: ../../../FacultyRegistrationForm/colorlib-regform-5/index.php?uid=".$uid);
                    } else {
                        // header("Location: https://www.geeksforgeeks.org/");
                        // echo "OK YOU ARE STUDENT";
                        header("Location: ../../../StudentRegistrationForm/colorlib-regform-5/index.php?uid=".$uid);
                        // header("Location: ");
                    }
                } else {
                    echo mysqli_error($con);
                }
            } else {
                $er = 'You Can not Upload Files Of This Types Only JPG, JPEG and PNG Extension Allowed';
                header("Location: ../index.php?error=$er");
            }
        }
    } 
    else {
        echo "Some Error Ocuured";
    }
    // mysqli_query($con,"");
    // echo $role."   ".$branch;

// } else {
//     echo "Not Connected";
// }
mysqli_close($con);
?>