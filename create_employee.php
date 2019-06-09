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
        <h3 ><b>&nbsp; &nbsp;จัดการชื่อผู้ใช้พนักงาน</b></h3>
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
								<tr>
								<td><?echo $i++;?></td>
								<td><img src="barn_img/<?echo $rows['project_image'];?>" class="img-circle" width="50" height="50"/></td>
								<td><?echo $rows['project_name'];?></td>
								<td class="cpt" onclick="create_useremployee('<?echo $rows['project_id'];?>');"><i class="fa fa-pencil"> เพิ่มรายชื่อ</td>
								
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