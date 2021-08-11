<?php
session_start();
if ( $_SESSION['loguar'] != 1 ) {
  $_SESSION['mesazhi'] = "Ju duhet te logoheni per te pare permbajtjen!";
  header("location: error.php");
}
else {
// Makes it easier to read
$emri = $_SESSION['first_name'];
$mbiemri = $_SESSION['last_name'];
$email = $_SESSION['email'];
$active = $_SESSION['active'];
$adresa = $_SESSION['address'];
$telefon = $_SESSION['phone'];
}
?>
<!DOCTYPE html>
<html >
<head>
<title>Welcome <?= $emri.' '.$mbiemri?></title>
<?php include 'css/css.html'; ?>
</head>
<body> <div class="form">
<h1>Profili im</h1>
<h2><?php echo $emri.' '.$mbiemri; ?></h2>
<p><?= $email ?></p>
<p><?= $adresa.' '.$telefon  ?></p>
<a href="admin.php"><button class="button button-block"/>Dashboard</button></a><br>
<a href="logout.php"><button class="button button-block" name="logout"/>Dil</button></a>
</div>
<script src='jquery.min.js'></script>
<script src="js/index.js"></script>
</body>
</html>
