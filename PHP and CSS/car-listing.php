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
    <div class="container-bkimg">
        <img src="images/listing-detail-header-img.jpg"  style="width:100%;height:250px;opacity:0.5;border-radius:10px;">
        <h1 class="centered" > CAR  LISTING </h1>
    </div>

    <div style="background-color:#fbe3e8;"class="grid-container">
    <table style="padding: 10px 30px">
        <tr>
            <td><div style="width:300px;height:300px;background-color: rgba(255, 255, 255, 0.8);" class="grid-container-test" >
                <h2><i class="fa fa-filter" aria-hidden="true"></i> Find Your  Car </h2>
                <div class="sidebar_filter">
                    <form action="#" method="post">
                      <div class="form-group">
                        <select style="width: 100%;"class="form-control" name="brand">
                          <option>Select Brand</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <select style="width: 100%;" class="form-control" name="fueltype">
                        <option>Select Fuel Type</option>
                        <option value="Petrol">Petrol</option>
                        <option value="Diesel">Diesel</option>
                        <option value="CNG">CNG</option>
                      </select>
                    </div>
                   
                    <div class="form-group">
                        <button type="submit" style="width:100%;height:30px;background-color:#eb5454 ;" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
                    </div>
                  </form>
            </div>
        <br></td>
            <td rowspan="2" ><div style="width:700px;height:750px;background-color: rgba(255, 255, 255, 0.8);padding:10px 15px" class="grid-container-test" >
                <div  style="height:150px"class="card-test">
                    <img src="images/trending-car-img-1.jpg" style="height:150px;width:200px;border-radius: 8px;" alt="Avatar">
                    <B><h3><span>Nissan , Nissan GT-R</span> RS 2000 Per Day</h3></B>
                    <ul style="list-style-type: none;margin:20px;padding:5px;">
                        <li style="float: left;padding: 0px 5px ;"> <p> <i class="fa fa-car" aria-hidden="true"> </i> Petrol </p></li>
                        <li style="float: left;padding: 0px 5px ;"> <p> <i class="fa fa-calendar" aria-hidden="true"> </i> 2018 Model </p></li>
                        <li style="float: left;padding: 0px 5px ;"> <p> <i class="fa fa-user-circle-o" aria-hidden="true"> </i> 5 seats </p></li>
                        <li style="padding: 0px 4px ;"><button type="submit" style="width:150px;height:30px;background-color:#eb5454 ;" class="btn btn-block">View Details<i class="fa fa-angle-right" aria-hidden="true"></i></button></li>
                    </ul>
                </div>
                <div  style="height:150px"class="card-test">
                    <img src="images/BMW-5-Series-Exterior-102006.jpg" style="height:150px;width:200px;border-radius: 8px;" alt="Avatar">
                    <B><h3><span>BMW , BMW 5 series</span> RS 1000 Per Day</h3></B>
                    <ul style="list-style-type: none;margin:20px;padding:5px;">
                        <li style="float: left;padding: 0px 5px ;"> <p> <i class="fa fa-car" aria-hidden="true"> </i> Petrol </p></li>
                        <li style="float: left;padding: 0px 5px ;"> <p> <i class="fa fa-calendar" aria-hidden="true"> </i> 2020 Model </p></li>
                        <li style="float: left;padding: 0px 5px ;"> <p> <i class="fa fa-user-circle-o" aria-hidden="true"> </i> 5 seats </p></li>
                        <li style="padding: 0px 4px ;"><button type="submit" style="width:150px;height:30px;background-color:#eb5454 ;" class="btn btn-block">View Details<i class="fa fa-angle-right" aria-hidden="true"></i></button></li>
                    </ul>
                </div>
                <div  style="height:150px"class="card-test">
                    <img src="images/2015_Toyota_Fortuner_(New_Zealand).jpg" style="height:150px;width:200px;border-radius: 8px;" alt="Avatar">
                    <B><h3><span>Toyota , Toyota Fortunar</span> RS 1500 Per Day</h3></B>
                    <ul style="list-style-type: none;margin:20px;padding:5px;">
                        <li style="float: left;padding: 0px 5px ;"> <p> <i class="fa fa-car" aria-hidden="true"> </i> Petrol </p></li>
                        <li style="float: left;padding: 0px 5px ;"> <p> <i class="fa fa-calendar" aria-hidden="true"> </i> 2015 Model </p></li>
                        <li style="float: left;padding: 0px 5px ;"> <p> <i class="fa fa-user-circle-o" aria-hidden="true"> </i> 5 seats </p></li>
                        <li style="padding: 0px 4px ;"><button type="submit" style="width:150px;height:30px;background-color:#eb5454 ;" class="btn btn-block">View Details<i class="fa fa-angle-right" aria-hidden="true"></i></button></li>
                    </ul>
                </div>
                <div  style="height:150px"class="card-test">
                    <img src="images/1audiq8.jpg" style="height:150px;width:200px;border-radius: 8px;" alt="Avatar">
                    <B><h3><span>Audi , Audi Q8</span> RS 6600 Per Day</h3></B>
                    <ul style="list-style-type: none;margin:20px;padding:5px;">
                        <li style="float: left;padding: 0px 5px ;"> <p> <i class="fa fa-car" aria-hidden="true"> </i> Petrol </p></li>
                        <li style="float: left;padding: 0px 5px ;"> <p> <i class="fa fa-calendar" aria-hidden="true"> </i> 2015 Model </p></li>
                        <li style="float: left;padding: 0px 5px ;"> <p> <i class="fa fa-user-circle-o" aria-hidden="true"> </i> 5 seats </p></li>
                        <li style="padding: 0px 4px ;"><button type="submit" onclick="location.href='car booking.php';" style="width:150px;height:30px;background-color:#eb5454 ;" class="btn btn-block">View Details<i class="fa fa-angle-right" aria-hidden="true"></i></button></li>
                    </ul>
                </div>
            </div></td><p>&nbsp; </p>
        </tr>
        <tr>
            <td><div style="width:300px;height:350px;;background-color: rgba(255, 255, 255, 0.8);"class="grid-container-fac">
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
    </td>
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