<?php

namespace RetailCrm\Client;

/**
 * API-клиент для Ecwid
 * @author Mazepin Vasily
 */
class EcwidClient {
    /** Базовый URL для API методов */
    const BASE_REQUEST_URL = 'https://app.ecwid.com/api/v3';
    /** @var string Идентификатор магазина */
    private $storeId;
    /** @var string API-ключ для приложения */
    private $apiKey;

    /**
     * @param $storeId string Идентификатор магазина
     * @param $apiKey string API-ключ для приложения
     */
    public function __construct($storeId, $apiKey) {
        $this->apiKey = $apiKey;
        $this->storeId = $storeId;
    }

    /**
     * @param $url
     * @return mixed
     */
    private function request($url) {

        $secureParam = array(
          'secure_auth_key' => $this->apiKey
        );

        $pUrl = parse_url($url);

        $url = (isset($pUrl['query']))
            ? $url .= '&' . http_build_query($secureParam)
            : $url .= '?'. http_build_query($secureParam)
            ;

        $headers[] = "Content-Type: application/x-www-form-urlencoded";
        $curl = curl_init();
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt ($curl, CURLOPT_HEADER, 0);
        curl_setopt ($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt ($curl, CURLOPT_HTTPGET, 1);
        curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
        $body = curl_exec ($curl);
        $error = json_decode($body, true);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($httpcode == 200) {
            return json_decode($body);
        } else {
            throw new \RuntimeException(isset($error['errorMessage'])?$error['errorMessage'] : 'Other Error');
        }
    }

    /**
     * @param string $parent
     * @return array|mixed
     */
    public function getCategories($parent = null)
    {
        $url = self::BASE_REQUEST_URL . "/" . $this->storeId . "/categories";

        if ($parent) {
            $url .= '?'. http_build_query(array('parent' => (string) $parent));
        }

        $categories = $this->request($url);

        return $categories;
    }

    /**
     * @param integer|null $category Идентификатор категории
     * @param bool $hidden
     * @return array|mixed
     */
    public function getProducts($category = null, $hidden = true)
    {
        $url = self::BASE_REQUEST_URL . "/" . $this->storeId . "/products";
        $param = array();
        if ($category)  {
            $param['category'] = $category;
        }
        if ($hidden) {
            $param['hidden_products'] = 'true';
        }
        $url .= '?'. http_build_query($param);
        $products = $this->request($url);
        return $products;
    }

    public function getProduct($id, $hidden = true)
    {
        $url = self::BASE_REQUEST_URL . "/" . $this->storeId . "/product";
        $param = array();
        $param['id'] =  $id;
        if ($hidden) {
            $param['hidden_products'] = 'true';
        }
        $url .= '?'. http_build_query($param);
        $product = $this->request($url);
        return $product;
    }
}
