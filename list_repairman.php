<?
require_once("config.inc.php");
include("layoutsBS/header.php");
 
 $project_id = $_POST['project_id'];
?>
        <div class="row mt">
          <div class="col-sm-4">
            <section class="panel">
				<div class="panel-body" >
				<h5><b> เพิ่มรายชื่อช่าง</b></h5>
				<h5 style="padding-left: 30px;" ><b>
				<?
					$sql_project="select * from project where project_id = '".$project_id."'";
					$result_project=Query($sql_project);
					while($rows_project=mysql_fetch_assoc($result_project)){
						echo $rows_project['project_name'];
					}?>
					</b></h5>
					<form action="add_repaiman.php" class="form-horizontal tasi-form" method="post">
						<ul class="nav nav-pills nav-stacked mail-nav">
					      <input type="hidden" name="project_id" class="form-control" value="<?echo $project_id;?>">
						  <li class="active ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ชื่อ-นามสกุลช่าง :</label>
							<div class="col-lg-8">
								<input type="text" name="name_repairman" class="form-control" required>
							</div>
						  </div>
						  </li>
						  
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4"> เลือกประเภทช่าง :</label>
							<div class="col-lg-8">
								<select name="type_repairman"  style="width:170px;height:30px;" class="form-control">
										<option >กรุณาเลือกประเภทช่าง</option>
										<?
											$sql="select * from fix_type order by fix_name";
											$result=Query($sql);
											while($rows=mysql_fetch_assoc($result)){
										?>
											<option value="<?echo $rows['fix_id'];?>"><?echo $rows['fix_name'];?></option>
										<?}?>
									</select>
							</div>
						  </div>
						  </li>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">เบอร์โทรศัพท์ :</label>
							<div class="col-lg-8">
								<input type="text" name="tel_repairman" class="form-control" required>
							</div>
						  </div>
						  </li>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ไอดีไลน์ :</label>
							<div class="col-lg-8">
								<input type="text" name="line_repairman" class="form-control" required>
							</div>
						  </div>
						  </li> 
						  <li class="active  ">
						  <div class="form-group row row-lg-6" style="padding-right: 20px;padding-left: 20px;">
						  <div class="col-lg-6">
						  </div>
							<div class="col-lg-3 ">
								<button class="btn btn-theme" type="submit">บันทึก</button>
							</div>
							<div class="col-lg-3 ">
								<button class="btn btn-theme02" type="reset">ยกเลิก</button>
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
			<h4><b>&nbsp; &nbsp; &nbsp; &nbsp;รายชื่อช่าง</b></h4>
              <div class="panel-body minimal">
				
                <div class="table-inbox-wrap ">

                  <table class="table table-striped table-advance table-hover">
                <hr>
                <thead>
                  <tr>
                    <th>ลำดับที่</th>
                    <th>ประเภทช่าง</th>
                    <th><i class="fa fa-user"></i>  &nbsp; &nbsp;  ชื่อช่าง</th>
                    <th><i class="fa fa-bookmark"></i> &nbsp; &nbsp; Line ID</th>
                    <th><i class=" fa fa-phone"></i> &nbsp; &nbsp; เบอร์โทรศัพท์</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
<?

$sql="select * from repairman  inner join fix_type on fix_id=type_repairman where project_id = '".$project_id."' ";
$result=Query($sql);
$i=1;

while($rows=mysql_fetch_assoc($result)){
?>
                  <tr>
                    <td>&nbsp; &nbsp;<?echo $i++ ;?>  .</td>
					<td><?echo $rows['fix_name']; ?></td>
                    <td><?echo $rows['name_repairman'];?></td>
                    <td><?echo $rows['line_repairman'];?></td>
					<td><?echo $rows['tel_repairman']; ?></td>
                    <td onclick="edit_repairman('<?echo $rows['repairman_id'];?>','<?echo $project_id;?>');"><i class="fa fa-pencil-square-o"><td>
                    <td onclick="delete_repairman('<?echo $rows['repairman_id'];?>');"><i class="fa fa-trash-o"><td>
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
