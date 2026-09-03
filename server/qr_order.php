<?php
 
// 디비 접속
require_once 'db_connect.php';
$cart_id = $_GET['id'];
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
        SELECT menu_seq, 
               order_count, 
               cup, 
               size,
               'o', 
               user_id, 
               menu_option, 
               cart_id,
               hot_iced
        FROM   siren_order_order o, 
               siren_order_menu m 
        WHERE  1 = 1 
               AND o.menu_seq = m.seq 
               AND cart_id = '{$cart_id}' ";

// 쿼리 수행        
$result = mysql_query($sql);

header("Location:../admin_order.html");