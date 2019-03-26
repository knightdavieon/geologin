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

  if($password != $repassword){
    echo "password does not match";
  }else{
    if($priviledge == " " || $priviledge == NULL){
      echo "priv not set";
    }else{
      include("../../../actions/accessdb.php");
      $getempcode = "SELECT * FROM accounts where user_staffcode = :stfcd";
      $gtc = $conn->prepare($getempcode, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $gtc->execute(array(
        ':stfcd' => $staffcode
      ));
      $rowcount = $gtc->rowCount();
      if($rowcount == 0){
        $sql = "INSERT INTO accounts (user_staffcode, user_fname, user_lname, user_password, user_status, user_priviledge) VALUES (:stfcd, :stffnm, :stflnm, :pass,:stat, :prev)";
        $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(
          ':stfcd' => $staffcode,
          ':stffnm' => $firstname,
          ':stflnm' => $lastname,
          ':pass' => $repassword,
          ':stat' => "Inactive",
          ':prev' => $priviledge

        ));
        $sql = "INSERT INTO activity_log (user_staffcode, user_name, activity, date_time) VALUES (:stfcd, :stfcnm, :activity, :dt)";
        $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(
          ':stfcd' => $staffCode,
          ':stfcnm' => $staffname,
          ':activity' => "Created new user with the staff code '$staffcode' in using this IP ". $_SERVER['REMOTE_ADDR'],
          ':dt' => $datetime

        ));
        echo "added";

      }else{
        // alrt notification
        echo "staffcode exist";
      }
    }
  }
}

?>
