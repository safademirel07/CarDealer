<?php

require_once "../../../../inc/functions.php";

$id = $_POST['id'];
$description = $_POST['description'];
$date = $_POST['date'];
$carid = $_POST['carid'];

if (empty($id) or empty($description) or empty($date) or empty($carid)) {
  uyari("Boş alan bırakmayın.", 0, 0, "error");
  exit;
}

$newDate = date("Y-m-d H:i:s",strtotime($date));

$updateData = [
  'car_id' => $carid,
  'description' => $description,
  'last_time' => $newDate
];

$updateSonuc = $db->table('car_dealer.maintenance')->where('id', $id)->update($updateData);

if ($updateSonuc) {
  uyariYonlendir("Başarıyla düzenlendi.", 0, "maintenance.php?id=$carid", "success");
} else {
  uyari("Bir hata oluştu.", 0, 0, "error");
}



?>
