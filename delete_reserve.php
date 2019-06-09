<?
require_once("config.inc.php");

$id=$_POST['id'];

$sql="delete from reserve where reserve_id='$id'";
$result=Query($sql);




?>