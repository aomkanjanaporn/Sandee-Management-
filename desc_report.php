<?
require_once("config.inc.php");
$id=$_POST['id'];

$sql="select * from ticket inner join user on ticket_user_id=user_id 
inner join ticket_status on status_id=ticket_status
inner join fix_type on fix_id=ticket_fix_id
where ticket_id='".$id."' limit 1";
$result=Query($sql);
$i=1;
$rows=mysql_fetch_assoc($result);
include("layoutsBS/header.php");
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
					 
						<div class="col-md-4">
							<h3><b>ยืนยันการแจ้งซ่อม</b></h3>
							<?
							if($rows['repairman_id']){
								$sql_repairman= "select * from repairman  where repairman_id = '".$rows['repairman_id']."'" ;
								$result_repairman=Query($sql_repairman);
								$rows_repairman=mysql_fetch_assoc($result_repairman);
								echo '<h4 class="text-center"><b>ชื่อช่างที่รับผิดชอบ:</b>'.$rows_repairman['name_repairman'].'</h4>' ;
								echo '<h4 class="text-center"><b>วันที่เข้าดำเนินการ : </b>&nbsp;&nbsp;&nbsp;'.$rows['date_repair'].'</h4>' ;
								?>
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
								
							<?
							}else{ 
							echo '<h2 class="text-center" style="border-bottom:0px solid #e7e7e7;font-weight:bold;color:#830000"><b>ยังไม่ดำเนินการ </b></h2>' ;
							}?>
							
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
				 <table class="table">
                  <thead>
                    <tr>
                      <th style="width:150px" class="text-center"><h4><b></b></h4></th>
                      <th class="text-left" style="width:150px"><h4><b>
					  <button type="button" onclick="graph('2');"  class="btn btn-theme" id="btn-submit-ajax"> &nbsp;ปิด</button>
					</b></h4></th>
                      <th class="text-left" style="width:150px"><h4><b></b></h4></th>
                    </tr>
                  </thead>
                
                </table>
				
<?if($_SESSION['class']==3){?>				
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

<div style="float:left;width:100px;height:40px;">
	<button class="btn btn-theme" type="submit" style="width:200px;height:40px;line-height:40px;" ><b><h4>ปิดการแจ้งซ่อม</h4></b></button>
	</div>
	
	
	
	
	<input type="hidden" value="<?echo $rows['ticket_id']?>" name="ticket_id">
	<input type="hidden" value="2" name="ticket_status">


</div>
</form>
</center>
<?}?>
                <br>
                <br>
              </div>
			  


              <!--/col-lg-12 mt -->
      </section>
      <!-- /wrapper -->
    </section>




