 <meta charset="utf-8">
<?
require_once("config.inc.php");

$reserve_id=$_POST['reserve_id'];
$sqlServiceFee = "select * from payment_service_fee where reserve_id='$reserve_id' ";
$customer_name=$_POST['customer_name'];
$person_id=$_POST['person_id'];
$phone_no=$_POST['phone_no'];
$address=$_POST['address'];
$email=$_POST['email'];
$line_id=$_POST['line_id'];

//$home_id=$_POST['home_id'];
$price=$_POST['price'];
$area=$_POST['area'];
$living_space=$_POST['living_space'];
$text_price=$_POST['text_price'];


// Payment Booking
$Bpayment=$_POST['Bpayment'];
$desc_Bpayment=$_POST['desc_Bpayment'];

// Payment Contract
$Cpayment=$_POST['Cpayment'];
$desc_Cpayment=$_POST['desc_Cpayment'];

// Payment Service Free
$Spayment=$_POST['Spayment'];
$desc_Spayment=$_POST['desc_Spayment'];

// update info reserve 
$sqlUpdateReserve="update reserve set name='$customer_name', person_id='$person_id', address='$address',phone_no='$phone_no',email='$email',line_id='$line_id'
,price='$price',text_price='$text_price',Bpayment='$Bpayment',Bdesc='$desc_Bpayment',Cpayment='$Cpayment',Cdesc='$desc_Cpayment'  
,Spayment='$Spayment',Sdesc='$desc_Spayment'where reserve_id='$reserve_id'";
$result=Query($sqlUpdateReserve);

echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php?r=edit_reserve&id=$reserve_id'>";
//echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";








?>