<?php

require_once("../config.inc.php");
$act = $_REQUEST['act'];
switch ($act) {
   

   

    case 'update_promotion':
					$sql = "SELECT * FROM `project` order by `project_id` desc";
					$arr = array();

                    $result_numpage  =Query($sql);
                    $num_data=mysql_num_rows($result_numpage);
					
					$arr['num_data'] = $num_data;
					$arr['sql'] = $sql;
					if($num_data > 0){
						$num = 0;
						while($row=mysql_fetch_assoc($result_numpage)){
                            $arr['data'][$num]['project_id']                = $row["project_id"];
							$arr['data'][$num]['project_name']                = $row["project_name"];
                            $arr['data'][$num]['project_image']                = $row["project_image"];
                            $arr['data'][$num]['designplan_file']                = $row["designplan_file"];
                            $arr['data'][$num]['project_tel']                = $row["project_tel"];
                            $arr['data'][$num]['project_address']                = $row["project_address"];
                            $arr['data'][$num]['project_desc']                = $row["project_desc"];
                            $arr['data'][$num]['project_promotion']                = $row["project_promotion"];
                            $arr['data'][$num]['project_promotion2']                = $row["project_promotion2"];
                            $arr['data'][$num]['project_promotion3']                = $row["project_promotion3"];
                            $arr['data'][$num]['project_promotion5']                = $row["project_promotion5"];
                            $arr['data'][$num]['project_promotion4']                = $row["project_promotion4"];
                            $arr['data'][$num]['project_datetime']                = $row["project_datetime"];
                            $arr['data'][$num]['project_status']                = $row["project_status"];
							$num++;
						}




					}else {


					} 
					echo json_encode($arr);
    break;
    case 'load_detail':
    $id=$_REQUEST['id'];
					$sql = "SELECT * FROM `project` where `project_id` ='$id' ";
					$arr = array();

                    $result_numpage  =Query($sql);
                    $num_data=mysql_num_rows($result_numpage);
					
					$arr['num_data'] = $num_data;
					$arr['sql'] = $sql;
					if($num_data > 0){
						$num = 0;
						while($row=mysql_fetch_assoc($result_numpage)){
                            $arr['data'][$num]['project_id']                = $row["project_id"];
							$arr['data'][$num]['project_name']                = $row["project_name"];
                            $arr['data'][$num]['project_image']                = $row["project_image"];
                            $arr['data'][$num]['designplan_file']                = $row["designplan_file"];
                            $arr['data'][$num]['project_tel']                = $row["project_tel"];
                            $arr['data'][$num]['project_address']                = $row["project_address"];
                            $arr['data'][$num]['project_desc']                = $row["project_desc"];
                            $arr['data'][$num]['project_promotion']                = $row["project_promotion"];
                            $arr['data'][$num]['project_promotion2']                = $row["project_promotion2"];
                            $arr['data'][$num]['project_promotion3']                = $row["project_promotion3"];
                            $arr['data'][$num]['project_promotion5']                = $row["project_promotion5"];
                            $arr['data'][$num]['project_promotion4']                = $row["project_promotion4"];
                            $arr['data'][$num]['project_datetime']                = $row["project_datetime"];
                            $arr['data'][$num]['project_status']                = $row["project_status"];
							$num++;
						}




					}else {


					} 
					echo json_encode($arr);
    break;

    case 'load_img':
    $id=$_REQUEST['ids'];
					$sql = "SELECT * FROM `project_img` WHERE `img_project_id`='$id' order by img_id desc ";
					$arr = array();

                    $result_numpage  =Query($sql);
                    $num_data=mysql_num_rows($result_numpage);
					
					$arr['num_data'] = $num_data;
					$arr['sql'] = $sql;
					if($num_data > 0){
						$num = 0;
						while($row=mysql_fetch_assoc($result_numpage)){
                            $arr['data'][$num]['img_id']                = $row["img_id"];
							$arr['data'][$num]['img_project_id']                = $row["img_project_id"];
                            $arr['data'][$num]['img_name']                = $row["img_name"];
							$num++;
						}




					}else {


					} 
					echo json_encode($arr);
    break;
   


}



?>