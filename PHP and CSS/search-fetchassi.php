<html>
<head>
  <title>CAR RENTAL</title>
  <link rel="shortcut icon" href="css/favicon.ico">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="grid-container" id="test">
<?php

session_start();
include("database.php");

$op = '';
$sql = "SELECT * FROM `tblvehicles` WHERE VehiclesTitle LIKE '".$_POST['search']."%'";

$q = mysqli_query($conn,$sql);

if(mysqli_num_rows($q) > 0)
{
  



while ($rec = mysqli_fetch_array($q)) {
  $i=$rec['id'];
  $v=$rec['Vimage1'];
  $f=$rec['FuelType'];
  $m= $rec['ModelYear'];
  $s=$rec['SeatingCapacity'];
  $vt=$rec['VehiclesTitle'];
  $p= $rec['PricePerDay'];
  $vo=$rec['VehiclesOverview'];
$op .= '
<div class="card">
<div class="info"> <a href="car booking.php?vhid='.$i.'"><img src="images/'.$v.'" style="width:100%;"></a>
<ul>
<li> <p> <i class="fa fa-car" aria-hidden="true"> </i> '.$f.' </p></li>
<li> <p> <i class="fa fa-calendar" aria-hidden="true"> </i> '.$m.' Model </p></li>
<li> <p> <i class="fa fa-user-circle-o" aria-hidden="true"> </i> '.$s.' seats </p></li>
</ul>
</div>
  <div id="btn"><span style="float:left"> '.$vt.'</span>
<span style="float:right"> RS '.$p.'/Day </span> </DIV>
<p style="margin:10px;padding:2px;">'.substr($vo,0,70).' </p>  
</div>';
}
echo $op;
}
else {
  echo "Data not found";
}
?>
</div>
</html>
