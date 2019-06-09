    <meta charset="utf-8">
<?
require_once("config.inc.php");
$home_id=$_POST['home_id'];
$lot_no=$_POST['lot_no'];
$area=$_POST['area'];
$living_space=$_POST['living_space'];
$address=$_POST['address'];

$sql="update home set lot_no='$lot_no',area='$area',living_space='$living_space',address='$address' where home_id='$home_id'";
$result=Query($sql);

echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";

echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?home=edit_homeproject&id=$home_id'>";






?>