<?php
include("accessdb.php");
$tz = 'Asia/Manila';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
$datetime = $dt->format('d/m/Y, H:i:s');

if(isset($_REQUEST['staff_code'])){
  $staffCode =  $_REQUEST['staff_code'];
  $staffPass = $_REQUEST['staff_password'];
  $accesstype = $_REQUEST['staff_user_type'];
  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d H:i:s P');
  // $ip_remote = $_SERVER['REMOTE_ADDR'];
  // $ip_proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
  // echo $_SERVER['REMOTE_USER'];
  $sql = "SELECT * FROM accounts WHERE user_staffcode = :stfcd";
  $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth->execute(array(
    ':stfcd' => $staffCode
    // ':colour' => 'red'
  ));

  $rowcount = $sth->rowCount();
  // echo $rowcount;
  if($rowcount != 0){
    //check password if match
    //if match set session then redirect

    $result = $sth->fetch(PDO::FETCH_ASSOC);
    if($staffPass == $result['user_password']){
      if($result['user_status'] == "Active"){
        if($result['user_priviledge'] == $accesstype){
          session_start();
          $_SESSION['staffcode'] = $staffCode;
          $_SESSION['StaffName'] = $result['user_fname'] . " " . $result['user_lname'];
          $staffname = $result['user_fname'] . " " . $result['user_lname'];
          $_SESSION['prev'] = $result['user_priviledge'];

          $sql = "INSERT INTO activity_log (user_staffcode, user_name, activity, date_time) VALUES (:stfcd, :stfcnm, :activity, :dt)";
          $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $sth->execute(array(
            ':stfcd' => $staffCode,
            ':stfcnm' => $staffname,
            ':activity' => "Logged in using this IP ". $_SERVER['REMOTE_ADDR'],
            ':dt' => $datetime

          ));


          echo "login";

        }else{
          echo "Invalid Access";
        }
      }else{
        echo "Account Inactive";
      }
    }else{
      echo "Wrong Staff Code or Password";
    }

  }else{
    echo "Account Doesnt Exist";
  }




}



?>
