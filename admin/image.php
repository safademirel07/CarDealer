<?php
require_once "../inc/functions.php";

if (empty($_GET["id"])) {
  header("Location:index");

}

$carID = $_GET["id"];

$comments = getImages($carID);

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
  <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
  <script src="assets/vendors/js/app/app.min.js"></script>

  <script src="assets/js/bootbox.min.js"></script>
  <script src="../assets/js/car.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




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
                <h2 class="page-header-title">Image of <?php echo getCarDetail($carID,"title")?></h2>
              </div>
            </div>
          </div>
          <!-- End Page Header -->
          <div class="row">
            <div class="col-xl-12">

              <div class="widget has-shadow">
                <div class="widget-body">
                  <button class="add-modal" type="button" data-toggle="modal" data-id='<?php echo $carID ?>'
                    data-target="#add-modal">Add

                    </button
                    <div class="table-responsive">
                      <table class="table table-hover mb-0">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Url</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if (count($comments) <= 0) {
                            echo '
                            <tr>
                            <td><span class="text-primary">No data.</span></td>
                            </tr>';
                          }

                          foreach ($comments as $comment)
                          {
                            echo '
                            <tr>
                            <td><span class="text-primary">' . $comment->id . '</span></td>
                            <td>' . $comment->url . '</td>
                            <td class="td-actions">
                            <button class="change-modal" data-toggle="modal" data-target="#change-modal" data-id=' . $comment->id . ' data-carid=' . $carID . '  data-name="' . $comment->url . '" type="button"><i class="la la-edit edit"></i></button>
                            <button onclick="deleteF(' . $comment->id . ')"><i class="la la-close delete"></i></button>

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
            <h4 class="modal-title">Add Image</h4>
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">close</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="addImageForm">
              <label class="col-lg-3 form-control-label">Car ID</label>
              <div class="col-lg-9">
                <input type="text" id="carid" name="carid" placeholder="" readonly class="form-control">
              </div>
              <label class="col-lg-3 form-control-label">Url</label>
              <div class="col-lg-9">
                <input type="url" id="name" name="name" required placeholder="" class="form-control">
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
          <h4 class="modal-title">Change Image</h4>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
            <span class="sr-only">close</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="changeImageForm">

            <label class="col-lg-3 form-control-label">ID</label>
            <div class="col-lg-9">
              <input type="text" id="id" name="id" placeholder="" readonly class="form-control">
            </div>
            <label class="col-lg-3 form-control-label">Car ID</label>
            <div class="col-lg-9">
              <input type="text" id="carid" name="carid" placeholder="" readonly class="form-control">
            </div>
            <label class="col-lg-3 form-control-label">Url</label>
            <div class="col-lg-9">
              <input type="url" id="name" name="name" required placeholder="" class="form-control">
            </div>
            <br>
            <span class="input-group-btn">
              <button
              class="btn"
              type="submit" name="button">Change
            </button>
          </span>
        </form>

      </div>
    </div>


  </div>
</div>


<script>

$(document).ready(function () {

  $(document).on("click", ".change-modal", function () {
    var id = $(this).data('id');
    var carid = $(this).data('carid');
    var name = $(this).data('name');
    $(".col-lg-9 #carid").val(carid);
    $(".col-lg-9 #id").val(id);
    $(".col-lg-9 #name").val(name);
  });
  $(document).on("click", ".add-modal", function () {
    var id = $(this).data('id');
    $(".col-lg-9 #carid").val(id);
    $(".col-lg-9 #name").val("");

  });


});
function deleteF(id) {
  bootbox.confirm("Do you want to delete gear", function (result) {
    if (result) {

      $.ajax({
        type: 'get',
        url: "inc/post/image/deleteimage.php",
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
