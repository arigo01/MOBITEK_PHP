<?php
// vlerat e sesineve per tek home.php 
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['phone'] = $_POST['phone'];

// Escape  $_POST  SQL injections
$first_name = mysqli_real_escape_string($conn,$_POST['firstname']);
$last_name =  mysqli_real_escape_string($conn,$_POST['lastname']);
$email =  mysqli_real_escape_string($conn,$_POST['email']);
$phone =  mysqli_real_escape_string($conn,$_POST['phone']);
$address =  mysqli_real_escape_string($conn,$_POST['address']);
$password =  mysqli_real_escape_string($conn,password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = mysqli_real_escape_string($conn,md5( rand(0,1000) ));


// kontroll nese user me kete email eshte regjistruar me pare
$query = "SELECT * FROM klientet WHERE email='$email'";
$result = mysqli_query($conn,$query);


// nese rezultati kthne me shume se 0 atehere email ekziston
if ( mysqli_num_rows( $result ) > 0 ) {

    $_SESSION['mesazhi'] = 'Përdorues me këtë email është regjistruar një herë!';
    header("location: error.php");

}
else { // nese nuk ndofhet ne db,vazhdo inserti

    $sql = "INSERT INTO klientet (emri_kli, mbiemri_kli, email, tel, adresa, password, hash, krijuar, modifikuar) "//default active = 1(true)
            . "VALUES ('$first_name','$last_name','$email','$phone','$address','$password', '$hash','".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";//formati i njejte me db

    // shtimi i userit
    if (mysqli_query($conn,$sql)){

        $_SESSION['active'] = 1;
        $_SESSION['loguar'] = true; 
        $q = mysqli_query($conn,"SELECT * FROM klientet WHERE email='$email'");
        $user = mysqli_fetch_assoc($q);

        $_SESSION['sessCustomerID'] = $user['id'];

        header("location: profile.php");

    }

    else {
        $_SESSION['mesazhi'] = 'Regjistrimi Dështoi!';
        header("location: error.php");
    }

}
