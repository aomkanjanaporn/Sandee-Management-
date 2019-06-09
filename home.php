<?
require_once("config.inc.php");
if($_SESSION['id']==""){
	echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=logout.php'>";
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

    <link href="img/sandeeLogo.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  

    <style type="text/css">
        @font-face {
            font-family: "Sukhumvit Set";
            src: url("./font/sukhumvitset.ttf");
        }
        
        .cpt {
            cursor: pointer;
        }
		.br5{}
    </style>

    <script>
        function Call_Inint_AJAX(){
            var _HttPRequest = false;
            if (window.XMLHttpRequest) { // Mozilla, Safari,...
                _HttPRequest = new XMLHttpRequest();
                if (_HttPRequest.overrideMimeType) {
                    _HttPRequest.overrideMimeType('text/html');
                }
            } else if (window.ActiveXObject) { // IE
                try {
                    _HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
                } catch(e) {
                    try {
                        _HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch(e) {}
                }
            } 
            return _HttPRequest;
        }

        function edit_project(id){
                var x="edit_project.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
        function edit_user(id){
                var x="edit_user.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function edit_reserve(id){
                var x="edit_reserve.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function view_reserve(id){
                var x="view_reserve.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
        function delete_user(id){
                var x="delete_user.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){
                        create_user('1');
                        }
                }    
        }	
		function delete_reserve(id,pid){
                var x="delete_reserve.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){
                        reserving(pid);
                        }
                }    
        }
		function delete_news(id,pid){
                var x="delete_news.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){
                        create_news(pid);
                        }
                }    
        }
        function report(){
                var x="report.php";
                var p = "";
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                    }	
                }
		}
		 function take_feedback(){
                var x="take_feedback.php";
                var p = "";
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                    }	
                }
		}
		function reserving(id){
                var x="create_reserv.php";
                 var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
				HttPRequest.onreadystatechange = function(){
                     HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                    }
                }
                
        }
		 function desc(id){
                var x="desc.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function descr(id){
                var x="desc_report.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		 function changepassword(id){
                var x="changepassword.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function changep(v){
                var x="changep.php";
                var p = "cfmnewpassword="+v;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function list_ticket(id){
			var x="list_ticket.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
				HttPRequest.onreadystatechange = function(){
                     HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                    }
                }
		}
		function listproject_ticket(){
			var x="listproject_ticket.php";
                var p = "";
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
				HttPRequest.onreadystatechange = function(){
                     HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                    }
                }
		}
		function edit_listticket(id){
                var x="edit_listticket.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function edit_ticket(id){
                var x="edit_ticket.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function edit_ticketc(id){
                var x="desc.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function list_repairman(project_id){
			var x="list_repairman.php";
                var project_id = "project_id="+project_id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(project_id);
				HttPRequest.onreadystatechange = function(){
                     HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
					
                    }
                }
		}
		 function create_customer(id){
                var x="create_customer.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function create_usercustomer(id){
                var x="create_usercustomer.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function home_project(id){
                var x="home_homeproject.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function create_homeprojectlist(id){
                var x="create_homeprojectlist.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function edit_homeproject(id){
                var x="edit_homeproject.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function home_reserving(id){
                var x="home_reserving.php";
                var p = "";
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
				HttPRequest.onreadystatechange = function(){
                     HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                    }
                }
                
        }
		function create_employee(id){
                var x="create_employee.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function create_useremployee(id){
                var x="create_useremployee.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function create_admin(id){
                var x="create_admin.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function create_owner(id){
                var x="create_owner.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function edit_owner(id){
                var x="edit_owner.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function news(id){
                var x="listproject_news.php";
                var p = "";
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function create_news(id){
                var x="create_news.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function edit_news(id){
                var x="edit_news.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function get_news(id){
                var x="get_news.php";
                var p = "";
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function get_news(id){
                var x="get_news.php";
                var p = "";
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function print_reserve(id){
                var x="print_reserve.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function edit_useremployee(id){
                var x="edit_useremployee.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function edit_usercustomer(id){
                var x="edit_usercustomer.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function read_news(id){
                var x="read_news.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }
                
        }
		function noNumbers(event){
			if (/\D/g.test(event.currentTarget.value)){
				event.currentTarget.value = event.currentTarget.value.replace(/\D/g,"");
			}
		}

		function graph(id){
               window.location.href='home.php?r=g&id='+id;
       }
		function edit_repairman(id){
                var x="edit_repairman.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
                }     
        }	
		
		function del_ticket(id){
                var x="del_ticket.php";
                var p = "id="+id;
                var result="content";
                var HttPRequest = Call_Inint_AJAX();
                HttPRequest.open('POST',x,true);
                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HttPRequest.send(p);
                HttPRequest.onreadystatechange = function(){
                    if(HttPRequest.readyState == 4){
						report('0');
					}
                }     
        }
		function edit_useradmin(id){
				var x="edit_useradmin.php";
				var p = "id="+id;
				var result="content";
				var HttPRequest = Call_Inint_AJAX();
				HttPRequest.open('POST',x,true);
				HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				HttPRequest.send(p);
				HttPRequest.onreadystatechange = function(){
					if(HttPRequest.readyState == 4){document.getElementById(result).innerHTML = HttPRequest.responseText;}
				}
						
		}		
		
		
    </script>
	

</head>

<?
    if($_GET['load']>0){
        $load=$_GET['load'];
        $onload="edit_project('$load');";
    }
    if($_GET['user']>0){
        $load=$_GET['user'];
        $onload="create_user('1');";
    }
	
	$function="";
	if($_GET['r']){
		$r=$_GET['r'];
		if($r=="report"){
			$function="report();";
		}if($r=="desc"){
			$function="desc('".$_GET['id']."');";
		}if($r=="edit_ticket"){
			$function="edit_ticket('".$_GET['id']."');";
		}if($r=="edit_ticketc"){
			$function="edit_ticketc('".$_GET['id']."');";
		}if($r=="create_admin"){
			$function="create_admin();";
		}
		if($r=="reserving"){
			$function="reserving(".$_GET['id'].");";
		}
		if($r=="create_news"){
			$function="create_news(".$_GET['id'].");";
		}
		if($r=="edit_news"){
			$function="create_news(".$_GET['id'].");";
		}
		if($r=="edit_reserve"){
			$function="edit_reserve(".$_GET['id'].");";
		}
		if($r=="updateprofile_news"){
			$function="create_news(".$_GET['id'].");";
		}
		if($r=="g"){
			
		}
	
	}
	if($_GET['error']){
		$r=$_GET['error'];
		if($r=="9"){
			$function2="create_admin('0');";
		}
	// manage redirect user 
	}
	if($_GET['user']){
		$user=$_GET['user'];
		if($user=="changepassword"){
			$function2="changepassword('".$_GET['id']."');";
		}
		if($user=="create_owner"){
			$function2="create_owner('".$_GET['id']."');";
		}
		if($user=="edit_owner"){
			$function2="edit_owner('".$_GET['id']."');";
		}
		if($user=="create_usercustomer"){
			$function2="create_usercustomer('".$_GET['id']."');";
		}
		if($user=="edit_usercustomer"){
			$function2="edit_usercustomer('".$_GET['id']."');";
		}
		if($user=="create_useremployee"){
			$function2="create_useremployee('".$_GET['id']."');";
		}
		if($user=="edit_useremployee"){
			$function2="edit_useremployee('".$_GET['id']."');";
		}
		if($user=="edit_useradmin"){
			$function2="edit_useradmin('".$_GET['id']."');";
		}
		
	
	}if($_GET['home']){
		$home=$_GET['home'];
		if($home=="create_homeprojectlist"){
			$function2="create_homeprojectlist('".$_GET['id']."');";
		}if($home=="edit_homeproject"){
			$function2="edit_homeproject('".$_GET['id']."');";
		}
	}
	if($_GET['repairman']){
		$repairman=$_GET['repairman'];
		if($repairman=="edit_repairman"){
			$function2="edit_repairman('".$_GET['id']."');";
		}if($repairman=="list_repairman"){
			$function2="list_repairman('".$_GET['id']."');";
		}
	}
?>




<body onload="<?echo $onload;echo $function;echo $function2;?>" style="font-family:'Sukhumvit Set';">
    <section id="container" class="sidebar-close">
    <!--  section  header tab logout -->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>

            <a href="home.php" class="logo"><b>SANDEE<span>TOWN</span></b></a> 

            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <br>
                    <form class="logout" action="logout.php" method="POST">
                        <input type="hidden" name="_token" value="2g3Z4JlH2Vozjufx5W5zc3ePHqF8KZungyJiP0nN">
                        <button class="cpt" style="float:left;width:80px;height:30px;font-size:14px;line-height:30px;text-align:center;background:#4ecdc4;color:#FFF;border-radius:5px;border:0px;" type="submit">Logout</button>
                    </form>
                </ul>
            </div>
        </header>
    <!-- //end section  header tab logout -->

    <!--  section aside bar -->
       <?
		include("layoutsBS/header.php");
		include("asidebar.php");
	   ?>
    <!--  end section aside bar -->
		
        <section id="main-content">
            <section id="content" class="wrapper site-min-height">
				 <?if($_SESSION['class']==0){?>
				
				<div style="margin:20px 0 50px 0px;float:left;width:100%;height:60px;font-size:20px;font-weight:bold;line-height:40px;text-align:center;color:#000;">
                <div style="margin-top:20px;float:left;width:280px;height:40px;font-size:20px;font-weight:bold;line-height:40px;text-align:center;color:#000;">
                    <font style="font-size:24px;"><i class="fa fa-angle-right"></i> SanDee Management</font>
                </div>
                <div onclick="add_project.style.display='block';" class="cpt" style="margin-top:20px;float:left;width:200px;height:40px;font-size:18px;line-height:40px;text-align:center;background:#4ecdc4;color:#FFF;border-radius:5px;border:0px solid red;">
					+ เพิ่มโครงการใหม่ 
                </div>
               
				 <div class="cpt" id="add_project" style="margin-top:20px;float:left;width:100%;height:60px;font-size:18px;line-height:60px;color:#000;display:none;">
				<form action="add_project.php" method="POST" enctype="multipart/form-data">	
					<input type="text" name="name" style="float:left;width:200px;hieght:20px;margin:10px 10px 0px 0px;" placeholder="ชื่อโครงการ"/>
					<input type="text" name="address" style="float:left;width:200px;hieght:20px;margin:10px 10px 0px 0px;" placeholder="ที่อยู่"/>
					<input type="text" name="tel" style="float:left;width:200px;hieght:20px;margin:10px 10px 0px 0px;" placeholder="เบอร์โทรติดต่อ"/>
					
					<input type="text" name="" style="float:left;width:60px;hieght:20px;margin:10px 10px 0px 0px;text-align:center;" disabled placeholder="" value="รูปภาพ"/>
					<input type="file" name="pic" accept="image/*" style="float:left;width:200px;hieght:20px;margin:10px 10px 0px 0px;text-align:center;" />
					
					<button class="cpt" style="float:left;width:80px;height:30px;font-size:14px;line-height:30px;text-align:center;background:#4ecdc4;color:#FFF;border-radius:5px;border:0px;" type="submit">สร้าง</button>
				</form>
                </div>
                 </div>
				 <?}?>
				<div class="row mt" style="float:left;margin-top:30px;">
                    <div class="col-lg-12">
			<?if($_SESSION['class']==0){
						$sql="select * from project where 1";
						$result=Query($sql);
						while($rows=mysql_fetch_assoc($result)){
							?>

                            <div onclick="edit_project('<?echo $rows['project_id'];?>');" class="cpt" style="float:left;width:200px;height:300px;border:1px solid border:1px solid #22242a;;margin:20px;">
                                <div style="float:left;width:200px;height:240px;">
                                
                                    <img src="barn_img/<?echo $rows['project_image'];?>" style="float:left;width:200px;height:240px;" />
                                </div>
                                <div style="float:left;width:200px;height:40px;line-height:40px;text-align:center;font-weight:bold;font-size:16px;background:#22242a;color:#fff;">
                                    <?echo $rows['project_name'];?>
                                </div>
                            </div>

                            <?

						}
					}elseif($_SESSION['class']=="3"){
						include("get_news.php");
					}elseif($_SESSION['class']=="2"){
						include("get_news.php");
					}elseif($_SESSION['class']=="1"){
						include("get_news.php");
					}?>
                    </div>
                </div>
            </section>

        </section>

        <footer class="site-footer">
            <div class="text-center">
                <p>
                    © Copyrights <strong>SanDee Town</strong>. All Rights Reserved
                </p>
                <div class="credits">

                </div>
                <a href="blank.html" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
    </section>

    <script src=" js/jquery.min.js" type="text/javascript"></script>
    <script src=" js/bootstrap.min.js" type="text/javascript"></script>
    <script src=" js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src=" js/jquery.ui.touch-punch.min.js"></script>
    <script src=" js/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript"></script>
    <script src=" js/jquery.scrollTo.min.js"></script>
    <script src=" js/jquery.nicescroll.js" type="text/javascript"></script>

	
	<script type="text/javascript" src="jquery.flot.js"></script>
	<script type="text/javascript" src="jquery.flot.time.js"></script>
	<script type="text/javascript" src="jquery.flot.tooltip.custom.js"></script>

	
    <script src=" js/common-scripts.js" type="text/javascript"></script>
    <div id="ascrail2000" class="nicescroll-rails" style="width: 3px; z-index: 1001; background: rgb(64, 64, 64); cursor: default; position: absolute; top: 0px; left: 750px; height: 375px; display: none;">
        <div style="position: relative; top: 0px; float: right; width: 3px; height: 0px; background-color: rgb(78, 205, 196); background-clip: padding-box; border-radius: 10px;"></div>
    </div>
    <div id="ascrail2000-hr" class="nicescroll-rails" style="height: 3px; z-index: 1001; background: rgb(64, 64, 64); top: 372px; left: 0px; position: absolute; cursor: default; display: none;">
        <div style="position: relative; top: 0px; height: 3px; width: 0px; background-color: rgb(78, 205, 196); background-clip: padding-box; border-radius: 10px;"></div>
    </div>

</body>

</html>