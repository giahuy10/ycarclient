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
$jinput = JFactory::getApplication()->input;
$view_report = $jinput->get('view_report');
$type_report = $jinput->get('type_report');
$current= date('Y-m-d');
// Get a db connection.
$db = JFactory::getDbo();

// Create a new query object.
$query = $db->getQuery(true);

// Select all records from the user profile table where key begins with "custom.".
// Order it by the ordering field.
$query->select('*');
$query->from($db->quoteName('#__uber_job'));
if ($type_report == "month") {
	$query->where('YEAR(pick_up_time) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)');
	$query->where('MONTH(pick_up_time) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)');
	$date_report = date("m-Y",strtotime("-1 month"));
}else {
	$query->where('DATE(pick_up_time) = CURDATE()');
	$date_report =date('d-m-Y');
}

$query->where($db->quoteName('state').'= 1');
$query->where($db->quoteName('price').'> 99000');
$query->order('id ASC');

// Reset the query using our newly populated query object.
$db->setQuery($query);

// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$bookings = $db->loadObjectList();

$html ="";
$html .='
<h2>Báo cáo Ycar.vn '.$date_report.'</h2>
<table style="width:100%; text-align: center;" border="1">
	<tr>
	
		
		<th>Loại chuyến đi</th>
	
		<th>Loại xe</th>
		<th>Giá </th>
		<th>Thu khách</th>
		<th>Trả lái xe</th>
		<th>Lợi nhuận</th>
	
		
	</tr>
';
$total = 0;
$total_sale = 0;
$total_driver = 0;
$total_ycar=0;
foreach ($bookings as $booking) {
	switch ($booking->number_seat) {
    case 1:
        $booking->number_seat = "5 chỗ ";
        break;
    case 2:
        $booking->number_seat = "7 chỗ ";
        break;
    case 3:
        $booking->number_seat = "8 chỗ ";
        break;
	 case 4:
        $booking->number_seat = "9 chỗ ";
        break;	
	 case 5:
        $booking->number_seat = "12 chỗ ";
        break;	
	case 6:
        $booking->number_seat = "16 chỗ ";
        break;		
	case 7:
        $booking->number_seat = "24 chỗ ";
        break;	
	case 8:
        $booking->number_seat = "29 chỗ ";
        break;	
	case 9:
        $booking->number_seat = "35 chỗ ";
        break;	
	case 10:
        $booking->number_seat = "45 chỗ ";
        break;		
    default:
        $booking->number_seat = "5 chỗ ";
	}
	if ($booking->is_airport == 1) {
		$booking->is_airport = "Sân bay";
	}else {
		$booking->is_airport="Đi tỉnh";
	}
	$driver =JFactory::getUser($booking->driver_id)->name;
	$html .='<tr>';
	//$html .='<td>'.$booking->customer_name.'<br/>'.$booking->customer_phone.'</td>';
	
	$html .='<td>'.$booking->is_airport.'</td>';
	//$html .='<td>'.$booking->pick_up_location.'</td>';
	//$html .='<td>'.$booking->pick_up_time.'</td>';
	//$html .='<td>'.$booking->drop_location.'</td>';
	$html .='<td>'.$booking->number_seat.'</td>';
	$html .='<td>'.number_format($booking->price).'</td>';
	$html .='<td>'.number_format($booking->sale_price).'</td>';
	$html .='<td>'.number_format($booking->fee).'</td>';
	$html .='<td>'.number_format($booking->sale_price - $booking->fee).'</td>';
	$total = $total+$booking->price;
	$total_sale = $total_sale+$booking->sale_price;
	$total_driver = $total_driver+$booking->fee;
	$total_ycar = $total_ycar+$booking->sale_price-$booking->fee;
	//$html .='<td>'.$booking->comment.'</td>';
	$html .='</tr>';
	
}
	$html .='<tr><td colspan="2"> Tổng </td><td>'.number_format($total).'</td><td>'.number_format($total_sale).'</td><td>'.number_format($total_driver).'</td><td>'.number_format($total_ycar).'</td></tr>';
$html.='</table>';
echo $html;


if (!$view_report) {
$mailer = JFactory::getMailer();

$config = JFactory::getConfig();
$sender = array( 
    $config->get( 'mailfrom' ),
    $config->get( 'fromname' ) 
);

$mailer->setSender($sender);
$recipient = array( 'thuydt@onecard.vn', 'huynv@ltdvietnam.com','info@onecard.vn');
//$recipient = array('huynv@ltdvietnam.com');
$mailer->addRecipient($recipient);

$mailer->setSubject('Báo cáo Ycar '.$date_report);
$mailer->isHtml(true);

$mailer->setBody($html);
$send = $mailer->Send();
if ( $send !== true ) {
    echo 'Error sending email: ';
} else {
    echo 'Mail sent';
}
}
