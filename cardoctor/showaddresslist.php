<?php

require 'db.config.php';


$email = $_POST['email'];

$temp = clean($email);


//remove '@' and '.' from email address
function clean($string) {
   

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
}

$address = $temp . "address";

$sql = "SELECT id,country ,state ,city ,subregion,streetaddress FROM $address";
$result = mysqli_query($con, $sql);
if (!$result)
  {
  echo("Error description: " . mysqli_error($con));
  }

$posts = array();
$check = false;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
    while($row = mysqli_fetch_assoc($result)) {

        $posts[] = array('post'=>$row);
		 $check = true;
		 	 
    }
	
}
 encodearray($posts);

/* Encode array to JSON string */
function encodearray($posts) {
   header('Content-type: application/json');
   echo json_encode(array('posts'=>$posts));
}

if(!$check){
	echo "no";
}

mysqli_close($con);

?>