<?php
include("includes/DbOperations.php");
$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $response['error'] = false;
  $response['message'] = "Logout";
}else{
  $response['error'] = true;
  $response['message'] = "Invalid Request";
}
echo json_encode($response);

 ?>
