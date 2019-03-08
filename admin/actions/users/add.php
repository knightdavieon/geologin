<?php
if(isset($_POST['employee_code'])){

$staffcode = $_POST['employee_code'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$priviledge = $_POST['accesstype'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

if($password != $repassword){
  echo "password does not match";
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
      ':pass' => $password,
      ':stat' => "Inactive",
      ':prev' => $priviledge

    ));

  }else{
    // alrt notification
    echo "<script>
    window.location = '../../user';
    </script>";
  }



  echo "<script>
  window.location = '../../user';
  </script>";
}

}

?>
