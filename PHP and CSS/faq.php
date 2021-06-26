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
          include("database.php");
$id=$_SESSION["username"];
 $r=mysqli_query($conn,"SELECT * FROM `tblusers` WHERE id in (SELECT `id` FROM `users` where `username`='$id')");
 $s = mysqli_fetch_array($r);
            echo" <li style="."float:right"."><a href="."login.php"." class="."btn btn-one"."><i class="."fa fa-user-o"." aria-hidden="."true"."></i>  $s[FullName]</a></li> ";
        }
      
      ?>
    </ul>
  </div>
    <div class="container-bkimg">
        <img src="images/fun-facts-bg.jpg"  style="width:100%;height:250px;opacity:0.5;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
        <h1 class="centered" > FAQs </h1>
        
    </div>

    <div style="background-color:#cdf9ff;padding:50px;margin-left: 112px;">
        <div  style="padding:20px 30px;"class="grid-container-profile">
        <center>
        <h2><i class="fa fa-eye" aria-hidden="true"></i>  How can we help you?</h2>
        <div class="container">
            <p>
            Q. How old do I need to be to rent a Car from car project?<Br>
A. You can rent an car project Self Drive car if you are 18 years or above.
<Br>
Q. How can I reserve a car?<Br>
Ans. You can make a reservation through “car project India” website www.car project.co.in or mobile App.
<Br>
Q. is there an option to rent a car for a longer period ?<Br>
Ans.With car project  , allows you to get a price benefit when you book for 7 days and above on select car models. Rentals start for as low as Rs 1250/day.
<Br>
<Br>
Q. Do I need to pick up the car from car project rental office?<Br>
Ans. All the cars are delivered and collected free of cost to the address specified at the time of making a booking. Note; cars will not be delivered to any public places like malls, metro station, etc.

car project holds the right to cancel the booking in such case.
<Br>
Q. I need to drop off the car at a different location, can I do that?<Br>
Ans. No. The car will be collected by our driver from the place to where it was delivered.
<Br>
        </div>
        </center>
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