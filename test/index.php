<?php
$server = "localhost";
$username = "branchlogtest";
$password = "password";
$dbname = "branchlogintest";
$conn = mysqli_connect($server, $username, $password, $dbname)or die("Error : " . mysqli_error($conn));

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>

  <!-- bootstrap -->
  <link rel="stylesheet" href="resources/bootstrap-4.3.1-dist/css/bootstrap.css">
  <script src="resources/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
  <!-- end of bootstrap -->

  <!-- jquery js -->
  <script src="resources/jquery-3.3.1.js"></script>
  <!-- end of jquery -->

  <!-- popper js optional but placed for possible future use -->
  <script src="resources/popper-1.14.7.js"></script>
  <!-- end of popper js -->

  <!-- font awesome -->
  <link rel="stylesheet" href="resources/fontawesome-free-5.7.2-web/css/all.css" >
  <!-- end of font awesome -->

  <!-- data table -->
  <link rel="stylesheet" type="text/css" href="resources/DataTables/datatables.css"/>
  <script type="text/javascript" src="resources/DataTables/datatables.js"></script>
  <!-- end of datatable -->

  <style>
  .login-card{
    width: 50%;
    margin-left: auto;
    margin-right: auto;

  }
  @media only screen and (max-width: 800px) {
    .login-card{
      width: 100%;
      margin-left: auto;
      margin-right: auto;
    }
  }
  .align-text-center{
    text-align: center;
  }
  footer{
    background-color: #343A40;
  }
  </style>

</head>
<body>
  <!-- As a heading -->
  <nav class="navbar navbar-dark bg-dark">
    <span class="navbar-brand mb-0 h1">Branch Login Test</span>
  </nav>

  <div class="container" style="padding-top:3%;padding-bottom:2%">
    <div class="card login-card" >
      <div class="card-header align-text-center">
        Login
      </div>
      <div class="card-body">
        <div class="form-group">
          <!-- <form> -->
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control align-text-center" id="name" aria-describedby="emailHelp" placeholder="Enter Name" REQUIRED>

          </div>
          <div class="form-group">
            <label for="where">Where</label>
            <input type="text" class="form-control align-text-center" id="where" placeholder="Where" REQUIRED>
          </div>
          <div class="clearfix">
            <button type="button" class="btn btn-primary float-right" onclick="register_function();">Submit</button>
          </div>
          <!--
        </form> -->

      </div>
    </div>
  </div>

</div>

<div class="container" style="padding-bottom:5%;">
  <div class="card">
    <div class="card-header">
      Logs
    </div>
    <div class="card-body">

      <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Place</th>
            <th>IP Remote</th>
            <th>IP Proxy</th>
            <th>Time</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $trans_query = "Select * from log";
          $trans_result = mysqli_query($conn, $trans_query)or die("Error : " . mysqli_error($conn));
          while($trans_rows = mysqli_fetch_array($trans_result)){
            ?>
            <tr>
              <td><?php echo $trans_rows['id']; ?></td>
              <td><?php echo $trans_rows['name']; ?></td>
              <td><?php echo $trans_rows['place']; ?></td>
              <td><?php echo $trans_rows['ip_remote']; ?></td>
              <td><?php echo $trans_rows['ip_proxy']; ?></td>
              <td><?php echo $trans_rows['timestamp']; ?></td>
            </tr>
            <?php
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

<footer class="footer">
  <div class="container put-center" style="padding-top: 15vh; height: 20%;">
    <div class="row">
      <div class="col-md">
        <strong>
          <!-- <a href="#" class="links cust-anchor"><font size="3">ACCOMMODATION</font></a>
          <a href="#" class="links cust-anchor"><font size="3">AMENITIES</font></a>
          <a href="#" class="links cust-anchor"><font size="3">CONTACT US</font></a> -->
        </strong>
      </div>
    </div>
    <div class="row m-t-50">
      <div class="col-md">

        <!-- <a href="https://facebook.com" class="social-icons"><img src='resources/img/facebook.png'></a>
        <a href="https://twitter.com" class="social-icons"><img src='resources/img/twitter.png'></a>
        <a href="https://instagram.com" class="social-icons"><img src='resources/img/instagram.png'></a>
        <a href="https://plus.google.com" class="social-icons"><img src='resources/img/google-plus.png'></a>
        <a href="https://viber.com" class="social-icons"><img src='resources/img/viber.png'></a> -->

      </div>
    </div>
    <div class="row m-t-50">
      <div class="col-md">
        <!-- <h5 style="color: #C8A940;">La Virginia Resort</h5>
        <p style="font-size: 12pt; padding-top: 0; color:white;">Mataasnakahoy, Batangas</p> -->

      </div>
    </div>

    <hr class="cust-hr" />
  </div>
  <div class="container-fluid foot-pad-bottom" style="background-color: #343A40; text-align: center;">
    <h6 style="margin-bottom: 0;padding-bottom:50px; color:#fff;">&copy; All Rights Reserved</h6>
  </div>
</footer>

</body>

<script type="text/javascript">
$(document).ready(function() {
  $('#example').DataTable();
} );
function register_function(){
  var name = $('#name').val();
  var where = $('#where').val();

  if(document.getElementById("name").value == ""){
    alert("Complete the following fields first");
  }else if(document.getElementById("where").value == ""){
    alert("Complete the following fields first");
  }else{
    $.ajax({
      type:"POST",
      url:"register.php",
      data:{name:name, where:where},
      success:function(result){
        if(result == "Exists"){
          alert("This code is already registered");
        }else{
          alert(result);
           window.location = "<?php echo $_SERVER['PHP_SELF'] ?>";
        }
      }
    });
  }

}
</script>

</html>
