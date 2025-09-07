<?php 

require __DIR__."/../vendor/autoload.php";

Flight::route('/', function () {
  echo 'olá mundo!';
});

Flight::start();