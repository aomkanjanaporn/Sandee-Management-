<?
if(!isset($_SESSION)) {
     session_start();
}
error_reporting(1);
function Query($sql){
	$dbserver="127.0.0.1:3306";
	$dbusername="root";
	$dbpassword="123456789";
	$dbname="sandeetown";
	$link=mysql_connect( $dbserver ,$dbusername , $dbpassword,false,MYSQL_CLIENT_SSL);
	if (!$link){
		require_once('error.php');
		exit();
	}else{
		mysql_select_db ($dbname,$link);
		mysql_query("SET NAMES UTF8",$link);
		return mysql_query($sql,$link);
	}
}
function ClassName($c){
	switch($c){
		case "0":echo "Administrator";break;
		case "1":echo "Enployee";break;
		case "2":echo "PM";break;
		case "3":echo "Customer";break;
		default:echo "Unknown";break;
	}
}
function ClassNameTitle($c){
	switch($c){
		case "1":echo "นาย";break;
		case "2":echo "นาง";break;
		case "3":echo "นางสาว";break;
		default:echo "";break;
	}
}


?>