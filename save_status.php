<meta charset="utf-8">
<?
require_once("config.inc.php");

$reserve_id=$_POST['reserve_id'];
$status = $_POST['status'];
$sqlUpdateStatus="update reserve set status='$status' where reserve_id='$reserve_id'";
$resultStatus=Query($sqlUpdateStatus);

echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";








?>