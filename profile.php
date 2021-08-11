<?php
session_start();
if ( $_SESSION['loguar'] != 1 ) {
  $_SESSION['mesazhi'] = "Ju duhet të kyçeni para se të shikoni permbajten";
  header("location: error.php");
} else {
    $emri = $_SESSION['first_name'];
    $mbiemri = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $adresa = $_SESSION['address'];
    $tel = $_SESSION['phone'];
}
?>
<!DOCTYPE html>
<html >
<head>
<script src='/jquery.min.js'></script>
<script src="js/index.js"></script>
<title>Përshëndetje <?= $emri.' '.$mbiemri?></title>
<?php include 'css/css.html'; ?>
</head>
<body>
  <div class="form">
          <h1>Mirësevini!</h1>
          <h2><?php echo $emri.' '.$mbiemri; ?></h2>
          <p><?= $email ?></p>
          <p><?= $adresa.' <br>'.$tel  ?></p>
          <a href="home.php"><button class="button button-block"/>Kreu</button></a><br>
          <a href="logout.php"><button class="button button-block" name="logout"/>Dil</button></a>
    </div>
</body>
</html>
