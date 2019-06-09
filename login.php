<?
require_once("config.inc.php");
?>
 <meta charset="utf-8">
<?
$email=$_POST['email'];
$password=$_POST['password'];

$sql="select * from user where user_email='$email' and user_password='$password'";
$result=Query($sql);
$rows=mysql_fetch_assoc($result);
if($rows['user_id']>0){
	$_SESSION['id']=$rows['user_id'];
	$_SESSION['class']=$rows['user_type'];
	$_SESSION['user_email']=$rows['user_email'];
	$_SESSION['user_password']=$rows['user_password'];
	$_SESSION['user_img']=$rows['user_img'];
	$_SESSION['user_project']=$rows['user_project'];
	
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";
}else{
	?>
	<script>
	alert("อีเมล์ หรือ รหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง");
	</script>
	<?
	session_destroy();
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
}















?>