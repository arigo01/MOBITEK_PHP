<?php
/* faqja per login dhe regjistim */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>MobiTek - Login</title>
<?php 
include 'css/css.html'; 
?>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
if (isset($_POST['login'])) { //nqs klikohet butoni login
require 'login.php';}
elseif (isset($_POST['register'])) { //nese klikohet  registeri
require 'register.php';
}
}
?>
<body>
<div class="form">
  <img src="img/mtlogo.png" alt="MobiTek" class="logocenter"><br>
  <ul class="tab-group">
  <li class="tab"><a href="#signup">Regjistrohuni</a></li>
  <li class="tab active"><a href="#login">Kyçuni</a></li>
  </ul>
<div class="tab-content">
<div id="login">
<h1>Mirë se u rikthyhet!</h1>
<form action="index.php" method="post" autocomplete="off">
<div class="field-wrap" style="height:35px">
<label>
Adressa e Email-it<span class="req">*</span>
</label>
<input type="email" required autocomplete="off" name="email"/>
</div>
<div class="field-wrap">
<label>
Fjalëkalimi<span class="req">*</span>
</label>
<input type="password" required autocomplete="off" name="password"/>
</div>

<button class="button button-block" name="login" />Hyr</button>
</form>
</div>

<div id="signup">
<h1>Regjistrohuni</h1>
<form action="index.php" method="post" autocomplete="off">
<div class="top-row">
<div class="field-wrap">
<label>
Emri<span class="req">*</span>
</label>
<input type="text" required autocomplete="off" name='firstname' />
</div>

<div class="field-wrap">
<label>
Mbiemri<span class="req">*</span>
</label>
<input type="text"required autocomplete="off" name='lastname' />
</div>
</div>

<div class="field-wrap">
<label>
Adressa e Email-it<span class="req">*</span>
</label>
<input type="email"required autocomplete="off" name='email' />
</div>

<div class="field-wrap">
<label>
Adresa Postare<span class="req">*</span>
</label>
<input type="text"required autocomplete="off" name='address' />
</div>

<div class="field-wrap">
<label>
Numëri i Telefonit<span class="req">*</span>
</label>
<input type="text"required autocomplete="off" name='phone' />
</div>

<div class="field-wrap">
<label>
Fjalëkalimi<span class="req">*</span>
</label>
<input type="password"required autocomplete="off" name="password"/>
</div>

<button type="submit" class="button button-block" name="register"/>Regjistrohu</button>
</form>
</div>
</div>
</div> 

<footer>
<p> &copy Arigo Vrenos 2020 - 2021<br>
<a  class = "footeremail" href="mailto:vrenos.arigo5@gmail.com">vrenos.arigo5@gmail.com</a></p>
</footer>
<!-- links per scriptet  -->
<script src="jquery.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>
