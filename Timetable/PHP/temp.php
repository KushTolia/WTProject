<?php 
include '../../connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../images/icons/favicon.ico" />

<link
  rel="stylesheet"
  type="text/css"
  href="../vendor/bootstrap/css/bootstrap.min.css"
/>

<link
  rel="stylesheet"
  type="text/css"
  href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css"
/>

<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css" />

<link
  rel="stylesheet"
  type="text/css"
  href="../vendor/select2/select2.min.css"
/>

<link
  rel="stylesheet"
  type="text/css"
  href="../vendor/perfect-scrollbar/perfect-scrollbar.css"
/>

<link rel="stylesheet" type="text/css" href="../css/util.css" />
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
  crossorigin="anonymous"
/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="limiter">
      <div class="container-table100">
        <div class="wrap-table100">
          <div class="table100">
    <table>
    <thead>
        <tr class="table100-head">
            <th class="column1">
                Time
            </th>  
  <?php            
        $sel2="select * from day_of_class";
        $t=2;
        $res2=mysqli_query($con,$sel2);
        while($row2=mysqli_fetch_row($res2))
        {
            if($t>7)
            {
                $t=7;
            }
            echo "<th class='column$t'>".$row2[1]."</th>";
            $t++;
        }
    ?>
    </thead>
        </tr>
<?php
    include '../../connection.php'; 
    $time_id = array();
    if($db)
    {
        $sel="select timeID,date_format(start_time,'%H:%i'),date_format(end_time,'%H:%i') from time_of_class";
        $res=mysqli_query($con,$sel);
        $sel3="select * from available_class";
        $res3=mysqli_query($con,$sel3);
        $sel4="select * from day_of_class";
        $res4=mysqli_query($con,$sel4);
        $res2=mysqli_query($con,$sel2);
        $f=$c=$i=$n=0;
        // while($row=mysqli_fetch_row($res))
        // {
        //     $time_id[]=$row[0];
        //     $n++; 
        // }
        $res=mysqli_query($con,$sel);
        while($row=mysqli_fetch_row($res))
        {
            // echo "HEELLOOO"; 
            $time_id[]=$row[0];
            echo "<tr><td>".$row[1]." To ".$row[2]."</td>
        ";
            $res3=mysqli_query($con,$sel3);
            while($row3=mysqli_fetch_row($res3))
            {
                if((strcmp($row3[1],$row[0])==0))
                {
                    $tmp=$row3[2];
                    for($j=0;$j<$tmp;$j++)
                    {
                        $t=2;
                        echo "<td class='column$t'>";
                        $t++;
                        if($j==$tmp-1)
                        {
                            // echo $row3[1]."SC: ".$row3[4]."CI: ".$row3[0]."FID: ".$row3[3]."DID: ".$row3[2];
                            echo $row3[4]."<br>".$row3[0]."  ".$row3[3];
                        }
                        echo "</td>";
                    }
                    break;
                }
            }
                echo ""."</tr>";
            }
        // $i=0;
        // while($row3=mysqli_fetch_row($res3))
        // {
        //     $i=0;
        //     while($i<$n)     
        //     {
        //         if(strcmp($row3[1],$time_id[$i])==0)
        //         {
        //             echo "<script src='text/javascript'>
        //             var table=document.getElementById('t1');
        //             for(var i=0;i<table.rows.length;i++)
        //             {
        //                 var cell=table.rows[i].insertCell(1);
        //                 cell.innerHTML=".$row3[1].";
        //             }
        //         </script>";
        //             break;
        //         }
        //         $i++;
        //     }
        // }
        // reset($row);
    }
    else
    {
        echo "Database Is Not Selected";
    }
?>
</div>
</div>
</div>
</div>
</table>
</body>
</html>