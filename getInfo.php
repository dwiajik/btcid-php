<?php

require 'init.php';

$result = btcid_query('getInfo');
print_r($result);