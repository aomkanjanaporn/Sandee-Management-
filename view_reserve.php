<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}
    $id = $_POST['id'];
    $sql="select * from reserve where reserve_id='".$id."'";
	$result=Query($sql);
	$rowsd=mysql_fetch_assoc($result);
	$projectID= $rowsd['project'];
	include("layoutsBS/header.php");

$thai_month_arr_short=array(   
    "0"=>"",   
    "1"=>" ม.ค.",   
    "2"=>" ก.พ.",   
    "3"=>" มี.ค.",   
    "4"=>" เม.ย.",   
    "5"=>" พ.ค.",   
    "6"=>" มิ.ย.",    
    "7"=>" ก.ค.",   
    "8"=>" ส.ค.",   
    "9"=>" ก.ย.",   
    "10"=>" ต.ค.",   
    "11"=>" พ.ย.",   
    "12"=>" ธ.ค."                    
);   

function thai_date_short($date){  
    global $thai_month_arr_short;  
	
    $thai_date_return = date("j",$date);   
    $thai_date_return.="&nbsp;&nbsp;".$thai_month_arr_short[date("n",$date)];   
    $thai_date_return.= " ".(date("Y",$date)+543);   
    return $thai_date_return;   
} 

?>

<br>
<br>
<br>
<form action="save_reserve.php" method="POST">
	<div class="row mt-4">
		<div class="col-sm-12">
			<section class="panel">
				<div class="panel-body" >
					<h5><b> จองโครงการ </b></h5>
					
					<ul class="nav nav-pills col-sm-4">		 
						<li class="active ">
							<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
								<label class="col-sm-4 control-label col-lg-4">ชื่อลูกค้า :</label>
								<div class="col-lg-8">
								<input type="hidden" name="reserve_id" value="<?echo $rowsd['reserve_id'];?>">
									<input type="text" name="customer_name" value="<?echo $rowsd['name'];?>" class="form-control" required>
								</div>
							</div>
							<br>
						</li>
						<li class="active  ">
							<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
								<label class="col-sm-3 control-label col-lg-3">เลขบัตรประจำตัวประชาชน:</label>
								<div class="col-lg-8">
									<input type="text" name="person_id" value="<?echo $rowsd['person_id'];?>" class="form-control" required>
								</div>
							</div>
						</li>
					</ul>
					<ul class="nav nav-pills col-sm-4">
						<li class="active  ">
							<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
								<label class="col-sm-4 control-label col-lg-4">เบอร์โทรศัพท์ :</label>
								<div class="col-lg-8">
									<input type="text" name="phone_no" value="<?echo $rowsd['phone_no'];?>" class="form-control" required>
								</div>
							</div>
							<br>
						</li>
						<li class="active  ">
							<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
								<label class="col-sm-4 control-label col-lg-4">ที่อยู่ :</label>
								<div class="col-lg-8">
									<textarea class="form-control " value="<?echo $rowsd['address'];?>" name="address" required=""><?echo $rowsd['address'];?></textarea>	
								</div>
							</div>
						</li>
					</ul>
					<ul class="nav nav-pills col-sm-4">
						<li class="active  ">
							<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
								<label class="col-sm-4 control-label col-lg-4">อีเมลล์ :</label>
								<div class="col-lg-8">
									<input type="text" value="<?echo $rowsd['email'];?>" name="email" class="form-control" required>
								</div>
							</div>
							<br>
						</li>
						<li class="active  ">
							<div class="form-group " style="padding-right: 20px;padding-left: 20px;">
								<label class="col-sm-4 control-label col-lg-4">ไอดีไลน์ :</label>
								<div class="col-lg-8">
									<input type="text" name="line_id" value="<?echo $rowsd['line_id'];?>" class="form-control" required>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<div class="panel-body" >
					<h5><b> รายละเอียด( Description ) </b></h5>		
	<?
		$sql="select * from project where project_id='$projectID' order by project_name";
		$result=Query($sql);
		while($rows=mysql_fetch_assoc($result)){ 
	?>
					<div class="row">	
						<div class="col-lg-3">
							<div class="col-lg-12">
								ชื่ิอโครงการ : <?echo $rows['project_name'];?>
							</div>
	<? }
	?>	
						</div>	
	<?
		$sqlhome="select * from home where home_id='".$rowsd['home_id']."'";
		$result_home=Query($sqlhome);
		$rows_home=mysql_fetch_assoc($result_home);
	?>
						<div class="col-lg-3">
							<div class="col-lg-3">
								แปลงที่ :  <?echo $rows_home['lot_no'];?> 
							</div>	
						</div>
						<div class="col-lg-3 ">
							<div class="col-lg-3">
								เนื้อที่ : 
							</div>
							<div class="col-lg-3">
								<?echo $rows_home['area'];?>
							</div>
							
							<div class="col-lg-3">
								ตารางวา
							</div>
						</div>
						<div class="col-lg-3">
							<div class="col-lg-3">
								พื้นที่ใช้สอย :
							</div>
							<div class="col-lg-3">
								<?echo $rows_home['living_space'];?>
							</div>
							<div class="col-lg-3">
								ตารางเมตร
							</div>
						</div>
					</div>
					<div class="row mt-4">
					<br>
	
					
						<div class="col-lg-6">
							<div class="col-lg-3">
								ราคา ( ตัวเลข )   : 
							</div>
							<div class="col-lg-8">
							    <input type="text" class="form-control" name="price" value="<?echo $rowsd['price'];?>">
							</div>
							<div class="col-lg-1">
								บาท
							</div>
						</div>
						<div class="col-lg-6">	
							<div class="col-lg-3">
								ราคา ( ตัวหนังสือ ) : 
							</div>
							<div class="col-lg-8">
							    <input type="text" class="form-control" name="text_price" value="<?echo $rowsd['text_price'];?> "> 
							</div>
							<div class="col-lg-1">
								บาท
							</div>
						   
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

	
	<div class="row mt-4">
		<div class="col-sm-12">
			<section class="panel">
				<div class="panel-body" >
					<h5><b> การชำระเงิน (payment)  </b></h5>
							<div class="row">
								<div class="col-lg-2">
									จอง (Booking)
								</div>
								<div class="col-lg-3 row-12">
									<div class="col-lg-3">
										ยอดเงินชำระ (Payment) :
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" name="Bpayment" value="<?echo $rowsd['Bpayment'];?> " >
									</div>
									<div class="col-lg-1">
										บาท
									</div>
								</div>
								<div class="col-lg-2">	
								
									วันที่  : <?echo thai_date_short(time())?>
								</div>
								<div class="col-lg-4">	
									<div class="col-lg-3">
										หมายเหตุ :
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" name="desc_Bpayment" value="<?echo $rowsd['Bdesc'];?> " >
									</div>
									
								</div>
							</div>
							<div class="row">
								<div class="col-lg-2">
									ทำสัญญา (Contract)
								</div>
								<div class="col-lg-3 row-12">
									<div class="col-lg-3">
										ยอดเงินชำระ (Payment) :
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" name="Cpayment" value="<?echo $rowsd['Cpayment'];?> ">
									</div>
									<div class="col-lg-1">
										บาท
									</div>
								</div>
								<div class="col-lg-2">	
									วันที่  : <?echo thai_date_short(time())?>
								</div>
								<div class="col-lg-4">	
									<div class="col-lg-3">
										หมายเหตุ :
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" name="desc_Cpayment" value="<?echo $rowsd['Cdesc'];?> ">
									</div>
									
								</div>
								
							</div>
							<div class="row">
								<div class="col-lg-2">
									ค่าส่วนกลาง (Service fee)
								</div>
								<div class="col-lg-3 row-12">
									<div class="col-lg-3">
										ยอดเงินชำระ (Payment) :
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" name="Spayment" value="<?echo $rowsd['Spayment'];?> ">
									</div>
									<div class="col-lg-1">
										บาท
									</div>
								</div>
								<div class="col-lg-2">	
									วันที่  : <?echo thai_date_short(time())?>
								</div>
								<div class="col-lg-4">	
									<div class="col-lg-3">
										หมายเหตุ :
									</div>
									<div class="col-lg-8">
										<input type="text" class="form-control" name="desc_Spayment" value="<?echo $rowsd['Sdesc'];?> " >
									</div>
									
								</div>
							</div>
				</div>
				<br>
				<div class="row" style="padding-left:60%;">
				
					<div class="col col-lg-2">
					<?
						session_start();
						$_SESSION['reserve_id']=$id;
						
					?>
						<a href="print_reserve.php"><button type="button"  class="btn btn-theme " ><i class="fa fa-plus"></i> &nbsp;พิมพ์</button></a>
					</div>
					<div class="col col-lg-2  ">
						<button type="reset" onclick="window.location.href='home.php'" class="btn btn-theme04" ><i class="fa fa-minus"></i> &nbsp;ปิด</button>
					</div>
				</div>
				<br>
				<br>
			</section>
		</div>
	</div>
</form>

