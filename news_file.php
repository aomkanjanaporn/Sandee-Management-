<?
require_once("config.inc.php");
$news_id = $_POST['news_id'];
$project_id = $_POST['project_id'];
$ext = pathinfo(basename($_FILES['news_img']['name']),PATHINFO_EXTENSION);
$new_img_name = 'img_'.uniqid().".".$ext;
$img_path = "news_img/";
$upload_path = $img_path.$new_img_name;
			
move_uploaded_file($_FILES["news_img"]["tmp_name"],$upload_path);

$img_news = $new_img_name;



move_uploaded_file($_FILES["news_img"]["tmp_name"], "news_img/".$img_news);


$sql="update news set news_img='$img_news' where news_id ='$news_id'";
$result=Query($sql);


echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?r=newspic_news&id=$project_id'>";


?>