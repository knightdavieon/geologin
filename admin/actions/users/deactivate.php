<?php
  if(isset($_POST['staffcode'])){
    include("../../../actions/accessdb.php");
    $staffcode = $_POST['staffcode'];
    $deleteq = "UPDATE accounts SET user_status = 'Inactive' where user_staffcode = :stfcd";
    $gtc = $conn->prepare($deleteq, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $gtc->execute(array(
      ':stfcd' => $staffcode
    ));
    $sql = "INSERT INTO activity_log (user_staffcode, user_name, activity, date_time) VALUES (:stfcd, :stfcnm, :activity, :dt)";
    $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(
      ':stfcd' => $staffCode,
      ':stfcnm' => $staffname,
      ':activity' => "Deactivated user with the staff code '$staffCode' in using this IP ". $_SERVER['REMOTE_ADDR'],
      ':dt' => $datetime

    ));

    header('Location: ../../user');
  }

?>
