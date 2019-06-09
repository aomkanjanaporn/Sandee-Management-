<?
require_once("config.inc.php");
$repairman_id=$_POST['id'];
$sql="select * from repairman where repairman_id='".$repairman_id."'";
$result=Query($sql);
$rows=mysql_fetch_assoc($result);
include("layoutsBS/header.php");
?>
<div class="row mt">
   <div class="col-sm-12">
	<div class="container">
        <section class="panel">
			<h2 ><b>&nbsp; &nbsp; แก้ไขข้อมูลช่าง</b></h2> 
           <div class="panel-body minimal">
			<form action="save_repairman.php" method="POST" >
			
					<ul class="nav nav-pills nav-stacked mail-nav">
					      <input type="hidden" name="repairman_id" class="form-control" value="<?echo $rows['repairman_id'];?>">
						  <li class="active ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ชื่อ-นามสกุลช่าง :</label>
							<div class="col-lg-8">
								<input type="text" name="name_repairman" value="<?echo $rows['name_repairman'];?>" class="form-control" required="">
							</div>
						  </div>
						  </li>
						  <br>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4"> เลือกประเภทช่าง :</label>
							<div class="col-lg-8">
								<select name="type_repairman"  style="width:170px;height:30px;" class="form-control">
										<option value="<?echo $rows['type_repairman'];?>" ><?echo $rows['type_repairman'];?></option>
										<?
											$sql1="select * from fix_type order by fix_name";
											$result1=Query($sql1);
											while($rows1=mysql_fetch_assoc($result1)){
										?>
											<option value="<?echo $rows1['fix_id'];?>"><?echo $rows1['fix_name'];?></option>
										<?}?>
									</select>
							</div>
						  </div>
						  </li>
						  <br>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">เบอร์โทรศัพท์ :</label>
							<div class="col-lg-8">
								<input type="text" name="tel_repairman" value="<?echo $rows['tel_repairman'];?>" class="form-control" required="">
							</div>
						  </div>
						  </li>
						  <br>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ไอดีไลน์ :</label>
							<div class="col-lg-8">
								<input type="text" name="line_repairman" value="<?echo $rows['line_repairman'];?>" class="form-control" required="">
							</div>
						  </div>
						  </li> 
						  <br>
						  <br>
						  <br>
						  <li class="active  ">
						  <div class="form-group row row-lg-6" style="padding-right: 20px;padding-left: 20px;">
						  	<div class="col-lg-6 ">
							</div>
							<div class="col-lg-2 ">
								<button class="btn btn-theme" type="submit">บันทึก</button>
							</div>
				
							<div class="col-lg-2 ">
								<button class="btn btn-theme02" >ยกเลิก</button>
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
