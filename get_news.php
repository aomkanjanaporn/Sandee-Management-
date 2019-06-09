<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}

if($_SESSION['class']!="2"){


	include("layoutsBS/header.php");
	$sql_pj = "select * from user where user_id='".$_SESSION['id']."' ";
	$resultpj=Query($sql_pj);
	$rows_pj=mysql_fetch_assoc($resultpj);
?>

<ul class="nav nav-pills nav-stacked mail-nav" >
	<li class="active ">
		<div class="form-group " style="padding-left:30%;">
			<?	
				$sqlfilenews="select * from profile_news where project_id='".$rows_pj['user_project']."' ";
				$resultnews=Query($sqlfilenews);
				$rownews=mysql_fetch_assoc($resultnews);
			?>
			<div class="row">
				<? if($rownews['file_name']){ ?> 
					<img src="profile_news/<?echo $rownews['file_name'];?>" style="width:120%;height:260px; "/> 
				<?}else{ ?>
					<img src="img/noimg.jpg"  style="width:400px;height:260px; "/> 
				<?}?>
			</div>
			<div class="row mt-4">
				
			</div>
		</div>
	</li>
</ul>
<div class="row ">
	<div class="col-md-6 col-md-offset-3">
		<div class="container">
			<section class="panel " >
			<h2 ><b>&nbsp; &nbsp;ข่าวสารและกิจกรรม</b></h2>
<?
$sql_news="select * from news where project_id='".$rows_pj['user_project']."'  order by create_at DESC";
$result_news=Query($sql_news);
$i=1;
?>
<div class="row mt">
	<div class="col-md-12">
	<section class="task-panel tasks-widget">
              <div class="panel-body">
                <div class="task-content">
                  <ul class="task-list">
				   <?while($rows_news=mysql_fetch_assoc($result_news)){ ?>
                    <li>
						  <div class="task-title ">
							<div class="pull-center hidden-phone">
							<a onclick="read_news('<?echo $rows_news['news_id'];?>')">
								<h4 class="text-primary">
									<span class="task-title-sp"><i class="fa fa-tasks"> &nbsp;&nbsp;&nbsp; <?echo  $i++;?> <b>.</b></i></span>
									<span class="task-title-sp"><b><?echo  $rows_news['news_title'];?></b></span>
								</h4>
							</a>
							</div>
							<div class="pull-center hidden-phone row md">
								<h5>
								<?if($rows_news['news_img']){?>
									<span class="task-title-sp col-md-2"><img src="news_img/<?echo $rows_news['news_img'];?>" style="width:90px;height:60px; "/></span>
								<?}else{?>
									<span class="task-title-sp col-md-2"><img class="hidden" style="width:90px;height:60px; "/></span>
								<?}
								$var = $rows_news['news_bodyf'];
								$foo = mb_substr($var,0,250, "utf-8");
								?>
									<span class="task-title-sp col-md-9">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<?echo  $foo?>
									<a onclick="read_news('<?echo $rows_news['news_id'];?>')"><b>.....อ่านต่อ</b></a></span>
								</h5>
							</div>
						  </div>
                    </li>
					<?}?>
                  </ul>
                </div>
              </div>
           
		
	</section>	
	</div>
</div>
			</section>
		</div>
	</div>
	
</div>
<?}else{?>
	<link rel="stylesheet" href="graphmain.css"/>
	<script src="jquery-1.9.0.js"></script>
	
<div class="row ">
	<div class="col-md-6 col-md-offset-3">
		<div class="container" >
<div style="float:right;width:100%;height:40px;margin-top:50px;">
<select onchange="if(this.value>0){graph(this.value);}" style="float:right;height:40px;width:200px;font-size:14px;font-weight:bold;">
<option value="0" <?if($_GET['r']=="g"||$_GET['r']==""){echo "selected";}?>>เลือกประเภทรายงาน</option>
<option value="1" <?if($_GET['r']=="g"&&$_GET['id']=="1"){echo "selected";}?>>รายงานการจองบ้าน</option>
<option value="2" <?if($_GET['r']=="g"&&$_GET['id']=="2"){echo "selected";}?>>รายงานการแจ้งซ่อม</option>
<option value="3" <?if($_GET['r']=="g"&&$_GET['id']=="3"){echo "selected";}?>>รายงานการเข้าชมเว็บไซต์</option>
</select>
</div>
		
		
			
<?

if(($_GET['r']==""&&$_GET['id']=="")||($_GET['r']=="g"&&$_GET['id']=="1")){


$sql="SELECT * FROM project order by project_name";
				
$result=Query($sql);
while($rows=mysql_fetch_assoc($result)){
?>		
<div style="float:left;width:100%;min-height:400px;margin-top:20px;padding:40px;background:#FFF;border:1px solid black;">
<div style="float:left;width:100%;height:300px;margin-top:0px;">
				 <font style="font-size:26px;font-weight:bold;" class="b skv">รายงานการจองบ้าน<?echo $rows['project_name'];?></font>
				<div id="RRC_<?echo $rows['project_id'];?>" style="width:100%;height:300px;padding:0px;position:relative;">
					<canvas class="flot-base" width="100%" height="300" style="direction:ltr;position:absolute; left:0px;top:0px;width:100%;height:300px;"></canvas>		
				</div>      
				<script type="text/javascript">
				RRC_<?echo $rows['project_id'];?> = [];
				<?
				$sql2="SELECT count(project) as total,year(create_at) as y,month(create_at) as m,day(create_at) as d,hour(create_at) as h,minute(create_at) as i
				FROM reserve where project='".$rows['project_id']."'
				group by year(create_at),month(create_at)
				order by create_at";
				
				
				
				$result2=Query($sql2);
				while($rows2=mysql_fetch_assoc($result2)){
				$time=strtotime("".$rows2['y']."-".$rows2['m']."-".$rows2['d']." ".$rows2['h'].":".$rows2['i'].":00")."000";
				$summary=$rows2['total'];
				?>		RRC_<?echo $rows['project_id'];?>.push([<?echo $time;?>,<?echo $summary;?>]);<?}?>
				</script>
				<script type="text/javascript">
				$(document).ready(function() {
						$.plot($("#RRC_<?echo $rows['project_id'];?>"), [RRC_<?echo $rows['project_id'];?>], {xaxis: { mode: 'time', timezone: "browser", timeformat: '%b %d - %H:%M %P', twelveHourClock: true}, yaxis: { min: 0 }, grid: { hoverable: true, mouseActiveRadius: 1000 }, tooltip: { show: true, content: '<div style="height:auto;line-height:20px;"><font style="font-size:16px;">Value :</font> <font style="font-size:14px;">%y หลัง</font> <br><font style="font-size:16px;">Time :</font> <font style="font-size:14px;">%x</font> <br><font style="font-size:16px;">Series :</font> <font style="font-size:14px;">จำนวนการจอง</font></div>' }});
					})
					
				</script>  
</div>
<div style="float:left;width:100%;min-height:100px;margin-top:50px;">


<div style="float:left;width:800px;height:40px;line-height:40px;margin-top:0px;font-size:20px;font-weight:bold;">
<div style="float:left;width:200px;height:40px;line-height:40px;">
<?echo $rows['project_name'];?>&nbsp;
</div>
<table style="float:left;width:300px;height:auto;">
<?
$res=0;
	$free=0;
	$tx=0;
$sql3="SELECT status,count(home_id) as x FROM home where home_project_id='".$rows['project_id']."' group by status order by status";
$result3=Query($sql3);

while($rows3=mysql_fetch_assoc($result3)){
	
	if($rows3['x']>0){
		if($rows3['status']=="1"){
			$tx+=$rows3['x'];
			?>
			
				<?$res=$rows3['x'];?>
			
			<?
		}
		if($rows3['status']=="0"){
			$tx+=$rows3['x'];
			?>
			<td>
				<?$free=$rows3['x'];?>
			</td>
			<?
		}
	}
}
?>
<tr>
<td style="text-align:center;font-weight:bold;">ทั้งหมด</td><td style="text-align:center;font-weight:bold;">จอง</td><td style="text-align:center;font-weight:bold;">ว่าง</td>
</tr>
<tr>
<td style="text-align:center;"><?echo $tx;?></td><td style="text-align:center;"><?echo $res;?></td><td style="text-align:center;"><?echo $free;?></td>
</tr>
</table>
</div>

<div style="float:left;width:250px;height:40px;line-height:40px;margin-top:0px;font-size:20px;font-weight:bold;">
<select style="float:left;width:200px;height:40px;line-height:40px;font-size:16px;font-weight:bold;" onchange="view_reserve(this.value)">
<option value=""> เลือกแปลง </option>
<?
$sql3="SELECT * FROM home 
inner join project on home_project_id=project_id 
left join reserve on reserve.home_id=home.home_id
where project_id='".$rows['project_id']."' and lot_no>0 and name!='' order by lot_no";
				
$result3=Query($sql3);
while($rows3=mysql_fetch_assoc($result3)){
?>	
<option value="<?echo $rows3['reserve_id'];?>">แปลงที่ 
<?echo $rows3['lot_no'];

if($rows3['name']!=""){
	echo " - ".$rows3['name'];
}else{
	echo " - ว่าง";
}?>
</option>


<?}?>
</select>
</div>
</div>
</div>
<?}?>


			
		

<?}elseif(($_GET['r']=="g"&&$_GET['id']=="2")){?>
	
<div style="float:left;width:100%;min-height:400px;margin-top:20px;padding:40px;background:#FFF;border:1px solid black;">
<div style="float:left;width:100%;min-height:400px;margin-top:0px;">
				
		

<div style="float:left;width:690px;height:auto;line-height:40px;font-size:20px;font-weight:bold;margin-left:50px; ">
 <font style="font-size:26px;font-weight:bold;" class="b skv">รายงานการแจ้งซ่อม</font>
		
	<table style="width:1024px;color:#000;">
	<tr>
	 <td></td>
	  <td></td>
	 <td style="width:190px;font-weight:bold;"></td>
	  <td style="width:190px;font-weight:bold;">หัวข้อ</td>
	 <td style="width:130px;font-weight:bold;text-align:center;">วันที่แจ้ง</td>
	 
	 <td style="width:130px;font-weight:bold;text-align:center;">สถานะ</td>
	 <td style="width:130px;font-weight:bold;text-align:center;">ผู้รับผิดชอบ</td>
	 <td style="width:130px;font-weight:bold;">ผลตอบรับ</td>
</tr>
 <?
 $sqld="select distinct ticket.project_id as project_id,project_name from ticket 
 inner join project on project.project_id=ticket.project_id
 order by project_name";
$resultd=Query($sqld);
$i=1;
while($rowsd=mysql_fetch_assoc($resultd)){
	
?>
<tr style="cursor:pointer;" onmouseover="this.style.color='#FFF';this.style.background='#4ecdc4';" onmouseout="this.style.color='#000';this.style.background='none';"  >
	<td style="border-bottom:1px solid #e7e7e7;font-weight:bold;" colspan="8">
		<?echo $rowsd['project_name'];?>
	 </td>
</tr>
<?
$sql="";
$result="";
$rows="";
$ix=0;

$sql="select * from ticket inner join user on ticket_user_id=user_id 
inner join ticket_status on status_id=ticket_status
inner join fix_type on fix_id=ticket_fix_id
left join repairman on repairman.repairman_id=ticket.repairman_id
where ticket.project_id='".$rowsd['project_id']."' order by ticket_datetime desc,ticket_id desc limit 30";
$result=Query($sql);

while($rows=mysql_fetch_assoc($result)){
?>

<tr style="cursor:pointer;" onmouseover="this.style.color='#FFF';this.style.background='#4ecdc4';" onmouseout="this.style.color='#000';this.style.background='none';" onclick="descr('<?echo $rows['ticket_id'];?>');" >
	  <td style="border-bottom:1px solid #e7e7e7;width:30px;"></td>
	 <td style="border-bottom:1px solid #e7e7e7;width:30px;"><?echo $i++;?></td>
	 <td style="border-bottom:1px solid #e7e7e7;"><?echo $rows['fix_name'];?></td>
	 <td style="border-bottom:1px solid #e7e7e7;"><?echo $rows['ticket_title'];?></td>
	 <td style="border-bottom:1px solid #e7e7e7;text-align:center;"><?echo $rows['ticket_datetime'];?></td>

	 <td style="border-bottom:1px solid #e7e7e7;text-align:center;font-weight:bold;color:<?echo $rows['status_color'];?>"><?echo $rows['status_name'];?></td>
	 
	 <td style="border-bottom:1px solid #e7e7e7;text-align:center;"><?echo $rows['name_repairman'];?></td>
	 <td style="border-bottom:1px solid #e7e7e7;">
	 <?
	for($ix=0;$ix<$rows['feedback'];$ix++){
		
		?>
		<img src="678064-star-128.png" style="float:left;width:20px;"/>
		<?
		
	}
	 ?>
	 </td>
</tr>

<?}
}?> 
</table>


<div style="float:left;width:690px;height:auto;line-height:40px;font-size:20px;font-weight:bold;margin-top:50px; ">
 <font style="font-size:26px;font-weight:bold;" class="b skv">รายงานการซ่อม</font>
		
	<table style="width:1024px;color:#000;">
	<tr>
	 <td>#</td>
	 <td style="width:130px;font-weight:bold;text-align:center;">ประเภท</td>
	 <td style="width:130px;font-weight:bold;">ครั้ง</td>
</tr>
 <?
$sql="SELECT ticket_fix_id,count(ticket_fix_id) as x,fix_name
FROM  ticket  
inner join fix_type on fix_id=ticket_fix_id
where ticket_fix_id>0
group by ticket_fix_id
ORDER BY  x desc";
$result=Query($sql);
$i=1;
while($rows=mysql_fetch_assoc($result)){
?>

<tr style="cursor:pointer;" onmouseover="this.style.color='#FFF';this.style.background='#4ecdc4';" onmouseout="this.style.color='#000';this.style.background='none';" >
	 <td style="border-bottom:1px solid #e7e7e7;width:30px;"><?echo $i++;?></td>
	 <td style="border-bottom:1px solid #e7e7e7;"><?echo $rows['fix_name'];?></td>
	 <td style="border-bottom:1px solid #e7e7e7;"><?echo $rows['x'];?></td>
	 <td style="border-bottom:1px solid #e7e7e7;">
	
	 </td>
</tr>

<?}?> 
</table>
</div>

</div>
				
</div>

</div>


	
<div style="float:left;width:100%;min-height:400px;margin-top:20px;padding:40px;background:#FFF;border:1px solid black;">
<div style="float:left;width:100%;min-height:400px;margin-top:0px;">
				
		

<div style="float:left;width:690px;height:auto;line-height:40px;font-size:20px;font-weight:bold;margin-left:50px; ">
 <font style="font-size:26px;font-weight:bold;" class="b skv">รายงานผู้รับผิดชอบ</font>
		
	<table style="width:1024px;color:#000;">
	<tr>
	 <td>#</td>
	 <td style="width:130px;font-weight:bold;text-align:center;">ผู้รับผิดชอบ</td>
	 <td style="width:130px;font-weight:bold;">ค่าเฉลี่ยผลตอบรับ</td>
</tr>
 <?
$sql="select name_repairman,avg(feedback) as feedbackavg from ticket left join repairman on repairman.repairman_id=ticket.repairman_id
where 1 group by ticket.repairman_id having feedbackavg>0 order by repairman.name_repairman limit 30";
$result=Query($sql);
$i=1;
while($rows=mysql_fetch_assoc($result)){
?>

<tr style="cursor:pointer;" onmouseover="this.style.color='#FFF';this.style.background='#4ecdc4';" onmouseout="this.style.color='#000';this.style.background='none';" >
	 <td style="border-bottom:1px solid #e7e7e7;width:30px;"><?echo $i++;?></td>
	 <td style="border-bottom:1px solid #e7e7e7;"><?echo $rows['name_repairman'];?></td>
	 <td style="border-bottom:1px solid #e7e7e7;"><?echo $rows['feedbackavg'];?></td>
	 <td style="border-bottom:1px solid #e7e7e7;">
	 <?
	for($ix=0;$ix<$rows['feedbackavg'];$ix++){
		
		?>
		<img src="678064-star-128.png" style="float:left;width:20px;"/>
		<?
		
	}
	 ?>
	 </td>
</tr>

<?}?> 
</table>
</div>
				
</div>

</div>


<?}elseif(($_GET['r']=="g"&&$_GET['id']=="3")){?>
	
	<div style="float:left;width:100%;min-height:400px;margin-top:20px;padding:40px;background:#FFF;border:1px solid black;">
<div style="float:left;width:100%;height:300px;margin-top:0px;">
				 <font style="font-size:26px;font-weight:bold;" class="b skv">รายงานการเข้าชมเว็บไซต์</font>
				<div id="RRC_web" style="width:100%;height:300px;padding:0px;position:relative;">
					<canvas class="flot-base" width="100%" height="300" style="direction:ltr;position:absolute; left:0px;top:0px;width:100%;height:300px;"></canvas>		
				</div>      
				<script type="text/javascript">
				RRC_web = [];
				<?
				$sql2="SELECT sum(webpage_value) as total,year(access_datetime) as y,month(access_datetime) as m,day(access_datetime) as d,hour(access_datetime) as h,minute(access_datetime) as i,
					case 
					when minute(access_datetime) >50 then '5' 
					when minute(access_datetime) >40 then '4' 
					when minute(access_datetime) >30 then '3'
					when minute(access_datetime) >20 then '2' 
					when minute(access_datetime) >10 then '1'
					when minute(access_datetime) >=0 then '0' 
					end as minp10
				FROM webpage_access 
				WHERE (access_datetime>(NOW() - interval 31 day))
				group by year(access_datetime),month(access_datetime),day(access_datetime),hour(access_datetime),minp10
				order by access_datetime";
				
				
				
				$result2=Query($sql2);
				while($rows2=mysql_fetch_assoc($result2)){
				$time=strtotime("".$rows2['y']."-".$rows2['m']."-".$rows2['d']." ".$rows2['h'].":".$rows2['i'].":00")."000";
				$summary=$rows2['total'];
				?>		RRC_web.push([<?echo $time;?>,<?echo $summary;?>]);<?}?>
				</script>
				<script type="text/javascript">
				$(document).ready(function() {
						$.plot($("#RRC_web"), [RRC_web], {xaxis: { mode: 'time', timezone: "browser", timeformat: '%b %d - %H:%M %P', twelveHourClock: true}, yaxis: { min: 0 }, grid: { hoverable: true, mouseActiveRadius: 1000 }, tooltip: { show: true, content: '<div style="height:auto;line-height:20px;"><font style="font-size:16px;">Value :</font> <font style="font-size:14px;">%y ครั้ง</font> <br><font style="font-size:16px;">Time :</font> <font style="font-size:14px;">%x</font> <br><font style="font-size:16px;">Series :</font> <font style="font-size:14px;">จำนวนการเข้าชม</font></div>' }});
					})
					
				</script>  
</div>

</div>
<?}

}?>
</div>
			</div>
			</div>
			