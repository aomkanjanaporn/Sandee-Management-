<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}

	include("layoutsBS/header.php");
?>

   <?
						$sql="select * from project where project_id='".$_POST['id']."'";
						$result=Query($sql);
						while($rows=mysql_fetch_assoc($result)){
							?>
					

<div class="row mt">
    <div class="col-sm-4">
        <section class="panel">
			<div class="panel-body" >
				<div class="row row-12">
					<div class="col-lg-10">
						<h3><b> เพิ่มรายการบ้านในโครงการ </b></h3>
					</div>
				</div>
				<div class="row row-12">
					<div class="col-lg-1">
					</div>
						<div class="col-lg-6">
							<h4><b>โครงการ &nbsp;&nbsp;&nbsp; <?echo $rows['project_name'];?><h4><b>
						</div>
				</div>
					
			
			
			<form action="add_designplan.php" method="POST" enctype="multipart/form-data" id="manage-employee-profile" class="form-horizontal tasi-form">
			  <input type="hidden" name="project_id" value="<?echo $rows['project_id'];?>">
				
					 <ul class="nav nav-pills nav-stacked mail-nav" >
						<li class="active ">
							<div class="form-group " style="padding-left:20%;">
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
					 
					<li class="active ">
						<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-3 control-label col-lg-3"><h5>ไฟล์แปลนโครงการ </h5></label>
							<div class="col-lg-6">
								<input type="file" name="design_plan" class="form-control"> 
							</div>
							<div class="col-lg-3">
								<input type="submit" class="btn btn-theme"> 
							</div>
						</div>
					</li>
					</ul>
			</form>
			<form action="add_home.php" method="POST" enctype="multipart/form-data" id="manage-employee-profile" class="form-horizontal tasi-form">
				<ul class="nav nav-pills nav-stacked mail-nav ">
					<li class="active  ">
						<div class="form-group row row-12 mt-4" style="padding-left: 60px;">
						<?
							$sqlHome="select * from home where home_project_id='".$rows['project_id']."'";
							$resultHome=Query($sqlHome);
							$row=mysql_num_rows($resultHome);  	
						?> 
							<div class="col-lg-9 ">
									<label class="col-sm-4 control-label col-lg-4"><b><h5>จำนวนบ้าน </h5></b></label>
									<label class="col-sm-4 control-label col-lg-4"><b><h1><?echo $row;?> </h1></b></label>
									<label class="col-sm-4 control-label col-lg-4"><b><h5>หลัง</h5></b></label>
								</div>
						 </div>
					</li>
					<li class="active row row-lg-12 ">
						<div class="form-group col-lg-12" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-lg-3 control-label">แปลงที่ :</label>
							<div class="col-lg-6">
									<input type="text" name="lot_no" class="form-control" value="<?echo $rows['lot_no'];?>">
							</div>
						</div>
							
					</li>
					<li class="active row row-lg-12 ">
					 <div class="form-group col-lg-12" style="padding-right: 20px;padding-left: 20px;">
								<label class="col-lg-3 control-label ">เนื้อที่ :</label>
								<div class="col-lg-6">
									<input type="text" name="area" class="form-control" value="<?echo $rows['area'];?>">
								</div>
								<label class="col-lg-3 control-label">ตร.วา</label>
							  </div>
					</li>
					<li class="active row row-lg-12 ">
							  <div class="form-group col-lg-12" style="padding-right: 20px;padding-left: 20px;">
								<label class="col-lg-3 control-label">พื้นที่ใช้สอย :</label>
								<div class="col-lg-6">
									<input type="text" name="living_space" class="form-control" value="<?echo $rows['living_space'];?>">
								</div>
								<label class="col-lg-3 control-label">ตร.เมตร</label>
							  </div>
					</li>
					<li class="active row row-lg-12 ">
							  <div class="form-group row row-12 mt-4" style="padding-left: 60px;">
								<div class="col-lg-3" >
									<input type="hidden" name="project_id" value="<?echo $rows['project_id'];?>">
									<button type="submit" class="btn btn-theme02" width="40px" height="20px">เพิ่มบ้าน</button>
								</div>
						</div>
							  </div>
					</li>
				</ul>
			</form>


</section>
			</div>
		
	
	<div class="col-sm-7">
        <section class="panel">
        <h4 ><b>&nbsp; &nbsp; รายการบ้านในโครงการ </b></h4>
            <div class="panel-body minimal">
                <div class="table-inbox-wrap ">
					<table class="table table-striped table-advance table-hover">
					<hr>
						<thead>
							 <tr>
								<th>ลำดับที่</th>
								<th><i class="fa fa-user"></i>  &nbsp; &nbsp;  แปลงที่</th>
								<th><i class="fa fa-user"></i>  &nbsp; &nbsp;  บ้านเลขที่</th>
								<th colspan="2">Action</th>
							 </tr>
						</thead>
						<tbody class="row row-12" >
						<?
							$i=1;
							while($rowHome=mysql_fetch_assoc($resultHome)){
							?>
					
								<tr>
								<td class="col-lg-2" ><?echo $i++;?></td>
								<td class="col-lg-3"><?echo $rowHome['lot_no'];?></td>	
								<td class="col-lg-5"><?echo $rowHome['address'];?></td>
								<td class="col-lg-2" ><a class="btn btn-theme" onclick="edit_homeproject('<?echo $rowHome['home_id'];?>')" ><i class="fa fa-pencil">แก้ไข</i></a></td>

								</tr>
								<?
								
							}
						}
							?>
						</tbody>
					</table>
				</div>
              </div>
        </section>
    </div>
	
</div>
</div>