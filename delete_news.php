<?
require_once("config.inc.php");

$id=$_POST['id'];

$sql="delete from news where news_id='$id'";
$result=Query($sql);




?>