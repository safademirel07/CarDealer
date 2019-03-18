<?php

require_once "../../../../inc/functions.php";


$title = $_POST['title'];
$description = $_POST['description'];
$url = $_POST['url'];
$model = $_POST['model'];
$color = $_POST['color'];
$gear = $_POST['gear'];
$fuel = $_POST['fuel'];
$year = $_POST['year'];
$mileage = $_POST['mileage'];
$seat = $_POST['seat'];
$engine = $_POST['engine'];
$noowner = $_POST['noowner'];
$price = $_POST['price'];
$options = $_POST['options'];


print_r($_POST);

if (empty($title) or empty($description) or empty($url) or empty($model) or empty($color) or empty($gear)
or empty($fuel) or empty($year) or empty($mileage) or empty($seat) or empty($engine)
or empty($noowner) or empty($price)
) {
    uyari("Fill in the all blanks.", 0, 0, "error");
    exit;
}


$activeArray = array();
foreach ($_POST['options'] as $key => $value) {

  if ($value == "on")
  {
    array_push($activeArray, intval($key));
  }
}

$updateData = [
  'title' => $title,
  'description' => $description,
  'cover_image_url' => $url,
  'model_id' => $model,
  'color_id' => $color,
  'gear_id' => $gear,
  'fuel_id' => $fuel,
  'year' => $year,
  'mileage' => $mileage,
  'seat' => $seat,
  'engine_power' => $engine,
  'number_owner' => $noowner,
  'price' => $price,
  'status' => 1

];

$updateSonuc = $db->table('car_dealer.car')->insert($updateData);
$carID = $db->insertId();
if ($updateSonuc) {
  foreach ($activeArray as $optionID) {
    $isExist = $db->table("car_dealer.car_option")
            ->where("car_id", $carID)
            ->where("option_id", $optionID)
            ->count("*", count)
            ->get();

    if ($isExist->count <= 0) {
      $updateData = [
        'car_id' => $carID,
        'option_id' => $optionID
      ];

      $updateSonuc = $db->table('car_dealer.car_option')->insert($updateData);
    }
  }
  uyariYonlendir("Car added. Now add images for this car.", 0, "image.php?id=$carID", "success");
} else {
    uyari("An error has occured.", 0, 0, "error");
}







?>
