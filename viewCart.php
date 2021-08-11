<?php
include 'Cart.php';
$cart = new Cart;
if ( $_SESSION['loguar'] != 1 ) {
$_SESSION['mesazhi'] = "Ju duhet të kyçeni para se të shikoni shportën tuaj!";
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
<title>Shporta ime</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<style>
.container{padding: 0px;}
body{ background-color: #EEEEEE}
.glyphicon .badge .navbar{font-size: 17px;}
.navbar{font-size: 17px;}
.badge{font-size: 17px;}
input[type="number"]{width: 20%;}
</style>
<script>
function updateCartItem(obj,id){
$.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
if(data == 'ok'){
location.reload();
}else{
alert('Update i shportes deshtoi, Provo Perseri.');
}
});
}
</script>
</head>
</head>
<body>
<nav class="navbar navbar-inverse"  style="border-radius: 0px;">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="#">MOBITEK</a>
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
<h1>Shporta Ime</h1>
<table class="table">
<thead>
<tr>
<th>Produkti</th>
<th>Çmimi</th>
<th>Sasia</th>
<th>Subtotali</th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>

<?php
if($cart->total_items() > 0){
//get cart items from session
$cartItems = $cart->contents();
foreach($cartItems as $item){
?>

<tr>
<td><?php echo $item["name"]; ?></td>
<td><?php echo $item["price"].' Lekë'; ?></td>
<td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
<td><?php echo '$'.$item["subtotal"].' Lekë'; ?></td>
<td>
<a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Jeni te sigurt?')"><i class="glyphicon glyphicon-trash"></i></a>
</td>
</tr>
<?php } 

}else{ ?>

<tr><td colspan="5"><p>Shporta juaj është bosh...</p></td>
<?php } ?>
</tbody>
<tfoot>
<tr>
<td><a href="home.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i>Vazhdoni Blerjet</a></td>
<td colspan="2"></td>
<?php if($cart->total_items() > 0){ ?>
<td class="text-center"><strong>Totali <?php echo $cart->total().' Lekë'; ?></strong></td>
<td><a href="checkout.php" class="btn btn-success btn-block">Paguaj<i class="glyphicon glyphicon-menu-right"></i></a></td>
<?php } ?>
</tr>
</tfoot>
</table>
</div>
</body>
</html>
