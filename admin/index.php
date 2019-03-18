<?php
require_once "../inc/functions.php";

$records = $db->table("car_dealer.car")
->select("car.id")
->select("car.title")
->select("car.description")
->select("car.cover_image_url")
->select("car.model_id")
->select("car.color_id")
->select("car.gear_id")
->select("car.fuel_id")
->select("fuel.name as fuelName")
->select("color.name as colorName")
->select("gear.name as gearName")
->select("model.id as modelId")
->select("model.name as modelName")
->select("model.name as modelName")
->select("brand.name as brandName")
->select("type.name as typeName")
->select("car.year")
->select("car.mileage")
->select("car.seat")
->select("car.engine_power")
->select("car.number_owner")
->select("car.price")
->leftJoin("car_dealer.fuel", "fuel.id", "car.fuel_id")
->leftJoin("car_dealer.color", "color.id", "car.color_id")
->leftJoin("car_dealer.gear", "gear.id", "car.gear_id")
->leftJoin("car_dealer.model", "model.id", "car.model_id")
->leftJoin("car_dealer.brand", "brand.id", "model.brand_id")
->leftJoin("car_dealer.type", "type.id", "model.type_id")
->orderBy("id asc")
->getAll();

?>
<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Elisyam - Tables Basic</title>
  <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Google Fonts -->
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
  <script>
  WebFont.load({
    google: {"families": ["Montserrat:400,500,600,700", "Noto+Sans:400,700"]},
    active: function () {
      sessionStorage.fonts = true;
    }
  });
  </script>

  <!-- End Scrolling Modal -->
  <!-- Begin Vendor Js -->
  <script src="assets/vendors/js/base/jquery.min.js"></script>
  <script src="assets/vendors/js/base/core.min.js"></script>
  <script src="assets/js/bootbox.min.js"></script>
  <script src="../assets/js/car.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- End Vendor Js -->
  <!-- Begin Page Vendor Js -->
  <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
  <script src="assets/vendors/js/app/app.min.js"></script>
  <!-- End Page Vendor Js -->


  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
  <!-- Tweaks for older IEs--><!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body id="page-top">
  <!-- Begin Preloader -->
  <div id="preloader">
    <div class="canvas">
      <img src="assets/img/logo.png" alt="logo" class="loader-logo">
      <div class="spinner"></div>
    </div>
  </div>
  <!-- End Preloader -->
  <div class="page">
    <!-- Begin Header -->
    <header class="header">
      <nav class="navbar fixed-top">
        <!-- Begin Search Box-->
        <div class="search-box">
          <button class="dismiss"><i class="ion-close-round"></i></button>
          <form id="searchForm" action="#" role="search">
            <input type="search" placeholder="Search something ..." class="form-control">
          </form>
        </div>
        <!-- End Search Box-->
        <!-- Begin Topbar -->
        <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
          <!-- Begin Logo -->
          <div class="navbar-header">
            <a href="db-default.html" class="navbar-brand">
              <div class="brand-image brand-big">
                <img src="assets/img/logo-big.png" alt="logo" class="logo-big">
              </div>
              <div class="brand-image brand-small">
                <img src="assets/img/logo.png" alt="logo" class="logo-small">
              </div>
            </a>
            <!-- Toggle Button -->
            <a id="toggle-btn" href="#" class="menu-btn active">
              <span></span>
              <span></span>
              <span></span>
            </a>
            <!-- End Toggle -->
          </div>

        </div>
        <!-- End Topbar -->
      </nav>
    </header>
    <!-- End Header -->
    <!-- Begin Page Content -->
    <div class="page-content d-flex align-items-stretch">
      <div class="default-sidebar">
        <!-- Begin Side Navbar -->
        <nav class="side-navbar box-scroll sidebar-scroll">
          <!-- Begin Main Navigation -->
          <ul class="list-unstyled">
            <?php getSidebar();?>
          </ul>
          <!-- End Main Navigation -->
        </nav>
        <!-- End Side Navbar -->
      </div>
      <!-- End Left Sidebar -->
      <div class="content-inner">
        <div class="container-fluid">
          <!-- Begin Page Header-->
          <div class="row">
            <div class="page-header">
              <div class="d-flex align-items-center">
                <h2 class="page-header-title">Car</h2>
              </div>
            </div>
          </div>
          <!-- End Page Header -->
          <div class="row">
            <div class="col-xl-12">

              <div class="widget has-shadow">
                <div class="widget-body">
                  <button type="button" class="add-modal btn btn-primary" data-toggle="modal"
                  data-target="#add-modal">Add
                  </button
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Brand</th>
                          <th>Model</th>
                          <th>Color</th>
                          <th>Fuel</th>
                          <th>Gear</th>
                          <th>Price(₺)</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (count($records) <= 0) {
                          echo '
                          <tr>
                          <td><span class="text-primary">No data.</span></td>
                          </tr>';
                        }

                        foreach ($records as $car)
                        {
                          $getOptions = getCarOption($car->id);
                          $optionsArray = "";
                          foreach ($getOptions as $option) {
                            $optionsArray .= "$option->option_id,";
                          }

                          $optionsArray = substr($optionsArray,0, -1);
                          echo '
                          <tr>
                          <td><span class="text-primary">' . $car->id . '</span></td>
                          <td>' . $car->title . '</td>
                          <td>' . $car->brandName . '</td>
                          <td>' . $car->modelName . '</td>
                          <td>' . $car->colorName . '</td>
                          <td>' . $car->fuelName . '</td>
                          <td>' . $car->gearName . '</td>
                          <td>' . number_format($car->price, 0, ',', '.') . ' </td>
                          <td class="td-actions">
                          <button class="change-modal" data-toggle="modal"
                          data-target="#change-modal"
                          data-id=' . $car->id . '
                          data-gear=' . $car->gear_id . '
                          data-fuel=' . $car->fuel_id . '
                          data-color=' . $car->color_id . '
                          data-model=' . $car->model_id . '
                          data-title="' . $car->title . '"
                          data-description="' . $car->description . '"
                          data-mileage=' . $car->mileage . '
                          data-cover=' . $car->cover_image_url . '
                          data-price=' . $car->price . '
                          data-seat=' . $car->seat . '
                          data-noowner=' . $car->number_owner . '
                          data-engine=' . $car->engine_power . '
                          data-year=' . $car->year . '

                          data-options="' . $optionsArray . '" data-name="' . $car->name . '" type="button"><i class="la la-edit edit"></i></button>
                          <button onclick="deleteF(' . $car->id . ')"><i class="la la-close delete"></i></button>
                          <a target="_blank" href="image.php?id='.$car->id.'"><i class="la la-image"></i></a>
                          <a target="_blank" href="comment.php?id='.$car->id.'"><i class="la la-comment"></i></a>
                          <a target="_blank" href="maintenance.php?id='.$car->id.'"><i class="la la-car"></i></a>

                          </td>
                          </tr>';
                        }
                        ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- End Hover -->
              <!-- Border -->

            </div>
          </div>
          <!-- End Row -->
        </div>

        <!-- End Page Footer -->
        <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
        <!-- Offcanvas Sidebar -->
      </div>
    </div>
    <!-- End Page Content -->
  </div>

  <div id="sonuc"></div>


  <!-- Begin Scrolling Modal -->
  <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Car</h4>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
            <span class="sr-only">close</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addCarForm">

            <label class="col-lg-3 form-control-label">Title</label>
            <div class="col-lg-9">
              <input type="text" id="title" name="title" placeholder="" class="form-control">
            </div>
            <label class="col-lg-3 form-control-label">Description</label>
            <div class="col-lg-9">
              <input type="text" id="description" name="description" placeholder="" class="form-control">
            </div>

            <label class="col-lg-3 form-control-label">Cover Image URL</label>
            <div class="col-lg-9">
              <input type="text" id="url" name="url" placeholder="www.google.com" class="form-control">
            </div>

            <label class="col-lg-3 form-control-label">Model</label>
            <div class="col-lg-9">
              <div class="form-group select sorting-select">

                <select id="model" name="model" class="form-control ">
                  <?php
                  $models = getModels();
                  foreach ($models as $model) {
                    echo '<option value="'.$model->id.'" >'.$model->name.'</option>';
                  }
                  ?>
                </select>
              </div>
            </div>

            <label class="col-lg-3 form-control-label">Color</label>
            <div class="col-lg-9">
              <div class="form-group select sorting-select">

                <select id="color" name="color" class="form-control ">
                  <?php
                  $colors = getColors();
                  foreach ($colors as $color) {
                    echo '<option value="'.$color->id.'" >'.$color->name.'</option>';
                  }
                  ?>
                </select>
              </div>
            </div>

            <label class="col-lg-3 form-control-label">Gear</label>
            <div class="col-lg-9">
              <div class="form-group select sorting-select">

                <select id="gear" name="gear" class="form-control ">
                  <?php
                  $gears = getGears();
                  foreach ($gears as $gear) {
                    echo '<option value="'.$gear->id.'" >'.$gear->name.'</option>';
                  }
                  ?>
                </select>
              </div>
            </div>

            <label class="col-lg-3 form-control-label">Fuel</label>
            <div class="col-lg-9">
              <div class="form-group select sorting-select">

                <select id="fuel" name="fuel" class="form-control ">
                  <?php
                  $fuels = getFuels();
                  foreach ($fuels as $fuel) {
                    echo '<option value="'.$fuel->id.'" >'.$fuel->name.'</option>';
                  }
                  ?>
                </select>
              </div>
            </div>

            <label class="col-lg-3 form-control-label">Year</label>
            <div class="col-lg-9">
            <input type="number" id="year" name="year" placeholder="" class="form-control">
            </div>

            <label class="col-lg-3 form-control-label">Mileage</label>
            <div class="col-lg-9">
            <input type="number" id="mileage" name="mileage" placeholder="" class="form-control">
            </div>

            <label class="col-lg-3 form-control-label">Seat</label>
            <div class="col-lg-9">
            <input type="number" id="seat" name="seat" placeholder="" class="form-control">
            </div>

            <label class="col-lg-3 form-control-label">Engine Power</label>
            <div class="col-lg-9">
            <input type="number" id="engine" name="engine" placeholder="" class="form-control">
            </div>

            <label class="col-lg-3 form-control-label">Number of Owners</label>
            <div class="col-lg-9">
            <input type="number" id="noowner" name="noowner" placeholder="" class="form-control">
            </div>

            <label class="col-lg-3 form-control-label">Price</label>
            <div class="col-lg-9">
            <input type="number" id="price" name="price" placeholder="" class="form-control">
            </div>

            <label class="col-lg-3 form-control-label">Security</label>
            <div class="col-lg-9">
              <div class="container">
                <div class="row">
                  <?php
                  $getSecurity = getOptions(1);

                  foreach ($getSecurity as $security) {
                    echo '
                    <div class="col-sm-4">
                    <div class="styled-checkbox">
                    <input type="checkbox" name="options['.$security->id.']" id="check-'.$security->id.'">
                    <label for="check-'.$security->id.'">'.getOptionName($security->id).'</label>
                    </div>
                    </div>';
                  }
                  ?>
                </div>
              </div>
            </div>
            <label class="col-lg-3 form-control-label">Internal Hardware</label>
            <div class="col-lg-9">
              <div class="container">
                <div class="row">
                  <?php
                  $getSecurity = getOptions(2);

                  foreach ($getSecurity as $security) {
                    echo '
                    <div class="col-sm-4">
                    <div class="styled-checkbox">
                    <input type="checkbox" name="options['.$security->id.']" id="check-'.$security->id.'">
                    <label for="check-'.$security->id.'">'.getOptionName($security->id).'</label>
                    </div>
                    </div>';
                  }
                  ?>
                </div>
              </div>
            </div>
            <label class="col-lg-3 form-control-label">External Hardware</label>
            <div class="col-lg-9">
              <div class="container">
                <div class="row">
                  <?php
                  $getSecurity = getOptions(3);

                  foreach ($getSecurity as $security) {
                    echo '
                    <div class="col-sm-4">
                    <div class="styled-checkbox">
                    <input type="checkbox" name="options['.$security->id.']" id="check-'.$security->id.'">
                    <label for="check-'.$security->id.'">'.getOptionName($security->id).'</label>
                    </div>
                    </div>';
                  }
                  ?>
                </div>
              </div>
            </div>

            <label class="col-lg-3 form-control-label">Multimedia</label>
            <div class="col-lg-9">
              <div class="container">
                <div class="row">
                  <?php
                  $getSecurity = getOptions(4);

                  foreach ($getSecurity as $security) {
                    echo '
                    <div class="col-sm-4">
                    <div class="styled-checkbox">
                    <input type="checkbox" name="options['.$security->id.']" id="check-'.$security->id.'">
                    <label for="check-'.$security->id.'">'.getOptionName($security->id).'</label>
                    </div>
                    </div>';
                  }
                  ?>
                </div>
              </div>
            </div>
            <label class="col-lg-3 form-control-label">Replaced</label>
            <div class="col-lg-9">
              <div class="container">
                <div class="row">
                  <?php
                  $getSecurity = getOptions(5);

                  foreach ($getSecurity as $security) {
                    echo '
                    <div class="col-sm-4">
                    <div class="styled-checkbox">
                    <input type="checkbox" name="options['.$security->id.']" id="check-'.$security->id.'">
                    <label for="check-'.$security->id.'">'.getOptionName($security->id).'</label>
                    </div>
                    </div>';
                  }
                  ?>
                </div>
              </div>
            </div>
            <label class="col-lg-3 form-control-label">Painted</label>
            <div class="col-lg-9">
              <div class="container">
                <div class="row">
                  <?php
                  $getSecurity = getOptions(6);

                  foreach ($getSecurity as $security) {
                    echo '
                    <div class="col-sm-4">
                    <div class="styled-checkbox">
                    <input type="checkbox" name="options['.$security->id.']" id="check-'.$security->id.'">
                    <label for="check-'.$security->id.'">'.getOptionName($security->id).'</label>
                    </div>
                    </div>';
                  }
                  ?>
                </div>
              </div>
            </div>
			
            <br>
            <span class="input-group-btn">
              <button
              class="btn"
              type="submit" name="button">Add
            </button>
          </span>
        </form>

      </div>
    </div>


  </div>
</div>

<!-- Begin Scrolling Modal -->
<div id="change-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Change Car</h4>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">close</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="changeCarForm">
        </form>

      </div>
    </div>


  </div>
</div>

<script>
$(document).ready(function () {

  $(document).on("click", ".change-modal", function () {
    var id = $(this).data('id');
    var title = $(this).data('title');
    var options = $(this).data('options');
    var gear = $(this).data('gear');
    var fuel = $(this).data('fuel');
    var color = $(this).data('color');
    var model = $(this).data('model');
    var title = $(this).data('title');
    var description = $(this).data('description');
    var mileage = $(this).data('mileage');
    var cover = $(this).data('cover');
    var price = $(this).data('price');
    var seat = $(this).data('seat');
    var noowner = $(this).data('noowner');
    var year = $(this).data('year');
    var engine = $(this).data('engine');

    $.ajax({
      type: 'get',
      data: "id="+id,
      url: "inc/post/checkedform.php",
      success: function (cevap) {
        $("#changeCarForm").html("" + cevap);
        $(".col-lg-9 #carid").val(id);
        $(".col-lg-9 #title").val(title);
        $(".col-lg-9 #gear").val(gear);
        $(".col-lg-9 #fuel").val(fuel);
        $(".col-lg-9 #color").val(color);
        $(".col-lg-9 #model").val(model);
        $(".col-lg-9 #description").val(description);
        $(".col-lg-9 #url").val(cover);
        $(".col-lg-9 #mileage").val(mileage);
        $(".col-lg-9 #price").val(price);
        $(".col-lg-9 #mileage").val(mileage);
        $(".col-lg-9 #seat").val(seat);
        $(".col-lg-9 #number_owner").val(mileage);
        $(".col-lg-9 #mileage").val(mileage);
        $(".col-lg-9 #engine").val(engine);
        $(".col-lg-9 #noowner").val(noowner);
        $(".col-lg-9 #year").val(year);



      }
    });
  });

  $(document).on("click", ".add-modal", function () {
    var id = $(this).data('id');
    var title = $(this).data('title');
    var options = $(this).data('options');
    var gear = $(this).data('gear');
    var fuel = $(this).data('fuel');
    var color = $(this).data('color');
    var model = $(this).data('model');
    var title = $(this).data('title');
    var description = $(this).data('description');
    var mileage = $(this).data('mileage');
    var cover = $(this).data('cover');
    var price = $(this).data('price');
    var seat = $(this).data('seat');
    var noowner = $(this).data('noowner');
    var year = $(this).data('year');
    var engine = $(this).data('engine');

    $(".col-lg-9 #id").val("");
    $(".col-lg-9 #title").val("");
    $(".col-lg-9 #gear").val("");
    $(".col-lg-9 #fuel").val("");
    $(".col-lg-9 #color").val("");
    $(".col-lg-9 #model").val("");
    $(".col-lg-9 #description").val("");
    $(".col-lg-9 #url").val("");
    $(".col-lg-9 #mileage").val("");
    $(".col-lg-9 #price").val("");
    $(".col-lg-9 #mileage").val("");
    $(".col-lg-9 #seat").val("");
    $(".col-lg-9 #number_owner").val("");
    $(".col-lg-9 #engine").val("");
    $(".col-lg-9 #noowner").val("");
    $(".col-lg-9 #year").val("");
  });


});


function deleteF(id) {
  bootbox.confirm("Do you want to delete type", function (result) {
    if (result) {

      $.ajax({
        type: 'get',
        url: "inc/post/type/deletetype.php",
        data: "id="+id,
        success: function (cevap) {
          $("#sonuc").html("" + cevap);
        }
      });

    }
  });

}
</script>
</body>
</html>
