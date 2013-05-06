<?php
$config = array(
    '_urls' => array(),

    '_db' => array(
        'adapter' => 'Mysqli',
        'params' => array(
            'host' => '127.0.0.1',
            'port' => 3306,
            'user' => 'root',
            'password' => 'root',
            'database' => 'test',
            'charset' => 'utf8',
            'persitent' => true
        )
    ),

    '_modelsHome'      => 'models',
    '_controllersHome' => 'controllers',
    '_viewsHome'       => 'views',
    '_widgetsHome'     => 'widgets'
);
