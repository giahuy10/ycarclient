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
   define('JPATH_BASE', 'driver/');
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
$booking = new stdClass();


$booking->start_point = JRequest::getVar('start_point');
$booking->end_point=JRequest::getVar('end_point');


$booking->distance_km=JRequest::getVar('distance_km');
$booking->ref= JRequest::getVar('ref');
$booking->ref_url= JRequest::getVar('ref_url');




$booking->flight_number=JRequest::getVar('flight_number');
$booking->name=JRequest::getVar('name');
$booking->phone=JRequest::getVar('phone');
$booking->distance_booking=JRequest::getVar('distance_booking');
$booking->date=JRequest::getVar('date');

//$booking->time=JRequest::getVar('time');
$car_type = JRequest::getVar('car_type');
$price = explode("|",$car_type);
$real_price = $price[0];
$sale_price = $price[1];
if (!$sale_price)
	$sale_price = $real_price;
$booking->car_type=$real_price;
$booking->sale_price=$sale_price;
$booking->comment=JRequest::getVar('comment');
$booking->created=date('Y-m-d');
$booking->coupon=JRequest::getVar('coupon');
$booking->type_of_car=JRequest::getVar('type_of_car');
$booking->way=JRequest::getVar('type_of_way');
// Insert the object into the user profile table.
$result = JFactory::getDbo()->insertObject('#__uber_booking', $booking);


$kms = $booking->distance_booking;
$hour = strtotime($booking->date);
$hour = date('H', $hour);

$job = new stdClass();
$job->is_airport = 2;


if (JRequest::getVar('add_location')) {
	if (JRequest::getVar('address_1')) {
		$real_price=$real_price+30000;
		$sale_price=$sale_price+30000;
	}
	if (JRequest::getVar('address_2')) {
		$real_price=$real_price+30000;
		$sale_price=$sale_price+30000;
	}
}

if ($booking->start_point == "Sân bay Nội Bài, Sóc Sơn, Hanoi, Vietnam" || $booking->start_point == "Noi Bai International Airport, Sóc Sơn, Hanoi, Vietnam" || $booking->start_point == "Noi Bai International Terminal 2, Phú Cường, Hanoi, Vietnam")
{
	$way = 2;
	$job->is_airport = 1;
	
	
	if ($hour >= 0 && $hour <=5) {
		$job->fee = $real_price*0.95;
		
	}elseif ($hour > 5 && $hour <=17){
		$job->fee = $real_price*0.8;
	}else {
		$job->fee = $real_price*0.85;
	}
	
	
}
if($booking->end_point == "Sân bay Nội Bài, Sóc Sơn, Hanoi, Vietnam" || $booking->end_point == "Noi Bai International Airport, Sóc Sơn, Hanoi, Vietnam" || $booking->end_point == "Noi Bai International Terminal 2, Phú Cường, Hanoi, Vietnam") {
	$job->is_airport = 1;
	$way = 1;
	if ($hour >= 0 && $hour <=9) {
		$job->fee = $real_price*0.9;
		
	}else {
		$job->fee = $real_price*0.85;
	}
	
}
if (JRequest::getVar('invoice') == 1){
	$sale_price = $sale_price + $real_price*0.1;
	$real_price = $real_price*1.1;
	
}	

$job->customer_name=JRequest::getVar('name');
$job->customer_phone=JRequest::getVar('phone');
$job->flight_number=JRequest::getVar('flight_number');
$job->add_location= JRequest::getVar('add_location');
$job->address_1= JRequest::getVar('address_1');
$job->address_2= JRequest::getVar('address_2');
$job->invoice= JRequest::getVar('invoice');
$job->company= JRequest::getVar('company');
$job->mst= JRequest::getVar('mst');
$job->address= JRequest::getVar('address');
$job->address_inoivce= JRequest::getVar('address_inoivce');

$job->distance_booking=JRequest::getVar('distance_booking');
$kms = $job->distance_booking;




$job->pick_up_location = JRequest::getVar('start_point');
$job->pick_up_time=$booking->date;
$job->drop_location=JRequest::getVar('end_point');
$job->way=JRequest::getVar('type_of_way');
$job->price=$real_price;
$job->sale_price=$sale_price;
$job->comment=JRequest::getVar('comment');
$job->number_seat=JRequest::getVar('type_of_car');
if ($job->number_seat == "5 chỗ 1 chiều" ||$job->number_seat == "5 chỗ 2 chiều") {
	$job->number_seat = 1;
}else {
	$job->number_seat = 2;
}




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
		<td>".$booking->start_point."</td>
	</tr>
	<tr>
		<td>Mã chuyến bay</td>
		<td>".$booking->flight_number."</td>
	</tr>
	
	<tr>
		<td>Điểm trả khách</td>
		<td>".$booking->end_point."</td>
	</tr>
	<tr>
		<td>Quãng đường dự kiến</td>
		<td>".$booking->distance_booking." km</td>
	</tr>
	<tr>
		<td>Ngày đón</td>
		<td>".JRequest::getVar('date')."</td>
	</tr>
	<tr>
		<td>Giờ đón</td>
		<td>".JRequest::getVar('time')."</td>
	</tr>
	<tr>
		<td>Loại xe</td>
		<td>".JRequest::getVar('type_of_car')."</td>
	</tr>
	<tr>
		<td>Chiều</td>
		<td>".JRequest::getVar('type_of_way')." chiều</td>
	</tr>
	<tr>
		<td>Giá</td>
		<td>".number_format($car_type)." vnđ</td>
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
		<td>".$booking->ref."</td>
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