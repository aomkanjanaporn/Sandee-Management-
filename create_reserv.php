<?
include("layoutsBS/header.php");
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}

	
	$project_id=$_POST['id'];
	$sqlproject="select * from project where project_id='".$project_id."'";
	$result1=Query($sqlproject);
	$rowp=mysql_fetch_assoc($result1);
	$status_home=1;
	$status_home_fee=0;
?>
      <div class="row mt">
          <div class="col-sm-4">
            <section class="panel">
				<div class="panel-body" >
				<h3><b> จองโครงการ <?echo $rowp['project_name'];?></b></h3>
				
	
					<form action="add_reserve.php" class="form-horizontal tasi-form" method="post">
						<ul class="nav nav-pills nav-stacked mail-nav">
						<input type="hidden" name="status_home" value="<?echo $status_home?>">
						  <li class="active ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ชื่อลูกค้า :</label>
							<div class="col-lg-8">
								<input type="text" name="customer_name" class="form-control" required>
							</div>
						  </div>
						  </li>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">เลขบัตรประจำตัวประชาชน :</label>
							<div class="col-lg-8">
								<input type="text" name="person_id" class="form-control" required>
							</div>
						  </div>
						  </li>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ที่อยู่ :</label>
							<div class="col-lg-8">
								<textarea class="form-control "  name="address" required=""></textarea>
								
							</div>
						  </div>
						  </li>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">เบอร์โทรศัพท์ :</label>
							<div class="col-lg-8">
								<input type="text" name="phone_no" class="form-control" required>
							</div>
						  </div>
						  </li>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">อีเมลล์ :</label>
							<div class="col-lg-8">
								<input type="text" name="email" class="form-control" required>
							</div>
						  </div>
						  </li>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ไอดีไลน์ :</label>
							<div class="col-lg-8">
								<input type="text" name="line_id" class="form-control" required>
							</div>
						  </div>
						  </li>
						</ul>
						<h5><b> รายละเอียด (Descirption)</b></h5>
						<ul class="nav nav-pills nav-stacked mail-nav">
						<li class="active ">
							<div class="form-group " style="padding-left:20%;">
								<div class="row">
									<? if($rowp['designplan_file']){ ?> 
										<img src="plan_img/<?echo $rowp['designplan_file'];?>" style="width:400px;height:260px; "/> 
									<?}else{ ?>
										<img src="img/noimg.jpg"  style="width:400px;height:260px; "/> 
									<?}?>
								</div>
								<div class="row mt-4">
								 <b><h5 style="padding-left:15%;">แบบแปลนโครงการ  <?echo $rowp['project_name'];?></h5></b>
								</div>
							</div>
						</li>
						  <li class="active ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<div class="col-lg-6">
								<div class="btn-group">
									<input type="hidden" name="project" value="<?echo $rowp['project_id'];?>" >
									<h4>โครงการ  <?echo $rowp['project_name'];?></h4>
								</div>
							</div>
							<div class="col-lg-6">
								
								<div class="btn-group">
									<h6> <h6>แปลงที่</h6></h6>
									
									<select  required name="home_id" style="width:170px;height:30px;" class="form-control" >
										<option value="">กรุณาเลือกแปลง</option>
										<?
											$sql="select * from home where home_project_id='".$rowp['project_id']."' and status ='".$status_home_fee."'  ";
											$result=Query($sql);
											while($rows=mysql_fetch_assoc($result)){
										?>
											<option value="<?echo $rows['home_id'];?>"><?echo $rows['lot_no'];?></option>
										<?}?>
									</select>
								</div>
								
							</div>
						  </div>
						  </li>
						  <li class="active ">
							  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
								<div class="col-lg-12">
								<h6>ราคา:</h6>
								<label class="col-sm-3 control-label col-lg-3">ตัวเลข</label>
									<div class="col-lg-6">
										<input type="text" name="price" class="form-control" required>
									</div>
									<label class="col-sm-3 control-label col-lg-3">บาท</label>
								</div>
							  </div>
						  </li>
						  <li class="active ">
							  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
								<div class="col-lg-12">
								<label class="col-sm-3 control-label col-lg-3">ตัวหนังสือ</label>
									<div class="col-lg-6">
										<input type="text" name="price_text" class="form-control" required>
									</div>
									<label class="col-sm-3 control-label col-lg-3">บาท</label>
								</div>
							  </div>
						  </li>
						  
										
									
						  <li class="active ">
							  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
								<div class="col-lg-12">
									<div class="col-md-6 col-md-offset-6 row-12">
											<input type="submit"  class="btn btn-theme" >
											<input type="reset" onclick="home_reserving('0');" class="btn btn-theme02" >
									</div>
								</div>
							  </div>
						  </li>
						 </ul>
						
					</form>

				</div>
            </section>
          </div>
          <div class="col-sm-8">
            <section class="panel">
              
                <h4 >	
					<b>&nbsp; &nbsp; &nbsp; &nbsp;รายชื่อผู้จองบ้าน </b>
                    
                  </h4>
              
              <div class="panel-body minimal">
                
                <div class="table-inbox-wrap ">
                  <table class="table table-striped table-advance table-hover">
                <hr>
                <thead>
                  <tr>
                    <th>ลำดับที่</th>
                    <th><i class="fa fa-user"></i>  &nbsp; &nbsp;  ชื่อ-นามสกุล</th>
                    <th><i class="fa fa-bookmark"></i> &nbsp; &nbsp; Line ID</th>
                    <th><i class=" fa fa-phone"></i> &nbsp; &nbsp; เบอร์โทรศัพท์</th>
                    <th>สถานะการจอง</th>
					<th colspan="2">Action</th>
					
                  </tr>
                </thead>
                <tbody>
<?

$sql="select * from reserve where project='".$rowp['project_id']."'";
$result=Query($sql);
$i=1;

while($rows=mysql_fetch_assoc($result)){
?>
                  <tr>
                    <td>&nbsp; &nbsp;<?echo $i++ ;?>  .</td>
                    <td><?echo $rows['name'];?></td>
                    <td><?echo $rows['line_id']; ?></td>
					<td><?echo $rows['phone_no']; ?></td>
	
                    <td><span <? if($rows['status']=="pending"){ ?> class="label label-warning label-mini" 
							 <? }else if($rows['status']=="success") { ?> class="label label-success label-mini"
							 <? }else { ?> class="label label-danger label-mini" <?}?> >  <?  echo $rows['status'];?></span></td>
	
                     <td>
                      <button class="btn btn-primary btn-xs" onclick="edit_reserve('<?echo $rows['reserve_id'];?>')"><i class="fa fa-pencil"></i>&nbsp; &nbsp;แก้ไช</button>
					  </td>
					  <td>
                      <button class="btn btn-danger btn-xs" onclick="if(confirm('ดำเนินการลบข้อมูลการจองบ้าน ของ<?echo $rows['name'];?>   ออกจากระบบหรือไม่ ?')){delete_reserve('<?echo $rows['reserve_id'];?>','<?echo $rowp['project_id'];?>');}"><i class="fa fa-trash-o "></i>&nbsp; &nbsp;ลบ</button>
                    </td>
                  </tr>
<?
	
}
?>


                </tbody>
              </table></div>
              </div>
            </section>
          </div>
        </div>
      

<?
include("layoutsBS/footer.php");
?>
