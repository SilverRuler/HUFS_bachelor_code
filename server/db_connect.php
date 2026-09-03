<?php
require_once 'config.inc';
// MYSQL 접속
$conn = mysql_connect(DB_HOST, DB_ID, DB_PASSWORD) or die('서버접속에러');
if (!$conn) {
    die("error");
    exit;
}
// DB 선택
mysql_select_db(DB_NAME, $conn);
mysql_query("SET NAMES utf8");

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);