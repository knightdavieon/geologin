<?php
  class DbOperation{
    private $con;

    function __construct(){
      require_once dirname(__FILE__).'/DbConnect.php';
      $db = new DbConnect();
      $this->con = $db->connect();
    }

    function loginEmployee($staffcode, $password){
      $getempcode = $this->con->prepare("SELECT * FROM employees where emp_staffcode = ? AND emp_password = ?");
      $getempcode->bind_param("ss", $staffcode, $password);
      $getempcode->execute();
      $getempcode->store_result();
      return $getempcode->num_rows > 0;

      

      // $rowcount = $gtc->rowCount();

      // if($rowcount == 0 ){
      //   // error emp doesnt exist
      //   return false;
      // }else{
      //   // insert login time location and info
      //   // transfer to other activity
      // }
    }

    function getUserByStaffcode($staffcode){
      $getstaff = $this->con->prepare("SELECT * FROM employees WHERE emp_staffcode = ?");
      $getstaff->bind_param("s", $staffcode);
      $getstaff->execute();
      return $getstaff->get_result()->fetch_assoc();
    }
  }

 ?>
