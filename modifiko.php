<?php
session_start();
include 'db.php';
// a eshte loguar?
if ( $_SESSION['loguar'] != 1 ||  $_SESSION['email']!=='admin@eshop.com') {
$_SESSION['mesazhi'] = 'Ju duhet të kyçeni para se të shikoni permbajten!'; 
header('location: error.php');
}
else {
    $emri = $_SESSION['first_name'];
    $mbiemri = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $adresa = $_SESSION['address'];
    $telefon = $_SESSION['phone'];
}

if(isset($_REQUEST['id'])){
$id=$_REQUEST['id'];
include 'db.php';
$querySelect = 'SELECT emertimi, pershkrimi, cmimi, img, marka, specs,id FROM produktet WHERE id ='.$id;
$result = mysqli_query($conn,$querySelect);
$row=mysqli_fetch_array($result);


echo " <!DOCTYPE html>
<html>
<head>
<title>Modifikimi I Produktit</title>
<link rel='stylesheet' href='bootstrap/css/bootstrap.min.css'>
<script src='jquery.min.js'></script>
<script src='bootstrap/js/bootstrap.min.js'></script>
<style>
.container{padding: 0px;}
body{ background-color: #EEEEEE}
.glyphicon .badge .navbar{font-size: 17px;}
.navbar{font-size: 17px;}
.badge{font-size: 17px;}
th, td {padding: 15px;text-align: center;}
table, th, td {border: 2px solid black;}
input[type='number']{width: 20%;}
</style>
</head>
</head>
<body>
<nav class='navbar navbar-inverse'  style='border-radius: 0px;'>
<div class='container-fluid'>
<div class='navbar-header'>
<a class='navbar-brand' href='admin.php'>MOBITEK</a>
</div>
<ul class='nav navbar-nav'>
<li class='active'><a href='admin.php'>Dashboard</a></li>
</ul>
<ul class='nav navbar-nav navbar-right'>
<li><a href='adminProfile.php'><span class='glyphicon glyphicon-user'></span> $emri</a></li>
<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span>Dil</a></li>
</a></li>
</ul>
</div>
</nav>

<div class='container' style='margin:40px'>
<form class='form-horizontal' method='post' action='ModProdukt.php?action=modifiko' enctype='multipart/form-data'>
<div class='form-group'>
<label class='control-label col-sm-2' for='emertimi'>Emertimi:</label>
<div class='col-sm-10'>
<input type='text' required class='form-control' name='emertimi' id='emertimi' value= ".$row["emertimi"].">
</div>
</div>

<div class='form-group'>
<label class='control-label col-sm-2' for='pershkrimi'>Pershkrimi:</label>
<div class='col-sm-10'>
<textarea required rows='3' class='form-control' name='pershkrimi' id='pershkrimi' >".$row["pershkrimi"]."</textarea>
</div>
</div>

<div class='form-group'>
<label class='control-label col-sm-2' for='specs'>Specifikime:</label>
<div class='col-sm-10'>
<textarea required rows='6' class='form-control' name='specs' id='specs'>".$row["specs"]."</textarea>
</div>
</div>

<div class='form-group'>
<label class='control-label col-sm-2' for='marka'>Prodhuesi:</label>
<div class='col-sm-10'>
<textarea required rows='1' class='form-control' name='marka' id='marka'>".$row["marka"]."</textarea>
</div>
</div>

<div class='form-group'>
<label class='control-label col-sm-2' for='cmimi'>Cmimi:</label>
<div class='col-sm-10'>
<input type='number' required class='form-control' name='cmimi' id='cmimi' value=".$row["cmimi"]." >
</div>
</div>

<div class='form-group'>
<label class='control-label col-sm-2' for='file' >Imazhi:</label>
<div class='col-sm-10'>
<input type='file' name='file' id='file'>
</div>
</div>


<div class='form-group'>
<label class='control-label col-sm-2' for='file' >Imazhi Aktual Ne DB:</label>
<div class='col-sm-10'>
<img style='height:500px;width:400px'  src=".$row["img"].">
</div>
</div>

<input type ='hidden' name ='id' value = ".$id.">

<div class='form-group'>
<div class='col-sm-offset-2 col-sm-10'>
<button type='submit' name='submit' class='btn btn-info'>Modifiko Produktin</button>
</div>
</div>
</form>
</div>
</div>
</body>
</html>";
}
?>