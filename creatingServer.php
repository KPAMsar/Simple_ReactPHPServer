<?php

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

require 'vendor/autoload.php';
$loop = React\EventLoop\Factory::create();

$server = new React\Http\Server( function(ServerRequestInterface $request){
    return new Response(200, ['content-type'=>'text/plain'],'your server is ready');
});
$socket = new React\Socket\Server('127.0.0.1:8080',$loop);
$server->listen($socket);
$loop->run();