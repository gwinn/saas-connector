<?php

namespace RetailCrm\Component;

/**
 * Class Icml
 * @package RetailCrm\Component
 */
class Icml
{
    protected $dd;
    protected $eCategories;
    protected $eOffers;

    protected $shop;
    protected $company;
    protected $date;
    protected $path;

    /**
     * Constructor
     */
    public function __construct($shop, $company, $path)
    {
        $this->date = date('Y-m-d H:i:s');
        $this->shop = $shop;
        $this->company = $company;
        $this->path = $path;
    }

    /**
     * Generate Export file
     *
     * @param string $shop       shop name
     * @param string $company    company name
     * @param array  $categories set of categries
     * @param array  $offers     set of offers
     *
     * @return bool
     */
    public function generate($categories, $offers)
    {
        $string = '<?xml version="1.0" encoding="UTF-8"?>
            <yml_catalog date="'.$this->date.'">
                <shop>
                    <name>'.$this->shop.'</name>
                    <company>'.$this->company.'</company>
                    <categories/>
                    <offers/>
                </shop>
            </yml_catalog>
        ';

        $xml = new \SimpleXMLElement($string, LIBXML_NOENT | LIBXML_NOCDATA | LIBXML_COMPACT | LIBXML_PARSEHUGE);

        $this->dd = new \DOMDocument();
        $this->dd->preserveWhiteSpace = false;
        $this->dd->formatOutput = true;
        $this->dd->loadXML($xml->asXML());

        $this->eCategories = $this->dd->getElementsByTagName('categories')->item(0);
        $this->eOffers = $this->dd->getElementsByTagName('offers')->item(0);

        $this->addCategories($categories);
        $this->addOffers($offers);

        $this->dd->saveXML();

        if ($this->dd->save($this->path)) {
            return true;
        } else {
            return false;
        }


    }

    /**
     * Generate categories block
     *
     * @param $categories
     */
    private function addCategories($categories)
    {
        foreach ($categories as $category) {
            $e = $this->eCategories->appendChild(
                $this->dd->createElement('category', $category['name'])
            );

            $e->setAttribute('id', $category['id']);

            if (isset($category['parentId']) && $category['parentId'] != '') {
                $e->setAttribute('parentId', $category['parentId']);
            }
        }
    }

    /**
     * Generate offers block
     *
     * @todo make partial offers generation with tail addition
     *
     * @param $offers
     */
    private function addOffers($offers)
    {
        foreach ($offers as $offer) {
            $dom = $this->dd;
            $e = $this->eOffers->appendChild($this->dd->createElement('offer'));
            $e->setAttribute('id', $offer['id']);
            $e->setAttribute('productId', $offer['productId']);
            $e->setAttribute('quantity', (int) $offer['quantity']);

            $keys = array_keys($offer);
            $offerFields = array();

            foreach ($keys as $key => $value) {
                if (!in_array($value, array('params', 'id', 'productId', 'quantity'))) {
                    $offerFields[] = $value;
                }
            }

            array_walk(
                $offerFields,
                function ($field) use ($offer, &$e, &$dom) {
                    if (isset($offer[$field]) && $offer[$field] != '') {
                        $e->appendChild($dom->createElement($field))
                            ->appendChild($dom->createTextNode($offer[$field]));
                    }
                }
            );


            array_walk(
                $offer['params'],
                function ($param) use ($offer, &$e, &$dom) {
                    if (!empty($offer['params'])) {
                        $elem = $this->dd->createElement('param');
                        $elem->setAttribute('code', $param['code']);
                        $elem->setAttribute('name', $param['name']);
                        $elem->appendChild($dom->createTextNode($param['value']));
                        $e->appendChild($elem);
                    }
                }
            );
        }
    }
}
