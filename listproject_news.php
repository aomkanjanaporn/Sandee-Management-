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
        <h2 ><b>&nbsp; &nbsp;เลือกโครงการแจ้งข่าวสารและกิจกรรม</b></h2>
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
						<tbody>
							<?
							$sql="select * from project ";
							$result=Query($sql);
							$i=1;
							while($rows=mysql_fetch_assoc($result)){
								?>
								
								
								<?if($_SESSION['class']==2){
									?>
									<tr>
									<td><?echo $i++;?></td>
									<td><img src="barn_img/<?echo $rows['project_image'];?>" class="img-circle" width="50" height="50"/></td>
									<td><?echo $rows['project_name'];?></td>
									<td class="cpt" onclick="create_news('<?echo $rows['project_id'];?>');"><i class="fa fa-pencil-square-o"></td>
									</tr>
									<?
								}elseif($_SESSION['class']==1&&($rows['project_id']==$_SESSION['user_project'])){?>
									<tr>
									<td><?echo $i++;?></td>
									<td><img src="barn_img/<?echo $rows['project_image'];?>" class="img-circle" width="50" height="50"/></td>
									<td><?echo $rows['project_name'];?></td>
									<td class="cpt" onclick="create_news('<?echo $rows['project_id'];?>');"><i class="fa fa-pencil-square-o"></td>
									</tr>
								<?}elseif($_SESSION['class']==0){
									
									?>
									<tr>
									<td><?echo $i++;?></td>
									<td><img src="barn_img/<?echo $rows['project_image'];?>" class="img-circle" width="50" height="50"/></td>
									<td><?echo $rows['project_name'];?></td>
									<td class="cpt" onclick="create_news('<?echo $rows['project_id'];?>');"><i class="fa fa-pencil-square-o"></td>
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