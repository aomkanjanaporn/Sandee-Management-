<?
require_once("config.inc.php");

$id=$_POST['id'];

$sql="delete from user where user_id='$id'";
$result=Query($sql);




?>