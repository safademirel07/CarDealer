<?php

require_once "../functions.php";

$name = $_POST['name'];
$comment = $_POST['comment'];
$car_id = $_POST['car_id'];

if (empty($name) or (empty($comment))) {
    uyari("Boş alan bırakmayın.", 0, 0, "error");
    exit;
}


$data = [
    'name' => $name,
    'car_id' => $car_id,
    'message' => $comment,
    'date' => date("Y-m-d H:i:s")
];

$ekleSonuc = $db->table('car_dealer.comment')->insert($data);

if ($ekleSonuc) {
    uyariYonlendir("Yorumunuz başarıyla eklendi.", 0, "detail.php?id=$car_id", "success");
} else {
    uyari("Yorum eklenemedi. Daha sonra tekrar deneyin.", 0, 0, "error");

}


?>