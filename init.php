<?php

require 'vendor/autoload.php';
require 'includes/request.php';
require 'includes/data.php';
require 'includes/mail.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

date_default_timezone_set(getenv('TIMEZONE', 'Asia/Jakarta'));