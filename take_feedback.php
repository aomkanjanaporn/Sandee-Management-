<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}
    $id = $_POST['id'];
	$sql_file="select * from reserve_file where reserve_home_id='".$id."'";
						$result_file=Query($sql_file);
						$i=1;
	include("layoutsBS/header.php");


?>
<div class="row mt">
	<div class="col-sm-12">
		<div class="container">
            <section class="panel">
			<b><h3 style="padding-left: 40px;">รายการเอกสาร</h3></b>
			<ul class="nav nav-pills nav-stacked mail-nav" style="padding-left:40px;">		 
				<li class="active row row-lg-12 ">
					<div class="row row-6 form-group" style="padding-right: 20px;padding-left: 20px;">		
						<table class="table table-striped table-advance table-hover">
							<thead>
							  <tr class="row-12">
								<th><i class="fa fa-bookmark col-3"></i> &nbsp; &nbsp; ลำดับที่</th>
								<th class="hidden-phone col-3"><i class="fa fa-folder"></i> &nbsp;ชื่อไฟล์</th>
								<th><i class="fa fa-folder-open col-4"></i> &nbsp;ไฟล์เอกสาร</th>
								<th><i class="col-1"></i> &nbsp;</th>
								<th><i class="col-1"></i> &nbsp;</th>
							  </tr>
							</thead>
							<tbody>
							<?
									while($rowsfile=mysql_fetch_assoc($result_file)){
										
										?>
							  <tr class="row-12" >
								<td class="col-3"><h4><?echo $i++;?></h4></td>
								<td class="col-3"><h4><?echo $rowsfile['file_name'];?></h4></td>
								<td class="col-4"><h4><?echo $rowsfile['fileUpload'];?></h4></td>
								<td class="col-1"><h4><a href="reserve_upload/<?echo $rowsfile['fileUpload'];?>"  target="_blank" ><i class="fa fa-eye"></i> &nbsp;ดูไฟล์</a></h4></td>
								<td class="col-1"><h4><a href="take_feedback_print.php?file=<?echo $rowsfile['fileUpload'];?>"  target="_blank" ><i class="fa fa-print"></i> &nbsp;พิมพ์</a></h4></td>
								<?}
									?>
								
							  </tr>
							  
							</tbody>
			</table>
            
						
					</div>
				</li>
						  
					</ul>
			</section>
		</div>
		</div>
	</div>
