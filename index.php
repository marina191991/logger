<?php
include_once 'Logger.php';
include_once 'LoggerInterface.php';
$log = new Logger('error');
echo $log->getLevel();
echo "\n";
$log->error('Not available');
/*$log->debug('Order don\'t create');
$log->info('Order don\'t create');*/


