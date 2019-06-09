<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}

$file=$_GET['file'];

?>
<body onload="countdown();self.print();">
<img src="reserve_upload/<?echo $file;?>"/>
</body>
<script type="text/javascript">
var ss = 2;
function countdown() {
ss = ss-1;
if (ss<=0) {
window.close();
}
else {
window.setTimeout("countdown()", 1000);
}
}



</script>