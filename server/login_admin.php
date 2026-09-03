<?php
// 정상경로가 아니면 나가기
if(isset($_POST) === false){
	die('invaild access');
	exit;
}

session_start();
require_once 'db_connect.php';
// array  벗겨내기
extract($_POST);
if($user_id != 'admin'){
	header("Location:../menu.html");
	exit;
}


$query = "SELECT * FROM siren_order_user 
				WHERE user_id = '{$user_id}' 
				AND pwd = password('{$pwd}') ";
				
$result = mysql_query($query);

$resultArray = array();
$arr = mysql_fetch_array($result);
if(@mysql_num_rows($result) > 0){		// 인증성공
	$_SESSION['user_id'] = $user_id;
	$_SESSION['login'] = true;
	$_SESSION['phone'] = $arr['phone'];
	$_SESSION['user_name'] = $arr['user_name'];
	$_SESSION['user_image'] =  $arr['user_image'];
	$_SESSION['point'] = $arr['point'];
}else{
	//$resultArray['success'] = 'fail';
}

header("Location:../admin_order.html");
