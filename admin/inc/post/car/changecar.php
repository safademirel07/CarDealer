<?php

require_once "../../../../inc/functions.php";



$id = $_POST['carid'];
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
$options = $_POST['c_options'];



if (empty($title) or empty($description) or empty($url) or empty($model) or empty($color) or empty($gear)
or empty($fuel) or empty($year) or empty($mileage) or empty($seat) or empty($engine)
or empty($noowner) or empty($price)
) {
    uyari("Fill in the all blanks.", 0, 0, "error");
    exit;
}


$activeArray = array();
$deactiveArray = array();
foreach ($_POST['c_options'] as $key => $value) {
  echo $value;
  if ($value == "on")
  {
    array_push($activeArray, intval($key));
  }
}



$getOptions = getOptionsAll();
$optionsChanged = false;
foreach ($getOptions as $optionss) {
  if ((in_array($optionss->id, $activeArray) == false))
  {
    array_push($deactiveArray, intval($optionss->id));
  }
}



if ($options) {
  foreach ($activeArray as $optionIDa) {
    $isExistInsert = $db->table("car_dealer.car_option")
            ->where("car_id", $id)
            ->where("option_id", $optionIDa)
            ->count("*", count)
            ->get();

    if ($isExistInsert->count <= 0) {
      $insertDataa = [
        'car_id' => $id,
        'option_id' => $optionIDa
      ];

      $insertData = $db->table('car_dealer.car_option')->insert($insertDataa);

    }
  }
  foreach ($deactiveArray as $optionID) {
    $isExistDelete = $db->table("car_dealer.car_option")
            ->where("car_id", $id)
            ->where("option_id", $optionID)
            ->count("*", count)
            ->get();
    if ($isExistDelete->count > 0) {
      $updateData = [
        'car_id' => $id,
        'option_id' => $optionID
      ];

      $deleteData = $db->table('car_dealer.car_option')->where("car_id", $id)->where("option_id", $optionID)->delete();
    }
  }
  $optionsChanged = true;
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

$updateSonuc = $db->table('car_dealer.car')->where("id",$id)->update($updateData);
if ($updateSonuc) {

  uyariYonlendir("Car changed.", 0, "index.php", "success");
} else {
   if ($optionsChanged == true) {
     uyariYonlendir("Car options changed.", 0, "index.php", "success");
   } else {
     uyari("An error has occured.", 0, 0, "error");

   }
}







?>
