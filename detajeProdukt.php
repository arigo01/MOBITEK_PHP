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
<title>Detajet e Produktit</title>
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
<a class="navbar-brand" href="Home.php">MOBITEK</a>
</div>
<ul class="nav navbar-nav">
<li><a href="home.php">Kreu</a></li>
<li><a href="rrethNesh.php">Rreth Nesh</a></li>
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
<h4  style="margin-left: 150px;">Detajet</h4>

<?php
if(isset($_REQUEST['id'])){
$id=$_REQUEST['id'];
include "db.php";
$query = "SELECT * FROM produktet where id =" .$id;
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
echo 
"   
<div >
    <img style='float: left; margin: 0px 55px 15px 110px;' src=".$row["img"]."  width='500' height= '500'/>
    <h1><b>".$row["emertimi"]." </b></h1>
    <h4><i>".$row["pershkrimi"]."</i></h4>
    <h3>Cmimi:<b> ".$row["cmimi"]."(leke) </b></h3>
    <p><i> ".$row["specs"]." </i><p>
    <h6><b>Prodhuesi :</b> <i> ".$row["marka"]." </i></h6><br>
</div>
";
}
?>
<a href="home.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i>Vazhdoni Blerjet</a>
<a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Shto ne shporte</a>
</div>
</body>
</html>
