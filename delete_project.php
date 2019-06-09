<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}else{
	$id=$_GET['id'];
	 $sql="delete from project where project_id='$id'";
	$result=Query($sql);
	
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";
}
?>