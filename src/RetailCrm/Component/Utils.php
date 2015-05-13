<?php

namespace RetailCrm\Component;


class Utils {
    /**
     * Split fio field into first name, last name & patronymic
     *
     * @param $fio
     * @return array|bool
     */
    static function explodeFIO($fio)
    {
        $result = array();
        $parse = (!$fio) ? false : explode(" ", $fio, 3);
        switch (count($parse)) {
            case 1:
                $result['firstName'] = $parse[0];
                break;
            case 2:
                $result['firstName'] = $parse[0];
                $result['lastName'] = $parse[1];
                break;
            case 3:
                $result['firstName'] = $parse[0];
                $result['lastName'] = $parse[1];
                $result['patronymic'] = $parse[2];
                break;
            default:
                return false;
        }

        return $result;
    }

    /**
     * Save last history import datetime or service last order id into file
     *
     * @param $data
     * @param $file
     */
    static function saveData($data, $file)
    {
        file_put_contents($file, $data, LOCK_EX);
    }

    /**
     * Get last history import datetime
     *
     * @param $file
     * @return string
     */
    static function getDate($file)
    {
        $result = file_exists($file)
            ? file_get_contents($file)
            : date('Y-m-d H:i:s', strtotime('-100 days'));
        ;

        return $result;
    }

    /**
     * Get last order id
     *
     * @param $file
     * @return string|bool
     */
    static function getData($file)
    {
        $result = file_exists($file)
            ? file_get_contents($file)
            : false;
        ;

        return $result;
    }

    /**
     * Unset empty fields
     *
     * @param array
     * @return array
     *
     */
    public static function clearArray($arr)
    {
        if (!is_array($arr)) {
            return $arr;
        }

        $result = array();
        foreach ($arr as $index => $node ) {
            $result[ $index ] = (is_array($node)) ? self::clearArray($node) : trim($node);
            if ($result[ $index ] == '' || $result[ $index ] === null || count($result[ $index ]) < 1) {
                unset($result[ $index ]);
            }
        }

        return $result;
    }

    /**
     * Check is string is JSON
     */
    public static function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
