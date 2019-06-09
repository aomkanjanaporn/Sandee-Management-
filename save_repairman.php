<meta charset="utf-8">
<?
require_once("config.inc.php");

$repairman_id = $_POST['repairman_id'];
$name_repairman = $_POST['name_repairman'];
$type_repairman = $_POST['type_repairman'];
$tel_repairman = $_POST['tel_repairman'];
$line_repairman = $_POST['line_repairman'];
$sql="update repairman set name_repairman='$name_repairman',type_repairman='$type_repairman',tel_repairman='$tel_repairman',line_repairman='$line_repairman' where repairman_id='$repairman_id'";
$result=Query($sql);
if($result){
	$sql_repairman = "select * from repairman where repairman_id = '$repairman_id'";
	$result_repairman=Query($sql_repairman);
	$rows_repairman=mysql_fetch_assoc($result_repairman);
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?repairman=edit_repairman&id=$repairman_id'>";
}








?>