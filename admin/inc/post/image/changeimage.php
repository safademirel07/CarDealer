<?php

require_once "../../../../inc/functions.php";

$id = $_POST['id'];
$carid = $_POST['carid'];
$name = $_POST['name'];

if (empty($id) or empty($name) or empty($carid)) {
  uyari("Boş alan bırakmayın.", 0, 0, "error");
  exit;
}

$updateData = [
  'url' => $name,
  'car_id' => $carid
];

$updateSonuc = $db->table('car_dealer.image')->where('id', $id)->update($updateData);

if ($updateSonuc) {
  uyariYonlendir("Başarıyla düzenlendi.", 0, "image.php?id=$carid", "success");
} else {
  uyari("Bir hata oluştu.", 0, 0, "error");
}



?>
