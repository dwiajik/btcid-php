<?php
require 'includes/request.php';

$result = btcid_query('transHistory');
print_r($result);