<?
require_once("config.inc.php");

$id=$_SESSION['id'];
$project_id = $_POST['project_id'];
$head=$_POST['head'];
$desc=$_POST['desc'];
$fix_type=$_POST['fix_type'];
$sql="insert into ticket(project_id,ticket_fix_id,ticket_user_id,ticket_title,ticket_desc,ticket_datetime,ticket_status) 
values('$project_id','$fix_type','$id','$head','$desc',CONVERT_TZ(NOW() ,@@session.time_zone ,'+07:00' ),'1')";
$result=Query($sql);


echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?r=report'>";

?>