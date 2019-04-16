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
    width: 790px;
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
                      <input type="text" id="employee_code" class="form-control" autocomplete="off" placeholder="Fence Name" name="fenceName" REQUIRED>
                      <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="col-md-12">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#searchLoc" >Search Location</button>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-12 px-md-6">
                    <div class="form-group">
                      <label>longitude</label>
                      <input type="text" id="employee_code" class="form-control" autocomplete="off" placeholder="longitude" name="long" readonly>
                      <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 px-md-6">
                    <div class="form-group">
                      <label>latitude</label>
                      <input type="text" id="employee_code" class="form-control" autocomplete="off" placeholder="latitude" name="lat" readonly>
                      <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 px-md-6">
                    <div class="form-group">
                      <label>Radius</label>
                      <input type="text" id="employee_code" class="form-control" autocomplete="off" placeholder="Radius" name="rad" readonly>
                      <!-- onkeypress="return restrictCharacters(this, event, digitsOnly);" -->
                    </div>
                  </div>
                </div>

              </div>

            </div>

          </div>
          <div class="col-md-8">
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

        </div>
        <div class="modal fade lg" id="searchLoc" style="background-color:#000000c9;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color:#27293D;">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color: white;">Search Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <input type="text" style="margin-bottom:20px;" class="form-control" placeholder="Input Location" id="pac-input" name="" value="">
                  </div>

                </div>
                <div class="row">
                  <div class="map" id="map"></div>

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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiOKKFQ6Z0lGwjYkeCM3WxG6VVqo-P69o&libraries=geometry,places,visualization,drawing"></script>
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

  var circle;

    function initialize() {
        var mapOptions = {
            center: new google.maps.LatLng(-34.397, 150.644),
            zoom: 8
        };


        var map = new google.maps.Map(document.getElementById('map'),
        mapOptions);

        var drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.MARKER,
            drawingControl: true,
            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: [
                google.maps.drawing.OverlayType.CIRCLE]
            },
            circleOptions: {
                fillColor: '#ffff00',
                fillOpacity: .3,
                strokeWeight: 1,
                clickable: false,
                editable: true,
                zIndex: 1
            }
        });
        drawingManager.setMap(map);
        google.maps.event.addListener(drawingManager, 'circlecomplete', onCircleComplete);
    }

    function onCircleComplete(shape) {
        if (shape == null || (!(shape instanceof google.maps.Circle))) return;

        if (circle != null) {
            circle.setMap(null);
            circle = null;
        }

        circle = shape;
        console.log('radius', circle.getRadius());
        console.log('lat', circle.getCenter().lat());
        console.log('lng', circle.getCenter().lng());
    }

    google.maps.event.addDomListener(window, 'load', initialize);
} );

// Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });


</script>
</body>

</html>
