<?php

require_once "../../../../inc/functions.php";


$name = $_POST['name'];

if (empty($name)) {
    uyari("Boş alan bırakmayın.", 0, 0, "error");
    exit;
}


    $isExist = $db->table("car_dealer.brand")
            ->where("name", $name)
            ->count("*", count)
            ->get();

   if ($isExist->count > 0) {
     uyari("Bu isimde veri mevcut.", 0, 0, "error");
     exit;
   }

    $updateData = [
      'name' => $name
    ];

    $updateSonuc = $db->table('car_dealer.brand')->insert($updateData);
  //  uyari($db->error(),0,0,"error");
    if ($updateSonuc) {
        uyariYonlendir("Başarıyla eklendi.", 0, "brand.php", "success");
    } else {
        uyari("Bir hata oluştu.", 0, 0, "error");
    }



?>
