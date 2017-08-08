<?php

function init_dat() {
    return '
    {
        "last_trade_id": {
            "btc_idr": "0",
            "bch_idr": "0",
            "bts_btc": "0",
            "dash_btc": "0",
            "doge_btc": "0",
            "eth_btc": "0",
            "ltc_btc": "0",
            "nxt_btc": "0",
            "xlm_btc": "0",
            "xem_btc": "0",
            "xrp_btc": "0"
        }
    }';
}

function load_data($datafile = 'data.json') {
    $string = is_file($datafile) ? file_get_contents($datafile) : '';
    return $string != '' ? json_decode($string) : json_decode(init_dat());
}

function save_data($data, $datafile = 'data.json') {
    return file_put_contents($datafile, json_encode($data));
}