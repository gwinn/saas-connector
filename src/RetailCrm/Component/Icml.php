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

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Generate ICML file
     *
     * @param string $shop       shop name
     * @param string $company    company name
     * @param array  $categories set of categries
     * @param array  $offers     set of offers
     *
     * @return bool
     */
    public function generate($shop, $company, $categories, $offers)
    {
        $string = '<?xml version="1.0" encoding="UTF-8"?>
            <yml_catalog date="'.$this->date.'">
                <shop>
                    <name>'.$shop.'</name>
                    <company>'.$company.'</company>
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

        if ($this->dd->save($this->savedir . $this->params['export_file'])) {
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

            $e->setAttribute('id', $category['categoryId']);

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
            $e->setAttribute('id', $offer['offerId']);
            $e->setAttribute('productId', $offer['productcId']);
            $e->setAttribute('quantity', (int) $offer['quantity']);

            $offerFields = array(
                'categoryId', 'name', 'productName',
                'initialPrice', 'purchasePrice',
                'vendor', 'xmlId', 'picture', 'url'
            );

            array_walk(
                $offerFields,
                function ($field) use ($offer, &$e, &$dom) {
                    if (isset($offer[$field]) && $offer[$field] != '') {
                        $e->appendChild($dom->createElement($field))
                            ->appendChild($dom->createTextNode($offer[$field]));
                    }
                }
            );


            $params = array('article', 'weight', 'color', 'size');

            array_walk(
                $params,
                function ($param) use ($offer, &$e, &$dom) {
                    if (isset($offer[$param]) && $offer[$param] != '') {
                        $elem = $this->dd->createElement('param');
                        $elem->setAttribute('name', $param);
                        $elem->appendChild($dom->createTextNode($offer[$param]));
                        $e->appendChild($elem);
                    }
                }
            );
        }
    }
}
