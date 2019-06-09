<?
require_once("config.inc.php");
$project_id = $_POST['project_id'];


$ext = pathinfo(basename($_FILES['design_plan']['name']),PATHINFO_EXTENSION);
$new_img_name = 'img_'.uniqid().".".$ext;
$img_path = "plan_img/";
$upload_path = $img_path.$new_img_name;
			
move_uploaded_file($_FILES["design_plan"]["tmp_name"],$upload_path);

$img_plan = $new_img_name;



move_uploaded_file($_FILES["design_plan"]["tmp_name"], "plan_img/".$img_plan);


$sql="update project set designplan_file='$img_plan' where project_id='$project_id'";
$result=Query($sql);


echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?home=create_homeprojectlist&id=$project_id'>";


?>