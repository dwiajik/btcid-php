<?php

require 'init.php';

$current_data = load_data();

foreach($currency_pairs as $pair) {
    $result = btcid_query('tradeHistory', ['pair' => $pair]);

    if (!empty($result['return']['trades']) && $result['return']['trades'][0]['trade_id'] > $current_data->last_trade_id->{$pair}) {
        echo 'NEW TRADE!!!';
        $current_data->last_trade_id->{$pair} = $result['return']['trades'][0]['trade_id'];
        send_email("New $pair Trade on Bitcoin.co.id", json_encode($result, JSON_PRETTY_PRINT));
    } else {
        echo 'NO NEW TRADE';
    }

    print_r($result);
}

save_data($current_data);