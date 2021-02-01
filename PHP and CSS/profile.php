<!DOCTYPE html>
<html>
    <?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php 
include("database.php");
$id=$_SESSION["username"];
?>
<head>
  <title>CAR RENTAL</title>
  <link rel="shortcut icon" href="css/favicon.ico">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
      table {
	margin:0 0 30px;
	width:100%;
}
table th, table td {
  border: 1px solid #282d32;
  padding: 15px;
}
table th img, table td img {
	max-width:100%;
}
table thead {
	background:#eee;
}
table thead th, table thead td {
	text-transform:uppercase;
	font-weight:900;
	color:#111;
}
  </style>
</head>
<body style="background-color:#cdf9ff">
<?php
 $r=mysqli_query($conn,"SELECT * FROM `tblusers` WHERE id in (SELECT `id` FROM `users` where `username`='$id')");
 $s = mysqli_fetch_array($r);
?>
  <div class="navigation">
  <ul >
      <li> <img src="./images/logo.jpg" height="65px" width="130"></li>
      <li> <a href="index.php">HOME</a></li>
      <li> <a href="aboutus.php">ABOUT US</a></li>
      <li> <a href="car-listing.php">CAR LISTING</a></li>
      <li> <a href="contactus.php">CONTACT US</a></li>
      <li> <a href="faq.php">FAQs</a></li>
      <li style="float:right"><a href="profile.php" class="btn btn-one"><i class="fa fa-user-o" aria-hidden="true"></i>  <?php echo "$s[FullName]";?></a></li>
    </ul>
  </div>
    <div class="container-bkimg">
        <img src="images/blog-page-header-img.jpg"  style="width:100%;height:250px;opacity:0.8;border-bottom-right-radius:10px;border-bottom-left-radius:10px;">
        <h1 class="centered" > MY ACCOUNT </h1>
    </div>

    <div style="background-color:#cdf9ff;padding:50px;margin-left: 130px;">
        <div  class="grid-container-profile">
            <div class="tabp" style="background-color: #5CDB95;float: left;width: 30%;height: 1000px">
                <button style="text-align: left;width: 100%;" class="tablinks" onclick="openCity(event, 'ps')" id="defaultOpen">Profile Settings</button>
                <button style="text-align: left;width:100%" class="tablinks" onclick="openCity(event, 'up')">Update Password</button>
                <button style="text-align: left;width:100%" class="tablinks" onclick="openCity(event, 'mb')">My Bookings</button>
                <button style="text-align: left;width:100%" class="tablinks" onclick="openCity(event, 'pt')">Post a Testimonial</button>
                <button style="text-align: left;width:100%" class="tablinks" onclick="openCity(event, 'mt')">My Testimonials</button>
                <button style="text-align: left;width:100%" class="tablinks" onclick="location.href='logout.php'">Sign out</button>
            </div>
              
              <div id="ps" class="tabcontentp">
                <h3><u>GENERAL SETTINGS</u></h3>
                    <form  method="post" action="#" onsubmit="#">
                        <div class="form-group">
                           <label class="control-label">Reg Date - <?php echo "$s[RegDate]";?></label>
                         </div>
                         <div class="form-group">
                           <label class="control-label">Last Update at - <?php echo "$s[UpdationDate]";?></label>
                         </div>
                         <br>
                         <div class="form-group">
                           <label class="control-label">Full Name</label><br><br>
                           <input style="width:500px" class="form-control white_bg" name="fullname" value="<?php echo "$s[FullName]";?>" id="fullname" type="text"  required>
                         </div>
                         <div class="form-group">
                           <label class="control-label">Email Address</label><br><br>
                           <input style="width:500px" class="form-control white_bg" value="<?php echo "$s[EmailId]";?>" name="emailid" id="email" type="email" required readonly>
                         </div>
                         <div class="form-group">
                           <label class="control-label">Phone Number</label><br><br>
                           <input style="width:500px" class="form-control white_bg" name="mobilenumber" value="<?php echo "$s[ContactNo]";?>" id="phone-number" type="text" required>
                         </div>
                         <div class="form-group">
                           <label class="control-label">Date of Birth&nbsp;(dd/mm/yyyy)</label><br><br>
                           <input style="width:500px" class="form-control white_bg" value="<?php echo "$s[dob]";?>" name="dob" placeholder="dd/mm/yyyy" id="birth-date" type="text" >
                         </div>
                         <div class="form-group">
                           <label class="control-label">Your Address</label><br><br>
                           <textarea style="width:500px" class="form-control white_bg" name="address" rows="4" ><?php echo "$s[Address]";?></textarea>
                         </div>
                         <div class="form-group">
                           <label class="control-label">Country</label><br><br>
                           <input style="width:500px" class="form-control white_bg"  id="country" name="country" value="<?php echo "$s[Country]";?>" type="text">
                         </div>
                         <div class="form-group">
                           <label class="control-label">City</label><br><br>
                           <input style="width:500px" class="form-control white_bg" id="city" name="city" value="<?php echo "$s[City]";?>" type="text">
                         </div>
                         <div class="form-group">
                            <label class="control-label" for="img">Photo</label><br><br>
                            <input style="width:500px" class="form-control white_bg"  type="file" id="img" name="img" accept="image/*">
                         </div>
                        
                         <div class="form-group">
                           <button style="background-color: #eb5454;" type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                         </div>
                       </form>
              </div>
              
              <div id="up" class="tabcontentp">
                <h3><u>UPDATE PASSWORD</u></h3>
                <br>
                <form name="chngpwd" method="post" onSubmit="#">
                    <div class="form-group">
                      <label class="control-label">Current Password</label><br><br>
                      <input style="width:500px" class="form-control white_bg" id="password" name="password"  type="password" required>
                    </div>
                    <div cl
                    <div class="form-group">
                      <label class="control-label">Password</label><br><br>
                      <input style="width:500px" class="form-control white_bg" id="newpassword" type="password" name="newpassword" required>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Confirm Password</label><br><br>
                      <input style="width:500px" class="form-control white_bg" id="confirmpassword" type="password" name="confirmpassword"  required>
                    </div>
                    <br><br>
                    <div class="form-group">
                       <input style="background-color: #eb5454;" type="submit" value="Update" name="updatepass" id="submit" class="btn btn-block">
                    </div>
                  </form> 
              </div>
              
              <div id="mb" class="tabcontentp">
                <h3><u>MY BOOKINGS</u></h3><br><br>
                <div  style="height:500px;color:#05386B;padding:10px 10px;"class="card-test">
                    <h3 style="color:#eb5454">BOOKING NO #123456789  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a style="width:110px;color: #05386B;border: 1px solid #248107;" class="btn outline btn-xs active-btn">CONFIRMED</a></h3>
                    <hr style="width: 100%;">
                    <img src="images/BMW-5-Series-Exterior-102006.jpg" style="height:150px;width:200px;border-radius: 8px;" alt="Avatar">
                    <br>
                    <B><h3>BMW , BMW 5 series</h3></B>
                    <p>From 2020-07-07 To 2020-07-09</p>
                    <p>Message: What is the cost</p>
                    <br>
                    <hr style="width: 100%;">
                    <h3>INVOICE</h3>
                    <table>
  <tr>
    <th>Car Name</th>
    <th>From Date</th>
    <th>To Date</th>
    <th>Total Days</th>
    <th>Rent / Day</th>
  </tr>
  <tr>
    <td>BMW , BMW 5 series</td>
     <td>2020-07-07</td>
      <td>2020-07-09</td>
       <td>2</td>
        <td>500</td>
  </tr>
  <tr>
    <th colspan="4" style="text-align:center;"> Grand Total</th>
    <th>1000</th>
  </tr>
</table>
                </div>
              </div>

              <div id="pt" class="tabcontentp">
                <h3><u>POST TESTIMONIAL</u></h3>
                <br>
                <form  method="post">
                    <div class="form-group">
                      <label class="control-label">Testimonail</label><br><br>
                      <textarea style="width:500px;height:200px;" class="form-control white_bg" name="testimonial" rows="4" required=""></textarea>
                    </div><br><Br>
                    <div class="form-group">
                      <button style="background-color: #eb5454;" type="submit" name="submit" class="btn">Save  <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                    </div>
                  </form>
              </div>

              <div id="mt" class="tabcontentp">
                <h3><u>MY TESTIMONIALS</u></h3>
                <br><bR>
                    <div style="color: #05386B"class="card-test">
                        <p>I am satisfied with their service great job</p>
                        <p><b>Posting Date:</b>2020-07-07 20:00:12</p>
                        <p style="float:right"><a style="color: #05386B;display: block;border: 1px solid #05386B;" class="btn outline btn-xs active-btn">Active</a></p>
                    </div><br><bR>
                        <div style="color: #05386B"class="card-test">
                            <p>Car was in excellent condition</p>
                            <p><b>Posting Date:</b>2020-07-07 20:00:12</p>
                            <p style="float:right"><a style="color: #05386B;display: block;border: 1px solid #05386B;" class="btn outline btn-xs active-btn">Active</a></p>
                        </div><br><bR>
                            <div style="color: #05386B"class="card-test">
                                <p>Very useful and easy website</p>
                                <p><b>Posting Date:</b>2020-07-07 20:00:12</p>
                                <p style="float:right"><a style="color: #05386B;display: block;border: 1px solid #05386B;" class="btn outline btn-xs active-btn">Active</a></p>
                            </div><br><bR>
              </div>

              <div id="so" class="tabcontentp">
                <h3>Tokyo</h3>
                <p>Tokyo is the capital of Japan.</p>
              </div>
              
              <script>
              function openCity(evt, cityName) {
                var i, tabcontentp, tablinks;
                tabcontentp = document.getElementsByClassName("tabcontentp");
                for (i = 0; i < tabcontentp.length; i++) {
                  tabcontentp[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                  tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
              }
              
              // Get the element with id="defaultOpen" and click on it
              document.getElementById("defaultOpen").click();
              </script>


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