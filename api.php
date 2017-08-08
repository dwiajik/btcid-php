<?php
require 'init.php';

$result = btcid_query($argv[1]);

print_r($result);