<?php

namespace RetailCrm\Command\Ecwid;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RetailCrm\Component\FLock;
use RetailCrm\Component\Icml;
use RetailCrm\Client\EcwidClient;

/**
 * Class IcmlCommand
 * @package RetailCrm\Command
 */
class IcmlCommand extends Command
{

    /**
     * Configure command
     */
    protected function configure()
    {
        $this
            ->setName('ecwid:export:icml')
            ->setDescription('generate icml file');
    }

    /**
     * Execute command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return bool
     */
    protected function execute(OutputInterface $output)
    {
        $flock = new FLock(__CLASS__);

        if (!$flock->isLocked()) {
            $output->writeln("<error> Command " . $this->getName() . " already running in this system. Kill it or try again later </error>", OutputInterface::VERBOSITY_QUIET);
            return true;
        }

        $shopId  = '11';
        $clientToken = '11';

        $client = new EcwidClient($shopId, $clientToken);

        $request = $client->getCategories();
        var_dump($request);

        return true;
    }
}
