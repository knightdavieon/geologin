<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>GL</title>

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
  <script src="resources/black-dashboard-html-v1.0.1/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="resources/jquery-slimscroll/jquery.slimscroll.js"></script>

  <link rel="stylesheet" href="resources/loginstyle.css" >
  <!-- <link rel="stylesheet" href="resources/loader.css" >
  <script src="resources/loader.js"></script> -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
  .center-image{
    width: 45%;
  }
  @media (max-width: 600px) {
    .center-image{

      width: 45%;
    }
  }
  .custom-my-4{
    margin-top:1rem !important;
    margin-bottom:1rem !important;
  }

  </style>

</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body" style="text-align:center;padding-top: 1px;">
            <img src="resources/images/png/swSilverworks.png" class="img-fluid center-image" alt="Responsive image" >
            <h5 class="card-title" style="margin-bottom:1px;">Employee Login Tracker</h5>
            <hr class="my-4 custom-my-4" >
            <form class="form-signin">
              <div class="form-label-group" style="text-align:center;">
                <input type="text" id="inputStaffCode" style="text-align:center;" autocomplete="off" class="form-control" placeholder="Staff Code" required >
                <label for="inputStaffCode">Staff Code</label>
              </div>
              <div class="form-label-group" style="text-align:center;">
                <input type="password" id="inputPassword"  style="text-align:center;" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <div class="form-label-group" style="text-align:center;" >
                <select id="accesstype" class="form-control " >
                  <option value="" selected disabled>---- SELECT ACCESS TYPE ----</option>
                  <option value="Admin">Administrator</option>
                  <option value="viewer">Viewer</option>
                </select>

              </div>


              <button class="btn btn-lg btn-sw btn-block text-uppercase" id="login_btn">Sign in</button>
              <hr class="my-4">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>

<script type="text/javascript">


$('#login_btn').click(function(e){

  var result = " ";
  var staff_code = $('#inputStaffCode').val();
  var staff_user_type = $('#accesstype').val();
  var staff_password = $('#inputPassword').val();
  $.ajax({
    type      :  "POST",
    url       :  "actions/login.php",
    data      :  {staff_code:staff_code, staff_user_type:staff_user_type, staff_password:staff_password},
    success   :  function(result){

      if(result == "login"){
        // e.preventDefault();
        // alert("Login Successful");
        window.location = "admin/";
      }else if(result == "Invalid Access"){
        alert("Invalid Access");
        window.location = "./";
      }else if(result == "Account Inactive"){
        alert("Account Inactive");
        window.location = "./";
      }else if(result == "Wrong Staff Code or Password"){
        alert("Wrong Staff Code or Password");
        window.location = "./";
      }else if(result == "Account Doesnt Exist"){
        alert("Account Doesnt Exist");
        window.location = "./";
      }else{
        alert(result);
        window.location = "./";
      }

    },
    // error:function(Result){
    //   alert(errorResult);
    //
    // }
  });

});
</script>


</html>
