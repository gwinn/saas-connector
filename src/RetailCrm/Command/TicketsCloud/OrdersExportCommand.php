<?php

namespace RetailCrm\Command\TicketsCloud;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RetailCrm\Component\FLock;
use RetailCrm\Client\TicketsCloud;

/**
 * Class OrdersExportCommand
 * @package RetailCrm\Command
 */
class OrdersExportCommand extends Command {

    protected $token;

    public function __construct($token) {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * Configure command
     */
    protected function configure() {
        $this
            ->setName('ticketscloud:export:orders')
            ->setDescription('create order')
        ;
    }

    /**
     * Execute command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return bool
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        $flock = new FLock(__CLASS__);

        if (!$flock->isLocked()) {
            $output->writeln("<error> Command " . $this->getName() . " already running in this system. Kill it or try again later </error>", OutputInterface::VERBOSITY_QUIET);
            return true;
        }

        $client = new TicketsCloud($this->token);

        $request = $client->ordersList();

        var_dump($request); die();

        if ($request->isSuccessful()) {
            $response = $request->getResponse();
        } else {
            return false;
        }

        var_dump($response);


        return true;
    }
}
