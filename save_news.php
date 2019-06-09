<?
require_once("config.inc.php");

$news_id = $_POST['news_id'];
$project_id = $_POST['project_id'];

$news_title = $_POST['news_title'];
$news_bodyf = $_POST['news_bodyf'];
$news_bodym = $_POST['news_bodym'];
$news_bodyl = $_POST['news_bodyl'];
$sql="update news set news_title='$news_title',news_bodyf='$news_bodyf',news_bodym='$news_bodym',news_bodyl='$news_bodyl' where news_id ='$news_id'";
$result=Query($sql);
echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?r=edit_news&id=$project_id'>";






?>