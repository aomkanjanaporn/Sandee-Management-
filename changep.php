<?
require_once("config.inc.php");
$id=$_SESSION['id'];

$sql="update user set user_password='".$_POST['cfmnewpassword']."' where user_id='".$id."'";
$result=Query($sql);

