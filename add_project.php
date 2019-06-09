<?
require_once("config.inc.php");

$name=$_POST['name'];
$address=$_POST['address'];
$tel=$_POST['tel'];


$target_file=$_FILES["pic"]["name"];
if($target_file==''){
	$target_file=$_POST['pic'];
	}
	
if($target_file==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=./home.php'>";
	exit();
	}
	$target_file = str_replace(' ','',$target_file);
	$file_parts = pathinfo($target_file);
	if($file_parts['extension']!="jpg"&&$file_parts['extension']!="JPG"&&$file_parts['extension']!="PNG"&&$file_parts['extension']!="png"&&$file_parts['extension']!="jpeg"&&$file_parts['extension']!="JPEG"){
	?>
	<SCRIPT LANGUAGE="JavaScript">
		alert("คุณไม่สามารถอัพโหลดไฟล์นามสกุล : <?echo $file_parts['extension'];?> นี้ได้ ต้องใช้ .jpg, .jpeg, .png เท่านั้น")
	</script>
	<? 
		echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=./home.php'>";
		exit();
	}
	
	$target_file=md5($target_file).".".$file_parts['extension'];

move_uploaded_file($_FILES["pic"]["tmp_name"], "barn_img/".$target_file);


$sql="insert into project(project_name,project_address,project_image,project_tel) values('$name','$address','$target_file','$tel')";
$result=Query($sql);
if($result){
	$sql_project ="select max(project_id) maximum from project ";
	$objQuery = mysql_query($sql_project);
	$objResult = mysql_fetch_array($objQuery);
	$project_id= $objResult["maximum"];
	$img = "noimg.jpg";
	$sql_news="insert into  profile_news(project_id,file_name) values('$project_id','$img')";
	$result_news=Query($sql_news);
}

echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";






?>