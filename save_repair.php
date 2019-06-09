<meta charset="utf-8">
<?
require_once("config.inc.php");
$ticket_id = $_POST['ticket_id'];
$date = $_POST['date'];
$repairman_id  = $_POST['repairman_id'];
$ticket_status = $_POST['ticket_status'];
$comfirm_repair = $_POST['comfirm_repair'];

$sql="update ticket set customer_ok='$comfirm_repair',date_repair='$date',repairman_id='$repairman_id',ticket_status='$ticket_status' where ticket_id='$ticket_id'";
$result=Query($sql);



echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?r=edit_ticket&id=$ticket_id'>";


?>
