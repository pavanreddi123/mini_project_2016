<?php

require 'db.config.php';


$email = $_POST['email'];
$id = $_POST['id'];

$temp = clean($email);


//remove '@' and '.' from email address
function clean($string) {
   

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
}

$address = $temp . "address";

$sql = "DELETE FROM $address WHERE id=$id";
$result = mysqli_query($con, $sql);
$check = false;
if ($result)
  {
  
  $check = true;
  }
if(!$check){
	echo "no";
}

mysqli_close($con);





?>