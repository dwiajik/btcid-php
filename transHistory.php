<?php

require 'init.php';

$result = btcid_query('transHistory');
print_r($result);