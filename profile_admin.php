<?
require_once("config.inc.php");
$user_id = $_POST['user_id'];
//$admin_img = $_POST['admin_img'];
							
							
$ext = pathinfo(basename($_FILES['admin_img']['name']),PATHINFO_EXTENSION);
$new_img_name = 'admin_'.uniqid().".".$ext;
$img_path = "user_img/";
$upload_path = $img_path.$new_img_name;
			
move_uploaded_file($_FILES["admin_img"]["tmp_name"],$upload_path);
$new_img = $new_img_name;


move_uploaded_file($_FILES["admin_img"]["tmp_name"], "user_img/".$new_img);


$sql="update user set user_img='$new_img' where user_id='$user_id'";
$result=Query($sql);

echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?user=edit_user&id=$user_id'>";


?>