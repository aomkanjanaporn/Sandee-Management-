    <meta charset="utf-8">
<?
require_once("config.inc.php");
$id=$_POST['id'];
$name=$_POST['name'];
$tel=$_POST['tel'];
$address=$_POST['address'];
$desc=$_POST['desc'];
$promotion=$_POST['project_promotion'];
$promotion2=$_POST['project_promotion2'];
$promotion3=$_POST['project_promotion3'];
$promotion4=$_POST['project_promotion4'];
$promotion5=$_POST['project_promotion5'];


$sql="update project set project_name='$name',project_tel='$tel',project_address='$address',project_desc='$desc',project_promotion='$promotion'
,project_promotion2='$promotion2' ,project_promotion3='$promotion3' ,project_promotion4='$promotion4' ,project_promotion5='$promotion5' where project_id='$id'";
$result=Query($sql);

echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";








?>