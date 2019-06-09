<meta charset="utf-8">
<?
require_once("config.inc.php");
$ticket_id = $_POST['ticket_id'];
$feedback = $_POST['feedback'];
$ticket_status = $_POST['ticket_status'];
$explain = $_POST['explain'];


$sql="update ticket set explain='$explain',feedback='$feedback',ticket_status='$ticket_status' where ticket_id='$ticket_id'";
$result=Query($sql);



echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?r=report'>";


?>
