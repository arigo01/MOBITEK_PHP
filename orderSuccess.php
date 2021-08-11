<?php
if(!isset($_REQUEST['id'])){
header("Location: home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Porosia u Vendos!</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<style>
.container{width: 100%;padding: 50px;}
p{color: #34a853;font-size: 18px;}
</style>
</head>
</head>
<body>
<div class="container">
<h1>Status i Porosisë : </h1>
<p>Porosia juaj u vendos me sukses.<br>Nje nga agjentet tane do t'ju kontaktoje brenda 24 oreve.<br> ID e porosisë suaj është  #<?php echo $_GET['id']; ?><br> Faleminderit!</p>
<a href="home.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left">
</i> Faqja Kryesore</a>
</div>
</div>
</body>
</html>
