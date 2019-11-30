<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/databaseConnection/AbstractEntity.php';
require_once __DIR__ . '/databaseConnection/Database.php';
require_once __DIR__ . '/repositories/ImagesRepository.php';
require_once __DIR__ . '/seed/ImagesSeeder.php';
require_once __DIR__ . '/lib/SyncImages.php';

$db = new Database();
$db->connect(DB_TYPE, DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_NAME);
