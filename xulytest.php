<?php
if (!defined('_JEXEC'))
{
    // Initialize Joomla framework
    define('_JEXEC', 1);
}

// Load system defines
if (file_exists(dirname(__FILE__) . '/defines.php'))
{
    require_once dirname(__FILE__) . '/defines.php';
}
if (!defined('JPATH_BASE'))
{
   define('JPATH_BASE', '../ycardriver/');
}
if (!defined('_JDEFINES'))
{
    require_once JPATH_BASE . '/includes/defines.php';
}

// Get the framework.
require_once JPATH_BASE . '/includes/framework.php';

$app = JFactory::getApplication('site');
$app->initialise();
// Create and populate an object.
$jinput = JFactory::getApplication()->input;



$start_point = JRequest::getVar('start_point');
$end_point=JRequest::getVar('end_point');


$kms = JRequest::getVar('distance_km');

$date=JRequest::getVar('date');

$hour = strtotime($date);
$hour = date('H', $hour);
$real_price = JRequest::getVar('total_price');
$sale_price = JRequest::getVar('total_sale_price');
if (!$sale_price) {
	$sale_price = $real_price;
}
$job = new stdClass();
$job->is_airport = 2;


$job->fee = $real_price*0.8;

if ($start_point == "Sân bay Nội Bài, Sóc Sơn, Hanoi, Vietnam" || $start_point == "Noi Bai International Airport, Sóc Sơn, Hanoi, Vietnam" || $start_point == "Noi Bai International Terminal 2, Phú Cường, Hanoi, Vietnam")
{

	$job->is_airport = 1;
	
	
	if ($hour >= 0 && $hour <=5) {
		$job->fee = $real_price*0.95;
		
	}elseif ($hour > 5 && $hour <=17){
		$job->fee = $real_price*0.8;
	}else {
		$job->fee = $real_price*0.85;
	}
	
	
}
if($end_point == "Sân bay Nội Bài, Sóc Sơn, Hanoi, Vietnam" || $end_point == "Noi Bai International Airport, Sóc Sơn, Hanoi, Vietnam" || $end_point == "Noi Bai International Terminal 2, Phú Cường, Hanoi, Vietnam") {
	$job->is_airport = 1;
	
	if ($hour >= 0 && $hour <=9) {
		$job->fee = $real_price*0.9;
		
	}else {
		$job->fee = $real_price*0.85;
	}
	
}


$job->customer_name=JRequest::getVar('name');
$job->customer_phone=JRequest::getVar('phone');
$job->flight_number=JRequest::getVar('flight_number');
$job->add_location= JRequest::getVar('add_location');
if ($job->add_location) {
	$job->address_1= JRequest::getVar('address_1');
	$job->address_2= JRequest::getVar('address_2');
}

$job->invoice= JRequest::getVar('invoice');
if ($job->invoice) {
	$job->fee = $job->fee/1.1;
}
$job->company= JRequest::getVar('company');
$job->mst= JRequest::getVar('mst');
$job->address= JRequest::getVar('address');
$job->address_inoivce= JRequest::getVar('address_inoivce');

$job->distance_booking=JRequest::getVar('distance_booking');





$job->pick_up_location = JRequest::getVar('start_point');
$job->pick_up_time=$date;
$job->drop_location=JRequest::getVar('end_point');
$job->way=JRequest::getVar('way');

$job->price=$real_price;
$job->sale_price=$sale_price;
$job->comment=JRequest::getVar('comment');
$job->number_seat=JRequest::getVar('car_type');

$job->ref=JRequest::getVar('ref');



// Insert the object into the user profile table.
$result2 = JFactory::getDbo()->insertObject('#__uber_job', $job);

$db = JFactory::getDbo();

// Create a new query object.
$query = $db->getQuery(true);

// Select all records from the user profile table where key begins with "custom.".
// Order it by the ordering field.
$query->select($db->quoteName('id'));
$query->from($db->quoteName('#__uber_job'));
$query->order('id DESC');

// Reset the query using our newly populated query object.
$db->setQuery($query);

// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$new_id = $db->loadResult();


   
$mailer = JFactory::getMailer();

$config = JFactory::getConfig();
$sender = array( 
    $config->get( 'mailfrom' ),
    $config->get( 'fromname' ) 
);

$mailer->setSender($sender);
$recipient = array( 'lyht@onecard.vn','thuydt@onecard.vn' );

$mailer->addRecipient($recipient);
$body   = "<h2><b>Chuyến số ".$new_id ." ngày ".date('d-m-Y')."</b></h2>
<h3>Thông tin khách hàng</h3>
<table>
	<tr>
		<td>Tên khách hàng</td>
		<td>".JRequest::getVar('name')."</td>
	</tr>
	<tr>
		<td>Số điện thoại</td>
		<td><a href='tel:".JRequest::getVar('phone')."'>".JRequest::getVar('phone')."</a></td>
	</tr>
	<tr>
		<td>Điểm đón</td>
		<td>".$job->start_point."</td>
	</tr>
	<tr>";
	if ($job->flight_number) {
		$body  .="<td>Mã chuyến bay</td>
		<td>".$job->flight_number."</td>";
	}
		
	$body  .="</tr>
	
	<tr>
		<td>Điểm trả khách</td>
		<td>".$job->end_point."</td>
	</tr>
	<tr>
		<td>Quãng đường dự kiến</td>
		<td>".$job->distance_booking." km</td>
	</tr>
	<tr>
		<td>Ngày đón</td>
		<td>".JRequest::getVar('date')."</td>
	</tr>
	
	<tr>
		<td>Loại xe</td>
		<td>".$job->number_seat."</td>
	</tr>
	<tr>
		<td>Chiều</td>
		<td>".JRequest::getVar('way')." chiều</td>
	</tr>
	<tr>
		<td>Giá</td>
		<td>".number_format($real_price)." vnđ</td>
	</tr>
	<tr>
		<td>Giá khuyến mại</td>
		<td>".number_format($sale_price)." vnđ</td>
	</tr>
	<tr>
		<td>Ghi chú</td>
		<td>".JRequest::getVar('comment')."</td>
	</tr>
	<tr>
		<td>Coupon</td>
		<td>".JRequest::getVar('coupon')."</td>
	</tr>
	<tr>
		<td>Người giới thiệu</td>
		<td>".$job->ref."</td>
	</tr>
</table>
";

$mailer->setSubject('Khách hàng đặt xe mới ');
$mailer->isHtml(true);

$mailer->setBody($body);
$send = $mailer->Send();
if ( $send !== true ) {
    echo 'Error sending email: ';
} else {
    echo 'Mail sent';
}

// SEND SMS:


		
		$APIKey="2A00924E0B265978F73EB9B28088DF";
		$SecretKey="C60751C63C7740DCD5F0886E3DCA18";
		$YourPhone=JRequest::getVar('phone');
		$Content="Quy khach da dat thanh cong chuyen xe mã ".$new_id ."  don luc ".date ("G:i - d/m/Y",strtotime(JRequest::getVar('date'))).". Giá: ".number_format($sale_price)."d. Tai xe YCAR.VN se lien he voi quy khach trong thoi gian som nhat. Hotline: 0917999941.";
		
		
		$SendContent=urlencode($Content);
		$data="http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone=$YourPhone&ApiKey=$APIKey&SecretKey=$SecretKey&Content=$SendContent&SmsType=2&Brandname=YCAR.VN";
		
		$curl = curl_init($data); 
		curl_setopt($curl, CURLOPT_FAILONERROR, true); 
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
		$result = curl_exec($curl); 
			
		$obj = json_decode($result,true);
		if($obj['CodeResult']==100)
		{
			print "<br>";
			print "CodeResult:".$obj['CodeResult'];
			print "<br>";
			print "CountRegenerate:".$obj['CountRegenerate'];
			print "<br>";     
			print "SMSID:".$obj['SMSID'];
			print "<br>";
		}
		else
		{
			print "ErrorMessage:".$obj['ErrorMessage'];
		}
		
	
