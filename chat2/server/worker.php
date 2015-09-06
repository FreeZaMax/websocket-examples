#!/usr/bin/env php
<?php

if (empty($argv[1]) || !in_array($argv[1], array('start', 'stop', 'restart'))) {
    die("не указан параметр (start|stop|restart)\r\n");
}

$config = array(
    'class' => 'morozovsk\websocket\samples\Chat2WebsocketWorkerHandler',
    'pid' => '/tmp/websocket_chat2_worker.pid',
    'websocket' => 'tcp://127.0.0.1:8001',
    //'localsocket' => 'tcp://127.0.0.1:8010',
    'master' => 'tcp://127.0.0.1:8010',//connect to master
    //'eventDriver' => 'event'
);

require_once __DIR__ . '/../../../../../autoload.php';

$WebsocketServer = new morozovsk\websocket\Server($config);
call_user_func(array($WebsocketServer, $argv[1]));