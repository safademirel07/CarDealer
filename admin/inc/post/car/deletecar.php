<?php

require_once "../../../../inc/functions.php";

$id = $_GET["id"];


$isExist = $db->table("car_dealer.type")
    ->count("*", count)
    ->where("id", $id)
    ->get();

if ($isExist->count > 0) {
    $used = $db->table("car_dealer.model")
        ->count("*", count)
        ->where("type_id", $id)
        ->get();

    if ($used->count == 0) {
        uyari("yok", 0, 0, "success");

    } else {

        uyari("You can't delete it. ", 0, 0, "error");

    }
}
uyari("var", 0, 0, "success");


?>