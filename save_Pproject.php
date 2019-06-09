<?
require_once("config.inc.php");
$project_id = $_POST['project_id'];


$ext = pathinfo(basename($_FILES['profile_project']['name']),PATHINFO_EXTENSION);
$new_img_name = 'img_'.uniqid().".".$ext;
$img_path = "barn_img/";
$upload_path = $img_path.$new_img_name;
			
move_uploaded_file($_FILES["profile_project"]["tmp_name"],$upload_path);

$img_P = $new_img_name;



move_uploaded_file($_FILES["profile_project"]["tmp_name"], "barn_img/".$img_P);


$sql="update project set project_image='$img_P' where project_id='$project_id'";
$result=Query($sql);


echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";


?>