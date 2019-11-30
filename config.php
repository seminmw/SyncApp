<?php

# Database
define('DB_TYPE', getenv("DB_TYPE"));
define('DB_PORT', getenv("DB_PORT"));

define('DB_HOST', getenv('DB_HOST'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASS'));
define('DB_NAME', getenv('DB_NAME'));

# Folder
define("RECORDS_PAGE", 2000);

define("FOLDER", __DIR__ . "/images");
define("DS", DIRECTORY_SEPARATOR);
