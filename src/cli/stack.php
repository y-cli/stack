#!/usr/bin/env php
<?php

define('STACK_PATH', './stack/install');
define('STACK_VERSION', '1.0.0');

require __DIR__.'/../../vendor/autoload.php';

use Silly\Application;
use Symfony\Component\Console\Output\OutputInterface;

$app = new Application('Stack docker for NGINX & PHP', STACK_VERSION);

$app->command('install', function (OutputInterface $output) {

    $output->writeln('Installing ...');
});

$app->run();
