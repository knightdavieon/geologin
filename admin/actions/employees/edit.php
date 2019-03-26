<?php
if(isset($_REQUEST['staff_code'])){
  session_start();
  $staffCode = $_SESSION['staffcode'];
  $staffname = $_SESSION['StaffName'];
  $tz = 'Asia/Manila';
  $timestamp = time();
  $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
  $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
  $datetime = $dt->format('d/m/Y, H:i:s');

  $staffcode = $_REQUEST['staff_code'];
  $firstname = $_REQUEST['staff_fname'];
  $lastname = $_REQUEST['staff_lname'];
  $priviledge = $_REQUEST['staff_access'];
  $password = $_REQUEST['staff_password'];
  $repassword = $_REQUEST['staff_repassword'];

  if((empty($password) || $password == NULL || $password == " ") || (empty($repassword) || $repassword == NULL || $repassword == " ")){
    if($priviledge == " " || $priviledge == NULL){
      echo "priv not set";
    }else{
      include("../../../actions/accessdb.php");
      // UPDATE table_name SET column1 = value1, column2 = value2, WHERE condition;
        $sql = "UPDATE accounts SET user_fname = :stffnm, user_lname = :stflnm, user_priviledge = :prev WHERE user_staffcode = :stfcd";
        $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(
          ':stfcd' => $staffcode,
          ':stffnm' => $firstname,
          ':stflnm' => $lastname,
          ':prev' => $priviledge

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


    }
  }else{
    if($password != $repassword){
      echo "password does not match";
    }else{
      if($priviledge == " " || $priviledge == NULL){
        echo "priv not set";
      }else{
        include("../../../actions/accessdb.php");
        // UPDATE table_name SET column1 = value1, column2 = value2, WHERE condition;
          $sql = "UPDATE accounts SET user_fname = :stffnm, user_lname = :stflnm, user_password = :pass, user_priviledge = :prev WHERE user_staffcode = :stfcd";
          $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $sth->execute(array(
            ':stfcd' => $staffcode,
            ':stffnm' => $firstname,
            ':stflnm' => $lastname,
            ':pass' => $repassword,
            ':prev' => $priviledge

          ));
          // $sql = "INSERT INTO activity_log (user_staffcode, user_name, activity, date_time) VALUES (:stfcd, :stfcnm, :activity, :dt)";
          // $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          // $sth->execute(array(
          //   ':stfcd' => $staffCode,
          //   ':stfcnm' => $staffname,
          //   ':activity' => "Updated user with the staff code '$staffCode' in using this IP ". $_SERVER['REMOTE_ADDR'],
          //   ':dt' => $datetime
          //
          // ));
          echo "updated";


      }
    }
  }

}

?>
