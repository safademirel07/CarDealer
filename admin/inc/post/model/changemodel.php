<?php

require_once "../../../../inc/functions.php";

$id = $_POST['id'];
$name = $_POST['name'];
$brand = $_POST['brand'];
$type = $_POST['type'];

if (empty($id) or empty($name) or empty($brand) or empty($type)) {
  uyari("Boş alan bırakmayın.", 0, 0, "error");
  exit;
}

$isExist = $db->table("car_dealer.model")
->where("name", $name)
->where("brand_id", $brand)
->where("type_id", $type)
->count("*", count)
->get();

if ($isExist->count > 0) {
  uyari("Bu isim, tip ve marka mevcut.", 0, 0, "error");
  exit;
}

$updateData = [
  'name' => $name,
  'brand_id' => $brand,
  'type_id' => $type
];

$updateSonuc = $db->table('car_dealer.model')->where('id', $id)->update($updateData);

if ($updateSonuc) {
  uyariYonlendir("Başarıyla değiştirildi.", 0, "model.php", "success");
} else {
  uyari("Bir hata oluştu.", 0, 0, "error");
}



?>
