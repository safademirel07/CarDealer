<?php

require_once "../../../../inc/functions.php";


$name = $_POST['name'];
$type = $_POST['type'];

if (empty($name) or empty($type)) {
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
     uyari("Bu tip ve isim ikilisi mevcut..", 0, 0, "error");
     exit;
   }

    $updateData = [
      'type' => $type,
      'name' => $name
    ];

    $updateSonuc = $db->table('car_dealer.option')->insert($updateData);
  //  uyari($db->error(),0,0,"error");
    if ($updateSonuc) {
        uyariYonlendir("Başarıyla eklendi.", 0, "option.php", "success");
    } else {
        uyari("Bir hata oluştu.", 0, 0, "error");
    }
  } else {
  uyari("Tip 1-6 arası olmalı.", 0, 0, "error");

}


?>
