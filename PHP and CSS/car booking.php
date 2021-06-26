<!DOCTYPE html>
<html>
<?php
// Initialize the session
session_start();
include("database.php");
$vhid=$_GET['vhid'];
?>

<head>
  <title>CAR RENTAL</title>
  <link rel="shortcut icon" href="css/favicon.ico">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color:#fbe3e8">
  <div class="navigation">
    <ul>
      <li> <img src="./images/logo.jpg" height="65px" width="130"></li>
      <li> <a href="index.php">HOME</a></li>
      <li> <a href="aboutus.php">ABOUT US</a></li>
      <li> <a href="car-listing.php">CAR LISTING</a></li>
      <li> <a href="contactus.php">CONTACT US</a></li>
      <li> <a href="faq.php">FAQs</a></li>
      <?php
      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            echo" <li style="."float:right"."><a href="."login.php"." class="."btn btn-one".">Login / Register</a></li> ";
        }
        else{
          $id=$_SESSION["username"];
          $r=mysqli_query($conn,"SELECT * FROM `tblusers` WHERE id in (SELECT `id` FROM `users` where `username`='$id')");
          $s = mysqli_fetch_array($r); 
            echo" <li style="."float:right"."><a href="."login.php"." class="."btn btn-one"."><i class="."fa fa-user-o"." aria-hidden="."true"."></i>  $s[FullName]</a></li> ";
        }
      
      ?>
    </ul>
  </div>

  <?php
       
if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$message=$_POST['message'];
$useremail=$s['EmailId'];
$status=0;
$vhid=$_GET['vhid'];
$bookingno=mt_rand(100000000, 999999999);
$all=mysqli_query($conn, "SELECT * FROM tblbooking where ((date('$fromdate') BETWEEN date(FromDate) and date(ToDate)) || (date('$todate') BETWEEN date(FromDate) and date(ToDate)) || (date(FromDate) BETWEEN date('$fromdate') and date('$todate'))) and VehicleId=$vhid");
$row = mysqli_num_rows($all);
if(!$row)
{
  if(mysqli_query($conn,"INSERT INTO  tblbooking (BookingNumber,userEmail,VehicleId,FromDate,ToDate,message,Status) VALUES($bookingno,'$useremail',$vhid,'$fromdate','$todate','$message',$status)" ))
  {
  echo "<script>alert('Booking successfull.');</script>";
  echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
  }
  else 
  {
  echo "<script>alert('Something went wrong. Please try again');</script>";
  echo "<script type='text/javascript'> document.location = 'car booking.php?vhid=$vhid'; </script>";
  } 
}  
else{
 echo "<script>alert('Car already booked for these days');</script>"; 
 echo "<script type='text/javascript'> document.location = 'car booking.php?vhid=$vhid'; </script>";
}

}
       ?>
  <?php 
       $all=mysqli_query($conn, "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id= $vhid" );   
        $record = array();
        while($row = mysqli_fetch_assoc( $all ) ){   
            $record[] = $row;
        }
       ?>
  <?php foreach(  $record as $rec ){?>

  <div class="grid-container-bkg">
    <div><img src="images/<?php echo $rec['Vimage1'];?>" class="img-responsive" alt="image" height="400px"></div>
    <div><img src="images/<?php echo $rec['Vimage2'];?>" class="img-responsive" alt="image" height="400px"></div>
    <div><img src="images/<?php echo $rec['Vimage3'];?>" class="img-responsive" alt="image" height="400px"></div>
    <div><img src="images/<?php echo $rec['Vimage4'];?>" class="img-responsive" alt="image" height="400px"></div>
  </div>





  <div style="margin:20px;height:90px;display: block;background-color:rgb(98, 240, 169);border-radius: 10px;">
    <p style="padding:10px 50px;margin:30px;font-size: 50px;font-weight: 1200;"><span style="float:left">
        <?php echo $rec['BrandName'];?> , <?php echo $rec['VehiclesTitle'];?></span>
      <span style="float:right;color: red;"> RS <?php echo $rec['PricePerDay'];?>/Day </span>
    </p>
  </div>

  <div class="main_features">
    <ul>

      <li> <i class="fa fa-calendar" aria-hidden="true"></i>
        <h5><?php echo $rec['ModelYear'];?></h5>
        <p>Reg.Year</p>
      </li>
      <li> <i class="fa fa-cogs" aria-hidden="true"></i>
        <h5><?php echo $rec['FuelType'];?></h5>
        <p>Fuel Type</p>
      </li>

      <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
        <h5><?php echo $rec['SeatingCapacity'];?></h5>
        <p>Seats</p>
      </li>
    </ul>
  </div>




  <div style="margin-left:50px;background-color:#fbe3e8;" class="grid-container-sim">
    <table style="padding: 10px 80px">
      <tr>
        <td rowspan="2">
          <div style="width:700px;height:750px;background-color: rgba(255, 255, 255, 0.8);padding:10px 15px"
            class="grid-container-test">
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'ov')">Overview</button>
              <button class="tablinks" onclick="openCity(event, 'acc')">Acessories</button>
            </div>
            <div max-height="500px" id="ov" class="tabcontent">
              <?php echo $rec['VehiclesOverview'];?></div>

            <div id="acc" class="tabcontent">
              <div role="tabpanel" class="tab-pane" id="accessories">
                <!--Accessories-->
                <table width="600px">
                  <thead>
                    <tr>
                      <th colspan="2">Accessories</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Air Conditioner</td>
                      <?php if($rec['AirConditioner'] == 1){?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php }
                                  else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>

                    </tr>

                    <tr>
                      <td>AntiLock Braking System</td>
                      <?php if($rec['AntiLockBrakingSystem'] == 1){?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php }
                                  else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>

                    <tr>
                      <td>Power Steering</td>
                      <?php if($rec['PowerSteering'] == 1){?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php }
                                  else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>


                    <tr>
                      <td>Power Windows</td>
                      <?php if($rec['PowerWindows'] == 1){?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php }
                                  else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>

                    <tr>
                      <td>CD Player</td>
                      <?php if($rec['CDPlayer'] == 1){?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php }
                                  else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>

                    <tr>
                      <td>Leather Seats</td>
                      <?php if($rec['LeatherSeats'] == 1){?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php }
                                  else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>

                    <tr>
                      <td>Central Locking</td>
                      <?php if($rec['CentralLocking'] == 1){?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php }
                                  else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>

                    <tr>
                      <td>Power Door Locks</td>
                      <?php if($rec['PowerDoorLocks'] == 1){?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php }
                                  else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>

                    <tr>
                      <td>Brake Assist</td>
                      <?php if($rec['BrakeAssist'] == 1){?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php }
                                  else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>

                    <tr>
                      <td>Driver Airbag</td>
                      <?php if($rec['DriverAirbag'] == 1){?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php }
                                  else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>

                    <tr>
                      <td>Passenger Airbag</td>
                      <?php if($rec['PassengerAirbag'] == 1){?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php }
                                  else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>

                    <tr>
                      <td>Crash Sensor</td>
                      <?php if($rec['CrashSensor'] == 1){?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php }
                                  else { ?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <script>
              function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                  tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                  tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
              }
            </script>

        </td>
        <p>&nbsp; </p>
        <td>
          <div style="width:300px;height:500px;background-color: rgba(255, 255, 255, 0.8);" class="grid-container-test">
            <h2><i class="fa fa-envelope" aria-hidden="true"></i> Book now </h2>
            <div class="sidebar_filter">
              <form method="post">
                <div class="form-group select">
                  <label>From Date:</label>
                  <br>
                  <input type="date" class="form-control" name="fromdate" placeholder="From Date" required>
                </div>
                <div class="form-group">
                  <label>To Date:</label><br>
                  <input type="date" class="form-control" name="todate" placeholder="To Date" required>
                </div>
                <div class="form-group"><br>
                  <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
                </div>
            </div>
            <?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
              {?>
            <a href="login.php"><i class="fa fa-user" aria-hidden="true"></i> LOGIN FOR BOOK</a>
            <?php } else { ?>
            <div class="form-group"><br>
              <button type="submit" name="submit" style="width:100%;height:30px;background-color:#eb5454 ;"
                class="btn btn-block"><i class="fa fa-envelope" aria-hidden="true"></i> Book now </button>
            </div>

            <?php } ?>
            </form>
          </div>
          <br>
        </td>
      </tr>
      <!--  <tr>
            <td><div style="width:300px;height:150px;;background-color: rgba(255, 255, 255, 0.8);"class="grid-container-fac">
                <h2><i class="fa fa-car" aria-hidden="true"></i> Recently Listed Cars</h2>
                <div style="height:200px;width:230px;background-color:#e0ddde;padding-bottom:5px;margin-top:5px;" class="card-test">
                  <img src="images/recent-car-1.jpg" style="width:220px;" alt="Avatar">
                  <br>
                  <a href="car booking.php"><B style="border-radius: 10px;padding:0px 2px;width:100%;border: 0.1875em solid #0F1C3F;;float:left;display: block;background-color: blanchedalmond;"><P style="float:left;"">BMW GT</P><span><P style="float:right">RS 600/DAY</P></span></B></a>
              </div>
              <div style="height:200px;width:230px;background-color:#e0ddde;padding-bottom:5px;margin-top:5px;" class="card-test">
                  <img src="images/recent-car-2.jpg" style="width:220px;" alt="Avatar">
                  <br>
                  <a href="car booking.php"><B style="border-radius: 10px;padding:0px 2px;width:100%;border: 0.1875em solid #0F1C3F;;float:left;display: block;background-color: blanchedalmond;"><P style="float:left;"">BMW GT</P><span><P style="float:right">RS 600/DAY</P></span></B></a>
              </div>
              <div style="height:200px;width:230px;background-color:#e0ddde;padding-bottom:5px;margin-top:5px;" class="card-test">
                  <img src="images/recent-car-3.jpg" style="width:220px;" alt="Avatar">
                  <br>
                  <a href="car booking.php"><B style="border-radius: 10px;padding:0px 2px;width:100%;border: 0.1875em solid #0F1C3F;;float:left;display: block;background-color: blanchedalmond;"><P style="float:left;"">BMW GT</P><span><P style="float:right">RS 600/DAY</P></span></B></a>
              </div>
            </div></td>
        </tr> -->

    </table>
  </div>
  <?php } ?>


  <br><br>
  <div class="footer-dark">
    <table>
      <tr>
        <td>
          <h3>Services</h3>
          <ul>
            <li><a href="car booking.php">Car Booking</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
            <li><a href="profile.php">My Profile</a></li>
          </ul>
        </td>
        <td>
          <h3>Connect with Us:</h3>
          <ul>
            <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"> </i> Facebook</a></li>
            <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"> </i> Twitter</a></li>
            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"> </i> Instagram</a></li>
          </ul>
        </td>
        <td>
          <h3>About</h3>
          <ul>
            <li><a href="aboutus.php">Company</a></li>
            <li><a href="aboutus.php">Team</a></li>
            <li><a href="aboutus.php">Careers</a></li>
          </ul>
        </td>
        <td width="60%">
          <h3>Car Rental Company</h3>
          <ul>
            <li>
              <p>Want your dream car for your journey, the cabs are neat and clean. This cabs are cheap and affordable
                for anyone. Want a luxury cab that suit your lifestyle, we have all types of luxury cars like BMW,
                Mercedes, Audi, Jaguar, etc.</p>
            </li>
          </ul>
        </td>
      </tr>
    </table>
    <p style="margin:30px;text-align:center">Car Rental © 2020</p>
  </div>
  </div>

</body>

</html>