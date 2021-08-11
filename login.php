<?php
// Escape per mbrojtje nga SQL injections
$email = ($_POST['email']);
$query = "SELECT * FROM klientet WHERE email='$email'";
$result = mysqli_query($conn,$query);
if ( mysqli_num_rows ( $result ) == 0 ){ // nuk ka user me email
    $_SESSION['mesazhi'] = "Përdoruesi më këtë adresë email nuk është i regjistruar!";
    header("location: error.php");
}
else { // ka user
 $user = mysqli_fetch_assoc($result);
if ( password_verify($_POST['password'], $user['password']) ) {
$_SESSION['email'] = $user['email'];
$_SESSION['first_name'] = $user['emri_kli'];
$_SESSION['last_name'] = $user['mbiemri_kli'];
$_SESSION['active'] = $user['active'];
$_SESSION['address'] = $user['adresa'];
$_SESSION['phone'] = $user['tel'];
// vendoscustomerID ne sesion
$_SESSION['sessCustomerID'] = $user['id'];
// admin apo user
$_SESSION['loguar'] = true;
if ($_SESSION['email']==="admin@eshop.com") {
header("location: admin.php");
}
else
header("location: home.php");
}
else {
$_SESSION['mesazhi'] = "Fjalkaimi nuk është i saktë, provoni përsëri!";
header("location: error.php");
}
}
