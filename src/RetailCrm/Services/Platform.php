<?php

namespace RetailCrm\Services;

use Monolog\Logger;
use Monolog\Formatter\LineFormatter;
use Monolog\Formatter\HtmlFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\RetailCrmMailerHandler;

/**
 * Class Platform
 * @package RetailCrm
 */
class Platform
{

    private $log;
    private $logPath;
    private $errorLog;
    private $historyLog;
    private $settings;

    const GETTER = 'get';
    const SETTER = 'set';

    /**
     * Constructor
     * @param $settings
     * @param $logpath
     */
    public function __construct($settings, $logpath)
    {
        $this->settings = $settings;

        $this->logPath    = $logpath;
        $this->errorLog   = $logpath . $settings['logs']['error'];
        $this->historyLog = $logpath . $settings['logs']['history'];

        $this->initLogger();
    }

    /**
     * Logger init
     */
    private function initLogger()
    {
        $dateFormat = "Y-m-d H:i:s";
        $output = "[%datetime%][%level_name%] %message%\n";
        $stringFormatter = new LineFormatter($output, $dateFormat);
        $htmlFormatter = new HtmlFormatter($dateFormat);

        $stream = new RotatingFileHandler($this->errorLog, 2, Logger::INFO);
        $stream->setFormatter($stringFormatter);

        $mailer = new RetailCrmMailerHandler(
            $this->settings['mailer']['to'],
            'Integration error: ' . $this->settings['domain'],
            $this->settings['mailer']['from']
        );

        $mailer->setFormatter($htmlFormatter);

        $this->log = new Logger('platform');
        $this->log->pushHandler($stream);
        $this->log->pushHandler($mailer);
    }

    /**
     * @param $name
     * @param $arguments
     * @return bool|mixed
     */
    public function __call($name, $arguments)
    {
        $action = substr($name, 0, 3);
        $propertyName = strtolower(substr($name, 3, 1)) . substr($name, 4);
        $value = empty($arguments) ? '' : $arguments[0];
        $returnValue = true;

        if (!isset($this->$propertyName)) {
            throw new \InvalidArgumentException("Method \"$name\" not found");
        }

        if ($action == self::GETTER) {
            $returnValue = $this->$propertyName;
        } elseif ($action == self::SETTER) {
            $this->$propertyName = $value;
        }

        return $returnValue;
    }

    public function setSettings($settings)
    {
        $this->settings = array_merge($this->settings, $settings);
    }
}
