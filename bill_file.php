<?
require_once("config.inc.php");
$user_id = $_POST['user_id'];
$bill_name=$_POST['bill_name'];


$ext = pathinfo(basename($_FILES['billFile']['name']),PATHINFO_EXTENSION);
$new_bill_name = 'bill_'.uniqid().".".$ext;
$img_path = "bill_File/";
$upload_path = $img_path.$new_bill_name;
			
move_uploaded_file($_FILES["billFile"]["tmp_name"],$upload_path);

$bill = $new_bill_name;



move_uploaded_file($_FILES["billFile"]["tmp_name"], "bill_File/".$bill);

$sql="insert into bill_file(user_id,bill_name,file_bill) values('$user_id','$bill_name','$bill')";
$result=Query($sql);

echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";


?>