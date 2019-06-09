<?
require_once("config.inc.php");
?>
<html lang="en">

<head>
    <meta charset="utf-8">
<?
$user_type = '0';

$name=$_POST['name'];
$sname=$_POST['sname'];
$nname=$_POST['nname'];
$tel=$_POST['phone_no'];
$line_id=$_POST['line_id'];
$address=$_POST['address'];

$email=$_POST['email'];
$password=$_POST['password'];
$name_title=$_POST['name_title'];
$address=$_POST['address'];

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

$ext = pathinfo(basename($_FILES['admin_img']['name']),PATHINFO_EXTENSION);
$new_img_name = 'admin_'.uniqid().".".$ext;
$img_path = "user_img/";
$upload_path = $img_path.$new_img_name;
			
move_uploaded_file($_FILES["admin_img"]["tmp_name"],$upload_path);
$new_img = $new_img_name;


move_uploaded_file($_FILES["admin_img"]["tmp_name"], "user_img/".$new_img);

$sql="insert into user(user_type,user_project,user_email,user_password,user_nickname,user_name,user_sname,user_title,user_tel,user_img,user_address,line_id) 
			  values('$user_type','$project_id','$email','$password','$nname','$name','$sname','$name_title','$tel','$new_img','$address','$line_id')";
$result=Query($sql);


echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?r=create_admin&id=0'>";





?>