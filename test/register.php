
<?php
$server = "localhost";
$username = "branchlogtest";
$password = "password";
$dbname = "branchlogintest";
$conn = mysqli_connect($server, $username, $password, $dbname)or die("Error : " . mysqli_error($conn));

if(isset($_REQUEST['name'])){
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $place = mysqli_real_escape_string($conn, $_REQUEST['where']);
  date_default_timezone_set('Asia/Manila');
  $date = date('Y-m-d H:i:s P');
  $ip_remote = $_SERVER['REMOTE_ADDR'];
  $ip_proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
  echo $_SERVER['REMOTE_USER'];
  $query = "Insert into log(name, place, ip_remote, ip_proxy, timestamp)values('"
  . $name . "','" . $place . "','" . $ip_remote . "','" . $ip_proxy . "','" . $date ."')";
  $result = mysqli_query($conn , $query)or die("Error : " . mysqli_error($conn));

  if($result === true){
    echo 'Registered';
  }


}

?>
