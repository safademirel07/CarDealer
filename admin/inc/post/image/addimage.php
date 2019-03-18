<?php

require_once "../../../../inc/functions.php";

$carid = $_POST['carid'];
$name = $_POST['name'];

if (empty($name) or empty($carid)) {
  uyari("Boş alan bırakmayın.", 0, 0, "error");
  exit;
}
$updateData = [
  'url' => $name,
  'car_id' => $carid
];

$updateSonuc = $db->table('car_dealer.image')->insert($updateData);
if ($updateSonuc) {
  uyariYonlendir("Başarıyla eklendi.", 0, "image.php?id=$carid", "success");
} else {
  uyari("Bir hata oluştu.", 0, 0, "error");
}




?>
