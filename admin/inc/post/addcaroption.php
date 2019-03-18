<?php

require_once "../../../../inc/functions.php";
if (empty($_POST['options'] ))
{
  echo "bos gonderirsen beni uzersin..";
} else {
  $activeArray = array();
  $deactiveArray = array();
  foreach ($_POST['options'] as $key => $value) {

    if ($value == "on")
    {
      array_push($activeArray, intval($key));
    }
  }

  $getOptions = getOptionsAll();
  foreach ($getOptions as $option) {
    if ((in_array($option->id, $activeArray) == false))
    {
      array_push($deactiveArray, intval($option->id));
    }
  }
}



$carID = 1;

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

foreach ($deactiveArray as $optionID) {
  $isExist = $db->table("car_dealer.car_option")
          ->where("car_id", $carID)
          ->where("option_id", $optionID)
          ->count("*", count)
          ->get();

  if ($isExist->count > 0) {
    $updateData = [
      'car_id' => $carID,
      'option_id' => $optionID
    ];

    $updateSonuc = $db->table('car_dealer.car_option')->where("car_id", $carID)->where("option_id", $optionID)->delete();
  }
}




?>
