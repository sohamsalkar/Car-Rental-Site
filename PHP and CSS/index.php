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
  <div class="banner-section">
    <div class="banner_content">
      <h1>&nbsp;</h1>
      <p>&nbsp; </p>
    </div>
  </div>
  <center>
    <div class="container">
    <h2 style="color: #bb265f; font-family: 'Trocchi', serif; font-size: 45px; font-weight: normal; line-height: 48px; margin:20px" color="red">Find the Best Car For You</h2>
    <a href="#test" ><div class="arrow"></div></a>
    </div>
  </center>
  <br>
  <br>
  <div class="grid-container" id="test">
    <div class="card">
      <div class="info"> <a href="#"><img src="images/1audiq8.jpg" style="width:100%;"></a>
      <ul>
      <li> <p> <i class="fa fa-car" aria-hidden="true"> </i> Petrol </p></li>
      <li> <p> <i class="fa fa-calendar" aria-hidden="true"> </i> 2019 Model </p></li>
      <li> <p> <i class="fa fa-user-circle-o" aria-hidden="true"> </i> 4 seats </p></li>
      </ul>
      </div>
        <div id="btn"><span style="float:left">NISSAN NICKS</span>
      <span style="float:right"> RS 800/Day </span> </DIV>
      <p style="margin:10px;padding:2px;">Latest Update: Nissan has launched the Kicks 2020 with a new turbochar</p>
    </div>
    <div class="card">
      <div class="info"> <a href="#"><img src="images/BMW-5-Series-New-Exterior-89729.jpg" style="width:100%;"></a>
        <ul>
          <li> <p> <i class="fa fa-car" aria-hidden="true"> </i> Petrol </p></li>
          <li> <p> <i class="fa fa-calendar" aria-hidden="true"> </i> 2018 Model </p></li>
          <li> <p> <i class="fa fa-user-circle-o" aria-hidden="true"> </i> 5 seats </p></li>
          </ul>
      </div>
        <div id="btn"><span style="float:left">BMW 5 </span>
      <span style="float:right"> RS 1000/Day </span> </DIV>
      <p style="margin:10px;padding:2px;">Latest Update: Nissan has launched the Kicks 2020 with a new turbochar</p>
    </div>
    <div class="card">
      <div class="info"> <a href="#"><img src="images/2015_Toyota_Fortuner_(New_Zealand).jpg" style="width:100%;"></a>
        <ul>
          <li> <p> <i class="fa fa-car" aria-hidden="true"> </i> Diesel </p></li>
          <li> <p> <i class="fa fa-calendar" aria-hidden="true"> </i> 2020 Model </p></li>
          <li> <p> <i class="fa fa-user-circle-o" aria-hidden="true"> </i> 6 seats </p></li>
          </ul>
      </div>
        <div id="btn"><span style="float:left">TOYOTA FORTUNAR</span>
      <span style="float:right"> RS 2000/Day </span> </DIV>
      <p style="margin:10px;padding:2px;">Latest Update: Nissan has launched the Kicks 2020 with a new turbochar</p>
    </div>
  </div>

  <br>
  <br>
  <table style="padding: 10px 30px">
    <tr>
      <td> <div class="grid-container-test">
        <h2>OUR TESTIMONIALS</h2>
        <div class="card-test">
          <img src="images/testimonial-img-1.jpg" style="width:90px;border-radius: 50%;" alt="Avatar">
          <B><p><span>Kalpesh Kamble.</span> CEO at Mighty Schools.</p></B>
          <p>“You made it so simple. My new site is so much faster and easier to work with than my old site. I just choose the page, make the change and click save.

            Thanks, guys!”</p>
      </div>
      <div class="card-test">
        <img src="images/comment-author-3.jpg" style="width:90px;border-radius: 50%;" alt="Avatar">
        <B><p><span>Jason Joseph</span> CEO at Mighty Schools.</p></B>
        <p>“You made it so simple. My new site is so much faster and easier to work with than my old site. I just choose the page, make the change and click save.

          Thanks, guys!”</p>
    </div>
    <div class="card-test">
      <img src="images/testimonial-img-3.jpg" style="width:90px;border-radius: 50%;" alt="Avatar">
      <B><p><span>Krutik Patil</span> CEO at Mighty Schools.</p></B>
      <p>“You made it so simple. My new site is so much faster and easier to work with than my old site. I just choose the page, make the change and click save.

        Thanks, guys!”</p>
  </div>
    </td>
      <td><div class="grid-container-fac">
        <table>
          <tr>
            <td ><center>
              <div class="card-fac">
                <h2><i class="fa fa-calendar" aria-hidden="true"></i>40+</h2>
                <p>Years In Business</p>
                </div
            </center></td>
            <td style="padding: 13px 10px"><center>
              <div class="card-fac">
                <h2><i class="fa fa-car" aria-hidden="true"></i>1200+</h2>
                <p>New Cars For Sale</p>
                </div
            </center></td>
          </tr>
          <tr>
            <td><center>
              <div class="card-fac">
                <h2><i class="fa fa-car" aria-hidden="true"></i>1000+</h2>
                <p>Used Cars For Sale</p>
                </div
            </center></td>
            <td style="padding: 13px 10px"><center>
              <div class="card-fac">
                <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>600+</h2>
                <p>Satisfied Customers</p>
                </div
            </center></td>
          </tr>
        </table>
      </div></td>
    </tr>
  </table>
<br>
<br>
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