<?php

require_once "../../../../inc/functions.php";

$description = $_POST['description'];
$date = $_POST['date'];
$carid = $_POST['carid'];

if (empty($description) or empty($date) or empty($carid)) {
  uyari("Boş alan bırakmayın.", 0, 0, "error");
  exit;
}

$newDate = date("Y-m-d H:i:s",strtotime($date));


$updateData = [
  'car_id' => $carid,
  'description' => $description,
  'last_time' => $newDate
];

$updateSonuc = $db->table('car_dealer.maintenance')->insert($updateData);
if ($updateSonuc) {
  uyariYonlendir("Başarıyla eklendi.", 0, "maintenance.php?id=$carid", "success");
} else {
  uyari("Bir hata oluştu.", 0, 0, "error");
}




?>
