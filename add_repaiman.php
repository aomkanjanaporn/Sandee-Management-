<?
require_once("config.inc.php");

$project_id=$_POST['project_id'];
$name_repairman=$_POST['name_repairman'];
$tel_repairman=$_POST['tel_repairman'];
$line_repairman=$_POST['line_repairman'];
$type_repairman=$_POST['type_repairman'];
				
$sql="insert into repairman(project_id,name_repairman,tel_repairman,line_repairman,type_repairman) 
				   values('$project_id','$name_repairman','$tel_repairman','$line_repairman','$type_repairman')";
$result=Query($sql);
echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";






?>