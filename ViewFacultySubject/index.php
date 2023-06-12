<?php
  include "../connection.php";
  $res1=mysqli_query($con,"select * from subject_details");
  // while($row=mysqli_fetch_assoc($res1))
  // {
  //   echo $row["facultyID"]."   ".$row["subjectCode"];
  // }
?>
<!DOCTYPE html>
<html lang="en">
  <!-- Mirrored from colorlib.com/etc/tb/Table_Responsive_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2023 17:37:03 GMT -->
  <head>
    <title>Faculty Subject</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/bootstrap/css/bootstrap.min.css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />

    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/select2/select2.min.css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/perfect-scrollbar/perfect-scrollbar.css"
    />

    <link rel="stylesheet" type="text/css" href="css/util.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

    <meta name="robots" content="noindex, follow" />
    <!-- <script nonce="33493fb3-6849-4f3a-b268-cc52eddc62e2">
      (function (w, d) {
        !(function (bv, bw, bx, by) {
          bv[bx] = bv[bx] || {};
          bv[bx].executed = [];
          bv.zaraz = { deferred: [], listeners: [] };
          bv.zaraz.q = [];
          bv.zaraz._f = function (bz) {
            return function () {
              var bA = Array.prototype.slice.call(arguments);
              bv.zaraz.q.push({ m: bz, a: bA });
            };
          };
          for (const bB of ["track", "set", "debug"])
            bv.zaraz[bB] = bv.zaraz._f(bB);
          bv.zaraz.init = () => {
            var bC = bw.getElementsByTagName(by)[0],
              bD = bw.createElement(by),
              bE = bw.getElementsByTagName("title")[0];
            bE && (bv[bx].t = bw.getElementsByTagName("title")[0].text);
            bv[bx].x = Math.random();
            bv[bx].w = bv.screen.width;
            bv[bx].h = bv.screen.height;
            bv[bx].j = bv.innerHeight;
            bv[bx].e = bv.innerWidth;
            bv[bx].l = bv.location.href;
            bv[bx].r = bw.referrer;
            bv[bx].k = bv.screen.colorDepth;
            bv[bx].n = bw.characterSet;
            bv[bx].o = new Date().getTimezoneOffset();
            if (bv.dataLayer)
              for (const bI of Object.entries(
                Object.entries(dataLayer).reduce((bJ, bK) => ({
                  ...bJ[1],
                  ...bK[1],
                }))
              ))
                zaraz.set(bI[0], bI[1], { scope: "page" });
            bv[bx].q = [];
            for (; bv.zaraz.q.length; ) {
              const bL = bv.zaraz.q.shift();
              bv[bx].q.push(bL);
            }
            bD.defer = !0;
            for (const bM of [localStorage, sessionStorage])
              Object.keys(bM || {})
                .filter((bO) => bO.startsWith("_zaraz_"))
                .forEach((bN) => {
                  try {
                    bv[bx]["z_" + bN.slice(7)] = JSON.parse(bM.getItem(bN));
                  } catch {
                    bv[bx]["z_" + bN.slice(7)] = bM.getItem(bN);
                  }
                });
            bD.referrerPolicy = "origin";
            bD.src =
              "../../../cdn-cgi/zaraz/sd0d9.js?z=" +
              btoa(encodeURIComponent(JSON.stringify(bv[bx])));
            bC.parentNode.insertBefore(bD, bC);
          };
          ["complete", "interactive"].includes(bw.readyState)
            ? zaraz.init()
            : bv.addEventListener("DOMContentLoaded", zaraz.init);
        })(w, d, "zarazData", "script");
      })(window, document);
    </script> -->
      <script>
        function myfunction()
        {
          location.href="../HomePage/sidebar-01/index.php";
        }
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
                  <th class="column1">Subject Code</th>
                  <th class="column2">Subject Name</th>
                  <th class="column3">Faculty ID</th>
                  <th class="column4">Faculty Name</th>
                </tr>
              </thead>
              <tbody>
              <?php
              while($row=mysqli_fetch_assoc($res1))
              {
                echo "<tr>";
                echo "<td class='column1'>".$row["subjectCode"]."</td>";
                echo "<td class='column2'>".$row["subjectName"]."</td>";
                echo "<td class='column3'>".$row["facultyID"]."</td>";
                $res2 = mysqli_query($con, "SELECT fullName FROM users WHERE userID = (SELECT userID FROM faculty WHERE facultyID = '".$row['facultyID']."')");
                $row2=mysqli_fetch_row($res2);
                echo "<td class='column4'>".$row2[0]."</td>";
                echo "</tr>";
              }?>
                <!-- 2nd<tr>
                  <td class="column1">22CP301</td>
                  <td>Present</td>2nd -->
                  <!-- <td class="column3">iPhone X 64Gb Grey</td>
                  <td class="column4">$999.00</td>
                  <td class="column5">1</td>
                  <td class="column6">$999.00</td>
                  <td class="column7">
                    <button type="button" class="btn btn-primary">
                      Primary
                    </button>
                  </td> -->
                <!-- 2nd</tr>
                <tr>
                  <td class="column1">22CP302</td>
                  <td class="column2">Present</td>
                  
                </tr>2nd -->
                <!-- 2nd<tr>
                  <td class="column1">22CP302</td>
                    <td class="column2">Present</td>
                  </tr>
                  <tr>
                    <td class="column1">22CP302</td>
                    <td class="column2">Present</td>
                  </tr>
                  <tr>
                    <td class="column1">22CP302</td>
                    <td class="column2">Present</td>
                  </tr>
                  <tr>
                    <td class="column1">22CP302</td>
                    <td class="column2">Present</td>
                  </tr>
                  <tr>
                    <td class="column1">22CP302</td>
                    <td class="column2">Present</td>
                  </tr>2nd -->
 

              </tbody>
            </table>

            <button type="button" onclick="myfunction()" id="home" class="mt-3 btn btn-success btn-lg float-right">Home</button>
            <br />
            <!-- <button type="button"  onclick="window.location.href = 'lec.html';"  class="btn btn-success btn-lg float-right">Book Lecture Slot</button> -->
          </div>
        </div>
      </div>
    </div>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="vendor/select2/select2.min.js"></script>

    <script src="js/main.js"></script>

    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
    ></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "UA-23581568-13");
    </script>
    <script
      defer
      src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
      integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
      data-cf-beacon='{"rayId":"7a760ae1e8dd03bd","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}'
      crossorigin="anonymous"
    ></script>
  </body>

  <!-- Mirrored from colorlib.com/etc/tb/Table_Responsive_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2023 17:37:07 GMT -->
</html>
