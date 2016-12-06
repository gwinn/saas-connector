<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Service\Inpost
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://wt.inpost.ru/
 */
namespace SaaS\Service\Inpost;

/**
 * Inpost API Client
 *
 * @category ApiClient
 * @package  SaaS\Service\Inpost
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://wt.inpost.ru/
 */
class Api
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->client = new Request();
    }

    /**
     * Get city list
     *
     * @param string $type     response type
     * @param string $encoding encoding
     *
     * @see https://wt.inpost.ru/doc/citylist
     *
     * @return \SaaS\Http\Response
     */
    public function cityList($type = 'json', $encoding = 'utf-8')
    {
        $url = 'citylist';
        $parameters = array('type' => $type, 'encoding' => $encoding);

        return $this->client->makeRequest($url, Request::METHOD_GET, $parameters);
    }

    /**
     * Get parsel status
     *
     * @param string $code parsel code
     * @param string $type response type
     *
     * @see https://wt.inpost.ru/doc/parcelstatus
     *
     * @throws \InvalidArgumentException
     *
     * @return \SaaS\Http\Response
     */
    public function parselStatus($code, $type = 'json')
    {
        if (empty($code)) {
            throw new \InvalidArgumentException(
                'Parameter `code` must contains a data'
            );
        }

        $url = 'parcelstatus';
        $parameters = array('code' => $code, 'type' => $type);

        return $this->client->makeRequest($url, Request::METHOD_GET, $parameters);
    }

    /**
     * Get parsel statuses list
     *
     * @param string $type     response type
     * @param string $encoding encoding
     *
     * @see https://wt.inpost.ru/doc/parcelstatuses
     *
     * @return \SaaS\Http\Response
     */
    public function parselStatusesList($type = 'json', $encoding = 'utf-8')
    {
        $url = 'parcelstatuses';
        $parameters = array('encoding' => $encoding, 'type' => $type);

        return $this->client->makeRequest($url, Request::METHOD_GET, $parameters);
    }

    /**
     * Search terminal
     *
     * @param array  $params method parameters
     * @param string $type   response type
     *
     * @see https://wt.inpost.ru/doc/terminal_search
     *
     * @return \SaaS\Http\Response
     */
    public function searchTerminal($params = array(), $type = 'json')
    {
        $url = 'terminal_search';

        $parameters = array(
            'type' => $type
        );

        if (isset($params['login'])) {
            $parameters['telephonenumber'] = $params['login'];
        }

        if (!empty($params['password'])) {
            $parameters['password'] = $params['password'];
        }

        if (!empty($params['postcode'])) {
            $parameters['postcode'] = $params['postcode'];
        }

        if (!empty($params['city'])) {
            $parameters['city'] = $params['city'];
        }

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }


    /**
     * Calculate delivery cost
     *
     * @param array  $params   method parameters
     * @param string $type     response type
     * @param string $encoding encoding
     *
     * @see https://wt.inpost.ru/doc/calc
     *
     * @return \SaaS\Http\Response
     */
    public function calculate($params, $type = 'json', $encoding = 'utf-8')
    {
        if (empty($params['key'])) {
            throw new \InvalidArgumentException(
                'Parameter `key` must not be empty'
            );
        }

        if (empty($params['id']) && empty($params['city'])) {
            throw new \InvalidArgumentException(
                'One of parameters `id` or `city` must not be empty'
            );
        }

        $data = [];

        $parameters = array(
            'type' => $type,
            'encoding' => $encoding
        );

        foreach ($params as $key => $value) {
            if (!empty($params[$key])) {
                if ($key == 'dimensions') {
                    $data['dimensions'] = $value;
                } else {
                    $parameters[$key] = $value;
                }
            }
        }

        $url = 'calc?' . http_build_query($parameters);

        return $this->client->makeRequest($url, Request::METHOD_POST, $data);
    }

    /**
     * Create parsel
     *
     * @param array  $params method params
     * @param string $type   response type
     *
     * @see https://wt.inpost.ru/doc/createdeliverypacks
     *
     * @return \SaaS\Http\Response
     */
    public function parselCreate($params, $type = 'json')
    {
        if (empty($params['telephonenumber'])
            || empty($params['password'])
            || empty($params['parcels'])
        ) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Parameters `%s`, `%s` and `%s` must not be empty",
                    "telephonenumber",
                    "password",
                    "parcels"
                )
            );
        }

        $url = 'createdeliverypacks';

        $parameters = array(
            'type' => $type
        );

        foreach ($params as $key => $value) {
            if (!empty($params[$key])) {
                $parameters[$key] = $value;
            }
        }

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Get parsel printout
     *
     * @param array  $params method params
     * @param string $type   response type
     *
     * @see https://wt.inpost.ru/doc/confirmprintout
     *
     * @return \SaaS\Http\Response
     */
    public function parselPrintout($params, $type = 'json')
    {
        if (empty($params['telephonenumber'])
            || empty($params['password'])
            || empty($params['parcels'])
        ) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Parameters `%s`, `%s` and `%s` must not be empty",
                    "telephonenumber",
                    "password",
                    "parcels"
                )
            );
        }

        $url = 'confirmprintout';

        $parameters = array(
            'type' => $type
        );

        foreach ($params as $key => $value) {
            if (!empty($params[$key])) {
                $parameters[$key] = $value;
            }
        }

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }
}
