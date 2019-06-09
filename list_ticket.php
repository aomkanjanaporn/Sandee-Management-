<?
require_once("config.inc.php");
include("layoutsBS/header.php");
$id = $_POST['id'];
?>
 <div class="row row-sm-12 mt">
     <div class="col-sm-12 row row-lg-12">
        <section class="panel col-lg-12" style="padding-right: 20px;padding-left: 20px;">
			<div class="panel-body" >
                <h3 >
					<div class="row row-12 form-group " >
						<div class="col-lg-10">
							<b>&nbsp; &nbsp; &nbsp; &nbsp;รายการแจ้งซ่อม</b>
						
						</div>
						<div class="col-lg-2">
							<button onclick="list_repairman('<?echo $id;?>')" type="button" class="btn btn-theme02">ดูรายชื่อช่าง</button>
						</div>
						
					</div>
							<table class="table table-striped table-advance table-hover">
								<hr>
								<thead>
								  <tr>
									<th>ลำดับที่</th>
									<th><i class="fa fa-user"></i></th>
									<th>  &nbsp; &nbsp;  ชื่อ-นามสกุลผู้แจ้ง</th>
									<th>สถานะการแจ้งซ่อม</th>
									<th colspan="2">Action</th>
								  </tr>
								</thead>
								<tbody>
									<?
									$sql="select * from user inner join ticket on user_id=ticket_user_id where user_project= '".$id."'  group by ticket_user_id desc" ;
									$result=Query($sql);
									$i=1;

									while($rows=mysql_fetch_assoc($result)){
									?>
									  <tr>
										<td>&nbsp; &nbsp;<?echo $i++ ;?>  .</td>
										<td><img src="user_img/<?echo $rows['user_img'];?>" class="img-circle" width="40"></td>
										<td><?echo $rows['user_name'];?>&nbsp; &nbsp; &nbsp;<?echo $rows['user_sname'];?></td>
										<td><?if($rows['ticket_status']==1){?>
												<span class="label label-warning label-mini">new</span>
										<?}else{?>
												<span class="label label-success label-mini">success</span>
										<?}?>
										</td>
										<td ><a onclick="edit_listticket('<?echo $rows['user_id'];?>')"><i class="fa fa-pencil-square-o"></i></a></td>    
									  </tr>
									  
									<?	
									}
									?>
								</tbody>
							</table>
                </h3>
            
          </div>
		  </section>
		  <br>
		  
      </div>
       
	  
	
</div>

<?
include("layoutsBS/footer.php");
?>
