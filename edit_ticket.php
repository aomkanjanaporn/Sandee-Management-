<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}
    $id = $_POST['id'];
    $sql="select * from ticket inner join user on ticket_user_id=user_id 
				   inner join ticket_status on status_id=ticket_status
				   inner join fix_type on fix_id=ticket_fix_id 
				   where ticket_id='".$id."' ";
	$result=Query($sql);
	$rows=mysql_fetch_assoc($result);
	include("layoutsBS/header.php");
	$project_id = $rows['project_id'];
	$fix_id = $rows['fix_id'];

?>

 <section id="main-content">
      <section class="wrapper">
        <div class="col-lg-12 ">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                <div class="row">
					<div class="col-md-8">
						<h1>ใบแจ้งซ่อม</h1>
					</div>
					 <!-- /ใส่วันซ่อมและช่างที่เข้าไปจาก admin -->
					 <form action="save_repair.php" method="POST">
						<div class="col-md-4">
							<h3><b>จัดการใบแจ้ง</b></h3>
							<?
							
							if($rows['repairman_id']){
								$sql_repairman= "select * from repairman  where repairman_id = '".$rows['repairman_id']."'" ;
								$result_repairman=Query($sql_repairman);
								$rows_repairman=mysql_fetch_assoc($result_repairman);
								echo '<h5>ชื่อช่างที่รับผิดชอบ:'.$rows_repairman['name_repairman'].'</h5>' ;
								echo '<h5>วันที่เข้าดำเนินการ : &nbsp;&nbsp;&nbsp;'.$rows['date_repair'].'</h5>' ;
								
							}?>
							<br/>
							<div>
								  <div class="pull-left"> ลูกบ้าน : </div>
								  <div class="pull-right">
									<?
									switch($rows['customer_ok']){
										case "0":echo "ยังไม่ตอบ";break;
										case "1":echo "ว่าง";break;
										case "2":echo "ไม่ว่าง";break;
										default:echo "ยังไม่ตอบ";break;
									}
									?>
									<?echo $rows['customer_datetime']?>
								  </div>
								  <div class="clearfix"></div>
							</div>
							<input type="hidden" value="<?echo $rows['ticket_id']?>" name="ticket_id">
							<input type="hidden" value="3" name="ticket_status">
							<input type="hidden" value="<?echo $rows['repairman_id'];?>" name="repairman_id">
						<br>
							<div>
								  <div class="pull-left">วันที่  :</div>
								  <div class="pull-right"><input type="date" class="form-control" name="date"></div>
								  <div class="clearfix"></div>
							</div>
							
							<br>
							<div>
								  <!-- /col-md-3 -->
								  <div class="pull-left"> ชื่อช่าง : </div>
								  <div class="pull-right">
									<select name="repairman_id"  style="width:170px;height:30px;" class="form-control" required>
										<option >เลือกช่าง</option>
										<?
											$sql1="select * from repairman where project_id = '".$project_id."' and type_repairman = '".$fix_id."'";
											$result1=Query($sql1);
											while($rows1=mysql_fetch_assoc($result1)){
										?>
											<option value="<?echo $rows1['repairman_id'];?>"><?echo $rows1['name_repairman'];?></option>
										<?}?>
									</select>
								  </div>
								  
								 
								  <div class="clearfix"></div>
							</div>
							
							
							 
								<!-- /row -->
							<br>
							<div class="pull-right" style="width:160px;">
								  <div class="pull-center"><button type="submit" class="btn btn-theme" style="width:70px;">ส่ง </button></div>
								  
								  <div class="pull-center"><button type="reset" class="btn btn-theme02" style="width:70px;">ยกเลิก</button></div>
							</div>
						</div>
					 </form>
                </div>
                <!-- /pull-left -->
                
                <!-- /pull-right -->
                <div class="clearfix"></div>
                
                <div class="row">
				 <!-- /ซ้าย -->
                  <div class="col-md-6">
                      <address>
						<strong><h4><b>ชื่อลูกค้า : </b><?echo $rows['user_name'];?>&nbsp; &nbsp; &nbsp;<?echo $rows['user_sname'];?></h4></strong>
						<strong>
							<h4>
								<b>ที่อยู่ :</b> <?echo $rows['user_address'];?>
							</h4>
							<h4>
								<b>เบอร์โทรศัพท์ :</b> <?echo $rows['user_tel'];?>
							</h4>
						</strong>
					 </address>
                  </div>
                 <!-- /ซ้าย -->
                </div>
                <!-- /col-lg-10 -->
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width:150px" class="text-center"><h4><b>ประเภทการแจ้งซ่อม</b></h4></th>
                      <th class="text-left" style="width:150px"><h4><b>วันที่แจ้ง</b></h4></th>
                      <th class="text-left" style="width:150px"><h4><b>รายละเอียด</b></h4></th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center"><h4><?echo $rows['fix_name'];?></h4></td>
                      <td class="text-left" style="width:150px" > <h4>
					  <?
						function thai_m_short($m){ 
							if($m=='01'){$mount = 'มกราคม';}
							else if($m=='02'){$mount = 'กุมภาพันธ์';}
							else if($m=='03'){$mount = 'มีนาคม';}
							else if($m=='04'){$mount = 'เมษายน';}
							else if($m=='05'){$mount = 'พฤษภาคม';}
							else if($m=='06'){$mount = 'มิถุยน';}
							else if($m=='07'){$mount = 'กรกฎาคม';}
							else if($m=='08'){$mount = 'สิงหาคม';}
							else if($m=='09'){$mount = 'กันยายน';}
							else if($m=='10'){$mount = 'ตุลาคม';}
							else if($m=='11'){$mount = 'พฤศจิกายน';}
							else if($m=='12'){$mount = 'ธันวาคม';}
							return $mount ;
							   
						} 
						function thai_y_short($y){
							$year = intval($y);
							return $year+543 ;
							   
						} 
								$date = new DateTime($rows['ticket_datetime']); 
								$date_c = $date->format('j/m/Y'); 
								list($d,$m,$y)=explode('/',$date_c);
								echo '<h4><b>'.$d.' '.thai_m_short($m).' '.thai_y_short($y).'</b></h4>';
				
							?>
					  </h4></td>
                      <td class="text-left" style="width:150px"> <h4><?echo $rows['ticket_desc'];?></h4></td>
                    </tr>
                  </tbody>
                </table>
                <br>
				<center>				
<form action="close_ticket.php" method="post">
<div style="width:100%;height:40px;line-height:40px;font-size:20px;font-weight:bold; margin-top:50px;text-align:left;">
กรุณาประเมินการทำงานของช่าง
</div>
<div style="width:100%;height:40px;line-height:40px;font-size:20px;font-weight:bold; margin-top:20px;padding-left: 0px;">

	<div style="float:left;width:100px;height:40px;"><input type="radio" value="1" name="feedback"/> แย่</div>
	<div style="float:left;width:100px;height:40px;"><input type="radio" value="2" name="feedback"/> น้อย</div>
	<div style="float:left;width:100px;height:40px;"><input type="radio" value="3" name="feedback"/> ปานกลาง</div>
	<div style="float:left;width:100px;height:40px;"><input type="radio" value="4" name="feedback"/> ดี</div>
	<div style="float:left;width:100px;height:40px;"><input type="radio" value="5" name="feedback"/> ดีมาก</div>
	
	
	
</div>
<div style="width:100%;height:40px;line-height:40px;font-size:20px;font-weight:bold; margin-top:20px;">
	<input type="text" class="form-control "  name="explain" placeholder="ความคิดเห็นเพิ่มเติม (ถ้ามี)" style="float:left;width:400px;"/>
</div>
<div style="width:100%;height:40px;line-height:40px;font-size:20px;font-weight:bold; margin-top:20px;">

<div style="float:left;width:100px;height:40px;">
	<button class="btn btn-theme" type="submit" style="width:200px;height:40px;line-height:40px;" ><b><h4>ปิดการแจ้งซ่อม</h4></b></button>
	</div>
	
	
	
	
	<input type="hidden" value="<?echo $rows['ticket_id'];?>" name="ticket_id">
	<input type="hidden" value="<?echo $status;?>" name="ticket_status">


</div>
</form>
</center>
                <br>
              </div>
              <!--/col-lg-12 mt -->
      </section>
      <!-- /wrapper -->
    </section>
<div class="row mt">
    <div class="col-sm-12">
		<div class="container">
            <section class="panel" style="padding-left: 300px;">
			<br>
			<br>
			<br>
			<h4><b> การตอบกลับ : </b></h4>
			
<?

$sql_text="select * from ticket_respond inner join user on respond_user_id=user_id 
where respond_ticket_id ='".$rows['ticket_id']."' order by respond_datetime limit 100";
$result_text=Query($sql_text);
$i=1;
while($rows_text=mysql_fetch_assoc($result_text)){
	$respond_ticket_id=$rows_text['respond_ticket_id'];
?>	
	
<div style="float:left;width:100%;height:40px;line-height:40px;font-size:16px;font-weight:bold; border-bottom:2px solid #e2e6e9;padding-left:40px;color:#4ecdc4;">
<?echo $rows_text['user_name']?> : <?echo $rows_text['respond_text'];?>
</div>	

<?	
}	?>
			<form action="add_respone.php" class="form-horizontal tasi-form" method="post">
			
				<input type="hidden" name="respond_ticket_id" value="<?echo $rows['ticket_id'];?>">
				<input type="hidden" name="respond_user_id" value="<?echo $_SESSION['id'];?>">
				<input type="hidden" name="respond_status" value="1">
				<ul class="nav nav-pills nav-stacked mail-nav row" style="padding-right: 20px;padding-left: 20px;">		 
					
					<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
					
					</div>
					<div class="form-group col-lg-6" style="padding-right: 20px;padding-left: 20px;">
					<h4><b>แสดงความคิดเห็น :</b></h4>
						<textarea class="form-control "  name="respond_text" ></textarea>
					</div>
				</ul>
				<ul class="nav nav-pills nav-stacked mail-nav row" style="padding-right: 20px;padding-left: 20px;">	
					<div class="form-group " style="padding-left: 350px;">
						<button class="btn btn-theme" type="submit" style="width:60px;height:40px;" ><b><h4>ส่ง</h4></b></button>
					</div>
				</ul>
			</form>
				<br>
				<br>
			</section>
		</div>
	</div>
</div>