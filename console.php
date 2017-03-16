<?php


require_once 'vendor/autoload.php';

use MayMeowCodes\SoundPlayer\Console\Command\PlayCommand;
use MayMeowCodes\SoundPlayer\Console\Command\ShutdownCommand;
use MayMeowCodes\SoundPlayer\Console\Command\StopCommand;
use Symfony\Component\Console\Application;

$application = new Application('MPlayer Console v 0.0.1');

// ... register commands

$application->add(new PlayCommand());
$application->add(new StopCommand());
$application->add(new ShutdownCommand());

$application->run();