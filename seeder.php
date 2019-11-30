<?php

require_once 'init.php';

define('COUNT', isset($argv[1]) ? $argv[1] : 10);

$seed = new ImagesSeeder();

printf("Populating %d records (ex. php seeder.php 100)...\n", COUNT);
$seed->seed(COUNT);
