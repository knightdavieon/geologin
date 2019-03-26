<?php
  if(isset($_POST['staffcode'])){
    include("../../../actions/accessdb.php");

    session_start();
    $staffCode = $_SESSION['staffcode'];
    $staffname = $_SESSION['StaffName'];
    $tz = 'Asia/Manila';
    $timestamp = time();
    $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
    $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
    $datetime = $dt->format('d/m/Y, H:i:s');


    $staffcode = $_POST['staffcode'];
    $deleteq = "UPDATE accounts SET user_status = 'Active' where user_staffcode = :stfcd";
    $gtc = $conn->prepare($deleteq, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $gtc->execute(array(
      ':stfcd' => $staffcode
    ));
    $sql = "INSERT INTO activity_log (user_staffcode, user_name, activity, date_time) VALUES (:stfcd, :stfcnm, :activity, :dt)";
    $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(
      ':stfcd' => $staffCode,
      ':stfcnm' => $staffname,
      ':activity' => "Activated user with the staff code '$staffcode' in using this IP ". $_SERVER['REMOTE_ADDR'],
      ':dt' => $datetime

    ));

    header('Location: ../../user');
  }

?>
