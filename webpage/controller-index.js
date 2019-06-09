function update_promotion(){
    $.ajax({
		url: "action.php",
		type: "post",
		data: {
			act:"update_promotion"
		},
		success: function (data) {
            var obj=JSON.parse(data);
            var tbody="";
           for(var i=0;i<3;i++)//เริ่มต้น ครอบครัว อบอุ่น
           {
               tbody+='<div class="span4 animated-fast flyIn">';
               tbody+='<div class="service-box">';
               tbody+='<a href="pages.php?id='+obj.data[i].project_id+'">';
               tbody+='<img src="../barn_img/'+obj.data[i].project_image+'" style="width: 300px;height:300px;">';
               tbody+=' <h2>'+obj.data[i].project_name+'</h2>';
               tbody+=' <p align = left>👉 '+obj.data[i].project_promotion+'</p>';
               tbody+='  <p align = left>👉 '+obj.data[i].project_promotion2+'</p>';
               tbody+=' <p align = left>👉 '+obj.data[i].project_promotion3+'</p>';
               tbody+='  <p align = left>👉 '+obj.data[i].project_promotion4+'</p>';
               tbody+=' <p align = left>👉 '+obj.data[i].project_promotion5+'</p>';
               tbody+='  </a>	';
               tbody+='   </div>';
               tbody+='  </div>';


           }
           console.log(tbody);
           
           $("#main-promotion").html("");
           $("#main-promotion").append(tbody);
		// document.getElementById("main-promotion").innerHTML(tbody);




		}

	});

}

function load_detail(id){ //รายละเอียดโปรโมชั่น
  var ids = id;
  $.ajax({
  url: "action.php",
  type: "post",
  data: {
    act:"load_detail",id:ids
  },
  success: function (data) {
          var obj=JSON.parse(data);
         $("#img-detail").html("");
         $("#img-detail").append("<img src='../barn_img/"+obj.data[0].project_image+"' style='width: 300px; border:solid 1px orange;padding: 1rem;'>");
         $("#detail").html("");
         $("#detail").append("<b>"+obj.data[0].project_desc+"</b>");
        var tbody="";
         
          tbody+='<div class="span4 animated-fast flyIn" style="height: 450px;">';
          tbody+='<div class="service-box" >';
          tbody+='<a >';
          tbody+='<div id="img1"></div>';
          // tbody+=' <h2>'+obj.data[i].project_name+'</h2>';
          tbody+=' <p align = center>👉 '+obj.data[0].project_promotion+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion2+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion3+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion4+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion5+'</p>';
          tbody+='  </a></center>	';
          tbody+='   </div>';
          tbody+='  </div>';

          tbody+='<div class="span4 animated-fast flyIn" style="height: 450px;">';
          tbody+='<div class="service-box">';
          tbody+='<a >';
          tbody+='<center><div id="img2"></div></center>';
          // tbody+=' <h2>'+obj.data[i].project_name+'</h2>';
          tbody+=' <p align = center>👉 '+obj.data[0].project_promotion2+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion2+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion3+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion4+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion5+'</p>';
          tbody+='  </a></center>	';
          tbody+='   </div>';
          tbody+='  </div>';

          tbody+='<div class="span4 animated-fast flyIn" style="height: 450px;">';
          tbody+='<div class="service-box">';
          tbody+='<a >';
          tbody+='<center><div id="img3"></div></center>';
          // tbody+=' <h2>'+obj.data[i].project_name+'</h2>';
          tbody+=' <p align = center>👉 '+obj.data[0].project_promotion3+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion2+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion3+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion4+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion5+'</p>';
          tbody+='  </a></center>	';
          tbody+='   </div>';
          tbody+='  </div>';

          tbody+='<div class="span6 animated-fast flyIn" style="height: 450px;">';
          tbody+='<div class="service-box">';
          tbody+='<a >';
          tbody+='<center><div id="img4" ></div></center>';
          // tbody+=' <h2>'+obj.data[i].project_name+'</h2>';
          tbody+=' <p align = center>👉 '+obj.data[0].project_promotion4+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion2+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion3+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion4+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion5+'</p>';
          tbody+='  </a></center>	';
          tbody+='   </div>';
          tbody+='  </div>';

          tbody+='<div class="span6 animated-fast flyIn" style="height: 450px;">';
          tbody+='<div class="service-box">';
          tbody+='<a >';
          tbody+='<center><div id="img5"></div></center>';
          // tbody+=' <h2>'+obj.data[i].project_name+'</h2>';
          tbody+=' <p align = center>👉 '+obj.data[0].project_promotion5+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion2+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion3+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion4+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion5+'</p>';
          tbody+='  </a></center>	';
          tbody+='   </div>';
          tbody+='  </div>';
          load_img_detail(obj.data[0].project_id);

          $("#detail-promotion").html("");
         $("#detail-promotion").append(tbody);

         



  }

});

}


function load_detail1(){ //ดูรายละเอียดแสนดีทาวน์ หลัก
  var ids = 1;
  $.ajax({
  url: "action.php",
  type: "post",
  data: {
    act:"load_detail",id:ids
  },
  success: function (data) {
          var obj=JSON.parse(data);
          console.log(obj);
         $("#img-detail").html("");
         $("#img-detail").append("<img src='../barn_img/"+obj.data[0].project_image+"' style='width: 400px;'>");
         $("#detail").html("");
         $("#detail").append("<b>"+obj.data[0].project_desc+"</b>");
        var tbody="";
         
          tbody+='<div class="span4 animated-fast flyIn" style="height: 450px;">';
          tbody+='<div class="service-box" >';
          tbody+='<a >';
          tbody+='<div id="img1"></div>';
          // tbody+=' <h2>'+obj.data[i].project_name+'</h2>';
          tbody+=' <p align = center>👉 '+obj.data[0].project_promotion+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion2+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion3+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion4+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion5+'</p>';
          tbody+='  </a></center>	';
          tbody+='   </div>';
          tbody+='  </div>';

          tbody+='<div class="span4 animated-fast flyIn" style="height: 450px;">';
          tbody+='<div class="service-box">';
          tbody+='<a >';
          tbody+='<center><div id="img2"></div></center>';
          // tbody+=' <h2>'+obj.data[i].project_name+'</h2>';
          tbody+=' <p align = center>👉 '+obj.data[0].project_promotion2+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion2+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion3+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion4+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion5+'</p>';
          tbody+='  </a></center>	';
          tbody+='   </div>';
          tbody+='  </div>';

          tbody+='<div class="span4 animated-fast flyIn" style="height: 450px;">';
          tbody+='<div class="service-box">';
          tbody+='<a >';
          tbody+='<center><div id="img3"></div></center>';
          // tbody+=' <h2>'+obj.data[i].project_name+'</h2>';
          tbody+=' <p align = center>👉 '+obj.data[0].project_promotion3+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion2+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion3+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion4+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion5+'</p>';
          tbody+='  </a></center>	';
          tbody+='   </div>';
          tbody+='  </div>';

          tbody+='<div class="span6 animated-fast flyIn" style="height: 450px;">';
          tbody+='<div class="service-box">';
          tbody+='<a >';
          tbody+='<center><div id="img4" ></div></center>';
          // tbody+=' <h2>'+obj.data[i].project_name+'</h2>';
          tbody+=' <p align = center>👉 '+obj.data[0].project_promotion4+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion2+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion3+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion4+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion5+'</p>';
          tbody+='  </a></center>	';
          tbody+='   </div>';
          tbody+='  </div>';

          tbody+='<div class="span6 animated-fast flyIn" style="height: 450px;">';
          tbody+='<div class="service-box">';
          tbody+='<a >';
          tbody+='<center><div id="img5"></div></center>';
          // tbody+=' <h2>'+obj.data[i].project_name+'</h2>';
          tbody+=' <p align = center>👉 '+obj.data[0].project_promotion5+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion2+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion3+'</p>';
          // tbody+='  <p align = left>👉 '+obj.data[i].project_promotion4+'</p>';
          // tbody+=' <p align = left>👉 '+obj.data[i].project_promotion5+'</p>';
          tbody+='  </a></center>	';
          tbody+='   </div>';
          tbody+='  </div>';
          load_img_detail(obj.data[0].project_id);

          $("#detail-promotion").html("");
         $("#detail-promotion").append(tbody);

         



  }

});

}

function load_img_detail(id) //ALBUM STORY
{
    $.ajax({
		url: "action.php",
		type: "post",
		data: {
			act:"load_img",ids:id
		},
		success: function (data) {
            var obj=JSON.parse(data);
            console.log(obj);
            var tbody='';
            $("img1").html("");
         $("#img1").append("<a href='../photo_gallery/"+obj.data[0].img_name+"' target='_blank' alt=''/ ><img src='../photo_gallery/"+obj.data[0].img_name+"' style='width:300px;border: solid 1px #FFF;padding: 1rem;'></a>");
         $("img2").html("");
         $("#img2").append("<a href='../photo_gallery/"+obj.data[0].img_name+"' target='_blank' alt=''/ ><img src='../photo_gallery/"+obj.data[1].img_name+"' style='width:300px;border: solid 1px #FFF;padding: 1rem;'></a>");
         $("img3").html("");
         $("#img3").append("<a href='../photo_gallery/"+obj.data[0].img_name+"' target='_blank' alt=''/ ><img src='../photo_gallery/"+obj.data[2].img_name+"' style='width:300px;border: solid 1px #FFF;padding: 1rem;'></a>");
         $("img4").html("");
         $("#img4").append("<a href='../photo_gallery/"+obj.data[0].img_name+"' target='_blank' alt=''/ ><img src='../photo_gallery/"+obj.data[3].img_name+"' style='width:300px;border: solid 1px #FFF;padding: 1rem;'></a>");
         $("img5").html("");
         $("#img5").append("<a href='../photo_gallery/"+obj.data[0].img_name+"' target='_blank' alt=''/ ><img src='../photo_gallery/"+obj.data[4].img_name+"' style='width:300px;border: solid 1px #FFF;padding: 1rem;'></a>");
         for(var i=0;i<obj.num_data;i++)
         {
          tbody+='<div class="span4" style="padding-bottom: 25px;">';
          tbody+='<a href="../photo_gallery/'+obj.data[i].img_name+'" target="_blank" alt=""/ ><img src="../photo_gallery/'+obj.data[i].img_name+'" alt=""/ style="border:solid 1px orange;padding: 1rem;" ></a>';
          tbody+='</div>';
          
          

         }
         $("#img-div1").html("");
         $("#img-div1").append(tbody);
		




		}

	});

}

function load_img(id,i)
{
    $.ajax({
		url: "action.php",
		type: "post",
		data: {
			act:"load_img",ids:id
		},
		success: function (data) {
            var obj=JSON.parse(data);
           
		




		}

	});

}