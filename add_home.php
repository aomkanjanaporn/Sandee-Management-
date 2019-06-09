<?
require_once("config.inc.php");

$project_id=$_POST['project_id'];
$lot_no = $_POST['lot_no'];
$area = $_POST['area'];
$living_space = $_POST['living_space'];


$sql="insert into home(home_project_id,lot_no,area,living_space) values('$project_id','$lot_no','$area','$living_space')";
$result=Query($sql);

echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?home=create_homeprojectlist&id=$project_id'>";






?>