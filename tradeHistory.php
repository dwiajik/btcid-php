<?php
require 'includes/request.php';
require 'includes/data.php';

$result = btcid_query('tradeHistory', ['pair' => 'btc_idr']);

$current_data = load_data();

if ($result['return']['trades'][0]['trade_id'] > $current_data->last_trade_id->btc_idr) {
    echo 'NEW TRADE!!!';
    $current_data->last_trade_id->btc_idr = $result['return']['trades'][0]['trade_id'];
    save_data($current_data);
} else {
    echo 'NO NEW TRADE';
}

print_r($result);