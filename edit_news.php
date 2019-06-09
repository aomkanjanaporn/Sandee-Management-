<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}
    $id = $_POST['id'];
	$sql="select * from news where news_id='".$id."' ";
	$result=Query($sql);
	$rows=mysql_fetch_assoc($result);
	echo $rows['news_id'];
	include("layoutsBS/header.php");
	

?>
	<div class="row mt">
          <div class="col-sm-12">
		  <div class="container">
            <section class="panel">
					
					<br>
					<ul class="nav nav-pills nav-stacked mail-nav row-lg-12" style="padding-right: 350px;padding-left: 300px;">		
						<li class="active ">
							<div class="form-group col-lg-6" style="padding-left:20%;">
								<div class="row">
									<? if($rows['news_img']){ ?> 
										<img src="news_img/<?echo $rows['news_img'];?>"  style="width:460px;height:260px; "/> 
									<?}else{ ?>
										<img src="img/noimg.jpg" style="width:460px;height:260px; "/> 
									<?}?>
								</div>
							
							</div>
						</li>
					</ul>
			
				<form action="news_file.php" class="form-horizontal tasi-form" enctype="multipart/form-data"  method="post">
				
				<input type="hidden" name="news_id" value="<?echo $rows['news_id'];?>" class="form-control">
					<ul class="nav nav-pills nav-stacked mail-nav" style="padding-right: 60px;padding-left: 60px;">
						<li class="active row row-lg-12">
							<div class="form-group col-lg-12" style="padding-right: 20px;padding-left: 20px;">
								<label class="col-sm-5 control-label col-lg-3"><h5>อัพเดตรูปภาพข่าว/กิจกรรม </h5></label>
								<div class="col-lg-5">
									<input type="file" name="news_img" class="form-control"  > 
								</div>
								<div class="col-lg-2">
									<button type="submit" name="news_img" class="btn btn-theme" > อัพเดต </button>
								</div>
							</div>
						</li>
					</ul>
				</form>
				<form action="save_news.php" class="form-horizontal tasi-form" enctype="multipart/form-data"  method="post">
				<input type="hidden" name="project_id" value="<?echo $rows['project_id'];?>" class="form-control"> 
				<input type="hidden" name="news_id" value="<?echo $rows['news_id'];?>" class="form-control"> 
					<ul class="nav nav-pills nav-stacked mail-nav" style="padding-right: 60px;padding-left: 60px;">
						<li class="active row ">
						  <div class="form-group  row-sm-12" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-2 control-label ">หัวข้อข่าว/กิจกรรม :</label>
							<div class="col-sm-10">
								<input type="text" name="news_title" class="form-control" value="<?echo $rows['news_title'];?>">
							</div>
						  </div>
						</li>
					</ul>
					<ul class="nav nav-pills nav-stacked mail-nav" style="padding-right: 60px;padding-left: 60px;">
						<li class="active row ">
						  <div class="form-group  row-sm-12" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-2 control-label ">เนื้อหา ส่วนต้น:</label>
							<div class="col-sm-10">
								<textarea class="form-control "  name="news_bodyf" cols="[10]" rows="[10]" required=""  style="display:block;width:700px;height:150px;"><?echo $rows['news_bodyf'];?></textarea>
								
							</div>
						  </div>
						</li>
					</ul>
					<ul class="nav nav-pills nav-stacked mail-nav" style="padding-right: 60px;padding-left: 60px;">
						<li class="active row ">
						  <div class="form-group  row-sm-12" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-2 control-label ">เนื้อหา ส่วนกลาง:</label>
							<div class="col-sm-10">
								<textarea class="form-control "  name="news_bodym" cols="[10]" rows="[10]" required=""  style="display:block;width:700px;height:150px;"><?echo $rows['news_bodym'];?></textarea>
								
							</div>
						  </div>
						</li>
					</ul>
					<ul class="nav nav-pills nav-stacked mail-nav" style="padding-right: 60px;padding-left: 60px;">
						<li class="active row ">
						  <div class="form-group  row-sm-12" style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-2 control-label ">เนื้อหา ส่วนท้าย:</label>
							<div class="col-sm-10">
								<textarea class="form-control "  name="news_bodyl" cols="[10]" rows="[10]" required="" style="display:block;width:700px;height:150px;"><?echo $rows['news_bodyl'];?></textarea>
							</div>
						  </div>
						</li>
					</ul>
					<br><br><br>
					<ul class="nav nav-pills nav-stacked mail-nav" style="padding-right: 60px;padding-left: 60px;">
						<li class="active row ">
							<div class="row" style="padding-left:60%;">
								<div class="col col-lg-4">
									<button type="submit" class="btn btn-theme " ><i class="fa fa-plus"></i> &nbsp;บันทึก</button>
								</div>
								<div class="col col-lg-4  ">
									<button type="reset" onclick="news();" class="btn btn-theme02" ><i class="fa fa-minus"></i> &nbsp;ยกเลิก</button>
								</div>
							</div>
						</li>
					</ul>
			</form>
					<br><br><br>
				</div>
			</section>
		</div>
	</div>
