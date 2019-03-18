<?php

require_once 'config.php';

function uyari($msg, $yonlendir, $url, $type = "error")
{
    echo '<script type="text/javascript">
			swal({
			title: "' . ($type == 'error' ? 'Hata!' : 'Başarılı') . '",
			text: "' . $msg . '",
			icon: "' . ($type == 'error' ? 'error' : 'success') . '",
			});
		</script>';
}

function uyariYonlendir($msg, $yonlendir, $url, $type = "error")
{
    echo '<script type="text/javascript">
			swal({
			title: "' . ($type == 'error' ? 'Hata!' : 'Başarılı') . '",
			text: "' . $msg . '",
			icon: "' . ($type == 'error' ? 'error' : 'success') . '",
			}).then(function() {
				window.location = "' . $url . '";
			});
		</script>';
}

function getSidebar() {
echo '
			<li><a href="index.php"><i class="la la-car"></i><span>Home</span></a></li>
            <li><a href="model.php"><i class="la la-archive"></i><span>Model</span></a></li>
            <li><a href="brand.php"><i class="la la-car"></i><span>Brand</span></a></li>
            <li><a href="option.php"><i class="la la-cog"></i><span>Option</span></a></li>
            <li><a href="color.php"><i class="la la-eyedropper"></i><span>Color</span></a></li>
            <li><a href="gear.php"><i class="la la-gears"></i><span>Gear</span></a></li>
            <li><a href="fuel.php"><i class="la la-fire"></i><span>Fuel</span></a></li>
            <li><a href="type.php"><i class="la la-file-o"></i><span>Type</span></a></li>
';
/*
<li><a href="image.php"><i class="la la-camera-retro"></i><span>Image</span></a></li>

<li><a href="comment.php"><i class="la la-comment"></i><span>Comment</span></a></li>
<li><a href="http://localhost/admin/maintenance.php"><i class="la la-th-list"></i><span>Maintenance</span></a></li>
*/

}


function getOptions($type) // 1 > security // 2 > Internal Hardware // 3 External Hardware  // 4 Multimedia // 5 Changing Parts // 6 Painted Parts
{
    global $db;

    $records = $db->table("car_dealer.option")
        ->where("type", $type)
        ->orderBy("id",asc)
        ->getAll();

    return $records;
}

function getOptionsAll() // 1 > security // 2 > Internal Hardware // 3 External Hardware  // 4 Multimedia // 5 Changing Parts // 6 Painted Parts
{
    global $db;

    $records = $db->table("car_dealer.option")
      ->orderBy("id asc")
        ->getAll();

    return $records;
}



function getOptionName($id)
{
    global $db;

    $records = $db->table("car_dealer.option")
      ->where("id",$id)
        ->get();

    return $records->name;
}

function getBrandName($id)
{
    global $db;

    $records = $db->table("car_dealer.brand")
      ->where("id",$id)
        ->get();

    return $records->name;
}

function getTypeName($id)
{
    global $db;

    $records = $db->table("car_dealer.type")
      ->where("id",$id)
        ->get();

    return $records->name;
}

function getCars()
{
    global $db;

    $records = $db->table("car_dealer.car")
        ->orderBy("id asc")
        ->getAll();

    return $records;
}

function getComments($car_id)
{
    global $db;

    $records = $db->table("car_dealer.comment")
        ->where("car_id", $car_id)
        ->orderBy("date desc")
        ->getAll();

    return $records;
}

function getImages($car_id)
{
    global $db;

    $records = $db->table("car_dealer.image")
        ->where("car_id", $car_id)
        ->orderBy("id asc")
        ->getAll();

    return $records;
}
function getMaintenances($car_id)
{
    global $db;

    $records = $db->table("car_dealer.maintenance")
        ->where("car_id", $car_id)
        ->getAll();

    return $records;
}

function getTypes()
{
    global $db;

    $records = $db->table("car_dealer.type")
        ->orderBy("id",asc)
        ->getAll();

    return $records;
}

function getFuels()
{
    global $db;

    $records = $db->table("car_dealer.fuel")
        ->orderBy("id",asc)
        ->getAll();

    return $records;
}
function getGears()
{
    global $db;

    $records = $db->table("car_dealer.gear")
        ->orderBy("id",asc)
        ->getAll();

    return $records;
}

function getCarOptions()
{
  global $db;

  $records = $db->table("car_dealer.car_option")
      ->orderBy("car_id",asc)
      ->getAll();

  return $records;
}

function getCarOption($car_id)
{
  global $db;

  $records = $db->table("car_dealer.car_option")
      ->where("car_id",$car_id)
      ->getAll();

  return $records;
}


function getColors()
{
    global $db;

    $records = $db->table("car_dealer.color")
        ->orderBy("id",asc)
        ->getAll();

    return $records;
}
function getBrands()
{
    global $db;

    $records = $db->table("car_dealer.brand")
        ->orderBy("id",asc)
        ->getAll();

    return $records;
}

function getModels()
{
    global $db;

    $records = $db->table("car_dealer.model")
        ->orderBy("id",asc)
        ->getAll();

    return $records;
}

function getCommentCount($car_id)
{
    global $db;

    $value = $db->table("car_dealer.comment")
        ->where("car_id", $car_id)
        ->count("*", count)
        ->get();

    return $value->count;
}



function getCarCount()
{
    global $db;

    $value = $db->table("car_dealer.car")
        ->count("*", count)
        ->get();

    return $value->count;
}


function getCarCountID($carId)
{
    global $db;

    $value = $db->table("car_dealer.car")
        ->where("id",$carId)
        ->count("*", count)
        ->get();

    return $value->count;
}



function checkOption($car_id, $option_id)
{
    global $db;

    $value = $db->table("car_dealer.car_option")
        ->where("car_id", $car_id)
        ->where("option_id", $option_id)
        ->count("*", count)
      //  ->cache(3600)
        ->get();

    if ($value->count == 0) {
        return "close";
    } else {
        return "check";
    }

}

function checkOptionBool($car_id, $option_id)
{
    global $db;

    $value = $db->table("car_dealer.car_option")
        ->where("car_id", $car_id)
        ->where("option_id", $option_id)
        ->count("*", count)
        ->get();

    if ($value->count == 0) {
        return true;
    } else {
        return false;
    }

}

function getCarImage($id)
{
    global $db;

    $records = $db->table("car_dealer.image")
        ->where("car_id", $id)
        //->cache(3600)
        ->getAll();

    return $records;
}

function getCarDetail($id, $column)
{
    global $db;
    $value = $db->table("car_dealer.car")
        ->where("id", $id)
        ->get();
    return $value->$column;
}

function getBrandDetail($id, $column)
{
    global $db;
    $value = $db->table("car_dealer.brand")
        ->where("id", $id)
        ->get();
    return $value->$column;
}

function getColorDetail($id, $column)
{
    global $db;
    $value = $db->table("car_dealer.color")
        ->where("id", $id)
        ->get();
    return $value->$column;
}

function getFuelDetail($id, $column)
{
    global $db;
    $value = $db->table("car_dealer.fuel")
        ->where("id", $id)
        ->get();
    return $value->$column;
}

function getGearDetail($id, $column)
{
    global $db;
    $value = $db->table("car_dealer.gear")
        ->where("id", $id)
        ->get();
    return $value->$column;
}

function getTypeDetail($id, $column)
{
    global $db;
    $value = $db->table("car_dealer.type")
        ->where("id", $id)
        ->get();
    return $value->$column;
}

function getModelDetail($id, $column)
{
    global $db;
    $value = $db->table("car_dealer.model")
        ->where("id", $id)
        ->get();
    return $value->$column;
}

function getMaintenanceDetail($id, $column)
{
    global $db;
    $value = $db->table("car_dealer.maintenance")
        ->where("id", $id)
        ->get();
    return $value->$column;
}

?>
