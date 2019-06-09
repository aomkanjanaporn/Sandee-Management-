<?
require_once("config.inc.php");
$user_id=$_SESSION['id'];
$sql_user="select * from user where user_id='".$user_id."'";
$result_user=Query($sql_user);
$rows_user=mysql_fetch_assoc($result_user);

?>
<div style="float:left;width:100%;height:100%;background:#eff3f6;">

<form action="add_ticket.php" method="POST">
<input type="hidden" name="project_id" value="<?echo $rows_user['user_project'];?>">
<div style="float:left;width:620px;min-height:150;border:1px solid #e2e6e9;margin-top:30px;">
<div style="float:left;width:620px;height:40px;line-height:40px;font-size:20px;font-weight:bold; padding-left:10px;">
แจ้งซ่อม
</div>	
<div style="float:left;width:620px;height:40px;line-height:40px;font-size:20px;font-weight:bold; padding-left:10px;">

 <?
$sql="select * from fix_type order by fix_name limit 3";
$result=Query($sql);
$i=1;
while($rows=mysql_fetch_assoc($result)){
?>
<div style="float:left;width:160px;height:40px;line-height:40px;">
<input required type="radio" value="<?echo $rows['fix_id'];?>" name="fix_type" style="margin-right:10px;"/><?echo $rows['fix_name'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<?}?>

</div>	
<div style="float:left;width:620px;height:40px;line-height:40px;font-size:20px;font-weight:bold; padding-left:10px;">

 <?
$sql="select * from fix_type order by fix_name limit 3 offset 3";
$result=Query($sql);
$i=1;
while($rows=mysql_fetch_assoc($result)){
?>
<div style="float:left;width:160px;height:40px;line-height:40px;">
<input required type="radio" value="<?echo $rows['fix_id'];?>" name="fix_type" style="margin-right:10px;"/><?echo $rows['fix_name'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<?}?>

</div>	
<div style="float:left;width:620px;height:40px;line-height:40px;font-size:16px;padding:5px;margin-top:20px;">
หัวข้อ : <input required type="text" value="" name="head" style="height:40px;"/>
</div>
<div style="float:left;width:620px;min-height:100px;line-height:20px;font-size:16px;padding:5px;margin-top:20px;">
รายละเอียด
<textarea name="desc" style="width:600px;height:150px;">

</textarea>
</div>


<button type="button" class=" btn-theme" onclick="report();" style="float:right;background:#85ce36;margin:10px 20px 0px 0px;" id="btn-submit-ajax">ยกเลิก</button>

<button type="submit" class=" btn-theme" style="float:right;background:#85ce36;margin:10px 20px 0px 0px;" id="btn-submit-ajax">ส่ง</button>

</div>	


</form>

	

<div style="float:left;width:690px;height:auto;line-height:40px;font-size:20px;font-weight:bold;margin-left:50px; ">
<div style="float:left;width:690px;height:40px;line-height:20px;font-size:18px;font-weight:bold;margin-top:30px;">
ประวัติการแจ้งซ่อม
</div>
	<table style="width;690px;color:#000;">
	<tr>
	 <td>#</td>
	 <td style="width:190px;font-weight:bold;">ประเภท</td>
	  <td style="width:190px;font-weight:bold;">หัวข้อ</td>
	 <td style="width:130px;font-weight:bold;">วันที่แจ้ง</td>
	 
	 <td style="width:130px;font-weight:bold;">สถานะ</td>
</tr>
 <?
$sql="select * from ticket inner join user on ticket_user_id=user_id 
inner join ticket_status on status_id=ticket_status
inner join fix_type on fix_id=ticket_fix_id
where user_id='".$_SESSION['id']."' and ticket_status>0 order by ticket_datetime desc,ticket_id desc limit 30";
$result=Query($sql);
$i=1;
while($rows=mysql_fetch_assoc($result)){
?>

<tr style="cursor:pointer;" onmouseover="this.style.color='#FFF';this.style.background='#4ecdc4';" onmouseout="this.style.color='#000';this.style.background='none';" onclick="desc('<?echo $rows['ticket_id'];?>');" >
	 <td style="border-bottom:1px solid #e7e7e7;"><?echo $i++;?></td>
	 <td style="border-bottom:1px solid #e7e7e7;"><?echo $rows['fix_name'];?></td>
	 <td style="border-bottom:1px solid #e7e7e7;"><?echo $rows['ticket_title'];?></td>
	 <td style="border-bottom:1px solid #e7e7e7;"><?echo $rows['ticket_datetime'];?></td>

	 <td style="border-bottom:1px solid #e7e7e7;font-weight:bold;color:<?echo $rows['status_color'];?>"><?echo $rows['status_name'];?></td>
</tr>

<?}?> 
</table>
</div>
</div>	