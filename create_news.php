<?
include("layoutsBS/header.php");
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}

	
	$project_id=$_POST['id'];
	$sqlproject="select * from project where project_id='".$project_id."' ";
	$result1=Query($sqlproject);
	$rowp=mysql_fetch_assoc($result1);
?>
      <div class="row mt">
          <div class="col-sm-4">
            <section class="panel">
				<div class="panel-body" >
				<form action="add_profilenews.php" method="POST" enctype="multipart/form-data" id="manage-employee-profile" class="form-horizontal tasi-form">
					<input type="hidden" name="project_id" value="<?echo $project_id;?>">
				
					 <ul class="nav nav-pills nav-stacked mail-nav" >
						<li class="active ">
							<div class="form-group " style="padding-left:20%;">
							<?	
								$sqlfilenews="select * from profile_news where project_id='".$project_id."' ";
								$resultnews=Query($sqlfilenews);
								$rownews=mysql_fetch_assoc($resultnews);
							?>
								<div class="row">
									<? if($rownews['file_name']){ ?> 
										<img src="profile_news/<?echo $rownews['file_name'];?>" style="width:400px;height:260px; "/> 
									<?}else{ ?>
										<img src="img/noimg.jpg"  style="width:400px;height:260px; "/> 
									<?}?>
								</div>
								<div class="row mt-4">
								 <b><h5 style="padding-left:15%;">โปรไฟล์โครงการ  <?echo $rowp['project_name'];?></h5></b>
								</div>
							</div>
						</li>
					 
					<li class="active ">
						<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-3 control-label col-lg-3"><h5>อัพเดตโปรไฟล์</h5></label>
							<div class="col-lg-6">
								<input type="file" name="profile_news" class="form-control"> 
							</div>
							<div class="col-lg-3">
								<input type="submit" class="btn btn-theme"> 
								
							</div>
						</div>
					</li>
					</ul>
			</form>
			<hr>
				<h3><b> อัพเดตข่าวสารและกิจกรรม </b></h3>
				<h3><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				โครงการ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				<?echo $rowp['project_name'];?> </b></h3>
					<form action="add_news.php" class="form-horizontal tasi-form" enctype="multipart/form-data"  method="post">
					<input type="hidden" name="project_id" class="form-control" value="<?echo $rowp['project_id'];?>">
					<br>
					<br>
						<ul class="nav nav-pills nav-stacked mail-nav">
						  <li class="active ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">ไฟล์แนบ :</label>
							<div class="col-lg-8">
								<input type="file" name="news_img" class="form-control" >
							</div>
						  </div>
						  </li>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">หัวข้อข่าว :</label>
							<div class="col-lg-8">
								<input type="text" name="news_title" class="form-control" required>
							</div>
						  </div>
						  </li>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">เนื้อหา ส่วนต้น:</label>
							<div class="col-lg-8">
								<textarea class="form-control "  name="news_bodyf" cols="[10]" rows="[10]" required="" style="display:block;width:310px;height:100px;"></textarea>
								
							</div>
						  </div>
						  </li>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4" >เนื้อหา ส่วนกลาง:</label>
							<div class="col-lg-8">
								<textarea class="form-control "  name="news_bodym" required=""  cols="[10]" rows="[10]" required="" style="display:block;width:310px;height:100px;"></textarea>
							</div>
						  </div>
						  </li>
						  <li class="active  ">
						  <div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-4 control-label col-lg-4">เนื้อหา ส่วนท้าย:</label>
							<div class="col-lg-8">
								<textarea class="form-control "  name="news_bodyl" required=""  cols="[10]" rows="[10]" required="" style="display:block;width:310px;height:100px;"></textarea>
							</div>
						  </div>
						  </li>
						  <li class="active">
							  <div class="form-group row" style="padding-right: 20px;padding-left: 20px;">
								<div class="col-lg-12">
									<div class="col-md-6 col-md-offset-6 row-12">
										<button type="submit" class="btn btn-theme">บันทึก</button>
									
										<button type="reset" onclick="news();" class="btn btn-theme02">ยกเลิก</button>
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
                <h4 ><b>&nbsp; &nbsp; &nbsp; &nbsp; ข่าวสารและกิจกรรมทั้งหมด</b></h4 >
              <div class="panel-body minimal">
                <div class="table-inbox-wrap ">
                  <table class="table table-striped table-advance table-hover">
                <hr>
                <thead>
                  <tr>
                    <th>ลำดับที่</th>
                    <th><i class="fa fa-user"></i>  &nbsp; &nbsp;  หัวข้อข่าวสารและกิจกรรม</th>
                    <th><i class="fa fa-bookmark"></i> &nbsp; &nbsp; วันที่ประกาศ</th>
					<th colspan="2"></th>
					
                  </tr>
                </thead>
                <tbody>
<?
$sql="select * from news where project_id='".$rowp['project_id']."'  order by create_at DESC";
$result=Query($sql);
$i=1;

while($rows=mysql_fetch_assoc($result)){
?>
                  <tr>
                    <td>&nbsp; &nbsp;<?echo $i++ ;?>  .</td>
                    <td><?echo $rows['news_title'];?></td>
                    <td><?echo $rows['create_at'];?></td>
                     <td>
                      <button class="btn btn-primary btn-xs" onclick="edit_news('<?echo $rows['news_id'];?>')" ><i class="fa fa-pencil"></i>&nbsp; &nbsp;แก้ไช</button>
					  </td>
					  <td>
                      <button class="btn btn-danger btn-xs" onclick="if(confirm('ดำเนินการลบข้อมูลข่าวสารนี้ ออกจากระบบหรือไม่ ?')){delete_news('<?echo $rows['news_id'];?>','<?echo $rowp['project_id']?>');}"><i class="fa fa-trash-o "></i>&nbsp; &nbsp;ลบ</button>
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
