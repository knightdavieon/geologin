<?php include("../actions/accessdb.php");?>
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
  <script src="../resources/sweetalert.min.js"></script>
  <!-- end of datatable -->
  <style>
  /* Always set the map height explicitly to define the size of the div
  * element that contains the map. */
  #map {
    height: 600px;
    width: auto;
    margin-bottom: 10px;
  }
  /* Optional: Makes the sample page fill the window. */

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
        <div class="row" style="">
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add Geofence</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 px-md-6">
                    <div class="form-group">
                      <label>Fence Name</label>
                      <input type="text" id="fenceName" class="form-control" autocomplete="off" placeholder="Fence Name" name="fenceName" REQUIRED>
                      <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 px-md-6">
                    <div class="form-group">
                      <label>longitude</label>
                      <input type="text" class="form-control" style="color:white;" id="longclicked" autocomplete="off" placeholder="longitude" name="long" READONLY>
                      <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 px-md-6">
                    <div class="form-group">
                      <label>latitude</label>
                      <input type="text" class="form-control" style="color:white;" id="latclicked" autocomplete="off" placeholder="latitude" name="lat" READONLY>
                      <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="col-md-12" style="text-align: right;">
                      <button type="button" class="btn btn-primary" name="button">Add Fence</button>
                  </div>

                </div>

              </div>
            </div>
          </div>
          <div class="col-md-8">
            <!-- <div id="latclicked"></div>
            <div id="longclicked"></div> -->

            <!-- <div id="latmoved"></div>
            <div id="longmoved"></div> -->
                <div id="map"></div>

          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">User List</h5>
              </div>
              <div class="card-body">
                <table id="fenceTable" class="table table-striped  dt-responsive nowrap" style="width:100%">
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
</script>

<!--  Google Maps Plugin    -->
<!-- Place this tag in your head or just before your close body tag. -->
<script type="text/javascript">
var map;

function initMap() {
    var latitude = 14.5895357; // YOUR LATITUDE VALUE
    var longitude = 121.0599334; // YOUR LONGITUDE VALUE

    var clickedlat = '';
    var clickedlong = '';

    var myLatLng = {lat: latitude, lng: longitude};

    map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      zoom: 15,
      disableDoubleClickZoom: true, // disable the default map zoom on double click
    });

    // Update lat/long value of div when anywhere in the map is clicked
    google.maps.event.addListener(map,'click',function(event) {
        document.getElementById('latclicked').value = event.latLng.lat();

        document.getElementById('longclicked').value =  event.latLng.lng();
    });

    // Update lat/long value of div when you move the mouse over the map
    google.maps.event.addListener(map,'mousemove',function(event) {
        document.getElementById('latmoved').innerHTML = event.latLng.lat();
        document.getElementById('longmoved').innerHTML = event.latLng.lng();
    });

    // var marker = new google.maps.Marker({
    //   position: myLatLng,
    //   map: map,
    //   //title: 'Hello World'
    //
    //   // setting latitude & longitude as title of the marker
    //   // title is shown when you hover over the marker
    //   title: latitude + ', ' + longitude
    // });

    // Update lat/long value of div when the marker is clicked
    // marker.addListener('click', function(event) {
    //   document.getElementById('latclicked').innerHTML = event.latLng.lat();
    //   document.getElementById('longclicked').innerHTML =  event.latLng.lng();
    // });

    // Create new marker on double click event on the map
    // google.maps.event.addListener(map,'dblclick',function(event) {
    //     var marker = new google.maps.Marker({
    //       position: event.latLng,
    //       map: map,
    //       title: event.latLng.lat()+', '+event.latLng.lng()
    //     });
    //
    //     // Update lat/long value of div when the marker is clicked
    //     marker.addListener('click', function() {
    //       document.getElementById('latclicked').innerHTML = event.latLng.lat();
    //       document.getElementById('longclicked').innerHTML =  event.latLng.lng();
    //     });
    // });

    // Create new marker on single click event on the map
    /*google.maps.event.addListener(map,'click',function(event) {
        var marker = new google.maps.Marker({
          position: event.latLng,
          map: map,
          title: event.latLng.lat()+', '+event.latLng.lng()
        });
    });*/
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiOKKFQ6Z0lGwjYkeCM3WxG6VVqo-P69o&callback=initMap"
async defer></script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiOKKFQ6Z0lGwjYkeCM3WxG6VVqo-P69o&libraries=geometry,places,visualization,drawing"></script> -->

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
  $('#fenceTable').DataTable();



});





</script>
</body>

</html>
