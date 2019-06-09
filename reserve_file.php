<?
require_once("config.inc.php");
$reserve_id = $_POST['reserve_id'];
$home_id=$_POST['home_id'];
$file_name = $_POST['title_file'];


$ext = pathinfo(basename($_FILES['fileUpload']['name']),PATHINFO_EXTENSION);
$new_img_name = 'img_'.uniqid().".".$ext;
$img_path = "reserve_upload/";
$upload_path = $img_path.$new_img_name;
			
move_uploaded_file($_FILES["fileUpload"]["tmp_name"],$upload_path);

$img_reserve = $new_img_name;



move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "reserve_upload/".$img_reserve);


$sql="insert into reserve_file(reserve_id,reserve_home_id,file_name,fileUpload) values('$reserve_id','$home_id','$file_name','$img_reserve')";
$result=Query($sql);


echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";


?>