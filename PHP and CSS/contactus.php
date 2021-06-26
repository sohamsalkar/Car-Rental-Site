<!DOCTYPE html>
<html>
<?php
// Initialize the session
session_start();
include("database.php");
?>
<head>
  <title>CAR RENTAL</title>
  <link rel="shortcut icon" href="css/favicon.ico">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
table td {
  padding: 15px;
  margin-top: 20px;
}
  </style>
</head>
<body style="background-color:#cdf9ff">
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
            
$id=$_SESSION["username"];
 $r=mysqli_query($conn,"SELECT * FROM `tblusers` WHERE id in (SELECT `id` FROM `users` where `username`='$id')");
 $s = mysqli_fetch_array($r);
            echo" <li style="."float:right"."><a href="."login.php"." class="."btn btn-one"."><i class="."fa fa-user-o"." aria-hidden="."true"."></i>  $s[FullName]</a></li> ";
        }
      
      ?>
      <?php
if(isset($_POST['consubmit']))
{
$FullName=  $_POST['firstname'];
$ContactNo=  $_POST['phone-no'];
$dob=  $_POST['mail'];
$Address=  $_POST['msg'];

 if(mysqli_query($conn, "INSERT INTO `tblcontactusquery`( `name`, `EmailId`, `ContactNumber`, `Message`, `status`) VALUES ('$FullName','$dob','$ContactNo','$Address','0') " )){
  echo '<script>alert ( "Query submitted!!" );</script>';  
  header("Refresh:0");
 }
 
}?>
    </ul>
  </div>
    <div class="container-bkimg">
        <img src="images/contact-page-header-img.jpg"  style="width:100%;height:250px;opacity:0.5;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
        <h1 class="centered" > CONTACT US </h1>
    </div>

    <div style="background-color:#cdf9ff;padding:50px;margin-left: 120px;">
        <div  style="padding:20px 30px;"class="grid-container-profile">
        <table style="padding:10px 20px">
            <tr>
                <td>
                <div>
                    <h2><i class="fa fa-paper-plane" aria-hidden="true"></i>  Get in touch using the form below</h2>
                    <div class="container">
                    <form method="post" action="contactus.php">
                        <div class="form-group">
                        <label class="control-label" for="fname">Full Name</label>
                        <br>
                        <input style="width:500px" class="form-control white_bg" type="text" id="fname" name="firstname" placeholder="Your name..">
                        <br>
                        </div>
                        <div class="form-group">
                        <label class="control-label" for="mail">Email Id</label>
                        <br>
                        <input style="width:500px" class="form-control white_bg" type="text" id="mail" name="mail" placeholder="abc@xyz.com">
                        <br>
                        </div>
                        <div class="form-group">
                        <label class="control-label" for="phone-no">Phone No.</label>
                        <br>
                        <input style="width:500px" class="form-control white_bg" type="text" id="phone-no" name="phone-no" placeholder="9876543210">
                        <br>
                        </div>
                        <div class="form-group">
                        <label class="control-label" for="subject">Message</label>
                        <br>
                        <textarea style="width:500px" class="form-control white_bg" id="message" name="msg" placeholder="Write something.." style="height:200px"></textarea>
                        <br>
                        </div>
                        <div class="form-group">
                        <input style="background-color: #eb5454;width:530px;border-radius:10px;height:30px" type="submit" name="consubmit" value="Submit">
                        </div>
                    </form>
                    </div>
                </div>
                   
                </td>
                
                <td style="padding:20px 30px;margin">
                <div>
                    <h2><i class="fa fa-handshake-o" aria-hidden="true"></i>  Contact Info</h2>
                    <div class="container">
                    <ul>
                        <li><h3><i class="fa fa-map-marker" aria-hidden="true"></i>  Airoli,Navi Mumbai-708.</h3>
                        </li>
                        <li><h3><i class="fa fa-envelope-o" aria-hidden="true"></i>  ritiesh3542@gmail.com
                        </li>
                        <li><h3><i class="fa fa-phone" aria-hidden="true"></i>   23657577
                        </li>
                    </ul>
                </div>
                </div>
                </td>
            </tr>
        </table>
        </div>
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