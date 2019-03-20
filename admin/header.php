<?php
session_start();

if($_SESSION['staffcode'] == NULL || $_SESSION['staffcode'] == " " || $_SESSION['StaffName'] == NULL || $_SESSION['StaffName'] == " " || $_SESSION['prev'] == NULL || $_SESSION['prev'] == " "){
  header('Location: ../');
}
?>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="../resources/black-dashboard-html-v1.0.1/assets/img/apple-icon.png">
<link rel="icon" type="../resources/images/png/sw.png" href="../resources/images/png/sw.png">
<title>
  ETS
</title>
