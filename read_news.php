<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}
$news_id =  $_POST['id'];
include("layoutsBS/header.php");

	$sql = "select * from news where news_id='".$news_id."' ";
	$result=Query($sql);
	$rows=mysql_fetch_assoc($result);
	$project_id = $rows['project_id'];
?>

<div class="row mt">
          <div class="col-sm-8">
            <section class="panel">
				<div class="panel-body" >
				<h3><b>ข่าวและกิจกรรม</b></h3>
					<form action="add_reserve.php" class="form-horizontal tasi-form " method="post">
						<ul class="nav nav-pills nav-stacked mail-nav " style="padding-left:20px;">
						  <li class="active col-md-6 col-md-offset-3">
						  <div class="form-group " style="padding-left:20px;">
							<label class="col-sm-12 control-label col-lg-12"><h3><b><?echo $rows['news_title'];?></b></h3></label>
						  </div>
						  </li>
						</ul>
						<br>
						<ul class="nav nav-pills nav-stacked mail-nav " style="padding-left:20px;">
						  <li class="active col-md-6 col-md-offset-3">
						  <div class="form-group " style="padding-left:20px;">
						  <?if($rows['news_img']){?>
							  <img src="news_img/<?echo $rows['news_img'];?>" style="width:460px;height:360px; "/>
						  <?}?>
							
						  </div>
						  
						  </li>
						</ul>
						<ul class="nav nav-pills nav-stacked mail-nav " style="padding-left:20px;">
						  <li class="active col-md-11 ">
						  <div class="form-group " style="padding-left:20px;">
							<label class="col-sm-12 control-label col-lg-12"><h4>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<?echo $rows['news_bodyf'];?></h4></label>
						  </div>
						  </li>
						</ul>
						<ul class="nav nav-pills nav-stacked mail-nav " style="padding-left:20px;">
						  <li class="active col-md-11 ">
						  <div class="form-group " style="padding-left:20px;">
							<label class="col-sm-12 control-label col-lg-12"><h4>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<?echo $rows['news_bodym'];?></h4></label>
						  </div>
						  </li>
						</ul>
						<ul class="nav nav-pills nav-stacked mail-nav " style="padding-left:20px;">
						  <li class="active col-md-11 ">
						  <div class="form-group " style="padding-left:20px;">
							<label class="col-sm-12 control-label col-lg-12"><h4>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
						<?echo $rows['news_bodyl'];?></h4></label>
						  </div>
						  </li>
						</ul>
						<ul class="nav nav-pills nav-stacked mail-nav " style="padding-left:20px;">
						  <li class="active col-md-10 ">
						  <div class="form-group " style="padding-left:20px;">
						<label class="col-sm-12 control-label col-md-6 col-md-offset-10">
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
								$date = new DateTime($rows['create_at']); 
								$date_c = $date->format('j/m/Y'); 
								list($d,$m,$y)=explode('/',$date_c);
								echo '<h4><b>'.$d.' '.thai_m_short($m).' '.thai_y_short($y).'</b></h4>';
				
							?>
							
							</label>
							
						  </div>
						  </li>
						</ul>
					</form>
				</div>
            </section>
          </div>
         <div class="col-sm-4">
            <section class="panel">
			   <div class="panel-body minimal">
			   <?php print $calendar; ?>
			   </div>			   
			 <div class="panel-body minimal">
			  <h3><b>ข่าวและกิจกรรมอื่นๆที่น่าสนใจ</b></h3>
				<div class="task-content">
                  <ul class="task-list">
				   <?
				   $sql_news="select * from news where project_id = '".$project_id."'order by create_at DESC limit 8";
				   $result_news=Query($sql_news);
				   $i=1;
				   while($rows_news=mysql_fetch_assoc($result_news)){ ?>
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
									<span class="task-title-sp col-md-3"><img src="news_img/<?echo $rows_news['news_img'];?>" style="width:90px;height:60px; "/></span>
								<?}else{?>
									<span class="task-title-sp col-md-3"><img class="hidden" style="width:90px;height:60px; "/></span>
								<?}
								$var = $rows_news['news_bodyf'];
								$foo = mb_substr($var,0,150, "utf-8");
								?>
									<span class="task-title-sp col-md-8">
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
			