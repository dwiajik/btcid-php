<?php

function load_data($datafile = 'data.json') {
    $string = file_get_contents($datafile);
    return json_decode($string);
}

function save_data($data, $datafile = 'data.json') {
    return file_put_contents($datafile, json_encode($data));
}