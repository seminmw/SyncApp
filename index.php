<?php

require_once 'init.php';

// Позволит распределить программу по cron job
define('DATE_START', isset($argv[1]) ? $argv[1] : '1900-01-01');
define('DATE_END', isset($argv[2]) ? $argv[2] : '2050-01-01');

//
$repo = new ImagesRepository();

//
$sync = new MissingFiles($repo, FOLDER, DATE_START, DATE_END, RECORDS_PAGE);
$files = $sync->getFiles();

//
$sync->printResult($files);
