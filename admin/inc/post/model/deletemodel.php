<?php

require_once "../../../../inc/functions.php";

$id = $_GET["id"];


$isExist = $db->table("car_dealer.model")
    ->count("*", count)
    ->where("id", $id)
    ->get();

if ($isExist->count > 0) {
    $used = $db->table("car_dealer.car")
        ->count("*", count)
        ->where("model_id", $id)
        ->get();

    if ($used->count == 0) {
        $deleteResult = $db->table('car_dealer.model')->where("id", $id)->delete();
        if ($deleteResult) {
          uyariYonlendir("Başarıyla silindi.", 0, "model.php", "success");
        } else {
          uyari("Bir hata oluştu.",0,0,"error");
        }

    } else {
        uyari("You can't delete it. ", 0, 0, "error");
    }
}
else {
  uyari("Bir hata oluştu.",0,0,"error");
}


?>
