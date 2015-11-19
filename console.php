<?php

/**
 * PHP version 5.3
 * @category Retailcrm
 * @package Retailcrm
 * @author RetailCrm <integration@retailcrm.ru>
 * @license https://opensource.org/licenses/MIT MIT License
 * @link http://retailcrm.ru
 */
require_once __DIR__ . '/vendor/autoload.php';

$console = new RetailCrm\Console\Application('SaaS connector CLI Commands');
$console->add(new RetailCrm\Command\Ecwid\IcmlCommand());
$console->run();
