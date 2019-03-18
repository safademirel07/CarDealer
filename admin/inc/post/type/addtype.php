<?php

require_once "../../../../inc/functions.php";


$name = $_POST['name'];

if (empty($name)) {
    uyari("Boş alan bırakmayın.", 0, 0, "error");
    exit;
}

$updateData = [
    'name' => $name
];

$updateSonuc = $db->table('car_dealer.type')->insert($updateData);

if ($updateSonuc) {
    uyariYonlendir("Başarıyla eklendi.", 0, "index.php", "success");
} else {
    uyari("Bir hata oluştu.", 0, 0, "error");
}


?>