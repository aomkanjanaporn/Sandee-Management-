<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}
    $id = $_POST['id'];
	$sql="select * from home inner join project on home_project_id=project_id where home_id='".$id."'";
	$result=Query($sql);
	$rows=mysql_fetch_assoc($result);
	include("layoutsBS/header.php");


?>
	<div class="row mt">
          <div class="col-sm-12">
		  <div class="container">
		 
            <section class="panel">
			 <b><h3 style="padding-left: 40px;">จัดการข้อมูลบ้าน</h3></b>
			
			 <b><h3 style="padding-left: 80px;">โครงการ    <?echo $rows['project_name'];?></h3></b>
			 
			 <br>
			 <br>

					 <ul class="nav nav-pills nav-stacked mail-nav" >
						<li class="active ">
							<div class="form-group " style="padding-left:30%;">
								<div class="row">
									<? if($rows['designplan_file']){ ?> 
										<img src="plan_img/<?echo $rows['designplan_file'];?>" style="width:400px;height:260px; "/> 
									<?}else{ ?>
										<img src="img/noimg.jpg"  style="width:400px;height:260px; "/> 
									<?}?>
								</div>
								<div class="row mt-4">
								 <b><h5 style="padding-left:15%;">แบบแปลนโครงการ  <?echo $rows['project_name'];?></h5></b>
								</div>
							</div>
						</li>
					 </ul>
			<form action="save_homeproject.php" method="POST" class="form-horizontal tasi-form">
					<ul class="nav nav-pills nav-stacked mail-nav" style="padding-left: 40px;">
						  <input type="hidden" name="home_id" value="<?echo $rows['home_id'];?>">
						  <li class="active row row-lg-12 ">
							  <div class="form-group col-lg-4" style="padding-right: 20px;padding-left: 20px;">
								<label class="col-lg-4 control-label">แปลงที่ :</label>
								<div class="col-lg-4">
									<input type="text" name="lot_no" class="form-control" value="<?echo $rows['lot_no'];?>">
								</div>
							  </div>
							  <div class="form-group col-lg-4" style="padding-right: 20px;padding-left: 20px;">
								<label class="col-lg-4 control-label ">เนื้อที่ :</label>
								<div class="col-lg-4">
									<input type="text" name="area" class="form-control" value="<?echo $rows['area'];?>">
								</div>
								<label class="col-lg-4 control-label">ตร.วา</label>
							  </div>
							  <div class="form-group col-lg-4" style="padding-right: 20px;padding-left: 20px;">
								<label class="col-lg-4 control-label">พื้นที่ใช้สอย :</label>
								<div class="col-lg-4">
									<input type="text" name="living_space" class="form-control" value="<?echo $rows['living_space'];?>">
								</div>
								<label class="col-lg-4 control-label">ตร.เมตร</label>
							  </div>
						  </li>
						  <li class="active row row-lg-6 ">
							<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
								<label class="control-label col-lg-1">ที่อยู่ :</label>
								<div class="col-lg-4">
									<textarea name="address" class="form-control" value="<?echo $rows['address'];?>" >
											<?if($rows['address']){
												echo $rows['address'];
											}?>
									</textarea>
								</div>
							 </div>
						  </li>
						  <li class="active row row-lg-12 ">
								<div class="row" style="padding-left:60%;">
									<div class="col col-lg-3">
										<button type="submit" class="btn btn-theme " > &nbsp;อัพเดต</button>
									</div>
									<div class="col col-lg-3  ">
										<button type="reset" onclick="home_project('0');" class="btn btn-theme04" > &nbsp;ยกเลิก</button>
									</div>
								</div>
						  </li>
					</ul>
			
			</form>
			<hr>
			<ul class="nav nav-pills nav-stacked mail-nav" style="padding-left: 40px;">
						 
				<li class="active row row-lg-12 ">
				<div class="row row-6 form-group " style="padding-right: 20px;padding-left: 20px;">
						<?
						require_once("config.inc.php");
						$sql_file="select * from reserve_file where reserve_home_id='".$id."'";
						$result_file=Query($sql_file);
						$i=1;?>
						
			<table class="table table-striped table-advance table-hover">
                <thead>
                  <tr class="row-12">
                    <th><i class="fa fa-bookmark col-3"></i> &nbsp; &nbsp; ลำดับที่</th>
                    <th class="hidden-phone col-3"><i class="fa fa-folder"></i> &nbsp;ชื่อไฟล์</th>
                    <th><i class="fa fa-folder-open col-4"></i> &nbsp;ไฟล์เอกสาร</th>
                    <th><i class="col-1"></i> &nbsp;</th>
                    <th><i class="col-1"></i> &nbsp;</th>
					
                  </tr>
                </thead>
                <tbody>
				<?
						while($rowsfile=mysql_fetch_assoc($result_file)){
							echo $rowsfile['reserve_fileID'];
							?>
                  <tr class="row-12" >
                    <td class="col-3"><h4><?echo $i++;?></h4></td>
					<td class="col-3"><h4><?echo $rowsfile['file_name'];?></h4></td>
					<td class="col-4"><h4><?echo $rowsfile['fileUpload'];?></h4></td>
					<td class="col-1"><h4><a href="reserve_upload/<?echo $rowsfile['fileUpload'];?>"  target="_blank" ><i class="fa fa-eye"></i> &nbsp;ดูไฟล์</a></h4></td>
					<td class="col-1">
						<h4><a onclick="if(confirm('ดำเนินการลบไฟล์<?echo $rowsfile['file_name'];?>   ออกจากระบบหรือไม่ ?')){delete_filereserve('<?echo $rowsfile['reserve_fileID'];?>');}"><i class="fa fa-trash-o "></i>&nbsp; &nbsp;ลบ</a></h4>
                    </td>
					<?}
						?>
					
                  </tr>
                  
                </tbody>
			</table>
            
						
					</div>
				</li>
						  
					</ul>
			</section>
		</div>
		</div>
	</div>
