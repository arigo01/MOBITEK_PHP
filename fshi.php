<?php 
include "db.php";
$id = 0;
if(isset($_POST['id'])){
$id = mysqli_real_escape_string($conn,$_POST['id']);//mbrojtje
}
if($id > 0){
// a ka me kete id
$check = mysqli_query($conn,"SELECT * FROM produktet WHERE id=".$id);
$rows = mysqli_num_rows($check);
if($rows > 0){
// Delete record
$query = "DELETE FROM produktet WHERE id=".$id;
mysqli_query($conn,$query);
echo 1;
exit;
}else{
echo 0;
exit;
}
}
echo 0;
exit;