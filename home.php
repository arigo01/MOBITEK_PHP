<?php
// kerko dbcoinf dhe cart php
include 'dbConfig.php';
include 'Cart.php';
$cart = new Cart;
// kontroll nese useri eshte loguar
if ( $_SESSION['loguar'] != 1 ) {
  $_SESSION['mesazhi'] = "Ju duhet të kyçeni para se të shikoni përmbajtjen!";
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
<!DOCTYPE html>
<html>
<head>
    <title>Përshëndetje <?= $emri.' '.$mbiemri?></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 0px;}
    body{ background-color: #EEEEEE}
    .glyphicon .badge .navbar{font-size: 17px;}
    .navbar{font-size: 17px;}
    .badge{font-size: 17px;}
    </style>
</head>
</head>
<body>
<nav class="navbar navbar-inverse"  style="border-radius: 0px;">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="home.php">MOBITEK</a>
</div>
<ul class="nav navbar-nav">
<li class="active"><a href="home.php">Kreu</a></li>
<li><a href="rrethNesh.php">Rreth Nesh</a></li>

</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="profile.php"  title="Shiko Profilin"><span class="glyphicon glyphicon-user"></span> <?= $emri?></a></li>
<li><a href="viewCart.php" title="Shiko Shportën">
<span class="glyphicon glyphicon-shopping-cart"></span> Shporta :
<span class="badge"><?php echo $cart->total_items();?></span>
</a></li>
<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Dil</a></li>
</ul>
</div>
</nav>
<div class="container">
<div class="alert alert-info">
<a class="btn btn-danger" href="#new">Te fundit</a>
<a class="btn btn-danger" href="#samsung">Samsung</a>
<a class="btn btn-danger" href="#apple">Apple</a>
<a class="btn btn-danger" href="#lg">LG</a>
<a class="btn btn-danger" href="#google">Google</a>
<a class="btn btn-danger" href="#aksesore">Aksesore</a>
</div>
</div>

<!-- PRODUKTET E FUNDIT (6cope) -->
<div class="container">
<h1>Produktet e fundit</h1><br>
<div id="new" class="row list-group">
<?php
// rows 
$query = "SELECT * FROM produktet ORDER BY id DESC LIMIT 6";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows( $result ) > 0 ){
while($row = mysqli_fetch_assoc($result)){
?>
<div class="item col-lg-4 ">
<div class="thumbnail">
<div class="caption">
<h4 class="list-group-item-heading"><?php echo $row["emertimi"]; ?></h4>
<!-- FUTJA E IMAZHIT NE LOOP -->
<img style="height:100%;width:100%"  src="<?php echo $row["img"]; ?>" sytle="width:20 ;height:20">
<p class="list-group-item-text" style="padding-bottom:10px"><?php echo $row["pershkrimi"]; ?></p>
<div class="row">
<div class="col-md-6">
<p class="lead"><?php echo $row["cmimi"].' Lekë'; ?></p>
</div>
<div class="col-md-3">
<a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Shtoni</a>
</div>
<div class="col-md-2">
<a class="btn btn-info" href="detajeProdukt.php?id=<?php echo $row["id"]; ?>">Detajet</a> 
</div>
</div>
</div>
</div>
</div>
<?php } }else{ ?>
<p>Nuk ka asnjë produkt për tu shfaqur...</p>
<?php } ?>
</div>
</div>

<!-- SAMSUNG lista -->
<div class="container">
<h1>SAMSUNG</h1><br>
<div id="samsung" class="row list-group">
<?php
//merr rows
$query = "SELECT * FROM produktet  WHERE marka='samsung' ORDER BY id ";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows( $result ) > 0 ){
while($row = mysqli_fetch_assoc($result)){
?>

<div class="item col-lg-4 ">
<div class="thumbnail">
<div class="caption">
<h4 class="list-group-item-heading"><?php echo $row["emertimi"]; ?></h4>
<!-- FUTJA E IMAZHIT NE LOOP -->
<img style="height:100%;width:100%"  src="<?php echo $row["img"]; ?>" sytle="width:20 ;height:20">
<p class="list-group-item-text" style="padding-bottom:10px"><?php echo $row["pershkrimi"]; ?></p>
<div class="row">
<div class="col-md-6">
<p class="lead"><?php echo $row["cmimi"].' Lekë'; ?></p>
</div>
<div class="col-md-3">
<a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Shtoni</a>
</div>
<div class="col-md-2">
<a class="btn btn-info" href="detajeProdukt.php?id=<?php echo $row["id"]; ?>">Detajet</a> 
</div>
</div>
</div>
</div>
</div>
<?php } }else{ ?>
<p>Nuk ka asnjë produkt për tu shfaqur...</p>
<?php } ?>
</div>
</div>
</body>
</html>


<!-- Apple lista -->
<div class="container">
<h1>Apple</h1><br>
<div id="apple" class="row list-group">
<?php
//merr rows
$query = "SELECT * FROM produktet  WHERE marka='apple' ORDER BY id ";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows( $result ) > 0 ){
while($row = mysqli_fetch_assoc($result)){
?>

<div class="item col-lg-4 ">
<div class="thumbnail">
<div class="caption">
<h4 class="list-group-item-heading"><?php echo $row["emertimi"]; ?></h4>
<!-- FUTJA E IMAZHIT NE LOOP -->
<img style="height:100%;width:100%"  src="<?php echo $row["img"]; ?>" sytle="width:20 ;height:20">
<p class="list-group-item-text" style="padding-bottom:10px"><?php echo $row["pershkrimi"]; ?></p>
<div class="row">
<div class="col-md-6">
<p class="lead"><?php echo $row["cmimi"].' Lekë'; ?></p>
</div>
<div class="col-md-3">
<a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Shtoni</a>
</div>
<div class="col-md-2">
<a class="btn btn-info" href="detajeProdukt.php?id=<?php echo $row["id"]; ?>">Detajet</a> 
</div>
</div>
</div>
</div>
</div>
<?php } }else{ ?>
<p>Nuk ka asnjë produkt për tu shfaqur...</p>
<?php } ?>
</div>
</div>
</body>
</html>

<!-- LG lista -->
<div class="container">
<h1>LG</h1><br>
<div id="lg" class="row list-group">
<?php
//merr rows
$query = "SELECT * FROM produktet  WHERE marka='lg' ORDER BY id ";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows( $result ) > 0 ){
while($row = mysqli_fetch_assoc($result)){
?>

<div class="item col-lg-4 ">
<div class="thumbnail">
<div class="caption">
<h4 class="list-group-item-heading"><?php echo $row["emertimi"]; ?></h4>
<!-- FUTJA E IMAZHIT NE LOOP -->
<img style="height:100%;width:100%"  src="<?php echo $row["img"]; ?>" sytle="width:20 ;height:20">
<p class="list-group-item-text" style="padding-bottom:10px"><?php echo $row["pershkrimi"]; ?></p>
<div class="row">
<div class="col-md-6">
<p class="lead"><?php echo $row["cmimi"].' Lekë'; ?></p>
</div>
<div class="col-md-3">
<a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Shtoni</a>
</div>
<div class="col-md-2">
<a class="btn btn-info" href="detajeProdukt.php?id=<?php echo $row["id"]; ?>">Detajet</a> 
</div>
</div>
</div>
</div>
</div>
<?php } }else{ ?>
<p>Nuk ka asnjë produkt për tu shfaqur...</p>
<?php } ?>
</div>
</div>
</body>
</html>

<!-- Google lista -->
<div class="container">
<h1>Google</h1><br>
<div id="google" class="row list-group">
<?php
//merr rows
$query = "SELECT * FROM produktet  WHERE marka='google' ORDER BY id ";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows( $result ) > 0 ){
while($row = mysqli_fetch_assoc($result)){
?>

<div class="item col-lg-4 ">
<div class="thumbnail">
<div class="caption">
<h4 class="list-group-item-heading"><?php echo $row["emertimi"]; ?></h4>
<!-- FUTJA E IMAZHIT NE LOOP -->
<img style="height:100%;width:100%"  src="<?php echo $row["img"]; ?>" sytle="width:20 ;height:20">
<p class="list-group-item-text" style="padding-bottom:10px"><?php echo $row["pershkrimi"]; ?></p>
<div class="row">
<div class="col-md-6">
<p class="lead"><?php echo $row["cmimi"].' Lekë'; ?></p>
</div>
<div class="col-md-3">
<a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Shtoni</a>
</div>
<div class="col-md-2">
<a class="btn btn-info" href="detajeProdukt.php?id=<?php echo $row["id"]; ?>">Detajet</a> 
</div>
</div>
</div>
</div>
</div>
<?php } }else{ ?>
<p>Nuk ka asnjë produkt për tu shfaqur...</p>
<?php } ?>
</div>
</div>
</body>
</html>

<!-- Google lista -->
<div class="container">
<h1>Aksesore</h1><br>
<div id="aksesore" class="row list-group">
<?php
//merr rows
$query = "SELECT * FROM produktet  WHERE marka='aksesore' ORDER BY id ";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows( $result ) > 0 ){
while($row = mysqli_fetch_assoc($result)){
?>

<div class="item col-lg-4 ">
<div class="thumbnail">
<div class="caption">
<h4 class="list-group-item-heading"><?php echo $row["emertimi"]; ?></h4>
<!-- FUTJA E IMAZHIT NE LOOP -->
<img style="height:100%;width:100%"  src="<?php echo $row["img"]; ?>" sytle="width:20 ;height:20">
<p class="list-group-item-text" style="padding-bottom:10px"><?php echo $row["pershkrimi"]; ?></p>
<div class="row">
<div class="col-md-6">
<p class="lead"><?php echo $row["cmimi"].' Lekë'; ?></p>
</div>
<div class="col-md-3">
<a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Shtoni</a>
</div>
<div class="col-md-2">
<a class="btn btn-info" href="detajeProdukt.php?id=<?php echo $row["id"]; ?>">Detajet</a> 
</div>
</div>
</div>
</div>
</div>
<?php } }else{ ?>
<p>Nuk ka asnjë produkt për tu shfaqur...</p>
<?php } ?>
</div>
</div>
</body>
</html>


