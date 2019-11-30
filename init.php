<?php

ini_set('max_execution_time', '0');
ini_set('memory_limit', '-1');

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/databaseConnection/Database.php';
require_once __DIR__ . '/lib/repositories/AbstractEntity.php';
require_once __DIR__ . '/lib/repositories/ImagesRepository.php';
require_once __DIR__ . '/lib/MissingFiles.php';
require_once __DIR__ . '/seed/ImagesSeeder.php';

$db = new Database();
$db->connect(DB_TYPE, DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_NAME);