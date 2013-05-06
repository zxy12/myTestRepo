<?php
error_reporting(E_ALL);

define('APP_DIR', dirname(__FILE__));

require './Cola/Cola.php';

require './config.inc.php';

$cola = Cola::getInstance();
$cola->boot();
// 获得类名
$className = 'AdminController';
// 获得方法名
if (isset($_GET['a'])) {
        $actionName = $_GET['a'] . 'Action';
} else {
        $actionName = 'adminAction';
}

try {
    Cola::loadClass($className, './controllers');
    $dispatchInfo = array(
        'controller' => $className,
        'action' => $actionName
    );

    $cola->setDispatchInfo($dispatchInfo);

    $cola->dispatch();
} catch (Exception $e) {
    // 处理404
    header("HTTP/1.0 404 Not Found");
    header("Status: 404 Not Found");
    header('Location:404.html');
}
