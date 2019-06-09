<?
require_once("config.inc.php");
$id=$_POST['id'];
$user_id=$_SESSION['id'];
$sql="select * from user where user_id='".$user_id."'";
$result=Query($sql);
$rows=mysql_fetch_assoc($result);
include("layoutsBS/header.php");
?>
<div class="row mt">
   <div class="col-sm-12">
	<div class="container">
        <section class="panel">
			<h2 ><b>&nbsp; &nbsp; จัดการข้อมูลส่วนตัว</b></h2> 
           <div class="panel-body minimal">
				<ul class="nav nav-pills nav-stacked mail-nav" >
					<li class="active col-md-6 col-md-offset-3">
						<div class="form-group " style="padding-left:20%;">
								<?if($rows['user_img']){?>
									<a href="profile.html"><img src="user_img/<?echo $rows['user_img'];?>" class="img-circle" width="280"></a>
								<?}else{?>
									<a href="profile.html"><img src="img/noimg.jpg" class="img-circle" width="100" height="100"></a>
								<?}?>
							<div class="row mt-4">
								 <b><h4 style="padding-left:25%;">รูปประจำตัว</h4></b>
							</div>
						</div>
					</li>
				</ul>
				<form action="profile_admin.php" method="POST" enctype="multipart/form-data" >
				<ul class="nav nav-pills nav-stacked mail-nav" >
					<input type="hidden" name="user_id" value="<?echo $rows['user_id'];?>">
					<li class="active row">
						<div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-3 control-label col-lg-3"><h5>อัพโหลดรูปประจำตัว </h5></label>
							<div class="col-lg-6">
								<input type="file" name="admin_img" class="form-control"> 
							</div>
							<div class="col-lg-3">
								<input type="submit" class="btn btn-theme"> 
							</div>
						</div>
					</li>
				</ul>
			</form> 
			<form action="save_user.php" method="POST" >
				<input type="hidden" name="user_id" value="<?echo $rows['user_id'];?>">
				<ul class="nav nav-pills nav-stacked mail-nav" >
					<li class="active row ">
						<div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
						<label class="col-sm-4 control-label col-lg-4"><h5>คำนำหน้าชื่อ</h5></label>
							<div class="col-lg-8">
								<input type="radio" style="width: 20px" id="" value="1" name="name_title" value="นาย" <?if($rows['user_title']==1){echo "checked";}?> /> นาย
								<input type="radio" style="width: 20px" id="" value="2" name="name_title" value="นาง" <?if($rows['user_title']==2){echo "checked";}?>/> นาง
								<input type="radio" style="width: 20px" id="" value="3" name="name_title" value="นางสาว" <?if($rows['user_title']==3){echo "checked";}?>/> นางสาว
							</div>
						</div>
					</li>
				  <li class="active row ">
					  <div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
						<label class="col-sm-4 control-label col-lg-4">ชื่อ  :</label>
						<div class="col-lg-8">
							<input type="text" name="name" class="form-control"   value="<?echo $rows['user_name'];?>" required="">
						</div>
					  </div>
				  </li>
				  <li class="active row">
					  <div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
						<label class="col-sm-4 control-label col-lg-4">นามสกุล  :</label>
						<div class="col-lg-8">
							<input type="text" name="sname"  value="<?echo $rows['user_sname'];?>"  class="form-control" required="">
						</div>
					  </div>
				  </li> 
				  <li class="active row">
						<div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
						<label class="col-sm-4 control-label col-lg-4">ชื่อเล่น  :</label>
							<div class="col-lg-8">
								<input type="text" name="nname" value="<?echo $rows['user_nickname'];?>" class="form-control" required="">
							</div>
						 </div>
				   </li>
					<li class="active row ">
						<div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">Line id :</label>
							<div class="col-lg-8">
								<input type="text" name="line_id" class="form-control" value="<?echo $rows['line_id'];?>"  required="">
							</div>
						</div>
					</li>
					<li class="active row ">
						  <div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ที่อยู่ :</label>
							<div class="col-lg-8">
								<textarea class="form-control "  name="address" value="<?echo $rows['user_address'];?>" required=""><?echo $rows['user_address'];?></textarea>
							</div>
						  </div>
					</li>
					<li class="active  row">
						  <div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">เบอร์โทรศัพท์ :</label>
							<div class="col-lg-8">
								<input type="text" name="phone_no" class="form-control" value="<?echo $rows['user_tel'];?>" required="">
							</div>
						  </div>
					</li>
					<li class="active  row">
						<div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">อีเมลล์ :</label>
							<div class="col-lg-8">
								<input type="email" name="email" class="form-control" value="<?echo $rows['user_email'];?>" required="">
							</div>
						</div>
					</li>
					<li class="active  row">
						<div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
						<label class="col-sm-4 control-label col-lg-4">รหัสผ่านใหม่ :</label>
							<div class="col-lg-8">
								<input type="text" name="password" class="form-control" value="" placeholder="( ถ้ามี )" >
							</div>
						</div>
					</li>
					<li class="active  row">
						 <div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ยืนยันรหัสผ่านใหม่ :</label>
							<div class="col-lg-8">
								<input type="text" name="cfmpassword" class="form-control"  value="" placeholder="( ถ้ามี )" >
							</div>
						 </div>
					</li>
					<li class="active  row">
						<div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
							<div class="col-lg-8 row">
								<div class="col-lg-6">
								<input type="submit" class="btn btn-theme">
									
								</div>
								<div class="col-lg-6">
									<button type="reset" class="btn btn-theme02"><i class="fa fa-minus"></i> &nbsp;ยกเลิก</button>
								</div>
							</div>
						  </div>
					</li>  
				</ul>
			</form>			
        
			</div>
			</section>
	</div>
  </div>
</div>
