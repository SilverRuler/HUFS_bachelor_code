<?php

require_once 'db_connect.php';  // 디비 연결하기
// post 값이 없으면 정상경로가 아니다.
if(isset($_POST) === false){
	// 메인 페이지로 이동한다.
	$url = "../login.html";
	echo '
			<script>
				window.location.href = "'.$url.'";
			</script>';
	exit;	
                    
}

//	seq 인덱스	user_name 유저명	user_id 학번	user_email 주소	phone 연락처	pwd 비밀번호	reg_datetime 등록일	user_image 유저이미지	coupon_count
// array  벗겨내기
extract($_POST);
$sql = "insert siren_order_user 
		( 
		  user_image
		, user_name
		, user_id
		, user_email
		, pwd
		) values(
		  ''
		, '{$user_name}'
		, '{$user_id}'
		, '{$user_email}'
		, password('{$pwd}') )";

		
$result = mysql_query($sql);


$sql = "INSERT INTO siren_order_coupon (user_id) VALUES ('{$user_id}') ";
$result = mysql_query($sql);


// 검색된 사용자가 없으면 실패
if(mysql_affected_rows() > 0){
	$url = "../login.html";
	$msg = 'alert("회원가입을 축하합니다.");';		
}else{
	$url = "../error_join.html";
	$msg ="";
}	
//	폼처리후 해당 페이지로 이동 
echo ' 	
		<script>
			'.$msg.'
			window.location.href="'.$url.'"</script>';
			
			