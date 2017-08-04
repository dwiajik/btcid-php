<?php

function save_log($request, $response) {
    $filename = 'logs/'.date('Y-m-d').'.log';
    $data = date('Y-m-d H:i:s')."\n";
    $data .= "REQUEST:\n";
    $data .= $request."\n";
    $data .= "RESPONSE:\n";
    $data .= $response."\n\n";

    return file_put_contents($filename, $data, FILE_APPEND);
}

function btcid_query($method, array $req = array()) {
    // API settings
    $key = getenv('BTCID_API_KEY'); // your API-key
    $secret = getenv('BTCID_SECRET_KEY'); // your Secret-key
    $req['method'] = $method;
    $req['nonce'] = '9223372036854775808';
    // $req['nonce'] = 0;

    // generate the POST data string
    $post_data = http_build_query($req, '', '&');
    $sign = hash_hmac('sha512', $post_data, $secret);

    // generate the extra headers
    $headers = array(
        'Sign: '.$sign,
        'Key: '.$key,
    );

    // our curl handle (initialize if required)
    static $ch = null;
    if (is_null($ch)) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; BITCOINCOID PHP client; '.php_uname('s').'; PHP/'.phpversion().')');
    }
    curl_setopt($ch, CURLOPT_URL, 'https://vip.bitcoin.co.id/tapi/');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    // run the query
    $res = curl_exec($ch);
    if ($res === false) throw new Exception('Could not get reply: '.curl_error($ch));
    $dec = json_decode($res, true);
    if (!$dec) throw new Exception('Invalid data received, please make sure connection is working and requested API exists: '.$res);

    curl_close($ch);
    $ch = null;

    save_log(json_encode($req), $res);

    return $dec;
}