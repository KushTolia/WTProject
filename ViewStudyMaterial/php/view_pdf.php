<?php
    include "../../connection.php";
    $ud=$_REQUEST["unitDetails"];
    $temp=explode(" ",$ud);
    $sc=$temp[0];
    $unitNo=$temp[1];
    $unitName=$temp[2];
    $res=mysqli_query($con,"select path from study_material where subjectCode='".$sc."' and unitNo='".$unitNo."' and unitName='".$unitName."'");
    $row=mysqli_fetch_row($res);
    $pdfUrl=$row[0];
    header("Location: ../../StudyMaterial/files/".$pdfUrl);
?>