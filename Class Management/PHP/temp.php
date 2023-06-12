<?php
    include '../../connection.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous"
  />

  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

  <style>
    body {
      font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
        sans-serif;
      background: #c850c0;
      background: -webkit-linear-gradient(45deg, #4158d0, #c850c0);
      background: -o-linear-gradient(45deg, #4158d0, #c850c0);
      background: -moz-linear-gradient(45deg, #4158d0, #c850c0);
      background: linear-gradient(45deg, #4158d0, #c850c0);
    }
    .font-color-white {
      color: white;
    }
  </style>
  <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
  <body>

    <table class="font-color-white" style="display: flex; justify-content: center;">

    <form action="check_availability.php" method="get">
        <tr>
            <td>
                <h1>
                    Select ClassID
                </h1>
            </td>
            <td>
                
            <select
            name="ci"
            class="btn btn-success btn-lg"
            type="button"
            id="dropdownMenuButton"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
          <?php
            $sel="select * from class_info";
            $res=mysqli_query($con,$sel);
            while($row=mysqli_fetch_row($res))
            {
                echo "<option value='$row[0]'>".$row[0]."</option>";
            }   
          ?>
          </select>
            </td>
        </tr><tr>
            <td>
                <h1>
                    Select Day
                </h1>
            </td>
            <td>
                
            <select
            name="di"
            class="btn btn-success btn-lg"
            type="button"
            id="dropdownMenuButton"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
          <?php
            $sel2="select * from day_of_class";
            $res2=mysqli_query($con,$sel2);
            while($row2=mysqli_fetch_row($res2))
            {
                echo "<option value='$row2[0]'>".$row2[1]."</option>";
            }   
          ?>

            <!-- <option value="deni">monday</option>
            <option value="deni">tuesday</option>
            <option value="deni">wednday</option>
            <option value="deni">thursnday</option>
            <option value="deni">friday</option>
            <option value="deni">saturday</option> -->
          </select>
            </td>
        </tr>
      <tr>
        <td>
          <h1>Select Time  </h1>
        </td>
        <td>
                <select
                  name="ti"
                  class="btn btn-success btn-lg"
                  type="button"
                  id="dropdownMenuButton"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >

            <?php
                $sel3="select timeID,date_format(start_time,'%H:%i'),date_format(end_time,'%H:%i')  from time_of_class";
                $res3=mysqli_query($con,$sel3);
                while($row3=mysqli_fetch_row($res3))
                {
                    echo "<option value='$row3[0]'>".$row3[1]." To ".$row3[2]."</option>";
                }   
            ?>


                  <!-- <option value="deni">10:30 To 11:30</option>
                  <option value="deni">10:30 To 11:30</option>
                  <option value="deni">10:30 To 11:30</option>
                  <option value="deni">10:30 To 11:30</option>
                  <option value="deni">10:30 To 11:30</option>
                  <option value="deni">10:30 To 11:30</option> -->
                </select>
        </td>
      </tr>
      <tr>
        <td>
            <h1>
                Select Subject            </h1>
        </td>
        <td>
            
        <select
        name="sc"
        class="btn btn-success btn-lg"
        type="button"
        id="dropdownMenuButton"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >


      <?php
                $sel4="select *  from subject_details";
                $res4=mysqli_query($con,$sel4);
                while($row4=mysqli_fetch_row($res4))
                {
                    echo "<option value='$row4[1]'>".$row4[2]."</option>";
                }   
            ?>



        <!-- <option value="deni">Web Technologies</option>
        <option value="deni">Maths</option>
        <option value="deni">C++</option>
        <option value="deni">JAVA</option>
        <option value="deni">Python</option>
        <option value="deni">Web Technologies</option> -->
      </select>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <input type="submit" class=" btn btn-secondary btn-lg">
            </form>

        </td>
    </tr>
    </table>
    <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown button
        </button> -->
    </div>
  </body>
</html>
