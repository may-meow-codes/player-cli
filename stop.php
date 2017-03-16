<?php

require_once 'vendor/autoload.php';

$client = new \MayMeow\SocketClient('tcp://192.168.2.49:9878');

$response = $client->setAction('Stop')
    ->setData(['url' => 'http://stream.expres.sk:8000/128.mp3'])->run();

print_r($response);