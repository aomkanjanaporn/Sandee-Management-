<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}
include("layoutsBS/header.php");
?>

   <?
						$sql="select * from user inner join project on user_project=project_id inner join home on user_home_id = home_id where user_id='".$_POST['id']."'";
						$result=Query($sql);
						$rowsd=mysql_fetch_assoc($result);
?>
<div class="row mt">
   <div class="col-sm-12">
	<div class="container">
        <section class="panel">
        <h2> แก้ไขข้อมูลลูกบ้าน</h2>
            <div class="panel-body minimal">
           
				<input type="hidden" name="id" value="<?echo $rowsd['user_id'];?>">
					<ul class="nav nav-pills nav-stacked " >
						<li class="active ">
							<div class="form-group " style="padding-left:20%;">
								<div class="row">
									<? if($rowsd['user_img']){ ?> 
										<img src="user_img/<?echo $rowsd['user_img'];?>" class="img-circle" style="width:260px;height:260px; "/> 
									<?}else{ ?>
										<img src="img/noimg.jpg" class="img-circle" style="width:260px;height:260px; "/> 
									<?}?>
								</div>
								<div class="row mt-4">
									
								</div>
							</div>
						</li>
						<form action="profile_customer.php" method="POST" enctype="multipart/form-data" >
							<input type="hidden" name="user_id" value="<?echo $rowsd['user_id'];?>">
							<li class="active row">
								<div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
									<label class="col-sm-3 control-label col-lg-3"><h5>อัพโหลดรูปประจำตัว </h5></label>
									<div class="col-lg-6">
										<input type="file" name="customer_img" class="form-control"> 
									</div>
									<div class="col-lg-3">
										<input type="submit" class="btn btn-theme"> 
									</div>
								</div>
							</li>
						</form>  
					<form action="save_usercustomer.php" method="POST" >
							<input type="hidden" name="user_id" value="<?echo $rowsd['user_id'];?>">
							 <li class="active row">
							  <div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
								<label class="col-sm-12 control-label col-lg-12">ลูกบ้านโครงการ  : &nbsp;&nbsp;&nbsp;<?echo $rowsd['project_name'];?> &nbsp; &nbsp;&nbsp;แปลงที่  : &nbsp;&nbsp;<?echo $rowsd['lot_no'];?>  </label>
								
								
							  </div>
						  </li>
							<li class="active row">
								<div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
									<label class="col-sm-4 control-label col-lg-4"><h5>คำนำหน้าชื่อ</h5></label>
									<div class="col-lg-8">
										<input type="radio" style="width: 20px" id="" value="1" name="name_title" value="นาย" <?if($rowsd['user_title']==1){echo "checked";}?> /> นาย
										<input type="radio" style="width: 20px" id="" value="2" name="name_title" value="นาง" <?if($rowsd['user_title']==2){echo "checked";}?>/> นาง
										<input type="radio" style="width: 20px" id="" value="3" name="name_title" value="นางสาว" <?if($rowsd['user_title']==3){echo "checked";}?>/> นางสาว
									</div>
								</div>
							</li>
						  <li class="active row">
							  <div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
								<label class="col-sm-4 control-label col-lg-4">ชื่อ  :</label>
								<div class="col-lg-8">
									<input type="text" name="name" class="form-control"   value="<?echo $rowsd['user_name'];?>" required="">
								</div>
							  </div>
						  </li>
						  <li class="active row">
						  <div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">นามสกุล  :</label>
							<div class="col-lg-8">
								<input type="text" name="sname"  value="<?echo $rowsd['user_sname'];?>"  class="form-control" required="">
							</div>
						  </div>
						  </li> 
						  <li class="active row">
						  <div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ชื่อเล่น  :</label>
							<div class="col-lg-8">
								<input type="text" name="nname" value="<?echo $rowsd['user_nickname'];?>" class="form-control" required="">
							</div>
						  </div>
						  </li>
						  <li class="active row ">
						  <div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">Line id :</label>
							<div class="col-lg-8">
								<input type="text" name="line_id" class="form-control" value="<?echo $rowsd['line_id'];?>"  required="">
							</div>
						  </div>
						  </li>
						  <li class="active row ">
						  <div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ที่อยู่ :</label>
							<div class="col-lg-8">
								<textarea class="form-control "  name="address" value="<?echo $rowsd['user_address'];?>" required=""><?echo $rowsd['user_address'];?></textarea>
								
							</div>
						  </div>
						  </li>
						  <li class="active  row">
						  <div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">เบอร์โทรศัพท์ :</label>
							<div class="col-lg-8">
								<input type="text" name="phone_no" class="form-control" value="<?echo $rowsd['user_tel'];?>" required="">
							</div>
						  </div>
						  </li>
						  <li class="active  row">
							<div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">อีเมลล์ :</label>
							<div class="col-lg-8">
								<input type="email" name="email" class="form-control" value="<?echo $rowsd['user_email'];?>" required="">
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
									<button type="reset" onclick="create_usercustomer('<?echo $rowsd['user_project'];?>');" class="btn btn-theme02"><i class="fa fa-minus"></i> &nbsp;ยกเลิก</button>
								</div>
							</div>
						  </div>
						  </li>  
					</ul>
				</form>
              </div>
       
    </div>
</div>

</div>
 </section>
