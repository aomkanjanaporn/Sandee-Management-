<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>SANDEE TOWN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<!-- =======================================================
    Theme Name: Maxim
    Theme URL: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
	======================================================= -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="controller-index.js"></script>
</head>

<script>
$(document).ready(function(){
  update_promotion();
});
</script>
<body>
	<!-- navbar -->
	<div class="navbar-wrapper">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<!-- Responsive navbar -->
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</a>
					<h1 class="brand"><a href="index.php">SANDEE TOWN</a></h1>
					<!-- navigation -->
					<nav class="pull-right nav-collapse collapse">
						<ul id="menu-main" class="nav">
							<li><a title="team" href="#about">เกี่ยวกับแสนดี ทาวน์</a></li>
							<li><a title="services" href="#services">HOTDEAL</a></li>
							<li><a title="works" href="#works">เยี่ยมชมโครงการ</a></li>
							<li><a title="blog" href="../index.php" target="_blank">เข้าสู่ระบบแสนดี </a></li>
							<li><a title="contact" href="#contact"></a></li>
							<!--<li><a href="page.html">Page</a></li>-->
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Header area -->
	<div id="header-wrapper" class="header-slider">
		<header class="clearfix">
			
			<div class="container">
				<div class="row">
					<div class="span12">
						<div id="main-flexslider" class="flexslider">
							<ul class="slides">
								<li>
									<p class="home-slide-content">
										<strong>START</strong> 
									</p>
								</li>
								<li>
									<p class="home-slide-content">
										 <strong>FAMILY</strong>
									</p>
								</li>
								<li>
									<p class="home-slide-content">
										 <strong>SNUGNESS</strong>
									</p>
								</li>
							</ul>
						</div>
						<!-- end slider -->
					</div>
				</div>
			</div>
		</header>
	</div>
	<!-- spacer section -->
	<section class="spacer green">
		<div class="container">
			<div class="row">
				<div class="span6 alignright flyLeft">
					<blockquote class="large">
						ทาวน์โฮมชั้นเดียว พร้อมฟังก์ชั่นที่ลงตัว 2 ห้องนอน 2 ห้องน้ำ 1 ห้องโถง 1 ห้องครัว 1 ที่จอดรถ <cite>SANDEE TOWN </cite>
					</blockquote>
				</div>
				<div class="span6 aligncenter flyRight">
					<i class="icon-home icon-10x"></i>
				</div>
			</div>
		</div>
	</section>
	<!-- end spacer section -->
	<!-- section: team -->
	<section id="about" class="section">
		<div class="container">
			<h4>เกี่ยวกับแสนดีทาวน์</h4>
			<div class="row">
				<div class="span4 offset1">
					<div>
						<h2>ทุกอย่างเริ่มต้นได้ที่นี่ กับ แสนดีทาวน์ <strong>" แสนดีทาวน์ "</strong></h2>
						<p>
							ทาวน์โฮมชั้นเดียว สไตล์โมเดิร์นตอบสนองทุกรูปแบบของการใช้ชีวิต พร้อมกับดีไซน์ที่ลงตัวทุกรายละเอียด ภายในโล่งโปร่งสบายกว้างขวาง 
							ภายนอกใช้โทนสีที่สบายตานุ่มนวลมีความเป็นโมเดิร์นทันสมัย อีกหนึ่งทำเลที่เหมาะสำหรับใครที่อยากใช้ชีวิตที่เงียบสงบ ต้องที่นี่เลย 
							ให้คุณใช้ชีวิตได้อย่างลงตัว ออกแบบที่เน้นการใช้ฟังก์ชั่นอย่างลงตัว
						</p> 
						<a href="onetown.php" class="btn btn-primary">ดูรายละเอียด</a>
					</div>
				</div>
				<div class="span6">
					<div class="aligncenter">
						<img src="img/icons/family.png" alt="" />
					</div>
				</div>
			</div>
			
		</div>
		<!-- /.container -->
	</section>
	<!-- end section: team -->
	<!-- section: services -->
	<section id="services" class="section orange">
		<div class="container">
			<h4>ข่าวสาร โปรโมชั่น</h4>
		
			<!-- Four columns -->
			<div class="row" id="main-promotion">
				<!--<div class="span4 animated-fast flyIn">
					<div class="service-box">
						<a href="onetown.html">
						<img src="img/icons/sandee.png" alt="" />
						<h2>Pre-Sale</h2>
						<p align = left>	👉 ฟรีค่าธรรมเนียมโอนกรรมสิทธิ์</p>
						<p align = left>	👉 เฟอร์นิเจอร์บิวท์อินห้องนอนใหญ่</p>
						<p align = left>	👉 มุ้งลวดฟรีทั้งหลัง</p>
						<p align = left>	👉 ฟรีแอร์ 2 ตัว</p>
						<p align = left>	👉 เครื่องทำน้ำอุ่น </p>
						<p align = left>	👉 ถังเก็บน้ำพร้อมปั๊มน้ำ</p>
						<p align = left>	👉 ฟรีมิเตอร์น้ำประปา,มิเตอร์ไฟฟ้า</p>
						<p align = left>	👉 ติดวอลล์เปเปอร์ทั้งหลัง</p>
					</a>	
					</div>
				</div>
				<div class="span4 animated flyIn">
					<div class="service-box">
						<a href="#">
						<img src="img/icons/home1.png" alt="" />
						<h2>บ้านแสนดี บ้านแววดาว</h2>
						<p align = left>	👉 จองเพียง  5,000  บาท</p>
						<p align = left>	👉 เงินทำสัญญา  45,000  บาท ภายใน  15 วัน ได้รับของแถมมาตราฐาน ดังนี้</p>
						<p align = left>	👉 ระบบฉีดปลวกใต้อาคาร</p>
						<p align = left>	👉 มุ้งลวดทุกบาน</p>
						<p align = left>	👉 ปั้มน้ำ </p>
						<p align = left>	👉 ถังเก็บน้ำ 1000 ลิตร</p>
						<p align = left>	👉 ฟรีมิเตอร์น้ำประปา,มิเตอร์ไฟฟ้า</p>
						<p align = left>	👉 ปูหญ้าให้รอบบ้าน</p>
						</a>
					</div>
				</div>
				<div class="span4 animated-fast flyIn">
					<div class="service-box">
							<a href="modernville.html">
						<img src="img/icons/home2.png" alt="" />
						<h2>Sandee Modern Ville</h2>
						<p align = left>	👉 ฟังก์ชั่นครบ 3 ห้องนอน / 2ห้องน้ำ / 2 ที่จอดรถ</p>
						<p align = left>	👉 คุณภาพจากวัสดุเกรดมาตราฐาน</p>
						<p align = left>	👉 ดีไซน์สไตล์โมเดิร์นผสมผสาน</p>
						<p align = left>	👉 ห้องนอนใหญ่พร้อม ห้องทำงานส่วนตัว</p>
							</a>
						
					</div>
				</div>
				
			</div>
			-->
		</div>
	</section>
	<!-- end section: services -->
	<!-- section: works -->
	<section id="works" class="section">
		<div class="container clearfix">
			<h4>ทาวน์โฮมชั้นเดียว</h4>
			<!-- portfolio filter -->
			<div class="row">
				<div id="filters" class="span12">
					<ul class="clearfix">
						<li>
							<a href="#" data-filter="*" class="active">
								<h5>All</h5>
							</a>
						</li>
						<li>
							<a href="#" data-filter=".print">
								<h5>หน้าบ้าน</h5>
							</a>
						</li>
						<li>
							<a href="#" data-filter=".web">
								<h5>ห้องนอน</h5>
							</a>
						</li>
						<li>
							<a href="#" data-filter=".design">
								<h5>ห้องนั่งเล่น</h5>
							</a>
						</li>
						<li>
							<a href="#" data-filter=".photography">
								<h5>ห้องครัว</h5>
							</a>
						</li>
					</ul>
				</div>
				<!-- END PORTFOLIO FILTERING -->
			</div>
			<div class="row">
				<div class="span12">
					<div id="portfolio-wrap">
						<!-- portfolio item -->
						<div class="portfolio-item grid print">
							<div class="portfolio">
								<a href="img/works/1.png" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
						<img src="img/works/1.png" alt="" />
						<div class="portfolio-overlay">
							<div class="thumb-info">
								<h5>ดูรูปใหญ่</h5>
								<i class="icon-plus icon-2x"></i>
							</div>
						</div>
						</a>
							</div>
						</div>
						<!-- end portfolio item -->
						<!-- portfolio item -->
						<div class="portfolio-item grid print">
							<div class="portfolio">
								<a href="img/works/2.png" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
						<img src="img/works/2.png" alt="" />
						<div class="portfolio-overlay">
							<div class="thumb-info">
								<h5>ดูรูปใหญ่</h5>
								<i class="icon-plus icon-2x"></i>
							</div>
						</div>
						</a>
							</div>
						</div>
						<!-- end portfolio item -->
						<!-- portfolio item -->
						<div class="portfolio-item grid print">
							<div class="portfolio">
								<a href="img/works/3.png" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
						<img src="img/works/3.png" alt="" />
						<div class="portfolio-overlay">
							<div class="thumb-info">
								<h5>ดูรูปใหญ่</h5>
								<i class="icon-plus icon-2x"></i>
							</div>
						</div>
						</a>
							</div>
						</div>
						<!-- end portfolio item -->
						<!-- portfolio item -->
						<div class="portfolio-item grid web">
							<div class="portfolio">
								<a href="img/works/4.png" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
						<img src="img/works/4.png" alt="" />
						<div class="portfolio-overlay">
							<div class="thumb-info">
								<h5>ดูรูปใหญ่</h5>
								<i class="icon-plus icon-2x"></i>
							</div>
						</div>
						</a>
							</div>
						</div>
						<!-- end portfolio item -->
						<!-- portfolio item -->
						<div class="portfolio-item grid web">
							<div class="portfolio">
								<a href="img/works/5.png" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
						<img src="img/works/5.png" alt="" />
						<div class="portfolio-overlay">
							<div class="thumb-info">
								<h5>ดูรูปใหญ่</h5>
								<i class="icon-plus icon-2x"></i>
							</div>
						</div>
						</a>
							</div>
						</div>
						<!-- end portfolio item -->
						<!-- portfolio item -->
						<div class="portfolio-item grid web">
							<div class="portfolio">
								<a href="img/works/6.png" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
						<img src="img/works/6.png" alt="" />
						<div class="portfolio-overlay">
							<div class="thumb-info">
								<h5>ดูรูปใหญ่</h5>
								<i class="icon-plus icon-2x"></i>
							</div>
						</div>
						</a>
							</div>
						</div>
						<!-- end portfolio item -->
						<!-- portfolio item -->
						<div class="portfolio-item grid design">
							<div class="portfolio">
								<a href="img/works/7.png" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
						<img src="img/works/7.png" alt="" />
						<div class="portfolio-overlay">
							<div class="thumb-info">
								<h5>ดูรูปใหญ่</h5>
								<i class="icon-plus icon-2x"></i>
							</div>
						</div>
						</a>
							</div>
						</div>
						<!-- end portfolio item -->
						<!-- portfolio item -->
						<div class="portfolio-item grid design">
							<div class="portfolio">
								<a href="img/works/8.png" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
						<img src="img/works/8.png" alt="" />
						<div class="portfolio-overlay">
							<div class="thumb-info">
								<h5>ดูรูปใหญ่</h5>
								<i class="icon-plus icon-2x"></i>
							</div>
						</div>
						</a>
							</div>
						</div>
						<!-- end portfolio item -->
						<!-- portfolio item -->
						<div class="portfolio-item grid photography">
							<div class="portfolio">
								<a href="img/works/9.png" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
						<img src="img/works/9.png" alt="" />
						<div class="portfolio-overlay">
							<div class="thumb-info">
								<h5>ดูรูปใหญ่</h5>
								<i class="icon-plus icon-2x"></i>
							</div>
						</div>
						</a>
							</div>
						</div>
						<!-- end portfolio item -->
						<!-- portfolio item -->
						<div class="portfolio-item grid photography">
							<div class="portfolio">
								<a href="img/works/10.png" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
						<img src="img/works/10.png" alt="" />
						<div class="portfolio-overlay">
							<div class="thumb-info">
								<h5>ดูรูปใหญ่</h5>
								<i class="icon-plus icon-2x"></i>
							</div>
						</div>
						</a>
							</div>
						</div>
						<!-- end portfolio item -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- spacer section -->
	<section class="spacer bg3">
		<div class="container">
			<div class="row">
				<div class="span12 aligncenter flyLeft">
					<blockquote class="large">
						เริ่มต้น | ครอบครัว | อบอุ่น
					</blockquote>
				</div>
				<div class="span12 aligncenter flyRight">
					<i class="icon-home icon-10x"></i>
				</div>
			</div>
		</div>
	</section>
	<!-- end spacer section -->
	<!-- section: blog -->
	<section id="blog" class="section">
		<div class="container">
			<h4>แผนที่</h4>
			<!-- Three columns -->
			<div class="row">
				<div class="span12 aligncenter flyLeft">
						<blockquote>
								<a href="img/blog/map.jpg" class="portfolio-image">
									<img src="img/blog/map.jpg" alt="" /></a>
						</blockquote>
					
				</div>
				
				
		
			</div>
			<!--<div class="blankdivider30"></div>
			<div class="aligncenter">
				<a href="#" class="btn btn-large btn-theme">More blog post</a>
			</div> -->
		</div>
	</section>

	<!-- end spacer section -->
	<!-- section: contact -->
	
				<!-- ./span12 -->
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="row">
				<div class="span6 offset3">
					<ul class="social-networks">
						
						<li><a href="https://www.facebook.com/sandeetowns/ " target='_blank'><i class="icon-circled icon-bgdark icon-facebook icon-2x"></i></a></li>
						
					</ul>
					<p class="copyright">
						&copy; SANDEE TOWN
						<div class="credits">
							<!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Maxim
              -->
							Designed by <a href="#">SANDEE TOWN</a>
						</div>
					</p>
				</div>
			</div>
		</div>
		<!-- ./container -->
	</footer>
	<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/jquery.nav.js"></script>
	<script src="js/jquery.localScroll.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/isotope.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/inview.js"></script>
	<script src="js/animate.js"></script>
	<script src="js/custom.js"></script>
	<script src="contactform/contactform.js"></script>

</body>

</html>
