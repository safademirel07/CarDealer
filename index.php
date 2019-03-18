<?php
require_once "inc/functions.php";

$pageGet = $_GET["page"];
$sort = $_GET["sort"];

if (empty($pageGet)) {
    $pageGet = 1;
}

if (empty($sort)) {
    $sort = 1;
}

$carCount = getCarCount();

if ($pageGet == 1) {
    $startPage = 1;
    $endPage = 10;
} else {
    $startPage = ($pageGet - 1) * 10 + 1;
    $endPage = ($startPage - 1) + 10;
}

if ($endPage > $carCount) {
    $endPage = $carCount;
}
$pageCount = 0;
for ($x = 0; $x < $carCount;) {

    if ($x == 10) {
        $start += 11;
    } else {
        $start += 10;
    }
    $pageCount += 1;
    $end += 10;
    $x += 10;
}

echo "		<script type=\"text/javascript\">
			window.onload = function() {
			var e = document.getElementById('sort');
			e[$sort-1].selected = true
			};
		</script>";



?>


<html lang="en">

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/listing-classic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Dec 2018 20:50:09 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>CarForYou - Responsive Car Dealer HTML5 Template</title>
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



<!--Listing-->
<section class="listing-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="result-sorting-wrapper">
                    <div class="sorting-count">
                        <p><?php echo $startPage;
                            echo " - ";
                            echo $endPage ?> <span>of <?php echo $carCount; ?> Listings</span></p>
                    </div>
                    <div class="result-sorting-by">
                        <p>Sort by:</p>
                        <form action="index.php" method="get">
                            <div class="form-group select sorting-select">
                                <select  onchange="this.form.submit()" name="sort" id="sort" class="form-control ">
								<option value="1" >Sort by Name [a-z]</option>
								<option value="2" >Sort by Name [z-a]</option>
								<option value="3" >Sort by Price [0-9]</option>
								<option value="4" >Sort by Price [9-0]</option>
								<option value="5" >Sort by Mileage [0-9]</option>
								<option value="6" >Sort by Mileage [9-0]</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <?php


				if ($sort == 1)
				{
					$orderBy = "car.title asc";
				}
				elseif ($sort == 2)
				{
					$orderBy = "car.title desc";
				}
				elseif ($sort == 3)
				{
					$orderBy = "car.price asc";
				}
				elseif ($sort == 4)
				{
					$orderBy = "car.price desc";
				}
				elseif ($sort == 5)
				{
					$orderBy = "car.mileage asc";
				}
				elseif ($sort == 6)
				{
					$orderBy = "car.mileage desc";
				}


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
                    ->orderBy($orderBy)
                    ->pagination(10, $pageGet)
                    ->getAll();
					

                foreach ($records as $record) {
                    echo '
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img"> <a href="#"><img src="' . $record->cover_image_url . '" class="img-responsive" alt="Image" /> </a>
          </div>
          <div class="product-listing-content">
            <h5><a href="#">' . $record->title . '</a></h5>
            <p class="list-price">' . $record->brandName . '/' . $record->modelName . '</p>
            <p class="list-price">' . number_format($record->price, 0, ',', '.') . ' ₺</p>
            <ul>
              <li><i class="fa fa-road" aria-hidden="true"></i>' . $record->mileage . ' km</li>
              <li><i class="fa fa-user" aria-hidden="true"></i>' . $record->seat . ' seats</li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i>' . $record->year . ' Model</li>
              <li><i class="fa fa-cogs" aria-hidden="true"></i>' . $record->fuelName . '</li>
              <li><i class="fa fa-paint-brush" aria-hidden="true"></i>' . $record->colorName . '</li>
              <li><i class="fa fa-gear" aria-hidden="true"></i>' . $record->gearName . '</li>
              <li><i class="fa fa-car" aria-hidden="true"></i>' . $record->typeName . '</li>
              <li><i class="fa fa-superpowers" aria-hidden="true"></i>' . $record->engine_power . ' HP</li>
            </ul>
            <a href="detail.php?id=' . $record->id . '" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>';
                }

                if ($pageCount > 0) {


                    echo '
        <div class="pagination">
          <ul>';


                    for ($x = 1; $x <= $pageCount;) {
                        if ($x == $pageGet) {
                            echo "<li class='current'>$x</li>";

                        } else {
                            echo "<li><a href='index.php?sort=$sort&page=" . $x . "'>$x</a></li>";

                        }
                        $x += 1;
                    }

                    echo '
          </ul>
        </div>';
                }


                ?>


            </div>

        </div>
    </div>
</section>
<!-- /Listing-->


<!--Footer -->
<footer>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-6 text-right">
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
                    <p class="copy-right">Safa Demirel</p>
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

</body>
</html>
