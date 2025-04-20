<?php
 
 session_start();
// 디비 접속
require_once 'db_connect.php';
if(isset($_POST) ){	// get 가 있으면 처리
	extract($_POST);
	$userId = $_SESSION['user_id'];	
	$uuid = $_SESSION['uuid'];	

    $sql = "INSERT siren_order_order 
    			(menu_seq
    			 , order_count
    			 , cup
    			 , size
				, type_flag
				, user_id
				, menu_option
				, cart_id
				, hot_iced
    			 )
    		VALUES
    		( {$seq}
    		   , 1
    		   , '{$cup}'
    		   , '{$size}'
    		   , '{$flag}'
    		   , '{$userId}'
    		   , '{$option}'
    		   , '{$uuid}'
    		   , '{$hot_iced}'
   		 	) ";

	// 쿼리 수행 		
    $result = mysql_query($sql);

    $sql = "UPDATE siren_order_coupon 
                SET coupon = coupon + 1 
                WHERE user_id = '{$userId}'
            ";

    // 쿼리 수행        
    $result = mysql_query($sql);

}else{  // 첫번째 파일이 없으면 종료
    die("error");
    exit;   
}

header("Location:../order.html");