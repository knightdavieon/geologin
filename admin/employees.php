<?php include("../actions/accessdb.php"); ?>
<?php //include("../actions/scriptvalidation.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("header.php"); ?>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="../resources/fontawesome-free-5.7.2-web/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../resources/black-dashboard-html-v1.0.1/assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../resources/black-dashboard-html-v1.0.1/assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../resources/black-dashboard-html-v1.0.1/assets/demo/demo.css" rel="stylesheet" />
  <!-- data table -->
  <link rel="stylesheet" type="text/css" href="../resources/DataTables/datatables.css"/>
  <link rel="stylesheet" type="text/css" href="../resources/swal.css"/>
  <script src="../resources/sweetalert.min.js"></script>
  <script src="../resources/swal.js"></script>

  <!-- end of datatable -->

  <style media="screen">

  </style>
</head>

<body class="">
  <div class="wrapper">
    <!-- Sidebar -->
    <?php include("sidebar.php"); ?>
    <!-- end Sidebar -->
    <div class="main-panel">
      <!-- Navbar -->
      <?php include("navbar.php"); ?>

      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <form id="empRegisterForm" >
                <div class="card-header">
                  <h5 class="title">Add Employee</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 px-md-2">
                      <div class="form-group">
                        <label>Staff Code</label>
                        <input type="text" id="employee_code" class="form-control" autocomplete="off" placeholder="Staff Code" name="employee_code" REQUIRED>
                        <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                      </div>
                    </div>
                    <div class="col-md-4 px-md-2">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" id="firstname" class="form-control" autocomplete="off" placeholder="First Name" name="firstname" REQUIRED>
                      </div>
                    </div>
                    <div class="col-md-4 px-md-2">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" id="lastname" class="form-control" autocomplete="off" placeholder="Last Name" name="lastname" REQUIRED>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 px-md-2">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" id="address" class="form-control" autocomplete="off" placeholder="Address" name="address" REQUIRED>
                        <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                      </div>
                    </div>
                    <div class="col-md-4 px-md-2">
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" id="contact_number" class="form-control" autocomplete="off" placeholder="contact_number" name="contact_number" REQUIRED>
                        <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                      </div>
                    </div>
                    <div class="col-md-4 px-md-2">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" id="email" class="form-control" autocomplete="off" placeholder="Email" name="email" REQUIRED>
                        <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 px-md-2">
                      <div class="form-group">
                        <label>Department</label>
                        <input type="text" id="department" class="form-control" autocomplete="off" placeholder="Department" name="department" REQUIRED>
                        <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                      </div>
                    </div>
                    <div class="col-md-6 px-md-2">
                      <div class="form-group">
                        <label>Position</label>
                        <input type="text" id="position" class="form-control" autocomplete="off" placeholder="Position" name="position" REQUIRED>
                        <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 px-md-2">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" class="form-control" autocomplete="off" placeholder="Last Name" name="password" REQUIRED>
                      </div>
                    </div>

                    <div class="col-md-6 px-md-2">
                      <div class="form-group">
                        <label>Re-Type Password</label>
                        <input type="password" id="repassword" class="form-control" autocomplete="off" placeholder="Last Name" name="repassword" REQUIRED>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="card-footer" style="text-align:right;">
                  <button class="btn btn-fill btn-primary">Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">User List</h5>
              </div>
              <div class="card-body">
                <table id="employeeTable" class="table table-striped  dt-responsive nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>Staff Code</th>
                      <th>Name</th>
                      <th>address</th>
                      <th>Contact #</th>
                      <th>Email</th>
                      <th>Department</th>
                      <th>Position</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM employees";
                    $sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute();
                    $i = 0;
                    while($result = $sth->fetch(PDO::FETCH_ASSOC)){


                      ?>
                      <tr>
                        <td><?php echo $result['emp_staffcode']; ?></td>
                        <td><?php echo $result['emp_fname'] ." ". $result['emp_lname']; ?></td>
                        <td><?php echo $result['emp_address']; ?></td>
                        <td><?php echo $result['emp_contact']; ?></td>
                        <td><?php echo $result['emp_email']; ?></td>
                        <td><?php echo $result['emp_department']; ?></td>
                        <td><?php echo $result['emp_position']; ?></td>
                        <td><?php echo $result['emp_status']; ?></td>
                        <td>
                          <?php if($result['emp_status'] != "Active"){ ?>
                            <button class="btn btn-fill btn-primary" data-toggle="modal" data-target="#modalactivate<?php echo $i;?>"><span class="tim-icons icon-check-2"></span></button>
                          <?php }else{ ?>
                            <button class="btn btn-fill btn-primary" data-toggle="modal" data-target="#modaldeactivate<?php echo $i;?>"><span class="tim-icons icon-simple-remove"></span></button>
                          <?php } ?>
                          <a class="btn btn-fill btn-primary" href="employee-edit?empstaffcode=<?php echo $result['emp_staffcode'];?>"><span class="tim-icons icon-badge"></span></a>

                          <button class="btn btn-fill btn-primary" data-toggle="modal" data-target="#modaldelete<?php echo $i;?>"><span class="tim-icons icon-trash-simple"></span></button>


                        </td>
                      </tr>
                      <?php
                      include("actions/employees/modals.php"); $i++;}
                      ?>

                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
        </div>
        <?php include("footer.php"); ?>
      </div>
    </div>
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
    <a href="#" data-toggle="dropdown">
    <i class="fa fa-cog fa-2x"> </i>
  </a>
  <ul class="dropdown-menu">
  <li class="header-title"> Sidebar Background</li>
  <li class="adjustments-line">
  <a href="javascript:void(0)" class="switch-trigger background-color">
  <div class="badge-colors text-center">
  <span class="badge filter badge-primary active" data-color="primary"></span>
  <span class="badge filter badge-info" data-color="blue"></span>
  <span class="badge filter badge-success" data-color="green"></span>
</div>
<div class="clearfix"></div>
</a>
</li>
<li class="adjustments-line text-center color-change">
<span class="color-label">LIGHT MODE</span>
<span class="badge light-badge mr-2"></span>
<span class="badge dark-badge ml-2"></span>
<span class="color-label">DARK MODE</span>
</li>

</ul>
</div>
</div> -->
<!--   Core JS Files   -->
<script src="../resources/black-dashboard-html-v1.0.1/assets/js/core/jquery.min.js"></script>
<script src="../resources/black-dashboard-html-v1.0.1/assets/js/core/popper.min.js"></script>
<script src="../resources/black-dashboard-html-v1.0.1/assets/js/core/bootstrap.min.js"></script>
<script src="../resources/black-dashboard-html-v1.0.1/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="../resources/black-dashboard-html-v1.0.1/assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../resources/black-dashboard-html-v1.0.1/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../resources/black-dashboard-html-v1.0.1/assets/js/black-dashboard.min.js?v=1.0.0"></script>
<!-- Black Dashboard DEMO methods, don't include it in your project! -->
<script src="../resources/black-dashboard-html-v1.0.1/assets/demo/demo.js"></script>
<script type="text/javascript" src="../resources/DataTables/datatables.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#employeeTable').DataTable();
} );

$('#empRegisterForm').on('submit', function(e){
  e.preventDefault();
  e.stopPropagation();
  var result = " ";
  var emp_staff_code = $('#employee_code').val();
  var emp_fname = $('#firstname').val();
  var emp_lname = $('#lastname').val();
  var emp_address = $('#address').val();
  var emp_contact = $('#contact_number').val();
  var emp_email = $('#email').val();
  var emp_department = $('#department').val();
  var emp_position = $('#position').val();
  var emp_password = $('#password').val();
  var emp_repassword = $('#repassword').val();
  $.ajax({
    type      :  "POST",
    url       :  "actions/employees/add.php",
    data      :  {emp_staff_code:emp_staff_code, emp_fname:emp_fname, emp_lname:emp_lname, emp_address:emp_address, emp_contact:emp_contact, emp_email:emp_email, emp_department:emp_department, emp_position:emp_position, emp_password:emp_password, emp_repassword:emp_repassword},
    success   :  function(result){

      if(result == "added"){
        swal({
          title: "Success!",
          text: "You Have Successfully Enrolled An Employee",
          icon: "success",
          buttons:
          'Confirm'
          ,
          closeOnClickOutside: false,
          dangerMode: false,
        }).then(function(isConfirm) {
          if (isConfirm) {
            window.location = "./employees";


          }
        })
      }else if(result == "staffcode exist"){
        swal({
          title: "Duplicate Staff!",
          text: "Staff Code Already Exist",
          icon: "error",
          //timer: 3000
        });

      }else if(result == "priv not set"){
        swal({
          title: "Empty Field",
          text: "Priviledge Is Not Set!",
          icon: "error",
          //timer: 3000
        });

      }else if(result == "password does not match"){
        swal({
          title: "Password Doesnt Match!",
          text: "Aren't You Sick Of Being Wrong All The Time?",
          icon: "error",
          //timer: 3000
        });

      }

    },
    // error:function(Result){
    //   alert(errorResult);
    //
    // }
  });

});
</script>
<script>
$(document).ready(function() {
  $().ready(function() {
    $sidebar = $('.sidebar');
    $navbar = $('.navbar');
    $main_panel = $('.main-panel');

    $full_page = $('.full-page');

    $sidebar_responsive = $('body > .navbar-collapse');
    sidebar_mini_active = true;
    white_color = false;

    window_width = $(window).width();

    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



    $('.fixed-plugin a').click(function(event) {
      if ($(this).hasClass('switch-trigger')) {
        if (event.stopPropagation) {
          event.stopPropagation();
        } else if (window.event) {
          window.event.cancelBubble = true;
        }
      }
    });

    $('.fixed-plugin .background-color span').click(function() {
      $(this).siblings().removeClass('active');
      $(this).addClass('active');

      var new_color = $(this).data('color');

      if ($sidebar.length != 0) {
        $sidebar.attr('data', new_color);
      }

      if ($main_panel.length != 0) {
        $main_panel.attr('data', new_color);
      }

      if ($full_page.length != 0) {
        $full_page.attr('filter-color', new_color);
      }

      if ($sidebar_responsive.length != 0) {
        $sidebar_responsive.attr('data', new_color);
      }
    });

    $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
      var $btn = $(this);

      if (sidebar_mini_active == true) {
        $('body').removeClass('sidebar-mini');
        sidebar_mini_active = false;
        blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
      } else {
        $('body').addClass('sidebar-mini');
        sidebar_mini_active = true;
        blackDashboard.showSidebarMessage('Sidebar mini activated...');
      }

      // we simulate the window Resize so the charts will get updated in realtime.
      var simulateWindowResize = setInterval(function() {
        window.dispatchEvent(new Event('resize'));
      }, 180);

      // we stop the simulation of Window Resize after the animations are completed
      setTimeout(function() {
        clearInterval(simulateWindowResize);
      }, 1000);
    });

    $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
      var $btn = $(this);

      if (white_color == true) {

        $('body').addClass('change-background');
        setTimeout(function() {
          $('body').removeClass('change-background');
          $('body').removeClass('white-content');
        }, 900);
        white_color = false;
      } else {

        $('body').addClass('change-background');
        setTimeout(function() {
          $('body').removeClass('change-background');
          $('body').addClass('white-content');
        }, 900);

        white_color = true;
      }


    });

    $('.light-badge').click(function() {
      $('body').addClass('white-content');
    });

    $('.dark-badge').click(function() {
      $('body').removeClass('white-content');
    });
  });
});
</script>
<script>
$(document).ready(function() {
  // Javascript method's body can be found in assets/js/demos.js
  demo.initDashboardPageCharts();

});
</script>
</body>

</html>
