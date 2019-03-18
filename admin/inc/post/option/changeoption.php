<?php

require_once "../../../../inc/functions.php";


$id = $_POST['id'];
$name = $_POST['name'];
$type = $_POST['type'];

if (empty($id) or empty($name) or empty($type)) {
    uyari("Boş alan bırakmayın.", 0, 0, "error");
    exit;
}


if (intval($type) > 0 and intval($type) <= 6)
{


$isExist = $db->table("car_dealer.option")
        ->where("name", $name)
        ->where("type", $type)
        ->count("*", count)
        ->get();

if ($isExist->count > 0) {
 uyari("Bu tip ve isim ikilisi mevcut.", 0, 0, "error");
 exit;
}

$updateData = [
  'type' => $type,
  'name' => $name
];

$updateSonuc = $db->table('car_dealer.option')->where('id', $id)->update($updateData);

if ($updateSonuc) {
    uyariYonlendir("Başarıyla değiştirildi.", 0, "option.php", "success");
} else {
    uyari("Bir hata oluştu.", 0, 0, "error");
}
}
else {
  uyari("Tip 1-6 arasında olmalı.", 0, 0, "error");
  exit;
}


?>
