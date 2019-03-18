<?php

require_once "../../../../inc/functions.php";

$name = $_POST['name'];
$message = $_POST['message'];
$carid = $_POST['carid'];

if (empty($name) or empty($message) or empty($carid)) {
  uyari("Boş alan bırakmayın.", 0, 0, "error");
  exit;
}

$updateData = [
  'car_id' => $carid,
  'message' => $message,
  'name' => $name,
  'date' => date("Y-m-d H:i:s"),
];

$updateSonuc = $db->table('car_dealer.comment')->insert($updateData);
if ($updateSonuc) {
  uyariYonlendir("Başarıyla eklendi.", 0, "comment.php?id=$carid", "success");
} else {
  uyari("Bir hata oluştu.", 0, 0, "error");
}



?>
