<?php
include 'dbConfig.php';
include 'Cart.php';
$cart = new Cart;
if ( $_SESSION['loguar'] != 1) {
$_SESSION['mesazhi'] = "Ju duhet të kyçeni para se të shikoni shportën tuaj!";
header("location: error.php");
}
// con tek home nqs ska items
else if($cart->total_items() <= 0){
header("Location: home.php");
}
// merr detjet e userit nga sesioni Customer id
$query = "SELECT * FROM klientet WHERE id = ".$_SESSION['sessCustomerID'];
$result = mysqli_query($conn,$query);
$custRow= mysqli_fetch_assoc($result)
?>
<!DOCTYPE html>
<html>
<head>
<title>Paguaj-Vendosni Porosinë Tuaj</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<style>
.container{width: 100%;padding: 50px;}
.table{width: 65%;float: left;}
.shipAddr{width: 30%;float: left;margin-left: 30px;}
.footBtn{width: 95%;float: left;}
.orderBtn {float: right;}
</style>
</head>
<body>
<div class="container">
<h1> Detajet e Porosisë</h1>
<table class="table">
<thead>
<tr>
<th>Produkti</th>
<th>Çmimi</th>
<th>Sasia</th>
<th>Sub Totali</th>
</tr>
</thead>
<tbody>
<?php
if($cart->total_items() > 0){
//marrim te dhenat 
$cartItems = $cart->contents();
foreach($cartItems as $item){
?>
<tr>
<td><?php echo $item["name"]; ?></td>
<td><?php echo $item["price"].' Lekë'; ?></td>
<td><?php echo $item["qty"]; ?></td>
<td><?php echo $item["subtotal"].' Lekë'; ?></td>
</tr>
<?php } }else{ ?>
<tr><td colspan="4"><p>Nuk keni asnjë produkt në shportë...</p></td>
<?php } ?>
</tbody>
<tfoot>
<tr>
<td colspan="3"></td>
<?php if($cart->total_items() > 0){ ?>
<td class="text-center"><strong>Totali <?php echo $cart->total().' Lekë'; ?></strong></td>
<?php } ?>
</tr>
</tfoot>
</table>
<div class="shipAddr">
<h4>Adresa e marresit</h4>
<p><?php echo $custRow['emri_kli'].' '.$custRow['mbiemri_kli']; ?></p>
<p><?php echo $custRow['email']; ?></p>
<p><?php echo $custRow['tel']; ?></p>
<p><?php echo $custRow['adresa']; ?></p>
</div>
<div class="footBtn">
<a href="viewCart.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Kthehu Mbrapa</a>
<a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn">Vendose Porosine<i class="glyphicon glyphicon-menu-right"></i></a>
</div>
</div>
</body>
</html>
