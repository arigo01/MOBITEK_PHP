
<?php
$host = "localhost";
$username = "root";
$password = "";
$db="mobiteku";
$conn = mysqli_connect($host, $username,$password,$db);
if (!$conn) {
echo "Probleme ne lidhjen me Databazen : " .
mysqli_connect_errno();
exit;
}
?>