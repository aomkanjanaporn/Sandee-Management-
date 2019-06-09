<?
require_once("config.inc.php");
$project_id = $_POST['project_id'];


$ext = pathinfo(basename($_FILES['profile_news']['name']),PATHINFO_EXTENSION);
$new_name = 'img_'.uniqid().".".$ext;
$img_path = "profile_news/";
$upload_path = $img_path.$new_name;
			
move_uploaded_file($_FILES["profile_news"]["tmp_name"],$upload_path);

$new_profile = $new_name;



move_uploaded_file($_FILES["profile_news"]["tmp_name"], "profile_news/".$new_profile);
$sql="update profile_news set file_name='$new_profile' where project_id='$project_id'";
$result=Query($sql);

echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?r=updateprofile_news&id=$project_id'>";


?>
