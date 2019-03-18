<?php
require_once "inc/functions.php";

$carId = $_GET["id"];

if (getCarCountID($carId) <= 0)
{
    header("Location:index.php");
    exit;

}
$car_images = getCarImage($carId);

$title = getCarDetail($carId, "title");
$description = getCarDetail($carId, "description");
$year = getCarDetail($carId, "year");
$mileage = getCarDetail($carId, "mileage");
$seat = getCarDetail($carId, "seat");
$engine_power = getCarDetail($carId, "engine_power");
$number_owner = getCarDetail($carId, "number_owner");
$price = getCarDetail($carId, "price");

$modelName = getModelDetail(getCarDetail($carId, "model_id"), "name");
$brandName = getBrandDetail(getModelDetail(getCarDetail($carId, "model_id"), "brand_id"), "name");
$typeName = getTypeDetail(getModelDetail(getCarDetail($carId, "model_id"), "type_id"), "name");

$gearName = getGearDetail(getCarDetail($carId, "gear_id"), "name");
$fuelName = getFuelDetail(getCarDetail($carId, "fuel_id"), "name");

$comments = getComments($carId);
$commentCount = getCommentCount($carId);

$maintenances = getMaintenances($carId);
//echo getCarDetail($carId,"description");
?>

<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/listing-detail-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Dec 2018 20:50:30 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Car Gallerry</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!--Custome Style -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!--slick-slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!--bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all"
          data-default-color="true"/>
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all"/>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
    <!-- Google-Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!--Header-->
<header>
    <div class="default-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    <div class="logo"><a href="index"><img src="assets/images/logo.png" alt="image"/></a></div>
                </div>
                <div class="col-sm-9 col-md-10">
                    <div class="header_info">
                        <div class="header_widgets">
                            <div class="circle_icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <p class="uppercase_text">Mail Us : </p>
                            <a href="mailto:info@example.com">1531014@dogus.edu.tr</a></div>
                        <div class="header_widgets">
                            <div class="circle_icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <p class="uppercase_text">Call Us: </p>
                            <a href="tel:61-1234-5678-09">+90 555 555 55 55</a></div>
                        <div class="social-follow">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<!--Listing-detail-->
<section class="listing-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="listing_images">
                    <?php


                    echo '<div class="listing_images_slider">';
                    foreach ($car_images as $car_image) {
                        echo ' <div><img src="' . $car_image->url . '" alt="image"></div>';
                    }
                    echo '</div>
          <div class="listing_images_slider_nav">';
                    foreach ($car_images as $car_image) {
                        echo ' <div><img src="' . $car_image->url . '" alt="image"></div>';
                    }
                    echo ' </div>';
                    ?>
                </div>
                <div class="main_features">
                    <ul>
                      <li><i class="fa fa-money" aria-hidden="true"></i>
                          <h5><?php echo number_format($price, 0, ',', '.'); ?> TL</h5>
                          <p>Price</p>
                      </li>
                        <li><i class="fa fa-tachometer" aria-hidden="true"></i>
                            <h5><?php echo $mileage;?></h5>
                            <p>Total Kilometres</p>
                        </li>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i>
                            <h5><?php echo $year;?></h5>
                            <p>Reg.Year</p>
                        </li>
                        <li><i class="fa fa-cogs" aria-hidden="true"></i>
                            <h5><?php echo $fuelName;?></h5>
                            <p>Fuel Type</p>
                        </li>
                        <li><i class="fa fa-power-off" aria-hidden="true"></i>
                            <h5><?php echo $gearName;?></h5>
                            <p>Transmission</p>
                        </li>
                        <li><i class="fa fa-superpowers" aria-hidden="true"></i>
                            <h5><?php echo $engine_power;?> HP</h5>
                            <p>Engine</p>
                        </li>
                    </ul>
                </div>

                <div class="listing_more_info">
                    <div class="listing_detail_wrap">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs gray-bg" role="tablist">
                            <li role="presentation" class="active"><a href="#vehicle-overview "
                                                                      aria-controls="vehicle-overview" role="tab"
                                                                      data-toggle="tab">Overview </a></li>
                            <li role="presentation"><a href="#specification" aria-controls="specification" role="tab"
                                                       data-toggle="tab">Specification</a></li>
                            <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab"
                                                       data-toggle="tab">Accessories</a></li>
                            <li role="presentation"><a href="#parts" aria-controls="parts" role="tab" data-toggle="tab">Parts</a>
                            <li role="presentation"><a href="#maintenance" aria-controls="maintenance" role="tab" data-toggle="tab">Maintenance</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- vehicle-overview -->
                            <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                                <p>
                                    <?php
                                    echo $description;
                                    ?>
                                </p>
                            </div>

                            <!-- Technical-Specification -->
                            <div role="tabpanel" class="tab-pane" id="specification">
                                <div class="table-responsive">
                                    <!--Basic-Info-Table-->
                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="2">BASIC INFO</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Brand</td>
                                            <td><?php echo $brandName;?></td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td><?php echo $modelName;?></td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td><?php echo $typeName;?></td>
                                        </tr>
                                        <tr>
                                            <td>Model Year</td>
                                            <td><?php echo $year;?></td>
                                        </tr>
                                        <tr>
                                            <td>No. of Owners</td>
                                            <td><?php echo $number_owner;?></td>
                                        </tr>
                                        <tr>
                                            <td>KMs Driven</td>
                                            <td><?php echo $mileage;?></td>
                                        </tr>
                                        <tr>
                                            <td>Fuel Type</td>
                                            <td><?php echo $fuelName;?></td>
                                        </tr>
                                        <tr>
                                            <td>Gear Type</td>
                                            <td><?php echo $gearName;?></td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <!-- Accessories -->
                            <div role="tabpanel" class="tab-pane" id="accessories">
                                <!--Accessories-->
                                <table>
                                    <thead>
                                    <tr>
                                        <th colspan="2">Security</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $getSecurity = getOptions(1);

                                    foreach ($getSecurity as $security) {
                                        echo '
                    <tr>
                      <td>' . $security->name . '</td>
                      <td><i class="fa fa-' . checkOption($carId, $security->id) . '" aria-hidden="true"></i></td>
                    </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <table>
                                    <thead>
                                    <tr>
                                        <th colspan="2">Internal Hardware</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $getSecurity = getOptions(2);

                                    foreach ($getSecurity as $security) {
                                        echo '
                    <tr>
                      <td>' . $security->name . '</td>
                      <td><i class="fa fa-' . checkOption($carId, $security->id) . '" aria-hidden="true"></i></td>
                    </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <table>
                                    <thead>
                                    <tr>
                                        <th colspan="2">External Hardware</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $getSecurity = getOptions(3);

                                    foreach ($getSecurity as $security) {
                                        echo '
                    <tr>
                      <td>' . $security->name . '</td>
                      <td><i class="fa fa-' . checkOption($carId, $security->id) . '" aria-hidden="true"></i></td>
                    </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <table>
                                    <thead>
                                    <tr>
                                        <th colspan="2">Multimedia</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $getSecurity = getOptions(4);

                                    foreach ($getSecurity as $security) {
                                        echo '
                    <tr>
                      <td>' . $security->name . '</td>
                      <td><i class="fa fa-' . checkOption($carId, $security->id) . '" aria-hidden="true"></i></td>
                    </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>


                            <!-- Accessories -->
                            <div role="tabpanel" class="tab-pane" id="parts">
                                <!--Accessories-->
                                <table>
                                    <thead>
                                    <tr>
                                        <th colspan="2">Replaced</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $getSecurity = getOptions(5);

                                    foreach ($getSecurity as $security) {
                                        echo '
                    <tr>
                      <td>' . $security->name . '</td>
                      <td><i class="fa fa-' . checkOption($carId, $security->id) . '" aria-hidden="true"></i></td>
                    </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <table>
                                    <thead>
                                    <tr>
                                        <th colspan="2">Painted</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $getSecurity = getOptions(6);

                                    foreach ($getSecurity as $security) {
                                        echo '
                    <tr>
                      <td>' . $security->name . '</td>
                      <td><i class="fa fa-' . checkOption($carId, $security->id) . '" aria-hidden="true"></i></td>
                    </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Accessories -->
                            <div role="tabpanel" class="tab-pane" id="maintenance">
                                <!--Accessories-->
                                <table>
                                    <thead>
                                    <tr>
                                        <th colspan="2">Maintenance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    if (count($maintenances) == 0)
                                    {
                                        echo '
                                        <tr>
                                          <td>No maintenance record.</td>
                                        </tr>';
                                    }
                                    else {
                                                                    foreach ($maintenances as $maintenance) {
                                                            echo '
                                        <tr>
                                          <td>' . $maintenance->description . '</td>
                                          <td>' . $maintenance->last_time . '</td>
                                        </tr>';
                                    }
                                    }



                                    ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="space-20"></div>
                    <div class="divider"></div>

                    <!--Comments-->
                    <div class="articale_comments">
                        <div id="comments">
                            <?php

                            if ($commentCount > 0) {
                                echo '

                                                                <h5>' . $commentCount . ' Comments</h5>
                            <ul class="commentlist">


                                    ';
                                foreach ($comments as $comment) {
                                    echo '
                      <li class="comment">
                            <div class="comment-body">
                                <div class="comment-author"> <img class="avatar" src="assets/images/comment-author-2.jpg" alt="image"> <span class="fn">' . $comment->name . '</span> </div>
                                <div class="comment-meta commentmetadata"> ' . $comment->date . '</div>
                                <p>' . $comment->message . '</p>
                            </div>
                        </li>';
                                }
                            } else {
                                echo "İlk yorumu siz yapın.";

                            }

                            ?>
                            </ul>
                        </div>
                    </div>

                    <div id="sonuc"></div>


                    <!--Comment-Form-->
                    <div class="comment_form">
                        <h6>Leave a Comment</h6>
                        <form id="commentForm">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" required placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <textarea rows="5" class="form-control" name="comment" id="comment" required placeholder="Comments"></textarea>
                            </div>
                            <div class="form-group">
                              <input type="hidden" name="car_id" id="car_id" value="<?php echo $carId; ?>"/>
                            </div>

                            <div class="form-group">
                                <button id="commentButton"
                                        class="btn"
                                        type="submit" name="button">Submit Comment
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--/Comment-Form-->

                </div>


            </div>

            <!--Side-Bar-->
            <aside class="col-md-3">

                <div class="sidebar_widget">
                    <div class="widget_heading">
                        <h5><i class="fa fa-address-card-o" aria-hidden="true"></i> Dealer Contact </h5>
                    </div>
                    <div class="dealer_detail"><img src="assets/images/comment-author-2.jpg" alt="image">
                        <p><span>Name:</span> Safa Demirel</p>
                        <p><span>Email:</span> safa@gmail.com</p>
                        <p><span>Phone:</span> +90 554 987 65 43</p>
                    </div>
                </div>
            </aside>
            <!--/Side-Bar-->

        </div>
    </div>
</section>
<!--/Listing-detail-->


<!--Footer -->
<footer1
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-6 text-right">
                <div class="footer_widget">
                    <p>Download Our APP:</p>
                    <ul>
                        <li><a href="#"><i class="fa fa-android" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-apple" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="footer_widget">
                    <p>Connect with Us:</p>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-md-pull-6">
                <p class="copy-right">Copyright &copy; 2017 CarForYou. All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- /Footer-->

<!--Back to top-->
<div id="back-top" class="back-top"><a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a></div>
<!--/Back to top-->


<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="assets/js/car.js"></script>


</body>
</html>
