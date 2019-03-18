<?php

require_once "../../../../inc/functions.php";

$id = $_GET["id"];
$carID = $_GET["carID"];


$isExist = $db->table("car_dealer.image")
->count("*", count)
->where("id", $id)
->get();

if ($isExist->count > 0) {
  $deleteResult = $db->table('car_dealer.image')->where("id", $id)->delete();
  if ($deleteResult) {
    uyariYonlendir("Başarıyla silindi.", 0, "image.php?id=$carID", "success");
  } else {
    uyari("Bir hata oluştu.",0,0,"error");
  }
}
else {
  uyari("Bir hata oluştu.",0,0,"error");
}


?>
