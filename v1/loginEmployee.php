<?php
include("includes/DbOperations.php");
$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['staffcode']) && isset($_POST['password'])){
    $db = new DbOperation();
    if($db->loginEmployee($_POST['staffcode'], $_POST['password'])){
      $employee = $db->getUserByStaffcode($_POST['staffcode']);
      if($employee['emp_status'] == "Active"){
        $response['error'] = false;
        $response['staffcode'] = $employee['emp_staffcode'];
        $response['staffname'] = $employee['emp_fname'] . " " . $employee['emp_lname'];
        $response['department'] = $employee['emp_department'];
        $response['position'] = $employee['emp_position'];
        $response['status'] = $employee['emp_status'];
      }else{
        $response['error'] = true;
        $response['message'] = "Account Inactive";
      }
    }else{
      $response['error'] = true;
      $response['message'] = "Invalid staff name or password";
    }
  }else{
    $response['error'] = true;
    $response['message'] = "Fields are missing";
  }
}else{
  $response['error'] = true;
  $response['message'] = "Invalid Request";
}
echo json_encode($response);

 ?>
