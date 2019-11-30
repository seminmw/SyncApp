<?php
require_once 'init.php';

$images = new ImagesRepository();

$data = $images->getAll();

$pathToFolder = __DIR__ . "/" . FOLDER_NAME;
$syncImages = new SyncImages($data, $pathToFolder);

$res = $syncImages->getSyncData();

SyncImages::viewResult($res);
