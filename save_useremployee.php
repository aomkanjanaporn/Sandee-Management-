<?
require_once("config.inc.php");
?>
<meta charset="utf-8">

<?
$user_id=$_POST['user_id'];
$name_title=$_POST['name_title'];
$name=$_POST['name'];
$sname=$_POST['sname'];
$nname=$_POST['nname'];
$line_id=$_POST['line_id'];
$tel=$_POST['phone_no'];
$address=$_POST['address'];
$user_type=$_POST['user_type'];

$email=$_POST['email'];
$password=$_POST['password'];
$cfmpassword=$_POST['cfmpassword'];

if($password!=$cfmpassword){
	?>
	<SCRIPT LANGUAGE="JavaScript">
		alert("รหัสผ่านใหม่ และ รหัสผ่านยืนยันไม่ตรงกัน กรุณาตรอจสอบรหัสผ่านอีกครั้ง")
	</script>
	<? 
		echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=./home.php'>";
		exit();
}
$sql="update user set user_title='$name_title',user_name='$name',user_sname='$sname',user_nickname='$nname',user_tel='$tel',user_address='$address',line_id='$line_id' ";
if($password!=""){
	$sql.=",user_password='$password'";
}
$sql.=$sql_add;
$sql.=" where user_id='$user_id'";
$result=Query($sql);
echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?user=edit_useremployee&id=$user_id'>";

?>