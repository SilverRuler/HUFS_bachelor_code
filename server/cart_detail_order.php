<?php
 
 session_start();
// 디비 접속
require_once 'db_connect.php';
if(isset($_GET[id])){	// get 가 있으면 처리
    extract($_GET);
    $sql = "INSERT INTO siren_order_order 
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

            SELECT 
                menu_seq
                 , order_count
                 , cup
                 , size
                , 'o'
                , user_id
                , menu_option
                , cart_id
                , hot_iced
            FROM siren_order_order
            WHERE 1=1
                AND cart_id = '{$id}' 

            ";

	// 쿼리 수행 		
    $result = mysql_query($sql);
}else{  // 첫번째 파일이 없으면 종료
    die("error");
    exit;   
}

header("Location:../order.html");