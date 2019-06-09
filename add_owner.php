<?
require_once("config.inc.php");
$user_type ='2';
$name_title=$_POST['name_title'];
$name=$_POST['name'];
$sname=$_POST['sname'];
$nname=$_POST['nname'];
$tel=$_POST['phone_no'];
$line_id=$_POST['line_id'];
$email=$_POST['email'];
$password=$_POST['password'];
$owner_img=$_POST['owner_img'];

$sql="select * from user where user_email='$email'";
$result=Query($sql);
if(mysql_num_rows($result)>0){
	?>
	<SCRIPT LANGUAGE="JavaScript">
		alert("อีเมล์นี้มีการใช้งานแล้ว กรุณาใช้อีเมล์อื่นค่ะ")
	</script>
	<? 
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=./home.php?error=9'>";
	exit();
}



$target_file=$_FILES["owner_img"]["name"];
if($target_file==''){
	$target_file=$_POST['owner_img'];
	}
	
if($target_file==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=./home.php?error=1'>";
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
		echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=./home.php?error=2'>";
		exit();
	}
	
	$target_file=md5($target_file).".".$file_parts['extension'];

move_uploaded_file($_FILES["owner_img"]["tmp_name"], "user_img/".$target_file);

$sql="insert into user(user_type,user_project,user_email,user_password,user_nickname,user_name,user_sname,user_title,user_tel,user_img,user_address) 
			  values('$user_type','$project_id','$email','$password','$nname','$name','$sname','$name_title','$tel','$owner_img','$address')";
$result=Query($sql);

echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?user=create_owner&id=0'>";





?>