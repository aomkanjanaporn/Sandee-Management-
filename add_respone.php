 <meta charset="utf-8">
<?
require_once("config.inc.php");

$respond_ticket_id=$_POST['respond_ticket_id'];
$respond_user_id=$_POST['respond_user_id'];
$respond_text=$_POST['respond_text'];
$respond_status=$_POST['respond_status'];

$sql="insert into ticket_respond(respond_ticket_id,respond_user_id,respond_text,respond_status) 
values('$respond_ticket_id','$respond_user_id','$respond_text','$respond_status' )";
$result=Query($sql);

if($result){
	$sql_user = "select * from user where user_id ='".$respond_user_id."' ";
	$result_user=Query($sql_user);
	$rows_user=mysql_fetch_assoc($result_user);
		if($rows_user['user_type']='1' || $rows_user['user_type']='0'){
			echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?r=edit_ticket&id=$respond_ticket_id'>";
		}else{
			echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?r=desc&id=$respond_ticket_id'>";
		}
}
?>