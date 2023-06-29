<?php
include "../../../connection.php";
$temp = explode(" ", $_REQUEST["lectureID"]);
$lectureID = $temp[0];
$subjectCode = $temp[1];
$taid = mysqli_query($con, "SELECT attendanceID,date FROM stud_attendance_detail WHERE lectureID='" . $lectureID . "';");
$sem=mysqli_query($con,"SELECT semester FROM subject_details WHERE subjectCode='".$subjectCode."';");
$r=mysqli_fetch_row($sem);
$sem=$r[0];
$sid=array();
$tsid=mysqli_query($con,"SELECT studentID FROM stud WHERE semester='".$sem."';");
if($tsid)
{
while($res=mysqli_fetch_row($tsid)){
	$sid[]=$res[0];
}}
else
{
	echo mysqli_error($con);
}
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
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Student ID</th>
								<th class="column2">Student Name</th>
								<?php
								$c = 3;
								$attendanceID = [];
								while ($res = mysqli_fetch_row($taid)) {
									$attendanceID[] = $res[0];
									if ($c == 7) {
										$c = 3;
									}
									echo "<th class='column$c'>" . date('d-m-Y', strtotime($res[1])) . "</th>";
									// echo "<th class=column$c style='table body tr td:nth-child(3):before{content:'Date'}'>" . date('d-m-Y', strtotime($res[1])) . "</th>";
									$c++;
								}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
							// $sid = array();
							foreach ($attendanceID as $value) {
								# code...
								$c++;
								if ($c == 7) {
									$c = 0;
								}
								// $tres1 = mysqli_query($con, "SELECT * FROM stud_attendance WHERE attendanceID='" . $value . "'"." AND studentID=DISTINCT;");
								$tres1 = mysqli_query($con, "SELECT studentID FROM stud_attendance WHERE attendanceID = '" . $value . "';");

								if ($tres1) {
									$i = 0;
									while ($trow = mysqli_fetch_row($tres1)) {
										if (!in_array($trow[0], $sid)) {
											// $sid[] = $trow[0];
										}
									}
								} else {
									echo mysqli_error($con);
								}
							}
							$c = 2;
							$i = 0;
							$n = count($attendanceID);
							foreach ($sid as $value) {
								echo "<tr>";
								echo "<td class='column1'>" . $value . "</td>";
								$res = mysqli_query($con, "SELECT userID FROM stud WHERE studentID='$value';");
								$uid = mysqli_fetch_row($res);
								$res2 = mysqli_query($con, "SELECT fullName FROM users WHERE userID='" . $uid[0] . "';");
								$fullName = mysqli_fetch_row($res2);
								echo "<td class='column2'>" . $fullName[0] . "</td>";
								$c++;
								if ($c == 7) {
									$c = 0;
								}
								$f = 3;
								for ($i = 0; $i < $n; $i++) {
									// echo $i."<br/>";
									$res3 = mysqli_query($con, "SELECT status FROM stud_attendance WHERE attendanceID='" . $attendanceID[$i] . "' AND studentID='" . $value . "';");
									// $res3 = mysqli_query($con, "SELECT status FROM stud_attendance WHERE attendanceID='8' AND studentID='22CP301'");
									if ($f == 7) {
										$f = 3;
									}
									if (mysqli_num_rows($res3) == 0) {
										echo "<td class='column$f text-info font-weight-bold' style='font-size: 18px;'>Not Taken</td>";
									} else {
										while ($row = mysqli_fetch_row($res3)) {

											if (($row[0] == 'present')) {
												// echo "<td class='column$f'>".$attendanceID[$i].$value."</td>";
												// echo "<td class='column" . $f . "'>" . "</td>";
												// echo "<td class='column2'>" . $attendanceID[$i] . $value . "</td>";
												// echo "<td class='column$f'>" . $attendanceID[$i] . " " . $i . " " . $value . " " . mysqli_num_rows($res3) . "</td>";
												// echo "<td class='column$f text-success' style:'font-size:18px;'> Presnt </td>";
												echo "<td class='column$f text-success font-weight-bold' style='font-size: 18px;'>Present</td>";
											}
											if (($row[0] == 'absent')) {
												echo "<td class='column$f text-danger font-weight-bold' style='font-size: 18px;'> Abesent </td>";
											}
										}
									}
									$f++;
								}
								echo "</tr>";
							}
							?>

						</tbody>
				</div>
				</table>
				
				<button type="button" class="btn btn-success btn-lg m-3 float-right"  onclick="window.location.href='../../../HomePage/sidebar-01/index.php'">Home</button>
				<button type="button" class="btn btn-danger btn-lg m-3 float-right" onclick="window.location.href='../index.php'">Back</button>
			</div>
		</div>
	</div>
	<script src="vendor/jquery/jquery-3.2.1.min.js">
		</script>

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