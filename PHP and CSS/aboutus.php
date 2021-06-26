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
    <img src="images/aboutus-page-header-img.jpg"
      style="width:100%;height:250px;opacity:0.5;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
    <h1 class="centered"> ABOUT US </h1>
  </div>

  <div style="background-color:#cdf9ff;padding:50px;margin-left: 112px;">
    <div style="padding:20px 30px;" class="grid-container-profile">
      <center>
        <h2><i class="fa fa-users" aria-hidden="true"></i> About us</h2>
        <div class="container">
          <p> About Car Rental: Car Rental is a global leader in online car booking, with own branches and franchisee
            across India. This has a proven partner focused network of online car rental services. which has enabled
            clients in more than 99+ cities to avail our car hire services. This has made us outperform the competition
            and stay ahead of the innovative services.
            With the help enterprises transform and thrive in a changing world through strategic consulting.
            Operational leadership and the co-creation of breakthrough software solutions.
            For reservations, operations till speedy Invoice delivery to our corporate and direct clients across India.
            Car Rental has a growing country wide presence with more than 97+ cities network. And also to serve its
            clients at one single point all cab booking services.
            At Car Rental, we believe our responsibilities and also extend beyond business.
            So that’s why we have established strong customer relationship which makes our clients to use our services
            repeatedly.
            At Car Rental, Chauffeurs are Polite, highly efficient, well-mannered, English speaking, Experience in
            handling corporates. And also foreign clients, dressed in Uniforms, black shoes and carry a mobile.
            Car Rental known for, PAN India car rental services round the clock, 29 years experience. And also Airport
            transfers expertise and Chauffeur courteous. Car Rental services, cheap rental car, Hybrid rental car. All
            the cars seats well equipped with comfortable cushions, Mobile recharger, tissue paper box, reading light.
            Car Rental provides standard size cars as well as large cars according to your choice and also for all make
            of cars as per your budget.
            Travelocar has overcome ubiquitous problem in India for the people to get a good quality car at affordable
            rates for their outstation or full day city travel plans.</p>
        </div>
      </center>
    </div>
  </div>

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