<?
require_once("config.inc.php");
$user_type = '3';
$project_id = $_POST['project_id'];
$user_home_id = $_POST['home_id'];
$email=$_POST['email'];
$password=$_POST['password'];
$nname=$_POST['nname'];
$name=$_POST['name'];
$sname=$_POST['sname'];
$name_title=$_POST['name_title'];
$tel=$_POST['tel'];
$address=$_POST['address'];
$status_owner =1;
 
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


							
$ext = pathinfo(basename($_FILES['customer_img']['name']),PATHINFO_EXTENSION);
$new_img_name = 'admin_'.uniqid().".".$ext;
$img_path = "user_img/";
$upload_path = $img_path.$new_img_name;
			
move_uploaded_file($_FILES["customer_img"]["tmp_name"],$upload_path);
$new_img = $new_img_name;


move_uploaded_file($_FILES["customer_img"]["tmp_name"], "user_img/".$new_img);

$sql="insert into user(user_type,user_project,user_home_id,user_email,user_password,user_nickname,user_name,user_sname,user_title,user_tel,user_img,user_address) 
			  values('$user_type','$project_id','$user_home_id','$email','$password','$nname','$name','$sname','$name_title','$tel','$new_img','$address')";
$result=Query($sql);
if($result){
	$sql_home = "update home set status_owner = '$status_owner' , address='$address' where home_id ='$user_home_id'";
	$result_home=Query($sql_home);
}

echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?user=create_usercustomer&id=$project_id'>";







?>