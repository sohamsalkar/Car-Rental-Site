<!DOCTYPE html>
<html>
<?php
// Initialize the session
session_start();
?>
<head>
  <title>CAR RENTAL</title>
  <link rel="shortcut icon" href="css/favicon.ico">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color:#fbe3e8">
  <div class="navigation">
  <ul >
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
            include("database.php");
$id=$_SESSION["username"];
 $r=mysqli_query($conn,"SELECT * FROM `tblusers` WHERE id in (SELECT `id` FROM `users` where `username`='$id')");
 $s = mysqli_fetch_array($r);
            echo" <li style="."float:right"."><a href="."login.php"." class="."btn btn-one"."><i class="."fa fa-user-o"." aria-hidden="."true"."></i>  $s[FullName]</a></li> ";
        }
      
      ?>
    </ul>
  </div>

  <div class="grid-container-bkg">
    <div class="card1">
            <img  align-items="center" style="box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.2);border-radius: 10px;width:400px;max-height: 400px;" src="images/featured-img-3.jpg" >
    </div>
    <div class="card2">
            <img src="images/Best-Nissan-Cars-in-India-New-and-Used-1.jpg" style="box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.2);border-radius: 10px;max-height: 400px;width:400px;">
    </div>
    <div class="card3">
            <img src="images/2bb3bc938e734f462e45ed83be05165d.jpg" style="box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.2);border-radius: 10px;max-height: 400px;width:400px">
    </div>
    <div class="card4">
            <img src="images/2020-nissan-gtr-rakuda-tan-semi-aniline-leather-interior.jpg" style="box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.2);border-radius: 10px;max-height: 400px;width:400px">
    </div>
    <div class="card5">
            <img src="images/images.jpg" style="box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.2);border-radius: 10px;width:400px;max-height: 400px;">
    </div>
    <div class="card6">
            <img src="images/Nissan-GTR-Right-Front-Three-Quarter-84895.jpg" style="box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.2);border-radius: 10px;max-height: 400px;width:400px">
    </div>
</div>
<div style="margin:20px;height:90px;display: block;background-color:rgb(98, 240, 169);border-radius: 10px;">
    <p style="padding:10px 50px;margin:30px;font-size: 50px;font-weight: 1200;"><span style="float:left"> Nissan , Nissan GT-R </span>
        <span style="float:right;color: red;"> RS 5000/Day </span> 
    </p>
  </div>
  
  <div class="main_features">
    <ul>
    
      <li> <i class="fa fa-calendar" aria-hidden="true"></i>
        <h5>2018</h5>
        <p>Reg.Year</p>
      </li>
      <li> <i class="fa fa-cogs" aria-hidden="true"></i>
        <h5>Petrol</h5>
        <p>Fuel Type</p>
      </li>
 
      <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
        <h5>5</h5>
        <p>Seats</p>
      </li>
    </ul>
  </div>
  <div style="margin-left:50px;background-color:#fbe3e8;"class="grid-container-sim">
    <table style="padding: 10px 80px">
        <tr>
            <td rowspan="2" ><div style="width:700px;height:750px;background-color: rgba(255, 255, 255, 0.8);padding:10px 15px" class="grid-container-test" >
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'ov')">Overview</button>
                    <button class="tablinks" onclick="openCity(event, 'acc')">Acessories</button>
                </div>
                <div  max-height="500px" id="ov" class="tabcontent">
                    <p fontsize="20px" padding="10px 20px" >The GT-R packs a 3.8-litre V6 twin-turbocharged petrol, which puts out 570PS of max power at 6800rpm and 637Nm of peak torque. The engine is mated to a 6-speed dual-clutch transmission in an all-wheel-drive setup. The 2+2 seater GT-R sprints from 0-100kmph in less than 3 hours.The updated Nissan GT-R has the same twin-turbocharged 3,799 cc (3.8 L; 231.8 cu in) V6 VR38DETT engine. but increased the engine output to (419 kW (570 PS; 562 hp) at 6,400 rpm and 633 N⋅m (467 lbf⋅ft) at 3,200–5,800 rpm). The transmission system is also refined to shift the gears quicker than before.

                      Other updates include a new front and rear end, bumpers design have been added to improve air cooling system and aerodynamics, new leather has been added to whole interior with a new steering wheel, new infotainment systems and redesigned centre console, new 20-inch aluminium forged wheels, new suspension system, new titanium exhaust system, and new braking systems were added to newly updated GT-R.</h3>
                  </div>
                  
                  <div id="acc" class="tabcontent">
                    <div role="tabpanel" class="tab-pane" id="accessories"> 
                      <!--Accessories-->
                      <table width="600px" >
                        <thead>
                          <tr>
                            <th colspan="2">Accessories</th>
                          </tr>
                        </thead>
                          <tbody>
                          <tr>
                          <td>Air Conditioner</td>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                          
                          <tr>
                          <td>AntiLock Braking System</td>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                          
                          <tr>
                          <td>Power Steering</td>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                                            
                          
                          <tr>
                          <td>Power Windows</td>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                                            
                          <tr>
                          <td>CD Player</td>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                          
                          <tr>
                          <td>Leather Seats</td>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                          
                          <tr>
                          <td>Central Locking</td>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                          
                          <tr>
                          <td>Power Door Locks</td>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          </tr>

                          <tr>
                          <td>Brake Assist</td>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          </tr>
                          
                          <tr>
                          <td>Driver Airbag</td>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          </tr>
                          
                          <tr>
                          <td>Passenger Airbag</td>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          </tr>
                          
                          <tr>
                          <td>Crash Sensor</td>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
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
            
            </td><p>&nbsp; </p>
            <td><div style="width:300px;height:500px;background-color: rgba(255, 255, 255, 0.8);" class="grid-container-test" >
                <h2><i class="fa fa-envelope" aria-hidden="true"></i> Book now </h2>
                <div class="sidebar_filter">
                    <form action="#" method="post">
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
                   
                    <div class="form-group"><br>
                        <button type="submit" style="width:100%;height:30px;background-color:#eb5454 ;" class="btn btn-block"><i class="fa fa-envelope" aria-hidden="true"></i> Book now </button>
                    </div>
                  </form>
            </div>
        <br></td>
        </tr>
        <tr>
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
        </tr>
        
    </table>
    </div>



  <br><br>
  <div class="footer-dark">
    <table>
      <tr>
        <td>
          <h3 >Services</h3>
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
          </ul></td>
        <td width="60%"> 
  <h3>Car Rental Company</h3>
  <ul>
    <li><p>Want your dream car for your journey, the cabs are neat and clean. This cabs are cheap and affordable for anyone. Want a luxury cab that suit your lifestyle, we have all types of luxury cars like BMW, Mercedes, Audi, Jaguar, etc.</p></li>
</ul>
</td>
      </tr>
    </table>
  <p style="margin:30px;text-align:center">Car Rental © 2020</p>
</div>
</div>

</body>
</html>