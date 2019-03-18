<?php
require_once "../../../inc/functions.php";

$carID = $_GET['id'];

echo '

<label class="col-lg-3 form-control-label">Car ID</label>
<div class="col-lg-9">
  <input type="text" id="carid" name="carid" placeholder="" readonly class="form-control">
</div>
<label class="col-lg-3 form-control-label">Title</label>
<div class="col-lg-9">
<input type="text" id="title" name="title" placeholder="" class="form-control">
</div>
<label class="col-lg-3 form-control-label">Description</label>
<div class="col-lg-9">
<input type="text" id="description" name="description" placeholder="" class="form-control">
</div>

<label class="col-lg-3 form-control-label">Cover Image URL</label>
<div class="col-lg-9">
<input type="text" id="url" name="url" placeholder="www.google.com" class="form-control">
</div>

<label class="col-lg-3 form-control-label">Model</label>
<div class="col-lg-9">
<div class="form-group select sorting-select">

<select id="model" name="model" class="form-control ">';

$models = getModels();
foreach ($models as $model) {
  echo "<option value=".$model->id." >$model->name</option>";
}

echo '
</select>
</div>
</div>

<label class="col-lg-3 form-control-label">Color</label>
<div class="col-lg-9">
<div class="form-group select sorting-select">

<select id="color" name="color" class="form-control ">' ;
$colors = getColors();
foreach ($colors as $color) {
  echo "<option value=".$color->id." >$color->name</option>";
}
echo '
</select>
</div>
</div>

<label class="col-lg-3 form-control-label">Gear</label>
<div class="col-lg-9">
<div class="form-group select sorting-select">

<select id="gear" name="gear" class="form-control ">';
$gears = getGears();
foreach ($gears as $gear) {
  echo "<option value=".$gear->id." >$gear->name</option>";
}
echo '
</select>
</div>
</div>

<label class="col-lg-3 form-control-label">Fuel</label>
<div class="col-lg-9">
<div class="form-group select sorting-select">

<select id="fuel" name="fuel" class="form-control "> ';
$fuels = getFuels();
foreach ($fuels as $fuel) {
  echo "<option value=".$fuel->id." >$fuel->name</option>";
}

echo '
</select>
</div>
</div>

<label class="col-lg-3 form-control-label">Year</label>
<div class="col-lg-9">
<input type="number" id="year" name="year" placeholder="" class="form-control">
</div>

<label class="col-lg-3 form-control-label">Mileage</label>
<div class="col-lg-9">
<input type="number" id="mileage" name="mileage" placeholder="" class="form-control">
</div>

<label class="col-lg-3 form-control-label">Seat</label>
<div class="col-lg-9">
<input type="number" id="seat" name="seat" placeholder="" class="form-control">
</div>

<label class="col-lg-3 form-control-label">Engine Power</label>
<div class="col-lg-9">
<input type="number" id="engine" name="engine" placeholder="" class="form-control">
</div>

<label class="col-lg-3 form-control-label">Number of Owners</label>
<div class="col-lg-9">
<input type="number" id="noowner" name="noowner" placeholder="" class="form-control">
</div>

<label class="col-lg-3 form-control-label">Price</label>
<div class="col-lg-9">
<input type="number" id="price" name="price" placeholder="" class="form-control">
</div>
<label class="col-lg-3 form-control-label">Security</label>
<div class="col-lg-9">
<div class="container">
<div class="row">';

$getSecurity = getOptions(1);

foreach ($getSecurity as $security) {
  $isChecked = checkOptionBool($carID,$security->id) ? '' : 'checked';
  echo '
  <div class="col-sm-4">
  <div class="styled-checkbox">

  <input type="checkbox" name="c_options['.$security->id.']"  '.$isChecked.' id="ccheck-'.$security->id.'">
  <label for="ccheck-'.$security->id.'">'.getOptionName($security->id).'</label>
  </div>
  </div>';
}
echo '              </div>
</div>
</div>';

echo '
<label class="col-lg-3 form-control-label">Security</label>
<div class="col-lg-9">
<div class="container">
<div class="row">';

$getSecurity = getOptions(2);

foreach ($getSecurity as $security) {
  $isChecked = checkOptionBool($carID,$security->id) ? '' : 'checked';
  echo '
  <div class="col-sm-4">
  <div class="styled-checkbox">
  <input type="checkbox" name="c_options['.$security->id.']"  '.$isChecked.' id="ccheck-'.$security->id.'">
  <label for="ccheck-'.$security->id.'">'.getOptionName($security->id).'</label>
  </div>
  </div>';
}
echo '              </div>
</div>
</div>';

echo '
<label class="col-lg-3 form-control-label">Security</label>
<div class="col-lg-9">
<div class="container">
<div class="row">';

$getSecurity = getOptions(3);

foreach ($getSecurity as $security) {
  $isChecked = checkOptionBool($carID,$security->id) ? '' : 'checked';
  echo '
  <div class="col-sm-4">
  <div class="styled-checkbox">
  <input type="checkbox" name="c_options['.$security->id.']"  '.$isChecked.' id="ccheck-'.$security->id.'">
  <label for="ccheck-'.$security->id.'">'.getOptionName($security->id).'</label>
  </div>
  </div>';
}
echo '              </div>
</div>
</div>';

echo '
<label class="col-lg-3 form-control-label">Security</label>
<div class="col-lg-9">
<div class="container">
<div class="row">';

$getSecurity = getOptions(4);

foreach ($getSecurity as $security) {
  $isChecked = checkOptionBool($carID,$security->id) ? '' : 'checked';
  echo '
  <div class="col-sm-4">
  <div class="styled-checkbox">
  <input type="checkbox" name="c_options['.$security->id.']"  '.$isChecked.' id="ccheck-'.$security->id.'">
  <label for="ccheck-'.$security->id.'">'.getOptionName($security->id).'</label>
  </div>
  </div>';
}
echo '              </div>
</div>
</div>';
echo '
<label class="col-lg-3 form-control-label">Changed</label>
<div class="col-lg-9">
<div class="container">
<div class="row">';

$getSecurity = getOptions(5);

foreach ($getSecurity as $security) {
  $isChecked = checkOptionBool($carID,$security->id) ? '' : 'checked';
  echo '
  <div class="col-sm-4">
  <div class="styled-checkbox">
  <input type="checkbox" name="c_options['.$security->id.']"  '.$isChecked.' id="ccheck-'.$security->id.'">
  <label for="ccheck-'.$security->id.'">'.getOptionName($security->id).'</label>
  </div>
  </div>';
}
echo '              </div>
</div>
</div>';
echo '
<label class="col-lg-3 form-control-label">Painted</label>
<div class="col-lg-9">
<div class="container">
<div class="row">';

$getSecurity = getOptions(6);

foreach ($getSecurity as $security) {
  $isChecked = checkOptionBool($carID,$security->id) ? '' : 'checked';
  echo '
  <div class="col-sm-4">
  <div class="styled-checkbox">
  <input type="checkbox" name="c_options['.$security->id.']"  '.$isChecked.' id="ccheck-'.$security->id.'">
  <label for="ccheck-'.$security->id.'">'.getOptionName($security->id).'</label>
  </div>
  </div>';
}
echo '              </div>
</div>
</div>


<br>
<span class="input-group-btn">
  <button
  class="btn"
  type="submit" name="button">Change
</button>
</span>
';
?>
