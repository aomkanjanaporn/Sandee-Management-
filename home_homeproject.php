<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}

	include("layoutsBS/header.php");
?>
 <div class="row mt">
          <div class="col-sm-12">
		  <div class="container">
		  
        <section class="panel">
        <h3 ><b>&nbsp; &nbsp;เลือกโครงการจัดการบ้าน</b></h3>
            <div class="panel-body minimal">
                <div class="table-inbox-wrap ">
					<table class="table table-striped table-advance table-hover">
					<hr>
						<thead>
							 <tr>
								<th>ลำดับที่</th>
								<th>#</th>
								<th><i class="fa fa-user"></i>  &nbsp; &nbsp;  ชื่อโครงการ</th>
								<th colspan="2">Action</th>
							 </tr>
						</thead>
						<tbody class="row row-12">
							<?
							$sql="select * from project ";
							$result=Query($sql);
							$i=1;
							while($rows=mysql_fetch_assoc($result)){
								?>
								
								<?if($_SESSION['class']==2){
									?>
									<tr>
								<td class="col-lg-2"><?echo $i++;?></td>
								<td class="col-lg-4"><img src="barn_img/<?echo $rows['project_image'];?>" class="img-circle" width="50" height="50"/></td>
								<td class="col-lg-4"><?echo $rows['project_name'];?></td>
								<td class="col-lg-2"><a  class="btn btn-theme" onclick="create_homeprojectlist('<?echo $rows['project_id'];?>');"><i class="fa fa-pencil"> จัดการ  </a></td>
								</tr>
									<?
								}elseif($_SESSION['class']==1&&($rows['project_id']==$_SESSION['user_project'])){?>
									<tr>
								<td class="col-lg-2"><?echo $i++;?></td>
								<td class="col-lg-4"><img src="barn_img/<?echo $rows['project_image'];?>" class="img-circle" width="50" height="50"/></td>
								<td class="col-lg-4"><?echo $rows['project_name'];?></td>
								<td class="col-lg-2"><a  class="btn btn-theme" onclick="create_homeprojectlist('<?echo $rows['project_id'];?>');"><i class="fa fa-pencil"> จัดการ  </a></td>
								</tr>
								<?}elseif($_SESSION['class']==0){
									
									?>
									<tr>
								<td class="col-lg-2"><?echo $i++;?></td>
								<td class="col-lg-4"><img src="barn_img/<?echo $rows['project_image'];?>" class="img-circle" width="50" height="50"/></td>
								<td class="col-lg-4"><?echo $rows['project_name'];?></td>
								<td class="col-lg-2"><a  class="btn btn-theme" onclick="create_homeprojectlist('<?echo $rows['project_id'];?>');"><i class="fa fa-pencil"> จัดการ  </a></td>
								</tr>
									<?
								}?>
								<?
								
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