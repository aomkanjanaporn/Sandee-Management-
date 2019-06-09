<?
require_once("config.inc.php");

$id=$_GET['id'];

$sql="select * from reserve  where reserve_id='".$id."'";
$result=Query($sql);
$rowsd=mysql_fetch_assoc($result);
//include("layoutsBS/header.php");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
      
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
   <meta name="viewport" content="width=1600px" />
 <body onload="countdown();self.print();">
	  <div style="width:100%;height:auto;position:absolute;top:0px;left:0px;font-family:verdana;background-color:#FFF;">
	 
					    <center>
                          <div style="float:middle;width:1024px;height:auto;background-color:#FFF;">
							  <div style="float:left;width:100%;height:70px;line-height:70px;margin-top:50px;">
								<font style="font-size:24px;font-weight:bold;">
									<img src="/barn_img/842b7759a9edb446f7b0a4e250a0cfad.png" style="width:100px;">
                                </font>
								</div>
								<div style="float:left;width:100%;height:70px;line-height:70px;margin-top:50px;">
								<font style="font-size:18px;">
									ใบเสร็จรับเงิน
                                </font>
                              </div>
                              <div style="float:left;width:100%;height:1000px;">
                                <table style="width:100%;color:#000;">
                                 
                                  <tr>
                                    <td colspan="5" style="text-align:right;"> เลขที่ No..................../..................</td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="5" style="text-align:right;"> วันที่ Date......................./..................</td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
								  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
								  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2"><b> ชื่อลูกค้า : </b> <?echo $rowsd['name'];?></td>
                                    <td colspan="3"><b> เลขบัตรประจำตัวประชาชน : </b> <?echo $rowsd['person_id'];?></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2"> <b>ที่อยู่ : </b> <?echo $rowsd['person_id'];?></td>
                                    <td colspan="2"> <b>Line ID : </b> <?echo $rowsd['line_id'];?></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
								  <tr>
                                    <td colspan="2"> <b>เบอร์โทรศัพท์  : </b> <?echo $rowsd['phone_no'];?></td>
                                    <td colspan="3"> <b>E-mail : </b> <?echo $rowsd['email'];?></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                </table>
                                <table style="width:100%;min-height:400px;color:#000;border:1px solid black;">
                                  <tr>
                                    <td style="text-align:center;">ห้อง
                                      <br/>Room
                                    </td>
                                    <td style="text-align:center;">รายการ
                                      <br/>DESCRIPTION
                                    </td>
                                    <td style="text-align:center;">จำนวน
                                      <br/>QUANTITY
                                    </td>
                                    <td style="text-align:center;">ราคาต่อหน่วย
                                      <br/>UNIT PRICE
                                    </td>
                                    <td style="text-align:center;">จำนวนเงิน
                                      <br/>AMOUNT
                                    </td>
                                  </tr>
                                  <tr >
                                    <td style="text-align:center;">P.2</td>
                                    <td style="text-align:left;">&nbsp;ชำระเงินจอง</td>
                                    <td style="text-align:center;">&nbsp;1</td>
                                    <td style="text-align:center;">&nbsp;<?echo $rowsd['Bpayment'];?></td>
                                    <td style="text-align:center;">&nbsp;<?echo $rowsd['Bpayment'];?></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align:center;">P.2</td>
                                    <td style="text-align:left;">&nbsp;ชำระเงินทำสัญญา</td>
                                    <td style="text-align:center;">&nbsp;1</td>
                                    <td style="text-align:center;">&nbsp;<?echo $rowsd['Cpayment'];?></td>
                                    <td style="text-align:center;">&nbsp;<?echo $rowsd['Cpayment'];?></td>
                                  </tr>
                                  <tr>
                                     <td style="text-align:center;">P.2</td>
                                    <td style="text-align:left;">&nbsp;ชำระเงินค่าส่วนกลาง</td>
                                    <td style="text-align:center;">&nbsp;1</td>
                                    <td style="text-align:center;">&nbsp;<?echo $rowsd['Spayment'];?></td>
                                    <td style="text-align:center;">&nbsp;<?echo $rowsd['Spayment'];?></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
								 
                                  <tr>
                                    <td colspan="3" style="text-align:center;">  </td>
                                    <td style="text-align:center;"> รวมเงิน </td>
                                    <td style="text-align:center;">  <? echo $rowsd['Cpayment']+$rowsd['Bpayment']+$rowsd['Spayment'];?> </td>
                                  </tr>
                                </table>
								<br>
								<br>
								<br>
								<br>
                                <table style="width:100%;min-height:100px;color:#000;">
                                  <tr>
                                    <td colspan="5" style="text-align:right;"> ลงชื่อ............................................ผู้รับเงิน</td>
                                  </tr>
                                </table>
                              </div>
						</div>
					  </center>
					 </div>
	
	</body>	
		
<script type="text/javascript">
var ss = 2;
function countdown() {
ss = ss-1;
if (ss<=0) {
window.close();
}
else {
window.setTimeout("countdown()", 1000);
}
}



</script>