<?
require_once("config.inc.php");

$id=$_POST['id'];

$sql="delete from ticket where ticket_id='$id'";
$result=Query($sql);




?>