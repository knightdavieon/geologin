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

  if((empty($password) || $password == NULL || $password == " ") || (empty($repassword) || $repassword == NULL || $repassword == " ")){
    include("../../../actions/accessdb.php");
    // UPDATE table_name SET column1 = value1, column2 = value2, WHERE condition;
    $sql = "UPDATE employees SET emp_fname = :stffnm, emp_lname = :stflnm, emp_address = :add, emp_contact = :cont, emp_email = :email, emp_department = :dept, emp_position = :pos WHERE emp_staffcode = :stfcd";
    $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(
      ':stfcd' => $staffcode,
      ':stffnm' => $firstname,
      ':stflnm' => $lastname,
      ':add' => $address,
      ':cont' => $contact,
      ':email' => $email,
      ':dept' => $department,
      ':pos' => $position

    ));
    $sql = "INSERT INTO activity_log (user_staffcode, user_name, activity, date_time) VALUES (:stfcd, :stfcnm, :activity, :dt)";
    $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(
      ':stfcd' => $staffCode,
      ':stfcnm' => $staffname,
      ':activity' => "Updated user with the staff code '$staffcode' in using this IP ". $_SERVER['REMOTE_ADDR'],
      ':dt' => $datetime

    ));
    echo "updated";



  }else{
    if($password != $repassword){
      echo "password does not match";
    }else{
      include("../../../actions/accessdb.php");
      // UPDATE table_name SET column1 = value1, column2 = value2, WHERE condition;
      $sql = "UPDATE employees SET emp_fname = :stffnm, emp_lname = :stflnm, emp_address = :add, emp_contact = :cont, emp_email = :email, emp_department = :dept, emp_position = :pos, emp_password = :pass WHERE emp_staffcode = :stfcd";
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
        ':pass' => $repassword

      ));
      $sql = "INSERT INTO activity_log (user_staffcode, user_name, activity, date_time) VALUES (:stfcd, :stfcnm, :activity, :dt)";
      $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array(
        ':stfcd' => $staffCode,
        ':stfcnm' => $staffname,
        ':activity' => "Updated user with the staff code '$staffCode' in using this IP ". $_SERVER['REMOTE_ADDR'],
        ':dt' => $datetime

      ));
      echo "updated";


    }

  }

}

?>
