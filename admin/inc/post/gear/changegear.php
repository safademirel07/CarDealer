<?php

require_once "../../../../inc/functions.php";


$id = $_POST['id'];
$name = $_POST['name'];

if (empty($id) or empty($name)) {
    uyari("Boş alan bırakmayın.", 0, 0, "error");
    exit;
}


$isExist = $db->table("car_dealer.gear")
        ->where("name", $name)
        ->count("*", count)
        ->get();

if ($isExist->count > 0) {
 uyari("Bu isim mevcut.", 0, 0, "error");
 exit;
}

$updateData = [
  'name' => $name
];

$updateSonuc = $db->table('car_dealer.gear')->where('id', $id)->update($updateData);

if ($updateSonuc) {
    uyariYonlendir("Başarıyla değiştirildi.", 0, "gear.php", "success");
} else {
    uyari("Bir hata oluştu.", 0, 0, "error");
}



?>
