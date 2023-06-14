<?php
	include "../../../connection.php";
	if(isset($_REQUEST["temp"]))
	{
		$lectureID=$_REQUEST["lectureID"];
		echo "TEMP";
	}
	else
	{
		$lectureID=$_REQUEST["lectureID"];
		echo $lectureID;
		// $d=date("Y-m-d");
		// $i=mysqli_query($con,"insert into stud_attendance_detail(lectureID,date) values('".$lectureID."','".$d."')");
		// if($i)
		// {
		// 	echo "Data Inserted";
		// }
		// else
		// {
		// 	echo mysqli_error($con);
		// }
	
	}
	$d=date("d-m-Y");
	$res=mysqli_query($con,"select * from stud");
	$t=0;
?>

<!-- https://dba.stackexchange.com/questions/94489/table-design-for-student-attendance-hourly-for-each-day -->
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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
<meta name="robots" content="noindex, follow">
<script nonce="e1553375-a107-4a95-8fe0-0c277f49e65f">(function(w,d){!function(dK,dL,dM,dN){dK[dM]=dK[dM]||{};dK[dM].executed=[];dK.zaraz={deferred:[],listeners:[]};dK.zaraz.q=[];dK.zaraz._f=function(dO){return function(){var dP=Array.prototype.slice.call(arguments);dK.zaraz.q.push({m:dO,a:dP})}};for(const dQ of["track","set","debug"])dK.zaraz[dQ]=dK.zaraz._f(dQ);dK.zaraz.init=()=>{var dR=dL.getElementsByTagName(dN)[0],dS=dL.createElement(dN),dT=dL.getElementsByTagName("title")[0];dT&&(dK[dM].t=dL.getElementsByTagName("title")[0].text);dK[dM].x=Math.random();dK[dM].w=dK.screen.width;dK[dM].h=dK.screen.height;dK[dM].j=dK.innerHeight;dK[dM].e=dK.innerWidth;dK[dM].l=dK.location.href;dK[dM].r=dL.referrer;dK[dM].k=dK.screen.colorDepth;dK[dM].n=dL.characterSet;dK[dM].o=(new Date).getTimezoneOffset();if(dK.dataLayer)for(const dX of Object.entries(Object.entries(dataLayer).reduce(((dY,dZ)=>({...dY[1],...dZ[1]})),{})))zaraz.set(dX[0],dX[1],{scope:"page"});dK[dM].q=[];for(;dK.zaraz.q.length;){const d_=dK.zaraz.q.shift();dK[dM].q.push(d_)}dS.defer=!0;for(const ea of[localStorage,sessionStorage])Object.keys(ea||{}).filter((ec=>ec.startsWith("_zaraz_"))).forEach((eb=>{try{dK[dM]["z_"+eb.slice(7)]=JSON.parse(ea.getItem(eb))}catch{dK[dM]["z_"+eb.slice(7)]=ea.getItem(eb)}}));dS.referrerPolicy="origin";dS.src="../../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(dK[dM])));dR.parentNode.insertBefore(dS,dR)};["complete","interactive"].includes(dL.readyState)?zaraz.init():dK.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body>
<div class="limiter">
<div class="container-table100">
<div class="wrap-table100">
<div class="table100">
<form method="POST">
<table>

<?php
    echo "<div style='text-align: center;'><h1 style='color: white; font-family: Roboto, sans-serif;'>MARK ATTENDANCE FOR ".$d."</h1></div>";
?>

<?php
	if(isset($_POST["present"]))
	{
		$r1=mysqli_query($con,"SELECT MAX(attendanceID) AS MAX_VALUE FROM stud_attendance_detail");
		$ro1=mysqli_fetch_row($r1);
		$sid=$_POST["present"];
		$i1=mysqli_query($con,"insert into stud_attendance values(".$ro1[0].",'".$sid."','present')");
		if($i1)
		{
			echo "Data Inserted";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	if(isset($_POST["absent"]))
	{
		$r1=mysqli_query($con,"SELECT MAX(attendanceID) AS MAX_VALUE FROM stud_attendance_detail");
		$ro1=mysqli_fetch_row($r1);
		$sid=$_POST["absent"];
		$i2=mysqli_query($con,"insert into stud_attendance values(".$ro1[0].",'".$sid."','absent')");
		if($i2)
		{
			echo "Data Inserted";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
?>
<thead>
<tr class="table100-head">
<th class="column1">Student ID</th>
<th class="column2">Student Name</th>
<th class="column3">Status</th>
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
while($row=mysqli_fetch_assoc($res))
{
	echo "<tr>";
	$t++;
	$sid=$row["studentID"];
	$uid=$row["userID"];
	$res2=mysqli_query($con,"select fullName from users where userID='".$uid."'");
	$row2=mysqli_fetch_row($res2);
	echo "<td class=column$t>".$sid."</td><td>".$row2[0]."</td>"."<td>";
	echo  "<input type='hidden'  value='1' name='temp'>".
	"<input type='hidden' value=$lectureID name='lectureID'>"."
	<button type='submit' name='present' class='btn btn-success' id='sid' value=$sid>P</button>
	<button type='submit' name='absent' class='btn btn-danger ml-2' value=$sid id='sid'>A</button>"."</td>";
	echo "</tr>";
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
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7d63baaee87085a7","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from colorlib.com/etc/tb/Table_Responsive_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jun 2023 17:14:21 GMT -->
</html>
