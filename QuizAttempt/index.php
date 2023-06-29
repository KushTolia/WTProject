<?php
include "../connection.php";
$flag = 0;
$res = mysqli_query($con, "SELECT * FROM quiz_details;");
date_default_timezone_set("Asia/Calcutta");
$current_date = date('Y-m-d');
// echo date_default_timezone_get();
$current_time = date("H:i");
// echo $current_time."<br/>";
$temp_date = 0;

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/etc/tb/Table_Responsive_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jun 2023 17:14:18 GMT -->

<head>
	<title>Table V01</title>
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
	<script>
		function myFunction()
		{
			document.getElementById("form1").submit();
		}
	</script>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<form action="QuizQuestions/index.php" method="post" id="form1">
						<thead>
							<tr class='table100-head'>
								<th class="column1">Subject Code</th>
								<th class="column2">Subject Name</th>
								<th class="column3">Description</th>
								<th class="column4">Start Time</th>
								<th class="column5">End Time</th>
								<th class="column6">Number Of Questions</th>
								<th class="column6">Total Marks</th>
								<th class='column6'>Quiz Link</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$c=0;
							if($res){
							while ($row = mysqli_fetch_assoc($res)) {
								$temp_date = $row["date"];
								if ($current_date == $temp_date) {
									$temp_quizID = $row["quizID"];
									$temp_start_time = date("H:i", strtotime($row["start_time"]));
									$temp_end_time = date("H:i", strtotime($row["end_time"]));
									//echo $temp_start_time."<br/>"."<br/>".$temp_end_time;
									if ($current_time >= $temp_start_time && $current_time <= $temp_end_time) {
										$flag = 1;
										$res2 = mysqli_query($con, "SELECT * FROM subject_details WHERE subjectCode='" . $row["subjectCode"] . "';");
										$subject_details = mysqli_fetch_assoc($res2);
										$semester = $subject_details["semester"];
										$sc = $row["subjectCode"];
										$subjectName = $subject_details["subjectName"];
										$desc = $row["description"];
										$totalMarks = $row["total_marks"];
										$total_no_of_questions=$row["number_of_questions"];
										
										echo "<tr>";
										echo "<td class='column1'>".$sc."</td>";
										echo "<td class='column2'>".$subjectName."</td>";
										echo "<td class='column3'>".$desc."</td>";
										echo "<td class='column4'>".$temp_start_time."</td>";
										echo "<td class='column5'>".$temp_end_time."</td>";
										echo "<td class='column6'>".$total_no_of_questions."</td>";
										echo "<td class='column6'>".$totalMarks."</td>";
										echo "<td class='column6'><a href='javascript:;' onclick='myFunction();'>Click Here To Attempt Quiz</a></td>";
										echo "<input type='hidden' name='qid' value='$temp_quizID'/>";
										echo "<input type='hidden' name='end_time' value='$temp_end_time'/>";
										echo "</tr>";
									} else {
										$flag = 0;
										// echo "Time Gone".$temp_end_time."  ".$temp_start_time."  ".$temp_quizID;
									}
								}
							}}

							?>
							<!-- <tr>
								<td class="column1">2017-09-18 05:57</td>
								<td class="column2">200386</td>
								<td class="column3">iPhone X 64Gb Grey</td>
								<td class="column4">$999.00</td>
								<td class="column5">1</td>
								<td class="column6">$999.00</td>
							</tr> -->
						</tbody>
					</table></form>
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