<!DOCTYPE html>
<html>
<?php
// Initialize the session
session_start();
include("database.php");
?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

<head>
  <title>CAR RENTAL</title>
  <link rel="shortcut icon" href="css/favicon.ico">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

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
            echo " <li style="."float:right"."><a href="."login.php"." class="."btn btn-one".">$s[FullName]</a></li> ";
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
      <h2
        style="color: #bb265f; font-family: 'Trocchi', serif; font-size: 45px; font-weight: normal; line-height: 48px; margin:20px"
        color="red">Find the Best Car For You</h2>
      <a href="#test">
        <div class="arrow"></div>
      </a>
    </div>
  </center>
  <br>
  <br>
  <!-- -->
  <br>
  <center><input type="text" id="search-text" placeholder="Search..">



    <div id="search-result">
      <!-- <img id='search-poster' src=".$m." height='50px' width='50px' alt=''> -->
    </div>




    <script type="text/javascript">
      $(document).ready(function () {
        $('#search-text').keyup(function () {
          var txt = $(this).val();
          if (txt != '') {
            $.ajax({
              url: "search-fetchassi.php",
              method: "post",
              data: {
                search: txt
              },
              dataType: "text",
              success: function (data) {
                $('#search-result').html(data);
              }

            });
          } else {
            $('#search-result').html('');
          }
        });
      });
    </script>
  </center>
  <br>
  <?php 
       $all = mysqli_query($conn,"SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand limit 9");
        $record = array();
        while($row = mysqli_fetch_assoc($all) ){   
            $record[] = $row;
        }
    ?>

  <div class="grid-container" id="test">
    <?php foreach(  $record as $rec ){?>
    <div class="card">
      <div class="info"> <a href="car booking.php?vhid=<?php echo $rec['id'];?>"><img
            src="images/<?php echo $rec['Vimage1'];?>" style="width:100%;"></a>
        <ul>
          <li>
            <p> <i class="fa fa-car" aria-hidden="true"> </i> <?php echo $rec['FuelType']?> </p>
          </li>
          <li>
            <p> <i class="fa fa-calendar" aria-hidden="true"> </i> <?php echo $rec['ModelYear']?> Model </p>
          </li>
          <li>
            <p> <i class="fa fa-user-circle-o" aria-hidden="true"> </i> <?php echo $rec['SeatingCapacity']?> seats </p>
          </li>
        </ul>
      </div>
      <div id="btn"><span style="float:left"> <?php echo $rec['VehiclesTitle'];?> </span>
        <span style="float:right"> RS <?php echo $rec['PricePerDay']?>/Day </span> </DIV>
      <p style="margin:10px;padding:2px;"><?php echo substr($rec['VehiclesOverview'],0,70)?> </p>
    </div>
    <?php } ?>
  </div>

  <br>
  <br>
  <table style="padding: 10px 30px">
    <tr>
      <td>
        <div class="grid-container-test">

          <?php 
       $rev = mysqli_query($conn,"SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId ");
      
       $record = array();
        while($row = mysqli_fetch_assoc( $rev ) )
        {   
            $record[] = $row;
        }
    ?>
          <h2>OUR TESTIMONIALS</h2>
          <?php foreach(  $record as $rec ){?>
          <div class="card-test">
            <img src="images/testimonial-img-3.jpg" style="width:90px;border-radius: 50%;" alt="Avatar">
            <B>
              <p><span><?php echo $rec['FullName'];?></p>
            </B>
            <p><?php echo $rec['Testimonial'];?></p>
          </div>
          <?php } ?>

      </td>
      <td>
        <div class="grid-container-fac">
          <table>
            <tr>
              <td>
                <center>
                  <div class="card-fac">
                    <h2><i class="fa fa-calendar" aria-hidden="true"></i>40+</h2>
                    <p>Years In Business</p>
                  </div </center> </td> <td style="padding: 13px 10px">
                  <center>
                    <div class="card-fac">
                      <h2><i class="fa fa-car" aria-hidden="true"></i>1200+</h2>
                      <p>New Cars For Sale</p>
                    </div </center> </td> </tr> <tr>
              <td>
                <center>
                  <div class="card-fac">
                    <h2><i class="fa fa-car" aria-hidden="true"></i>1000+</h2>
                    <p>Used Cars For Sale</p>
                  </div </center> </td> <td style="padding: 13px 10px">
                  <center>
                    <div class="card-fac">
                      <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>600+</h2>
                      <p>Satisfied Customers</p>
                    </div </center> </td> </tr> </table> </div> </td> </tr> </table> <br>
                    <br>
                    <div class="footer-dark">
                      <table>
                        <tr>
                          <td>
                            <h3>Services</h3>
                            <ul>
                              <li><a href="car-listing.php">Car Booking</a></li>
                              <li><a href="contactus.php">Contact Us</a></li>
                              <li><a href="profile.php">My Profile</a></li>
                            </ul>
                          </td>
                          <td>
                            <h3>Connect with Us:</h3>
                            <ul>
                              <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"> </i> Facebook</a>
                              </li>
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
                                <p>Want your dream car for your journey, the cabs are neat and clean. This cabs are
                                  cheap and affordable for anyone. Want a luxury cab that suit your lifestyle, we have
                                  all types of luxury cars like BMW, Mercedes, Audi, Jaguar, etc.</p>
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