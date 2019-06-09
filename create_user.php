<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}
?>

   <?
						$sql="select * from project where project_id='".$_POST['id']."'";
						$result=Query($sql);
						while($rows=mysql_fetch_assoc($result)){
							$project_image=$rows['project_image'];
						}
					?>


<section class="wrapper site-min-height">
<h2><i class="fa fa-angle-right"></i> จัดการชื่อผู้ใช้ระบบ</h2>


<div style="float:Left;width:425px;height:800px;">




<form action="add_user.php" method="POST" enctype="multipart/form-data" id="manage-employee-profile" class="">

<table>

<tr><td colspan="1">ประเภท</td>
<td colspan="1">
<select name="type" style="width:170px;height:30px;">
<?
$sql="select * from type order by type_name";
$result=Query($sql);
while($rows=mysql_fetch_assoc($result)){
?>
<option value="<?echo $rows['type_id'];?>" <?if($rows['type_id']==3){echo "selected";}?>><?echo $rows['type_name'];?></option>
<?}?>
</select>

</td></tr>

<tr><td colspan="1">โครงการ</td>
<td colspan="1">
<select name="type" style="width:170px;height:30px;">
<?
$sql="select * from project order by project_name";
$result=Query($sql);
while($rows=mysql_fetch_assoc($result)){
?>
<option value="<?echo $rows['project_id'];?>"><?echo $rows['project_name'];?></option>
<?}?>
<option value="พนักงาน">ไม่เลือก</option>

</select>

</td></tr>

<tr>
<td colspan="1">
	คำนำหน้าชื่อ
</td>
<td colspan="1">
	<input type="radio" style="width: 20px" id="" value="1" name="name_title" value="นาย" checked /> นาย
	<input type="radio" style="width: 20px" id="" value="2" name="name_title" value="นาง"/> นาง
	<input type="radio" style="width: 20px" id="" value="3" name="name_title" value="นางสาว"/> นางสาว
</td>
</tr>

<tr><td colspan="1">ชื่อ</td><td colspan="1">
<input type="text" class="form-control" name="name" required></td></tr>

<tr><td colspan="1">นามสกุล</td><td colspan="1">
<input type="text" class="form-control" name="sname" required></td></tr>

<tr><td colspan="1">ชื่อเล่น</td><td colspan="1">
<input type="text" class="form-control" name="nname" required></td></tr>

<tr><td colspan="1">เบอร์โทรศัพท์</td><td colspan="1">
<input type="text" class="form-control" name="tel" required></td></tr>

<tr><td colspan="1">ที่อยู่</td><td colspan="1">
<textarea name="address" style="width:300px;height:100px;">

</textarea></td></tr>


<tr><td colspan="1"></td><td colspan="1">&nbsp;</td></tr>


<tr><td colspan="1">อีเมลล์</td><td colspan="1">
<input type="text" class="form-control" name="email" required></td></tr>

<tr><td colspan="1">รหัสผ่าน</td><td colspan="1">
<input type="text" class="form-control" name="password" required></td></tr>

<tr><td colspan="1">ยืนยันรหัสผ่าน</td><td colspan="1">
<input type="text" class="form-control" name="cfmpassword" required></td></tr>

<tr><td colspan="1">รูปประจำตัว</td><td colspan="1">
<input type="file" name="pic" accept="image/*" style="" required /></td></tr>




				
<tr><td colspan="2">

<button type="submit" class="btn btn-theme" id="btn-submit-ajax"><i class="fa fa-plus"></i> &nbsp;เพิ่มรายชื่อ</button>
<button type="reset" class="btn btn-theme04"><i class="fa fa-minus"></i> &nbsp;ยกเลิก</button>
</td></tr>



</table>

</form>



</div>


<div style="float:Left;width:425px;height:800px;">

<div class="col-lg-8 col-md-8 col-sm-12">
<div class="content-panel">
<h4><i class="fa fa-edit"></i> &nbsp; รายชื่อผู้ใช้ภายในระบบ</h4><hr>
<table class="table tabel-employee-bordered" id="table-employee">
<thead>
<tr>
<th>#</th>
<th class="hidden-phone"><i class="fa fa-user">ชื่อเล่น</th>
<th class="hidden-phone"><i class="fa fa-user">ชื่อ-นามสกุล</th>
<th></th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?
$sql="select * from user order by user_id desc";
$result=Query($sql);
$i=1;
while($rows=mysql_fetch_assoc($result)){
	?>
	<tr>
	<td><?echo $i++;?></td>
	<td><?echo $rows['user_nickname'];?></td>
	<td><?echo ClassNameTitle($rows['user_title']);?> <?echo $rows['user_name'];?></td>
	<td><?echo $rows['user_sname'];?></td>
	<td class="cpt" onclick="edit_user('<?echo $rows['user_id'];?>');" >[ แก้ไข ] </td>
	<?if($_SESSION['id']!==$rows['user_id']){?>
	<td class="cpt" onclick="if(confirm('ดำเนินการลบผู้ใช้ <?echo $rows['user_name']." ".$rows['user_sname'];?> (  <?echo $rows['user_email'];?> )  ออกจากระบบหรือไม่ ?')){delete_user('<?echo $rows['user_id'];?>');}">  [ลบ ]</td>
	<?}?>
	</tr>
	<?
	
}
?>


</tbody>
</table>
</div>

</div>

</div>
</section>
<!-- /wrapper -->
</section>
 </section>