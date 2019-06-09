<?
require_once("config.inc.php");
$project_id = $_POST['project_id'];
$news_title = $_POST['news_title'];
$news_bodyf = $_POST['news_bodyf'];
$news_bodym = $_POST['news_bodym'];
$news_bodyl = $_POST['news_bodyl'];

$target_file=$_FILES["news_img"]["name"]; 
if($target_file==''){
	$img_news=$_POST['news_img'];
	}else{
$ext = pathinfo(basename($_FILES['news_img']['name']),PATHINFO_EXTENSION);
$new_img_name = 'img_'.uniqid().".".$ext;
$img_path = "news_img/";
$upload_path = $img_path.$new_img_name;			
move_uploaded_file($_FILES["news_img"]["tmp_name"],$upload_path);
$img_news = $new_img_name;
move_uploaded_file($_FILES["news_img"]["tmp_name"], "news_img/".$img_news);  
}
$sql="insert into news(project_id,news_title,news_bodyf,news_bodym,news_bodyl,news_img) values('$project_id','$news_title','$news_bodyf','$news_bodym','$news_bodyl','$img_news')";
$result=Query($sql);



echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?r=create_news&id=$project_id'>";


?>