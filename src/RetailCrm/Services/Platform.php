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
    private $errorLog;
    private $historyLog;
    private $settings;

    /**
     * Constructor
     * @param $settings
     */
    public function __construct($settings)
    {

        $this->settings = $settings;

        $this->errorLog   = __DIR__ . '/../../../app/' . $settings['logs']['error'];
        $this->historyLog = __DIR__ . '/../../../app/' . $settings['logs']['history'];

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

        $mailer = new RetailCrmMailerHandler($this->settings['mailer']['to'], 'Integration error', $this->settings['mailer']['from']);
        $mailer->setFormatter($htmlFormatter);

        $this->log = new Logger('platform');
        $this->log->pushHandler($stream);
        $this->log->pushHandler($mailer);
    }

    public function __call($name, $arguments)
    {
        $propertyName = strtolower(substr($name, 3, 1)) . substr($name, 4);

        if (!isset($this->$propertyName)) {
            throw new \InvalidArgumentException("Method \"$name\" not found");
        }

        return $this->$propertyName;
    }
}
