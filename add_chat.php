 <meta charset="utf-8">
<?
require_once("config.inc.php");

$id=$_SESSION['id'];
$respond_ticket_id=$_POST['respond_ticket_id'];
$respond_text=$_POST['respond_text'];

$sql="insert into ticket_respond(respond_ticket_id,respond_user_id,respond_text,respond_datetime) 
values('$respond_ticket_id','$id','$respond_text',CONVERT_TZ(NOW() ,@@session.time_zone ,'+07:00' ))";
$result=Query($sql);



echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";

?>