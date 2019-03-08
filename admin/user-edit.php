<?php
include("../actions/accessdb.php");

$sql = "SELECT * FROM accounts";
$sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);




?>

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

  <!-- end of datatable -->
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
        <a type="button" href="user" class="btn btn-fill btn-light" name="button">Back</a>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <form id="form1" method="POST" action="actions/users/add.php">
                <div class="card-header">
                  <h5 class="title">Add User</h5>
                </div>
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-4 px-md-2">
                      <div class="form-group">
                        <label>Staff Code</label>
                        <input type="text" id="employee_code" class="form-control" READONLY value="<?php echo $result['user_staffcode'];?>" autocomplete="off" placeholder="Staff Code" name="employee_code" REQUIRED>
                        <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                      </div>
                    </div>

                    <div class="col-md-4 px-md-2">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" id="firstname" class="form-control" value="<?php echo $result['user_fname'];?>" autocomplete="off" placeholder="First Name" name="firstname" REQUIRED>
                      </div>
                    </div>

                    <div class="col-md-4 px-md-2">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" id="lastname" class="form-control" value="<?php echo $result['user_lname'];?>" autocomplete="off" placeholder="Last Name" name="lastname" REQUIRED>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 px-md-2">
                      <div class="form-group">
                        <label>Priviledge</label>
                        <select id="accesstype" name="accesstype" class="form-control">
                          <option value="" selected disabled></option>
                          <option value="Admin" <?php if($result['user_priviledge'] == "Admin"){ echo "SELECTED";} ?> style="color:black;">Administrator</option>
                          <option value="viewer" <?php if($result['user_priviledge'] == "viewer"){ echo "SELECTED";} ?> style="color:black;">Viewer</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4 px-md-2">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" REQUIRED>
                      </div>
                    </div>

                    <div class="col-md-4 px-md-2">
                      <div class="form-group">
                        <label>Re-Type Password</label>
                        <input type="password" id="repassword" class="form-control" name="repassword" placeholder="Password" REQUIRED>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit"  class="btn btn-fill btn-primary">Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php include("footer.php"); ?>
    </div>
  </div>
  <div class="fixed-plugin">
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
  </div>
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
  <script type="text/javascript" src="../resources/DataTables/datatables.js"></script>
  <script src="../resources/black-dashboard-html-v1.0.1/assets/demo/demo.js"></script>
  <script>

  $(document).ready(function() {
    $('#example').DataTable();
  } );

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
