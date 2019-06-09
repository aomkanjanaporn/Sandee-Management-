
            <div id="sidebar" class="nav-collapse " style="overflow: hidden; outline: none;margin-top:60px;" tabindex="5000">

                
                    <p class="centered" style="margin-top:30px;">
					  <?if($_SESSION['user_img']){?>
						  <img src="user_img/<?echo $_SESSION['user_img'];?>" class="img-circle" width="80">
					  <?}else{?>
						  <img src="img/noimg.jpg" class="img-circle" width="100" height="100">
					  <?}?>
                        
                    </p>
                    <h5 class="centered">
            <div class="text-wrapper">
                <p class="profile-name"><?echo ClassName($_SESSION['class']);?></p>
				
                <div>
                  <small class="designation text-muted">
                      <h6 style="color:#48cfad;font-size:14px;"><i class="fa fa-circle"></i> 
                          <?echo $_SESSION['user_email'];?>                        
					  </h6>
						 
                  </small>
				</div>
              </div>
            </h5>	
				<style>
				.btn{
					float:left;width:100%;height:40px;font-family:'Sukhumvit Set';color:#FFF;cursor:pointer;margin-top:2px;
				}
				.btn:hover{
					background:#4ecdc4;
				}
				</style>
				<a href="webpage/index.php" target="_blank">
					<div class="btn" style="background:#4ecdc4;">
						ไปยังเว็บไซต์
						
					</div>
				</a>
				<?if($_SESSION['class']==0){?>
				<div onclick="window.location.href='home.php';" class="btn">
					หน้าหลัก
				</div>
                   <div onclick="create_admin('0');" class="btn">จัดการชื่อผู้ดูแลระบบ</div>
				   <div onclick="create_owner('0');" class="btn">จัดการชื่อผู้ใช้เจ้าของโครงการ  </div>
				   <div onclick="create_customer('0');" class="btn">จัดการชื่อผู้ใช้ลูกบ้าน</div>
				   <div onclick="create_employee('0');" class="btn">จัดการชื่อผู้ใช้พนักงาน</div>
				   <div onclick="changepassword('0');" class="btn">จัดการข้อมูลส่วนตัว</div>
				   <div onclick="home_project('0');" class="btn">จัดการบ้านในโครงการ</div>
                   <div onclick="home_reserving('0');" class="btn">จองบ้าน</div>
				   <div onclick="listproject_ticket();" class="btn">จัดการการแจ้งซ่อม</div>
				   <div onclick="news('0');" class="btn">แจ้งข้อมูลข่าวสาร</div> 
                <?}else if($_SESSION['class']==3){ ?>
					<div onclick="window.location.href='home.php';" class="btn">หน้าหลัก</div>
					<div onclick="report('0');" class="btn">แจ้งซ่อม</div>
					<div onclick="take_feedback();" class="btn">ออกรายงาน</div>
					<div onclick="changepassword('0');" class="btn">จัดการข้อมูลส่วนตัว</div>
					
					
				<?}else if($_SESSION['class']==1){?>
					<div onclick="window.location.href='home.php';" class="btn">
						หน้าหลัก
					</div>
					<div onclick="create_customer('0');" class="btn">จัดการชื่อผู้ใช้ลูกบ้าน</div>
					<div onclick="home_project('0');" class="btn">จัดการบ้านในโครงการ</div>
					<div onclick="home_reserving('0');" class="btn">จองบ้าน</div>
					<div onclick="listproject_ticket();" class="btn">จัดการการแจ้งซ่อม</div>
					<div onclick="news('0');" class="btn">แจ้งข้อมูลข่าวสาร</div>
				
					<div onclick="changepassword('0');" class="btn">จัดการข้อมูลส่วนตัว</div>
		
				<?}else if($_SESSION['class']==2){?>
					<div onclick="window.location.href='home.php';" class="btn">
						หน้าหลัก
					</div>
					<div onclick="create_customer('0');" class="btn">จัดการชื่อผู้ใช้ลูกบ้าน</div>
					<div onclick="home_project('0');" class="btn">จัดการบ้านในโครงการ</div>
					<div onclick="home_reserving('0');" class="btn">จองบ้าน</div>
					<div onclick="listproject_ticket();" class="btn">จัดการการแจ้งซ่อม</div>
					<div onclick="news('0');" class="btn">แจ้งข้อมูลข่าวสาร</div>
				
					<div onclick="changepassword('0');" class="btn">จัดการข้อมูลส่วนตัว</div>
				<?}?>
            

            </div>
