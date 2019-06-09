<?
require_once("config.inc.php");

$name=$_POST['customer_name'];
$person_id=$_POST['person_id'];
$address=$_POST['address'];
$phone_no=$_POST['phone_no'];
$email=$_POST['email'];
$line_id=$_POST['line_id'];
$project=$_POST['project'];
$home_id=$_POST['home_id'];
$price=$_POST['price'];
$price_text=$_POST['price_text'];
$status="pending";
$status_home=$_POST['status_home'];
echo $status_home;
$sql="insert into reserve(name,person_id,address,phone_no,email,line_id,project,home_id,price,text_price,status) 
				   values('$name','$person_id','$address','$phone_no','$email','$line_id','$project','$home_id','$price','$price_text','$status')";

$result=Query($sql);
if($result){
	$sqlUpdateStatus="update home set status='$status_home' where home_id='$home_id'";
	$result_update=Query($sqlUpdateStatus);
}

echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?r=reserving&id=$project'>";

?>