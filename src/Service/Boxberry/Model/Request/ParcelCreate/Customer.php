<?php
/**
     *
     *
 * PHP version 7.1
 *
 * @category Models
 * @package  SaaS\Service\Boxberry\Model
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace SaaS\Service\Boxberry\Model\Request\ParcelCreate;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations;

/**
 * Class Customer
 *
 * @category Models
 * @package  SaaS\Service\Boxberry\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @Annotations\FakeMock()
 */
class Customer
{
    /**
     * ФИО получателя
     *
     * @var string $fio
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("fio")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $fio;

    /**
     * Номер телефона получателя,
     * Телефон должен содержать 10 цифр, в противном случае, все символы обрезаются и используется 10 цифр с конца.
     *
     * @var string $phone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $phone;

    /**
     * Дополнительный номер телефона получателя
     *
     * @var string $phone2
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone2")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $phone2;

    /**
     * E-mail получателя для оповещений
     *
     * @var string $email
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("email")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $email;

    /**
     * Наименование организации
     *
     * @var string $name
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $name;

    /**
     * Адрес организации
     *
     * @var string $address
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $address;

    /**
     * ИНН
     *
     * @var string $inn
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("inn")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $inn;

    /**
     * КПП
     *
     * @var string $kpp
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("kpp")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $kpp;

    /**
     * Расчетный счет
     *
     * @var string $rs
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("r_s")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $rs;

    /**
     * Наименование банка
     *
     * @var string $bank
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("bank")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $bank;

    /**
     * Корр. счет
     *
     * @var string $kors
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("kor_s")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $kors;

    /**
     * БИК
     *
     * @var string $bik
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("bik")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $bik;
}
