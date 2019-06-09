<?
require_once("config.inc.php");
if($_SESSion['id']>0){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";
	exit();
}

if($_SESSION['user_email']!=""&&$_SESSION['user_password']!=""){
	?>
	  <form method="POST" class="form-login" action="login.php" aria-label="Login" name="qlogin">
		<input type="hidden" name="email" value="<?echo $_SESSION['user_email'];?>">      
		<input type="hidden" name="password" value="<?echo $_SESSION['user_password'];?>">            							<h2 class="form-login-heading">SanDee Management</h2>
      </form>
	  <script>
	  document.qlogin.submit();
	  </script>
	<?
	exit();
}


?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>SANDEE TOWN</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="css/font-awesome.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">


</head>

<body>
    <div class="panel-body">
                <div id="login-page">
                    <div class="container">
                        <form method="POST" class="form-login" action="login.php" aria-label="Login">
                            <input type="hidden" name="_token" value="VDRJaCq5yeuE50SrvPKix5JGjfUpNTKdzSUUqgHl">                            <h2 class="form-login-heading">SanDee Management</h2>
                            <div class="login-wrap">
                                <input id="email" type="email" style="width:300px;" class="form-control form-control-inline input-medium" name="email"  placeholder="Username Or E-mail" required="" autofocus="" autocomplete="off">
                                                            <br>
                                <input id="password" type="password" placeholder="Password" style="width:300px;" class="form-control form-control-inline input-medium" name="password" required="" >

                                                            <br>
                                
                                <button type="submit" class="btn btn-theme btn-block"><i class="fa fa-lock"></i>
                                    Login
                                </button>
                            <br>
                                <a style="display:none;" class="btn btn-link center" href="http://127.0.0.1:8000/password/reset">
                                    Forgot Your Password?
                                </a>
                                
                            </div>
                        </form>
                </div>
    </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("login-custom-bg1.png", {
      speed: 500
    });
  </script>



</div><div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 736px; width: 766px; z-index: -999999; position: fixed;"></div></body></html>