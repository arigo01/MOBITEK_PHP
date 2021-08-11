<?php
/* Logout  sesionet*/
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
<title>Duke dalë...</title>
<?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
<h1>Faleminderit që na zgjodhët!</h1>
<p><?= 'Ju tashmë kini dalë me sukses!'; ?></p>
<a href="index.php"><button class="button button-block"/>Kreu</button></a>
</div>
</body>
</html>
