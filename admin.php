
<?php
session_start();
include 'db.php';
if ( $_SESSION['loguar'] != 1 ||  $_SESSION['email']!=='admin@eshop.com') {
  $_SESSION['mesazhi'] = "Ju nuk jeni loguar si admin";
  header("location: error.php");
}
else {
$emri = $_SESSION['first_name'];
$mbiemri = $_SESSION['last_name'];
$email = $_SESSION['email'];
$active = $_SESSION['active'];
$adresa = $_SESSION['address'];
$telefoni = $_SESSION['phone'];
}?>

<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="jquery.min.js"></script>

<script>
$(document).ready(function(){
    $('.delete').click(function(){
    var elementi = this;
    var id = $(this).data("id") // kthen nr jo string si .attr("data-id")
    var alerti = confirm("Jeni te Sigurte ?");
    if (alerti == true) {
    $.ajax({
    url: 'fshi.php',
    type: 'POST',
    data: { id:id },
    success: function(response){
    if(response == 1){
    $(elementi).closest('tr').fadeOut(700,function(){
    $(this).remove();
    });
    }
    else
    {
    alert('Rekordi nuk mund te fshihet ,Id nuk eksiston!');
    }
    }
});
}
});
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<style>
.container{padding: 0px;}
body{ background-color: #EEEEEE}
.glyphicon .badge .navbar{font-size: 17px;}
.navbar{font-size: 17px;}
.badge{font-size: 17px;}
th, td {padding: 15px;text-align: left;}
table, th, td {border: 2px solid black;}
input[type="number"]{width: 20%;}
</style>
</head>
</head>
<body>
<nav class="navbar navbar-inverse"  style="border-radius: 0px;">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="#">MOBITEK</a>
</div>
<ul class="nav navbar-nav">
<li class="active"><a href="#">Dashboard</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="adminProfile.php"><span class="glyphicon glyphicon-user"></span> <?= $emri?></a></li>
<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Dil</a></li>
</a></li>
</ul>
</div>
</nav>

<div class="container" style="margin:40px">
<a class="btn btn-success" href="product.php">Shto produkt</a><br><br>

<!-- LISTON KILENTET -->
<div class="tab-content">
<div>
<h3>Klientet</h3>
<i>Ketu jane te dhenat e perdoruesve te rregjistruar ne aplikacion</i><br><br>
</div>
<?php
include "db.php";
$queryKlient= "SELECT id,emri_kli, mbiemri_kli, email, adresa, tel FROM klientet";
$result = mysqli_query($conn,$queryKlient);
echo"<table border='1' >";
echo "<tr align='center'> 
    <th> ID</th> 
    <th> Emri </th>
    <th> Mbiemri</th> 
    <th> Telefon</th> 
    <th> Email</th> 
    <th> Adresa</th>
    </tr>";

while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
echo 
"<tr align='center'>
    <td>".$row["id"]."</td> 
    <td> ".$row["emri_kli"]."</td>
    <td> ".$row["mbiemri_kli"]." </td>
    <td> ".$row["tel"]." </td> 
    <td> ".$row["email"]." </td> 
    <td> ".$row["adresa"]." </td> 
</tr>";
}
echo
"</table>"; 
mysqli_close($conn);
?>
<!-- LISTO POROSITE E KLIENTEVE -->
<div class="tab-content">
<div>
<h3>Porosite e klienteve</h3>
<i>Ketu jane te dhenat e porosive per cdo klient</i><br><br>
</div>
<?php
include "db.php";
$queryPorosi= " SELECT porosite.id as id, porosite.cmimi_total, porosite.krijuar, klientet.emri_kli,klientet.id as idKli, klientet.mbiemri_kli ,klientet.email
FROM porosite join klientet on porosite.klient_id=klientet.id ";
$result = mysqli_query($conn,$queryPorosi);
echo"<table border='1' >";
echo "<tr align='center'> 
    <th> ID Porosi</th> 
    <th> ID Klient</th> 
    <th> Emri </th>
    <th> Mbiemri</th> 
    <th> Email</th> 
    <th> Cmimi Total</th> 
    <th> Data e krijuar</th>
    </tr>";
while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
echo 
"<tr align='center'>
    <td>".$row["id"]."</td> 
    <td>".$row["idKli"]."</td> 
    <td> ".$row["emri_kli"]."</td>
    <td> ".$row["mbiemri_kli"]." </td>
    <td> ".$row["email"]." </td> 
    <td> ".$row["cmimi_total"]." </td> 
    <td> ".$row["krijuar"]." </td> 
</tr>";
}
echo
"</table>"; 
mysqli_close($conn);
?>
<!-- LISO Produktet e Dyqanit -->
<div class="tab-content">
<div>
<h3>Produktet</h3>
<i>Ketu jane te dhenat e produkteve te dyqanit</i><br><br>
</div>
<?php
include "db.php";
$queryProdukte= " SELECT id, emertimi,pershkrimi,specs,img,cmimi,marka,status FROM produktet order by id  DESC ";
$result = mysqli_query($conn,$queryProdukte);
echo"<table border='1' >";
echo "<tr align='center'> 
    <th> ID</th> 
    <th> Emertimi </th>
    <th> Pershkrimi </th>
    <th> Specifikime</th>
    <th> Prodhuesi</th> 
    <th> Cmimi</th> 
    <th> Gjendje?</th>
    <th> Veprime</th>
    </tr>";

while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
echo 
"<tr align='center'>
    <td>".$row["id"]."</td> 
    <td> ".$row["emertimi"]."</td>
    <td> ".$row["pershkrimi"]." </td>
    <td> ".$row["specs"]." </td>
    <td> ".$row["marka"]." </td>
    <td> ".$row["cmimi"]." </td>
    <td> ".$row["status"]." </td> 
    <td>[<a href='modifiko.php?id=".$row["id"]."'>Modifiko</a>]<button class='delete' data-id=".$row["id"].">Fshi</button></td>



    
</tr>";
}
echo
"</table>"; 
mysqli_close($conn);
?>

</div>
</body>
</html>
