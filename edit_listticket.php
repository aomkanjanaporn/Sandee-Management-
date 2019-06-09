<?
require_once("config.inc.php");
include("layoutsBS/header.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}

$id = $_POST['id'];
?>
      <div class="row mt">
          <div class="col-md-6 col-md-offset-3">
            <section class="panel">
				<div class="panel-body" >
				<div class="row row-12 form-group " >
				<?
								$sql="select * from ticket inner join user on ticket_user_id=user_id 
								inner join ticket_status on status_id=ticket_status
								inner join fix_type on fix_id=ticket_fix_id
								where ticket_user_id='".$id."' ";
								
								$result=Query($sql);
								$i=1;
								
								?>
						
						
					</div>
							<h3 >	
				
					<table class="table table-striped table-advance table-hover">
								<hr>
								<thead>
								  <tr>
									<th>ลำดับที่</th>
									<th><i class="fa fa-cog"></i> &nbsp; &nbsp; ประเภทการแจ้งซ่อม</th>
									<th><i class=" fa fa-cog"></i> &nbsp; &nbsp; หัวข้อการแจ้งซ่อม</th>
									<th >วันที่แจ้ง</th>
									<th>สถานะการแจ้งซ่อม</th>
									<th colspan="2">Action</th>
									
								  </tr>
								</thead>
								<tbody>
								<?while($rows=mysql_fetch_assoc($result)){?>
								  <tr>
									<td>&nbsp; &nbsp;<?echo $i++ ;?>  .</td>
									<td><?echo $rows['fix_name'];?></td>
									<td><?echo $rows['ticket_title']; ?></td>
									<td><?echo $rows['ticket_datetime']; ?></td>
									<td><?if($rows['ticket_status']==1){?>
											<span class="label label-danger label-mini"><?echo $rows['status_name'];?></span>
									<?}else if($rows['ticket_status']==2){?>
											<span class="label label-success label-mini"><?echo $rows['status_name'];?></span>
									<?}else{?>
											<span class="label label-warning  label-mini"><?echo $rows['status_name'];?></span>
									<?}?>
									
									</td>
									<td ><a onclick="edit_ticket('<?echo $rows['ticket_id'];?>')"><i class="fa fa-pencil-square-o"></i></a></td>
									     
								  </tr>
								  
								<?	
								}
								?>
								</tbody>
							</table>
							
                 </h3>
				</div>
            </section>
          </div>
          

