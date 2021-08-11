<!DOCTYPE html>
<html>
<?php
include 'Cart.php';
$cart = new Cart;
if ( $_SESSION['loguar'] != 1 ) {
$_SESSION['mesazhi'] = "Ju duhet të kyçeni para se të shikoni permbajtjen!";
header("location: error.php");
}
else {
$emri = $_SESSION['first_name'];
$mbiemri = $_SESSION['last_name'];
$email = $_SESSION['email'];
$active = $_SESSION['active'];
$adresa = $_SESSION['address'];
$telefon = $_SESSION['phone'];
}
?>
<head>
<title>Rreth Nesh</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<style>
.container{padding: 0px;}
body{
         background-color: #EEEEEE}
.glyphicon .badge .navbar{font-size: 17px;}
.navbar{font-size: 17px;}
.badge{font-size: 17px;}
input[type="number"]{width: 20%;}
</style>
</head>
<body>
<nav class="navbar navbar-inverse"  style="border-radius: 0px;">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="home.php">MOBITEK</a>
</div>
<ul class="nav navbar-nav">
<li ><a href="home.php">Kreu</a></li>
<li class="active"><a href="rrethNesh.php">Rreth Nesh</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> <?= $emri?></a></li>
<li><a href="viewCart.php" title="Shiko Shporten">
<span class="glyphicon glyphicon-shopping-cart"></span> Shporta:
<span class="badge"><?php echo $cart->total_items();?></span>
<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Dil</a></li>

</a></li>
</ul>
</div>
</nav>
<div class="container">
<h4  style="margin-left: 150px;">Rreth MOBITEK</h4>
<div >
    <img style='float: left; margin: 0px 55px 15px 150px;' src="img/rreth.jpg"  width='500' height= '400'/>
    <h1><b>Mobitek</b></h1>
    <h4><i>"Nje klikim larg"</i></h4>
    <p>
    Mobitek Sh.p.k. is a leading Computer retailer founded in mid 2005, selling Consumer and Business Class Desktops and Laptops,
     Workstations, Servers, Monitors, Gaming Computers, Networking Devices and Equipment, Printers, Various Hardware and Accessories and 
     Award-Winning Service committed to becoming the most loved and trusted marketplace on Albania. 
     <br><br> We hold in our big portfolio the best brands in the industry,
 such as HP (Gold Partner), HPE (Business Partner), Cisco (Select Partner), Microsoft (Business Partner), Lenovo, ASUS, DELL, Acer, AOC,
 Philips, Samsung, Intel, AMD, WD, Synology, Maxtor, Seagate, Qnap.
    <p>
<h6>Email:<a href="mailto:vrenos.arigo5@gmail.com">vrenos.arigo5@gmail.com</a></p></h6>
<h6>Telefon:+355 5555 555 </h6>
<h6>Adresa: Rruga Sami Frasheri, 1001, Tirane, Shqiperi </h6>

<h6><b>CEO :</b> <i> Filani Fist </i></h6><br>
</div>



</div>
</body>
</html>
