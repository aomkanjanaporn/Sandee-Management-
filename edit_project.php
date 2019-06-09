<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}
	$sql="select * from project where project_id='".$_POST['id']."'";
	$result=Query($sql);
	$rows=mysql_fetch_assoc($result);	
include("layoutsBS/header.php");
?>
<div class="row mt">
   <div class="col-sm-12">
	<div class="container">
        <section class="panel">
			<h2 ><b>&nbsp; &nbsp; จัดการโครงการ</b></h2>
            <div class="panel-body minimal">
           <form action="save_Pproject.php" method="POST" enctype="multipart/form-data"  class="form-horizontal tasi-form">
			  <input type="hidden" name="project_id" value="<?echo $rows['project_id'];?>">
					 <ul class="nav nav-pills nav-stacked mail-nav" >
						<li class="active col-md-6 col-md-offset-3">
							<div class="form-group " style="padding-left:20%;">
									<? if($rows['project_image']){ ?> 
										<img alt="avatar"  src="barn_img/<?echo $rows['project_image'];?>" class=" img-circle " width="200" height="200">
									<?}else{ ?>
										<img src="img/noimg.jpg" class=" img-circle " width="200" height="200"/> 
									<?}?>
								<div class="row mt-4">
								 <b><h5 style="padding-left:5%;">โปรไฟล์โครงการ  <?echo $rows['project_name'];?></h5></b>
								</div>
							</div>
						</li>
						<li class="active col-md-6 col-md-offset-3">
							<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
								<label class="col-sm-3 control-label col-lg-3"><h5>โปรไฟล์โครงการ </h5></label>
								<div class="col-lg-6">
									<input type="file" name="profile_project" class="form-control"> 
								</div>
								<div class="col-lg-3">
									<input type="submit" class="btn btn-theme"> 
								</div>
							</div>
						</li>
					</ul>
			</form>
			<form action="save_project.php" method="POST" enctype="multipart/form-data" id="manage-employee-profile" class="">
				<input type="hidden" name="id" value="<?echo $rows['project_id'];?>">
				<ul class="nav nav-pills nav-stacked mail-nav" >
					<li class="active col-md-6 col-md-offset-3">
						<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-3 control-label col-lg-3"><h5>ชื่อโครงการ </h5></label>
							<div class="col-lg-6">
								<input type="text" class="form-control br5" name="name" value="<?echo $rows['project_name'];?>" required>
							</div>
						</div>
					</li>
					<li class="active col-md-6 col-md-offset-3">
						<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
							<label class="col-sm-3 control-label col-lg-3"><h5>เบอร์ :</h5></label>
							<div class="col-lg-6">
								<input type="text" class="form-control br5" name="tel" value="<?echo $rows['project_tel'];?>" required>
							</div>
						</div>
					</li>
					
				</ul>
				<table style="font-weight:bold;">
					<tr><td colspan="1">ชื่อโครงการ</td><td colspan="1">
					<input type="text" class="form-control br5" name="name" value="<?echo $rows['project_name'];?>" required></td></tr>
					<tr><td colspan="1">เบอร์</td><td colspan="1">
					<input type="text" class="form-control br5" name="tel" value="<?echo $rows['project_tel'];?>" required></td></tr>

					<tr><td colspan="1">ที่อยู่</td><td colspan="1">
					<textarea name="address" style="width:300px;height:100px;">
					<?echo $rows['project_address'];?>
					</textarea>

					<tr><td colspan="1" >รายละเอียด</td><td colspan="1">
					<textarea name="desc" style="width:300px;height:100px; ">
					<?echo $rows['project_desc'];?>
					</textarea>

					<tr><td colspan="1">โปรโมชั่น : 1</td><td colspan="1">
					<input type="text" class="form-control br5" name="project_promotion" size=42  value="<?echo $rows['project_promotion'];?>" required></td></tr>
					<tr><td colspan="1">โปรโมชั่น : 2</td><td colspan="1">
					<input type="text" class="form-control br5" name="project_promotion2" size=42  value="<?echo $rows['project_promotion2'];?>" required></td></tr>
					<tr><td colspan="1">โปรโมชั่น : 3</td><td colspan="1">
					<input type="text" class="form-control br5" name="project_promotion3" size=42  value="<?echo $rows['project_promotion3'];?>" required></td></tr>
					<tr><td colspan="1">โปรโมชั่น : 4</td><td colspan="1">
					<input type="text" class="form-control br5" name="project_promotion4" size=42  value="<?echo $rows['project_promotion4'];?>" required></td></tr>
					<tr><td colspan="1">โปรโมชั่น : 5</td><td colspan="1">
					<input type="text" class="form-control br5" name="project_promotion5" size=42  value="<?echo $rows['project_promotion5'];?>" required></td></tr>

					<tr><td colspan="2">

					<button type="submit" class="btn btn-theme" id="btn-submit-ajax"><i class="fa fa-plus"></i> &nbsp;บันทึก</button>
					<button type="button" onclick="window.location.href='home.php'" class="btn btn-theme04"><i class="fa fa-minus"></i> &nbsp;ยกเลิก</button>
					<button type="button" class="btn btn-theme04"  onclick="if(confirm('คุณต้องการที่จะลบโครงการ <?echo $rows['project_name'];?> ใช่หรือไม่')){window.location.href='delete_project.php?id=<?echo $rows['project_id'];?>'}"><i class="fa fa-minus"></i> &nbsp;ลบโครงการ</button>
					</td></tr>



					</table>
			</form>
			<ul class="nav nav-pills nav-stacked mail-nav" >
						<li class="active ">
							<div class="form-group " style="padding-left:20%;">
								<b><h3 style="padding-left:5%;">รูปภาพของโครงการ ขนาดของรูปภาพ กว้าง = 300 สูง = 300</h3></b>
									<form action="upload_project_image.php" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="xid" value="<?echo $rows['project_id'];?>">									
										<input type="file" name="files[]"  multiple accept="image/*" />			
										<button type="submit" class="cpt btn-theme" id="btn-submit-ajax"><i class="fa fa-plus"></i> &nbsp; เพิ่มรูปโครงการ</button>
									</form>
								
							</div>
						</li>
					</ul>
					<ul class="nav nav-pills nav-stacked mail-nav" >
						<li class="active col-md-12 ">
							<div class="form-group " >
								
<?
$sql="select * from project_img where img_project_id='".$rows['project_id']."' order by img_id desc";
						$result=Query($sql);
						while($rows=mysql_fetch_assoc($result)){
							?>
							<img src="photo_gallery/<?echo $rows['img_name'];?>" style="width:150px;margin:10px;padding:5px;border:1px solid gray;"/>
							<?
						}
					
?>

								</div>
							</div>
						</li>
					</ul>
			</div>		   
        </section>
	</div>
  </div>
</div>
