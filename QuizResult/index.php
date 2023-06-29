<?php
session_start();
include "../connection.php";
date_default_timezone_set("Asia/Calcutta");
if ($_SESSION["role"] == 'student') {
	$sel = mysqli_query($con, "SELECT * FROM quiz_result WHERE studentID='" . $_SESSION["studentID"] . "';");
}
if ($_SESSION["role"] == 'faculty' or $_SESSION["role"] == 'admin') {
	$sel = mysqli_query($con, "SELECT * FROM quiz_result;");
}
$current_time = date("H:i");
$temp_total_marks_obtain = 0;
$temp_subjectCode = "";
$temp_desc = "";
$temp_date = "";
$temp_total_marks = 0;

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/etc/tb/Table_Responsive_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jun 2023 17:14:18 GMT -->

<head>
	<title>Quiz Result</title>
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
					<script>
						function myfunc()
						{
							// event.preventDefault(); 
							console.log("Click");
							var myForm = document.getElementById("myForm");
        					myForm.submit(); // submit the form
						}
					</script>
					<form method="post" id="myForm" action="DetailResult/index.php">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Student ID</th>
								<th class="column1">Student Name</th>
								<th class="column1">Subject Code</th>
								<th class="column2">Subject Name</th>
								<th class="column3">Date</th>
								<th class="column4">Description</th>
								<th class="column5">Total Marks</th>
								<th class="column6">Obtained Marks</th>
								<th class="column6">Show Details</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($sel) {
								if (mysqli_num_rows($sel) == 0) {
									// echo "No rows";
								} else {
									while ($row = mysqli_fetch_assoc($sel)) {
										$temp_studentID=$row["studentID"];
										$sel3=mysqli_query($con,"SELECT fullName FROM users WHERE userID=(SELECT userID FROM stud WHERE studentID='".$temp_studentID."')");
										if($sel3){
											$row3=mysqli_fetch_row($sel3);
											$temp_fullName=$row3[0];
										}
										else
										{
											echo mysqli_error($con);
										}
										echo "<tr>";
										$temp_quiz_id = $row["quizID"];
										$sel2 = mysqli_query($con, "SELECT * FROM quiz_details WHERE quizID='" . $temp_quiz_id . "';");
										$row2 = mysqli_fetch_assoc($sel2);
										if (date("Y-m-d") > $row2["date"]) {
											$temp_total_marks_obtain = $row["total_marks"];
											$temp_subjectCode = $row2["subjectCode"];
											$temp_desc = $row2["description"];
											$temp_date = $row2["date"];
											$temp_total_marks = $row2["total_marks"];
											$sel3 = mysqli_query($con, "SELECT subjectName FROM subject_details WHERE subjectCode='" . $temp_subjectCode . "';");
											$row3 = mysqli_fetch_row($sel3);
											$temp_subjectName = $row3[0];
											echo "<td class='column1'>" . $temp_studentID . "</td>";
											echo "<td class='column1'>" . $temp_fullName . "</td>";
											echo "<td class='column1'>" . $temp_subjectCode . "</td>";
											echo "<td class='column2'>" . $temp_subjectName . "</td>";
											echo "<td class='column3'>" . $temp_date . "</td>";
											echo "<td class='column4'>" . $temp_desc . "</td>";
											echo "<td class='column5'>" . $temp_total_marks . "</td>";
											echo "<td class='column6'>" . $temp_total_marks_obtain . "</td>";
											echo "<td class='column6'><a href='DetailResult/index.php?id=".$temp_studentID."_".$temp_quiz_id."'>Click Me</a></td>";
											// echo "<td class='column6'><a href='DetailResult/index.php?id='".$temp_studentID."_".$temp_quiz_id."'>Click Me</a> </td>";
											// echo "<input type='hidden' name='$temp_quiz_id' value='".$temp_studentID."_".$temp_quiz_id."'>";
										}
										if (date("Y-m-d") == $row2["date"]) {
											if ($current_time > $row2["end_time"]) {
												$temp_total_marks_obtain = $row["total_marks"];
												$temp_subjectCode = $row2["subjectCode"];
												$temp_desc = $row2["description"];
												$temp_date = $row2["date"];
												$temp_total_marks = $row2["total_marks"];
												$sel3 = mysqli_query($con, "SELECT subjectName FROM subject_details WHERE subjectCode='" . $temp_subjectCode . "';");
												$row3 = mysqli_fetch_row($sel3);
												$temp_subjectName = $row3[0];
												echo "<td class='column1'>" . $temp_studentID . "</td>";
												echo "<td class='column1'>" . $temp_fullName . "</td>";
												echo "<td class='column1'>" . $temp_subjectCode . "</td>";
												echo "<td class='column2'>" . $temp_subjectName . "</td>";
												echo "<td class='column3'>" . $temp_date . "</td>";
												echo "<td class='column4'>" . $temp_desc . "</td>";
												echo "<td class='column5'>" . $temp_total_marks . "</td>";
												echo "<td class='column6'>" . $temp_total_marks_obtain . "</td>";
												echo "<td class='column6'><a href='DetailResult/index.php?id=".$temp_studentID."_".$temp_quiz_id."'>Click Me</a></td>";

												// echo "<td class='column6'><a href='DetailResult/index.php?id='".$temp_studentID."_".$temp_quiz_id."'>Click Me</a> </td>";
												// echo "<input type='hidden' name='$temp_quiz_id' value='".$temp_studentID."_".$temp_quiz_id."'>";
											}
										}
										echo "</tr>";
									}
								}
							} else {
								echo mysqli_error($con);
							}


							?>
						</tbody>
					</table>
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