<?php
header("Content-Type:text/html;charset=utf-8");

$host = '127.0.0.1';
$db   = 'test';
$db_user = 'root';
$db_pass = 'root';


$username = $_GET['username'];
$key      = $_GET['key'];
$code     = $_GET['code'];
$desc     = '';

if ($username && $key && $code) {
    $result = insertData($username, $key, $code);
    echo $result;
}


function insertData($username, $key, $code) {
    global $host, $db, $db_user, $db_pass;
    mysql_connect($host, $db_user, $db_pass) or die('db connet error');
    $username = mysql_real_escape_string($username);
    $key = mysql_real_escape_string($key);
    $code = mysql_real_escape_string($code);
    mysql_select_db($db);
    $sql1 = "SELECT `code`,`num` FROM `data` WHERE `username`='{$username}' AND `key`='{$key}' AND `code`='{$code}' LIMIT 1;";
    $query = mysql_query($sql1);
    $row = mysql_fetch_assoc($query);
    if ($row) {
        if ($row['num'] > 0) {
            return $row['code'];
        }
        return '次数用完';
    } else {
        $date     = date('Y-m-d');
        $sql2 = "INSERT INTO `data`(`username`, `key`, `code`, `date`, `num`) VALUES ('{$username}', '{$key}', '{$code}', '{$date}', 1)";
        $query = mysql_query($sql2);
        if (!$query) {
            echo mysql_error();
        }
    }
}
