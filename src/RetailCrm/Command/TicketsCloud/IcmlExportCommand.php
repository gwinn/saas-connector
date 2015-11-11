<?php

namespace RetailCrm\Command\TicketsCloud;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RetailCrm\Component\FLock;
use RetailCrm\Component\Icml;
use RetailCrm\Client\TicketsCloud;

/**
 * Class IcmlExportCommand
 * @package RetailCrm\Command
 */
class IcmlExportCommand extends Command {

    protected $token;

    public function __construct($token, $path) {
        parent::__construct();
        $this->token = $token;
        $this->path = $path;
    }

    /**
     * Configure command
     */
    protected function configure() {
        $this
            ->setName('ticketscloud:export:icml')
            ->setDescription('generate icml file')
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

        $response = array();
        $categories = array();
        $items = array();

        $client = new TicketsCloud($this->token);

        $request = $client->eventsServiceList();

        if ($request->isSuccessful()) {
            $response = $request->getResponse();
        } else {
            return false;
        }

        foreach ($response as $event) {
            $categories[] = array(
                'id' => $event['id'],
                'name' => $event['title']['text']
            );

            foreach ($event['sets'] as $set) {
                foreach ($set['rules'] as $rule) {

                    $items[] = array(
                        'id' => $rule['id'],
                        'productId' => $rule['id'],
                        'categoryId' => $event['id'],
                        'name' => $event['title']['text'] . ' - ' . $set['name'],
                        'productName' => $event['title']['text'] . ' - ' . $set['name'],
                        'price' => $rule['price'],
                        'purchasePrice' => $rule['price_org'],
                        'quantity' => $set['amount_vacant'],
                        'picture' => $event['media']['cover_small']['url'],
                        'params' => array(
                            array(
                                'code' => 'startdate',
                                'name' => 'Дата начала мероприятия',
                                'value' => $this->parseICal($rule['cal'])->start
                            ),
                            array(
                                'code' => 'enddate',
                                'name' => 'Дата окончания мероприятия',
                                'value' => $this->parseICal($rule['cal'])->end
                            ),
                            array(
                                'code' => 'tag',
                                'name' => 'Тэг',
                                'value' => $event['tags'][0]
                            )
                        )
                    );
                }
            }
        }


        $xml = new Icml('Painty', 'Painty', $this->path);
        $xml->generate($categories, $items);

        return true;
    }


    /**
     * Get active events
     * @param  string $string iCal string
     * @return string         date value
     */
    protected function parseICal($string)
    {
        $string = explode(';',  preg_replace('/\r\n/', '', $string));

        $dates = new \stdClass();

        $dates->start = date(
            'Y-m-d H:i:s',
            strtotime(
                preg_replace(
                    '/VALUE\=DATE-TIME\:/', '', preg_replace(
                        '/DTEND/', '', $string[1]
                    )
                )
            )
        );

        $dates->end = date(
            'Y-m-d H:i:s',
            strtotime(
                preg_replace(
                    '/VALUE\=DATE-TIME\:/', '', preg_replace(
                        '/END:\VEVENT/', '', $string[2]
                    )
                )
            )
        );

        return $dates;
    }

}
