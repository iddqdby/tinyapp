<?php

$class_loader = require __DIR__.'/../vendor/autoload.php';
$class_loader->addPsr4( 'test\\', __DIR__.'/mock' );
