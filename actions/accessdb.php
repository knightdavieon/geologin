<?php
$server = "localhost";
$username = "branchlogtest";
$password = "password";
$dbname = "branchlogintest";
try {
    $conn = new PDO('mysql:host='.$server.';dbname='.$dbname, $username, $password);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
  }
 ?>
