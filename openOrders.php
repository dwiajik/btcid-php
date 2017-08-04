<?php

require 'init.php';

$result = btcid_query('openOrders');
print_r($result);