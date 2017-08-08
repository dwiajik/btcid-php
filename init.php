<?php

require 'vendor/autoload.php';
require 'includes/request.php';
require 'includes/data.php';
require 'includes/mail.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

date_default_timezone_set(getenv('TIMEZONE', 'Asia/Jakarta'));

$currency_pairs = [
    'btc_idr',
    'bch_idr',
    'bts_btc',
    'drk_btc',
    'doge_btc',
    'eth_btc',
    'ltc_btc',
    'nxt_btc',
    'str_btc',
    'nem_btc',
    'xrp_btc',
];