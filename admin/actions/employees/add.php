<?php
if(isset($_REQUEST['emp_staff_code'])){
  session_start();
  $staffCode = $_SESSION['staffcode'];
  $staffname = $_SESSION['StaffName'];
  $tz = 'Asia/Manila';
  $timestamp = time();
  $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
  $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
  $datetime = $dt->format('d/m/Y, H:i:s');

  $staffcode = $_REQUEST['emp_staff_code'];
  $firstname = $_REQUEST['emp_fname'];
  $lastname = $_REQUEST['emp_lname'];
  $address = $_REQUEST['emp_address'];
  $contact = $_REQUEST['emp_contact'];
  $email = $_REQUEST['emp_email'];
  $department = $_REQUEST['emp_department'];
  $position = $_REQUEST['emp_position'];
  $password = $_REQUEST['emp_password'];
  $repassword = $_REQUEST['emp_repassword'];


  if($password != $repassword){
    echo "password does not match";
  }else{
    include("../../../actions/accessdb.php");
    $getempcode = "SELECT * FROM employees where emp_staffcode = :stfcd";
    $gtc = $conn->prepare($getempcode, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $gtc->execute(array(
      ':stfcd' => $staffcode
    ));
    $rowcount = $gtc->rowCount();
    if($rowcount == 0){
      $sql = "INSERT INTO employees (emp_staffcode, emp_fname, emp_lname, emp_address, emp_contact, emp_email, emp_department, emp_position, emp_password, emp_status) VALUES (:stfcd, :stffnm, :stflnm, :add,:cont, :email, :dept, :pos, :pass, :stat)";
      $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array(
        ':stfcd' => $staffcode,
        ':stffnm' => $firstname,
        ':stflnm' => $lastname,
        ':add' => $address,
        ':cont' => $contact,
        ':email' => $email,
        ':dept' => $department,
        ':pos' => $position,
        ':pass' => $repassword,
        ':stat' => "Inactive"

      ));
      $sql = "INSERT INTO activity_log (user_staffcode, user_name, activity, date_time) VALUES (:stfcd, :stfcnm, :activity, :dt)";
      $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array(
        ':stfcd' => $staffCode,
        ':stfcnm' => $staffname,
        ':activity' => "Created new employee with the staff code '$staffcode' in using this IP ". $_SERVER['REMOTE_ADDR'],
        ':dt' => $datetime

      ));
      echo "added";

    }else{
      // alrt notification
      echo "staffcode exist";
    }
  }
}

?>
