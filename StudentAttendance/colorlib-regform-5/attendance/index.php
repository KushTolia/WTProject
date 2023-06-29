<?php
session_start();
ob_start();
global $aid;
include "../../../connection.php";
$count = 0;
global $_SESSION;
// notFilled();
$myflag = 0;
if (isset($_GET['flag'])) {
    // You can now use the $flag variable in your code
    $flag = $_GET['flag'];
    $aid = $_GET['aid'];
    $sid = $_GET['sid'];
    if ($flag == 1) {
        // 2nd echo "Flag: $flag AttendanceID: $aid StudentID: $sid" ;
        $up1 = mysqli_query($con, "UPDATE stud_attendance SET status='present' WHERE attendanceID='" . $aid . "' AND studentID='" . $sid . "';");
        if ($up1) {
            $_SESSION[$sid] = 1;
            // present();
            //2nd echo "Ok";						
        } else {
            $_SESSION[$sid] = 2;

            // absent();
            echo mysqli_error($con);
        }
    }
    if ($flag == 2) {
        // absent();
        $_SESSION[$sid] = 2;
    }
    if ($flag == 3) {
        // 2nd echo "Flag: $flag AttendanceID: $aid StudentID: $sid" ;
        $up1 = mysqli_query($con, "UPDATE stud_attendance SET status='absent' WHERE attendanceID='" . $aid . "' AND studentID='" . $sid . "';");
        if ($up1) {
            $_SESSION[$sid] = 2;

            // absent();
            //2nd echo "Ok";						
        } else {
            $_SESSION[$sid] = 1;
            // present();
            echo mysqli_error($con);
        }
    }
    if ($flag == 4) {
        $_SESSION[$sid]=1;
        // present();
    }
}

if (isset($_REQUEST["temp"])) {
    $temp = explode(" ", $_REQUEST["lectureID"]);
    $lectureID = $temp[0];
    $sc = $temp[1];
    $myflag=2;
    // $lectureID=$_REQUEST["lectureID"];
    //2nd	echo "TEMP";
} else {
    $temp = explode(" ", $_REQUEST["lectureID"]);
    $lectureID = $temp[0];
    $sc = $temp[1];
    // 2nd	echo $lectureID;
    // 2nd	echo " " . $sc . " ";
    $taid = mysqli_query($con, "SELECT MAX(attendanceID) FROM stud_attendance_detail"); //temp attendance id
    $rtaid = mysqli_fetch_row($taid); //rtaid=result temp attendance id 
    $taid = $rtaid[0]; //taid=temp attendance id
    $td = mysqli_query($con, "SELECT date,lectureID FROM stud_attendance_detail WHERE attendanceID='" . $taid . "';"); //td=temp date
    $rtd = mysqli_fetch_row($td); //Result Temp Date
    $td = $rtd[0];
    $tld = $rtd[1]; //Temp Lecture ID
    $d = date("Y-m-d");
    if ($d == $td and $lectureID == $tld) {
        $myflag = 1;
        $aid=$taid;
    } else {
        $i = mysqli_query($con, "insert into stud_attendance_detail(lectureID,date) values('" . $lectureID . "','" . $d . "')");
        if ($i) {
            // 3rd echo "Data Inserted";
            // $count=0;
            $taid = mysqli_query($con, "SELECT MAX(attendanceID) FROM stud_attendance_detail"); //temp attendance id
            $rtaid = mysqli_fetch_row($taid); //rtaid=result temp attendance id 
            $taid = $rtaid[0]; //taid=temp attendance id
            $aid=$taid;
            
        } else {
            echo mysqli_error($con);
        }
    }
    // $lectureID=$_REQUEST["lectureID"];
    // $d=date("Y-m-d");
    // $i=mysqli_query($con,"insert into stud_attendance_detail(lectureID,date) values('".$lectureID."','".$d."')");
    // if($i)
    // {
    // 	// 3rd echo "Data Inserted";
    // }
    // else
    // {
    // 	echo mysqli_error($con);
    // }

}
$sem = mysqli_query($con, "SELECT semester FROM subject_details WHERE subjectCode='" . $sc . "'");
$row_sem = mysqli_fetch_row($sem);
$sem = $row_sem[0];
$d = date("d-m-Y");
if ($myflag == 0) {
    $res = mysqli_query($con, "select * from stud where semester=$sem");
    while ($row = mysqli_fetch_assoc($res)) {
        $_SESSION[$row['studentID']] = 0;
    }
}
$res = mysqli_query($con, "select * from stud where semester=$sem");
$t = 0;
?>

<!-- https://dba.stackexchange.com/questions/94489/table-design-for-student-attendance-hourly-for-each-day -->
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/etc/tb/Table_Responsive_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jun 2023 17:14:18 GMT -->

<head>
    <title>Student Attendance</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">

    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
    <meta name="robots" content="noindex, follow">
    <script nonce="e1553375-a107-4a95-8fe0-0c277f49e65f">
        (function(w, d) {
            ! function(dK, dL, dM, dN) {
                dK[dM] = dK[dM] || {};
                dK[dM].executed = [];
                dK.zaraz = {
                    deferred: [],
                    listeners: []
                };
                dK.zaraz.q = [];
                dK.zaraz._f = function(dO) {
                    return function() {
                        var dP = Array.prototype.slice.call(arguments);
                        dK.zaraz.q.push({
                            m: dO,
                            a: dP
                        })
                    }
                };
                for (const dQ of ["track", "set", "debug"]) dK.zaraz[dQ] = dK.zaraz._f(dQ);
                dK.zaraz.init = () => {
                    var dR = dL.getElementsByTagName(dN)[0],
                        dS = dL.createElement(dN),
                        dT = dL.getElementsByTagName("title")[0];
                    dT && (dK[dM].t = dL.getElementsByTagName("title")[0].text);
                    dK[dM].x = Math.random();
                    dK[dM].w = dK.screen.width;
                    dK[dM].h = dK.screen.height;
                    dK[dM].j = dK.innerHeight;
                    dK[dM].e = dK.innerWidth;
                    dK[dM].l = dK.location.href;
                    dK[dM].r = dL.referrer;
                    dK[dM].k = dK.screen.colorDepth;
                    dK[dM].n = dL.characterSet;
                    dK[dM].o = (new Date).getTimezoneOffset();
                    if (dK.dataLayer)
                        for (const dX of Object.entries(Object.entries(dataLayer).reduce(((dY, dZ) => ({
                                ...dY[1],
                                ...dZ[1]
                            })), {}))) zaraz.set(dX[0], dX[1], {
                            scope: "page"
                        });
                    dK[dM].q = [];
                    for (; dK.zaraz.q.length;) {
                        const d_ = dK.zaraz.q.shift();
                        dK[dM].q.push(d_)
                    }
                    dS.defer = !0;
                    for (const ea of [localStorage, sessionStorage]) Object.keys(ea || {}).filter((ec => ec.startsWith("_zaraz_"))).forEach((eb => {
                        try {
                            dK[dM]["z_" + eb.slice(7)] = JSON.parse(ea.getItem(eb))
                        } catch {
                            dK[dM]["z_" + eb.slice(7)] = ea.getItem(eb)
                        }
                    }));
                    dS.referrerPolicy = "origin";
                    dS.src = "../../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(dK[dM])));
                    dR.parentNode.insertBefore(dS, dR)
                };
                ["complete", "interactive"].includes(dL.readyState) ? zaraz.init() : dK.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body>
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100">
                    <form method="POST" id="myForm">
                        <input type="hidden" id="confirm" name="confirm" value="">

                        <table>

                            <?php
                            echo "<div style='text-align: center;'><h1 style='color: white; font-family: Roboto, sans-serif;'>MARK ATTENDANCE FOR " . $d . "</h1></div>";
                            ?>

                            <?php
                            if (isset($_POST["present"])) {
                                // print_r($_SESSION);
                                global $_SESSION;
                                // if(empty($_SESSION))
                                // {
                                //     echo "Not Ok <br/>";
                                // }
                                // foreach($_SESSION as $key=>$val)
                                // {
                                //     echo $key."=>".$val."<br/>";

                                // }
                                

                                $r1 = mysqli_query($con, "SELECT MAX(attendanceID) FROM stud_attendance_detail");
                                $ro1 = mysqli_fetch_row($r1);
                                $sid = $_POST["present"];
                                $r2 = mysqli_query($con, "SELECT date,lectureID FROM stud_attendance_detail WHERE attendanceID=" . $ro1[0]);
                                $ro2 = mysqli_fetch_row($r2);
                                $tempd = $ro2[0];
                                $templ = $ro2[1]; //temp lectureID=templ
                                $d1 = date("Y-m-d");
                                $r3 = mysqli_query($con, "SELECT status FROM stud_attendance WHERE attendanceID='" . $ro1[0] . "' and studentID='" . $sid . "';");
                                $ro3 = mysqli_fetch_row($r3);
                                $status = isset($ro3[0]) ? $ro3[0] : null;
                                if ((strcmp($d1, $tempd) == 0) and strcmp($templ, $lectureID) == 0) {
                                    if ($status == "present") {
                                        $_SESSION[$sid] = 1;
                                        echo "<script>alert('You Mark Already Present')</script>";
                                    } else if ($status == "absent") {
                                        header("Location:temp2.php?flag=1&lectureID=" . $lectureID . " " . $sc . "&aid=" . $ro1[0] . "&sid=" . $sid);
                                        exit;
                                    }
                                }
                                if ($status == null) {
                                    // $i1 = mysqli_query($con, "insert into(attendanceID,studentID,status) stud_attendance values('" . $ro1[0] . "','" . $sid . "','present');");
                                    $i1 = mysqli_query($con, "INSERT INTO stud_attendance (attendanceID, studentID, status) VALUES ('" . $ro1[0] . "','" . $sid . "','present')");

                                    if ($i1) {
                                        $_SESSION[$sid] = 1;
                                        // present();
                                    } else {
                                        echo mysqli_error($con);
                                    }
                                }
                            }
                            if (isset($_POST["absent"])) {
                                // print_r($_SESSION);
                                global $_SESSION;
                                $r1 = mysqli_query($con, "SELECT MAX(attendanceID) FROM stud_attendance_detail");
                                $ro1 = mysqli_fetch_row($r1);
                                $sid = $_POST["absent"];
                                $r2 = mysqli_query($con, "SELECT date FROM stud_attendance_detail WHERE attendanceID=" . $ro1[0]);
                                $ro2 = mysqli_fetch_row($r2);
                                $tempd = $ro2[0];
                                $d1 = date("Y-m-d");
                                $r3 = mysqli_query($con, "SELECT status FROM stud_attendance WHERE attendanceID='" . $ro1[0] . "' and studentID='" . $sid . "';");

                                // $r3 = mysqli_query($con, "SELECT status FROM stud_attendance WHERE attendanceID=" . $ro1[0]);
                                $ro3 = mysqli_fetch_row($r3);
                                $status = isset($ro3[0]) ? $ro3[0] : null;
                                if (strcmp($d1, $tempd) == 0) {
                                    if ($status == "absent") {
                                        $_SESSION[$sid] = 2;
                                        // header("Location:temp2.php?flag=4&lectureID=" . $lectureID . " " . $sc . "&aid=" . $ro1[0] . "&sid=" . $sid);
                                        // absent();
                                        // foreach($_SESSION as $key=>$val)
                                        // {
                                        //     echo $key."=>".$val."<br/>";
                                        // }
                                        echo "<script>alert('You Mark Already Absent')</script>";
                                    } else if ($status == "present") {
                                        header("Location:temp2.php?flag=2&lectureID=" . $lectureID . " " . $sc . "&aid=" . $ro1[0] . "&sid=" . $sid);
                                        exit;
                                    }
                                }
                                if ($status == null) {
                                    $i1 = mysqli_query($con, "insert into stud_attendance values(" . $ro1[0] . ",'" . $sid . "','absent')");
                                    if ($i1) {
                                        $_SESSION[$sid] = 2;
                                        // absent();
                                    } else {
                                        echo mysqli_error($con);
                                    }
                                }
                                // $count = 2;
                                // $r1=mysqli_query($con,"SELECT MAX(attendanceID) AS MAX_VALUE FROM stud_attendance_detail");
                                // $ro1=mysqli_fetch_row($r1);
                                // $i2=mysqli_query($con,"insert into stud_attendance values(".$ro1[0].",'".$sid."','absent')");
                                // if($i2)
                                // {
                                // 	echo "Data Inserted";

                                // }
                                // else
                                // {
                                // 	echo mysqli_error($con);
                                // }
                            }
                            ?>
                            <thead>
                                <tr class="table100-head">
                                    <th class="column1" style="text-align:center;">Student ID</th>
                                    <th class="column2" style="text-align:center;">Student Name</th>
                                    <th class="column3" style="text-align:center;">Attendance</th>
                                    <th class="column4">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 
<tr>

<td class="column1">2017-09-29 01:22</td>
<td class="column2">200398</td>
<td class="column3">iPhone X 64Gb Grey</td>
</tr>
-->
                                <?php
                                global $_SESSION;

                                while ($row = mysqli_fetch_assoc($res)) {
                                    echo "<tr>";
                                    $t++;
                                    $sid = $row["studentID"];
                                    $uid = $row["userID"];
                                    $res2 = mysqli_query($con, "select fullName from users where userID='" . $uid . "'");
                                    $row2 = mysqli_fetch_row($res2);
                                    echo "<td class=column1 style='text-align:center;'>" . $sid . "</td><td class='column2' style='text-align:center;'>" . $row2[0] . "</td>" . "<td class='column3' style='text-align:center;'>";
                                    echo  "<input type='hidden'  value='1' name='temp'>" .
                                        "<input type='hidden' value='$lectureID $sc' name='lectureID'>" . "
	<button type='submit' name='present' class='btn btn-success' id='sid' value=$sid>P</button>
	<button type='submit' name='absent' class='btn btn-danger ml-2' value=$sid id='sid'>A</button>" . "</td>";

                                    if ($myflag == 1) {
                                        $count = 1;
                                        $ta = mysqli_query($con, "SELECT MAX(attendanceID) FROM stud_attendance_detail"); //temp AttendanceID
                                        $rta = mysqli_fetch_row($ta); //result temp AttendanceID
                                        // 	// $ts = mysqli_query($con,"SELECT status FROM stud_attendance WHERE attendanceID='" . $rta[0] . "' AND studentID='" . $sid . "';"); //temp status
                                        $ts = mysqli_query($con, "SELECT status FROM stud_attendance WHERE attendanceID='" . $rta[0] . "' AND studentID='" . $sid . "';");
                                        $rts = mysqli_fetch_row($ts);
                                        if (!empty($rts)) {
                                            if ($rts[0] == "present") {
                                                // present();
                                                $_SESSION[$sid] = 1;
                                                // present();

                                            }
                                            if ($rts[0] == "absent") {
                                                // absent();
                                                $_SESSION[$sid] = 2;
                                            }
                                        } else {
                                            notFilled();
                                        }
                                    }
                                    if (isset($_SESSION[$sid])) {

                                        if ($_SESSION[$sid] == 1) {
                                            present();
                                        }
                                        if ($_SESSION[$sid] == 2) {
                                            absent();
                                        }
                                        if ($_SESSION[$sid] == 0) {
                                            notFilled();
                                        }
                                    }
                                    // echo "<td class='column4'>Present"."</td>";
                                    // if (empty($_SESSION) and $count == 0) {
                                    //     notFilled();
                                    // }
                                    echo "</tr>";
                                }

                                function notFilled()
                                {
                                    echo "<td class='column4'><button type='button' class='btn btn-secondary btn-lg'>-------</button></td>";
                                }
                                function present()
                                {
                                    echo "<td class='column4'><button type='button' class='btn btn-success btn-lg'>Present</button></td>";
                                }
                                function absent()
                                {
                                    echo "<td class='column4'><button type='button' class='btn btn-danger btn-lg'>Absent</button></td>";
                                }

                                ?>
                            </tbody>
                        </table>
                        <button type='button' onclick="window.location.href='unset_temp_sssion.php?aid=<?php echo $aid?>'" class='btn btn-dark btn-lg pull-right m-3'>Home</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="vendor/select2/select2.min.js"></script>

    <script src="js/main.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7d63baaee87085a7","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from colorlib.com/etc/tb/Table_Responsive_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jun 2023 17:14:21 GMT -->

</html>
<?php
ob_end_flush();
?>