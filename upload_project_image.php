<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
	exit();
}
$id=$_POST['xid'];

extract($_POST);
    $error=array();
    $extension=array("jpeg","jpg","png","gif");
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
            {
                $file_name=$_FILES["files"]["name"][$key];
                $file_temp=getimagesize($_FILES["files"]["tmp_name"][$key]);
                //$fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);

                $width=$file_temp[0];
                $height=$file_temp[1];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
              
			  
			  $file_name=md5($file_name.date("Y-m-d H:i:s").rand(0,999)).".".$ext;

                if($width == "300" && $height == "300")
                {
                    if(in_array($ext,$extension))
                    {
                        if(!file_exists("photo_gallery/".$file_name))
                        {
                            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"photo_gallery/".$file_name);
                        }
                        else
                        {
                            $filename=basename($file_name,$ext);
                            $file_name=$filename.time().".".$ext;
                            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"photo_gallery/".$file_name);
                        }
                    }
                    else
                    {
                        array_push($error,"$file_name, ");
                    }
                    
                    $sql="insert into project_img(img_project_id,img_name) values('$id','$file_name')";
                    $result=Query($sql);
                }
			 
            }
			







echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?load=$id'>";

			
?>