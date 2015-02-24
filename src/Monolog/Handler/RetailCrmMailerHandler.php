<?php

namespace Monolog\Handler;

use Monolog\Logger;

class RetailCrmMailerHandler extends NativeMailerHandler
{
    /**
     * The Content-type for the message
     * @var string
     */
    protected $contentType = 'text/html';

    /**
     * @param string|array $to             The receiver of the mail
     * @param string       $subject        The subject of the mail
     * @param string       $from           The sender of the mail
     * @param integer      $level          The minimum logging level at which this handler will be triggered
     * @param boolean      $bubble         Whether the messages that are handled can bubble up the stack or not
     * @param int          $maxColumnWidth The maximum column width that the message lines will have
     */
    public function __construct($to, $subject, $from, $level = Logger::ERROR, $bubble = true, $maxColumnWidth = 70)
    {
        parent::__construct($to, $subject, $from, $level = Logger::ERROR, $bubble = true, $maxColumnWidth = 70);
    }
}
