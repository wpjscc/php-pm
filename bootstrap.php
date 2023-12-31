<?php

use React\EventLoop\Loop;

if (class_exists(\PHPPM\ProcessSlave::class)) {
    $socket = \PHPPM\ProcessSlave::$slave;
} else {
    // todo socket
}

$http = new \React\Http\HttpServer(function (\Psr\Http\Message\ServerRequestInterface $request) {
    return \React\Http\Message\Response::plaintext(
        "Hello World!\n"
    );
});

$http->listen($socket);

Loop::get()->run();