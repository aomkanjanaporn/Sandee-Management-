<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}

	include("layoutsBS/header.php");
?>

<div class="row mt">
    <div class="col-sm-4">
        <section class="panel">
			<div class="panel-body" >
			<h3><b> จัดการรายชื่อเจ้าของโครงการ  </b></h3>
			
			<form action="add_owner.php" method="POST" enctype="multipart/form-data" class="form-horizontal tasi-form">
				<ul class="nav nav-pills nav-stacked mail-nav">
					<li class="active  ">
						<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">รูปประจำตัว :</label>
							<div class="col-lg-8">
								<input type="file" name="owner_img" accept="image/*" class="form-control" required />
							</div>
						</div>
					</li>
					<li class="active ">
						<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4"><h5>คำนำหน้าชื่อ</h5></label>
							<div class="col-lg-8">
								<input type="radio" style="width: 20px" id="" value="1" name="name_title" value="นาย" checked /> นาย
								<input type="radio" style="width: 20px" id="" value="2" name="name_title" value="นาง"/> นาง
								<input type="radio" style="width: 20px" id="" value="3" name="name_title" value="นางสาว"/> นางสาว
							</div>
						</div>
					</li>
					<li class="active ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ชื่อ  :</label>
							<div class="col-lg-8">
								<input type="text" name="name" class="form-control"   required>
							</div>
						  </div>
						  </li>
						   <li class="active ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">นามสกุล  :</label>
							<div class="col-lg-8">
								<input type="text" name="sname"   class="form-control" required>
							</div>
						  </div>
						  </li> <li class="active ">
						  <div class="form-group 6" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ชื่อเล่น  :</label>
							<div class="col-lg-8">
								<input type="text" name="nname"  class="form-control" required>
							</div>
						  </div>
						  </li>
						  <li class="active  ">
						  <div class="form-group" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">Line id :</label>
							<div class="col-lg-8">
								<input type="text" name="line_id" class="form-control"  required>
							</div>
						  </div>
						  </li>
						  <li class="active">
						  <div class="form-group" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">เบอร์โทรศัพท์ :</label>
							<div class="col-lg-8">
								<input type="text" name="phone_no" class="form-control"  required>
							</div>
						  </div>
						  </li>
				<hr>
				<ul class="nav nav-pills nav-stacked mail-nav">
					<li class="active  ">
						<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">อีเมลล์ :</label>
							<div class="col-lg-8">
								<input type="email" class="form-control" name="email" required>
							</div>
						</div>
					</li>
					<li class="active  ">
						<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">รหัสผ่าน :</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="password" required>
							</div>
						</div>
					</li>
					<li class="active  ">
						<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ยืนยันรหัสผ่าน :</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="cfmpassword" required>
							</div>
						</div>
					</li>
					
					<li class="active ">
						<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<div class="col-lg-12">
								<div class="col-md-6 col-md-offset-6 row-12">
									<button type="submit" class="btn btn-theme" id="btn-submit-ajax"><i class="fa fa-plus"></i> &nbsp;เพิ่มรายชื่อ</button>
									<button type="reset" onclick="create_owner('0');" class="btn btn-theme02"><i class="fa fa-minus"></i> &nbsp;ยกเลิก</button>
								</div>
							</div>
						</div>
					</li>
				</ul>
				<hr>
			</form>
			</div>
		</section>
	</div>
	<div class="col-sm-8">
        <section class="panel">
        <h4 ><b>&nbsp; &nbsp; รายชื่อเจ้าของโครงการ</b></h4>
            <div class="panel-body minimal">
                <div class="table-inbox-wrap ">
					<table class="table table-striped table-advance table-hover">
					<hr>
						<thead>
							 <tr>
								<th>ลำดับที่</th>
								<th >#</th>
								<th><i class="fa fa-user"></i>  &nbsp; &nbsp;  ชื่อเล่น</th>
								<th><i class="fa fa-bookmark"></i> &nbsp; &nbsp;ชื่อ-นามสกุล<th>
								<th ><i class="fa fa-pencil"></i> &nbsp; &nbsp;Action<th>
								
							 </tr>
						</thead>
						<tbody>
							<?
							$sql="select * from user where user_type = '2'  ";
							$result=Query($sql);
							$i=1;
							while($rows=mysql_fetch_assoc($result)){
								?>
								<tr>
									<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;								
										<?echo $i++;?>
									</td>
									<td>
										<? if($rows['user_img']){ ?> 
											<img src="user_img/<?echo $rows['user_img'];?>" class="img-circle" style="width:50px;height:50px; "/> 
										<?}else{ ?>
											<img src="img/noimg.jpg" class="img-circle" style="width:50px;height:50px; "/> 
										<?}?>
									</td>
									<td><?echo $rows['user_nickname'];?></td>
									<td><?echo ClassNameTitle($rows['user_title']);?> <?echo $rows['user_name'];?> <?echo $rows['user_sname'];?></td>
								
									<td class="cpt" onclick="edit_owner('<?echo $rows['user_id'];?>');" >
										<i class="fa fa-pencil"> แก้ไข
									</td>
									
									<?if($_SESSION['id']!==$rows['user_id']){?>
									<td class="cpt" onclick="if(confirm('ดำเนินการลบผู้ใช้ <?echo $rows['user_name']." ".$rows['user_sname'];?> (  <?echo $rows['user_email'];?> )  ออกจากระบบหรือไม่ ?')){delete_user('<?echo $rows['user_id'];?>');}"><i class="fa fa-trash-o "></i>ลบ</td>
									<?}?>
								</tr>
								<?
								
							}
							?>
						</tbody>
					</table>
				</div>
              </div>
        </section>
    </div>
</div>