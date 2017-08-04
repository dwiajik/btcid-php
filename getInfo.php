<?php
require 'includes/request.php';

$result = btcid_query('getInfo');
print_r($result);